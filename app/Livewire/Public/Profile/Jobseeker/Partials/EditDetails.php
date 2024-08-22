<?php

namespace App\Livewire\Public\Profile\Jobseeker\Partials;

use App\Models\Barangay;
use App\Models\Disability;
use App\Models\Eligibility;
use App\Models\Eligibility_Type;
use App\Models\Employee;
use App\Models\Industry_preference;
use App\Models\Job_Industry;
use App\Models\Job_Positions;
use App\Models\Job_Preference;
use App\Models\Language;
use App\Models\License;
use App\Models\License_Type;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class EditDetails extends Component
{
    use WithFileUploads;

    public $empID;
    public $search;

    // BASIC INFORMATION

    #[Validate]
    public $pimg;

    public $fname, $mname, $lname, $suffix, $birthdate, $gender = 0, $civilstatus = 0, $religion = 0,
    $pnumber, $tinnum, $height, $address;
    public $barangayID, $mun, $prov, $bar;
    public $disability, $selectDisability = "", $otherDisability = "";
    public $jobpreference, $industrypreference;

    // LANGUAGE
    public $langID;
    public $selectedLanguage = "", $otherLanguage;
    public $read, $write, $speak, $understand;

    // ELIGIBILITY
    public $eliID;
    public $eliTypeID;
    public $eli_Name = 'Select Eligibility', $eli_Date;

    //LICENSE
    public $licName = 'Select License', $licValidity;
    public $licID, $licTypeID;

    //RULES
    public function rules()
    {
        return [
            // BASIC INFORMATION
            'pimg' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ];
    }

    //MODAL
    public function openModal($modalName)
    {

        if ($modalName == "disability") {
            $this->reset('selectDisability', 'otherDisability', );
            $this->dispatch('open-modal', 'disability-modal');
        } elseif ($modalName == "language") {
            $this->reset('read', 'write', 'speak', 'understand', 'otherLanguage');
            $this->selectedLanguage = '';
            $this->dispatch('open-modal', 'language-modal');
        } elseif ($modalName == "eligibility") {
            $this->reset('eliID', 'eli_Name', 'eli_Date', 'search');
            $this->dispatch('open-modal', 'eligibility-modal');
        } elseif ($modalName == "license") {
            $this->reset('licID', 'licName', 'licValidity', 'search');
            $this->dispatch('open-modal', 'license-modal');
        }
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function closeModal($modalName)
    {

        if ($modalName == "disability") {
            $this->reset('selectDisability', 'otherDisability');
            $this->dispatch('close-modal', 'disability-modal');
        } elseif ($modalName == "language") {
            $this->reset('read', 'write', 'speak', 'understand', 'otherLanguage');
            $this->selectedLanguage = '';
            $this->dispatch('close-modal', 'language-modal');
        } elseif ($modalName == "eligibility") {
            $this->reset('eliID', 'eli_Name', 'eli_Date', 'search');
            $this->dispatch('close-modal', 'eligibility-modal');
        } elseif ($modalName == "license") {
            $this->reset('licID', 'licName', 'licValidity', 'search');
            $this->dispatch('close-modal', 'license-modal');
        }
        $this->resetValidation();
    }

    //DISABILITY
    public function saveDisability()
    {
        if ($this->selectDisability === "other") {
            $this->selectDisability = $this->otherDisability;
            $this->validate([
                'selectDisability' => ['required', 'string', 'filled'],
            ]);
        }

        $this->validate([
            'selectDisability' => [
                'required', 'string', 'filled',
                Rule::unique('disability', 'disability_Type')
                    ->where(function ($query) {
                        $query->where('employee_id', $this->empID)
                            ->whereRaw('LOWER(disability_Type) = LOWER(?)', [$this->selectDisability]);
                    }),
            ],
        ]);

        try {
            Disability::create([
                'employee_id' => $this->empID,
                'disability_Type' => strtoupper($this->selectDisability),
            ]);

            toastr()->success('Disability Record has been Added!');
        } catch (\Exception $e) {
            toastr()->error('There was an Error');
        }
        $this->closeModal('disability');
    }

    public function removeDisability($disID)
    {
        try {
            Disability::where('disability_id', $disID)
                ->where('employee_id', $this->empID)
                ->delete();

            toastr()->success('Disability record has been deleted.');
        } catch (\Exception $e) {

            toastr()->error('There was an Error');
        }
    }

    //SET VARIABLES
    public function setVar($id, $name)
    {
        if ($name == "eligibility") {
            $this->reset('search');

            $eligibilityType = Eligibility_Type::find($id);
            $this->eli_Name = $eligibilityType->eligibility_Name;
            $this->eliTypeID = $id;
        } elseif ($name == "license") {
            $this->reset('search');

            $licenseType = License_Type::find($id);
            $this->licName = $licenseType->license_Name;
            $this->licTypeID = $id;
        }
    }

    public function editRecord($id, $name)
    {
        $this->resetErrorBag();
        $this->resetValidation();
        if ($name == 'language') {
            $this->langID = $id;

            $languageData = Language::find($id);

            // Mapping language types to selectedLanguage values
            $languageTypeMap = [
                'English' => 'English',
                'Filipino' => 'Filipino',
                'Mandarin' => 'Mandarin',
            ];

            $this->selectedLanguage = $languageTypeMap[$languageData->language_Type] ?? 'other';
            $this->otherLanguage = $this->selectedLanguage == 'other' ? $languageData->language_Type : null;

            // Boolean flags based on database values
            $this->read = $languageData->language_Read == '1';
            $this->write = $languageData->language_Write == '1';
            $this->speak = $languageData->language_Speak == '1';
            $this->understand = $languageData->language_Understand == '1';

            $this->dispatch('open-modal', 'language-modal');

        }

        if ($name == "license") {
            $this->licID = $id;

            $licenseData = License::find($id);
            $this->licName = $licenseData->license_type->license_Name;
            $this->licValidity = Carbon::parse($licenseData->license_Validity)->format('Y-m-d');

            $this->licTypeID = $licenseData->license_type_id;

            $this->dispatch('open-modal', 'license-modal');
        } elseif ($name == "eligibility") {
            $this->reset('search');
            $this->eliID = $id;
            $this->dispatch('open-modal', 'eligibility-modal');

            $eliData = Eligibility::find($id);
            $this->eli_Name = $eliData->eligibilityType->eligibility_Name;
            $this->eli_Date = Carbon::parse($eliData->eligibility_Date)->format('Y-m-d');

            $this->eliTypeID = $eliData->eligibility_Type;
        }
    }

    //SAVE PROFILE
    public function saveProfile()
    {

        $rules = [
            'fname' => ['required', 'string'],
            'lname' => ['required', 'string'],
            'birthdate' => [
                'required',
                'date',
                'before_or_equal:' . now()->subYears(18)->toDateString(), // Must be at least 18 years old
                'before_or_equal:' . now()->toDateString(), // Cannot be in the future
            ],
            'gender' => ['required'],
            'civilstatus' => ['required'],
            'religion' => ['required'],
            'pnumber' => ['required'],
            'address' => ['required'],
            'bar' => ['required'],
            'mun' => ['required'],
            'prov' => ['required'],
        ];

        $messages = [
            'fname.required' => 'First name is required.',
            'lname.required' => 'Last name is required.',
            'birthdate.required' => 'Birthdate is required.',
            'birthdate.date' => 'Birthdate must be a valid date.',
            'birthdate.before_or_equal' => 'You must be at least 18 years old.',
            'birthdate.before_or_equal' => 'Birthdate cannot be a future date.',
            'gender.required' => 'Gender is required.',
            'civilstatus.required' => 'Civil status is required.',
            'religion.required' => 'Religion is required.',
            'pnumber.required' => 'Phone number is required.',
            'address.required' => 'Address is required.',
            'bar.required' => 'Barangay is required.',
            'mun.required' => 'Municipality is required.',
            'prov.required' => 'Province is required.',
        ];

        $this->validate($rules, $messages);

        $jobseekerData = Employee::findOrFail($this->empID);
        $imgPath = null;

        if ($this->pimg) {
            $imgPath = $this->pimg->store('images/user_data', 'public');
        }

        DB::beginTransaction();

        try {
            // Delete old image if a new one is uploaded and there is an existing image
            if ($this->pimg && $jobseekerData->pimg) {
                Storage::disk('public')->delete($jobseekerData->pimg);
            }

            // Update model attributes
            $jobseekerData->pimg = $imgPath ?? $jobseekerData->pimg;
            $jobseekerData->fname = $this->fname;
            $jobseekerData->mname = $this->mname;
            $jobseekerData->lname = $this->lname;
            $jobseekerData->suffix = $this->suffix;
            $jobseekerData->height = $this->height;
            $jobseekerData->gender = $this->gender;
            $jobseekerData->civilstatus = $this->civilstatus;
            $jobseekerData->religion = $this->religion;
            $jobseekerData->birthdate = $this->birthdate;
            $jobseekerData->pnumber = $this->pnumber;
            $jobseekerData->address = $this->address;
            $jobseekerData->barangay_id = $this->barangayID;
            $jobseekerData->tinnum = $this->tinnum;

            // Check if any attributes have changed
            if ($jobseekerData->isDirty()) {
                $jobseekerData->save();
                DB::commit();
                toastr()->success('Profile has been updated!');
            } else {
                DB::rollBack();
                toastr()->info('No changes detected.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            if (isset($imgPath)) {
                Storage::disk('public')->delete($imgPath);
            }
            toastr()->error('There was an error updating the profile.');
        }
    }

    // LANGUAGE
    public function saveLanguage()
    {

        $rules = [
            'selectedLanguage' => [
                'required',
                function ($attribute, $value, $fail) {
                    // Check if the selected language already exists for the employee
                    $existingLanguage = Language::where('employee_id', $this->empID)
                        ->where('language_Type', $value === 'other' ? $this->otherLanguage : $value)
                        ->first();

                    if ($existingLanguage && $existingLanguage->language_id !== $this->langID) {
                        $fail('The selected language has already been added.');
                    }
                },
            ],
            'otherLanguage' => [
                'required_if:selectedLanguage,other',
                'nullable',
                'max:255',
                function ($attribute, $value, $fail) {
                    // Check if the "other" language already exists for the employee
                    if ($this->selectedLanguage === 'other') {
                        $existingLanguage = Language::where('employee_id', $this->empID)
                            ->where('language_Type', $value)
                            ->first();

                        if ($existingLanguage && $existingLanguage->language_id !== $this->langID) {
                            $fail('The language "' . $value . '" has already been added.');
                        }
                    }
                },
            ],
        ];

        $messages = [
            'selectedLanguage.required' => 'Please select a language.',
            'otherLanguage.required_if' => 'The other language field is required when the selected language is "other".',
            'otherLanguage.max' => 'Language must only have 255 characters.',
        ];

        $this->validate($rules, $messages);
        // Custom validation for at least one being true
        if (!$this->read && !$this->write && !$this->speak && !$this->understand) {
            $this->addError('language_option', 'At least one of the options for read, write, speak, or understand must be selected.');
            return;
        }
        DB::beginTransaction();

        try {
            if ($this->langID) {
                $language = Language::where('language_id', $this->langID)
                    ->where('employee_id', $this->empID)
                    ->firstOrFail();

                // Update model attributes
                $language->employee_id = $this->empID;
                $language->language_Type = $this->selectedLanguage === 'other' ? $this->otherLanguage : $this->selectedLanguage;
                $language->language_Read = $this->read === true ? 1 : 2;
                $language->language_Write = $this->write === true ? 1 : 2;
                $language->language_Speak = $this->speak === true ? 1 : 2;
                $language->language_Understand = $this->understand === true ? 1 : 2;

                // Check if any attributes have changed
                if ($language->isDirty()) {
                    $language->save();
                    toastr()->success('Language Record has been updated!');
                } else {
                    toastr()->info('No changes detected.');
                }
            } else {
                Language::create([
                    'employee_id' => $this->empID,
                    'language_Type' => $this->selectedLanguage === 'other' ? $this->otherLanguage : $this->selectedLanguage,
                    'language_Read' => $this->read === true ? 1 : 2,
                    'language_Write' => $this->write === true ? 1 : 2,
                    'language_Speak' => $this->speak === true ? 1 : 2,
                    'language_Understand' => $this->understand === true ? 1 : 2,
                ]);

                toastr()->success('Language Record has been added!');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('There was an error updating the language record.');
        }

        $this->closeModal('language');
    }

    //LICENSE
    public function saveLicense()
    {
        if ($this->licID) {
            try {
                License::where('license_id', $this->licID)->update([
                    'license_type_id' => $this->licTypeID,
                    'license_Validity' => $this->licValidity,
                ]);

                toastr()->success('License Record has been Updated!');
            } catch (\Exception $e) {
                toastr()->error('There was an Error');
            }
        } else {
            try {
                License::create([
                    'employee_id' => $this->empID,
                    'license_type_id' => $this->licTypeID,
                    'license_Validity' => $this->licValidity,
                ]);

                toastr()->success('License Record has been Added!');
            } catch (\Exception $e) {
                toastr()->error('There was an Error');
            }
        }

        $this->closeModal('license');
    }

    //ELIGIBILITY
    public function saveEligibility()
    {
        if ($this->eliID) {
            try {
                Eligibility::where('eligibility_id', $this->eliID)->update([
                    'eligibility_Type' => $this->eliTypeID,
                    'eligibility_Date' => $this->eli_Date,
                ]);

                toastr()->success('Eligibility Record has been Updated!');
            } catch (\Exception $e) {
                toastr()->error('There was an Error');
            }
        } else {
            try {
                Eligibility::create([
                    'employee_id' => $this->empID,
                    'eligibility_Type' => $this->eliTypeID,
                    'eligibility_Date' => $this->eli_Date,
                ]);

                toastr()->success('Eligibility Record has been Added!');
            } catch (\Exception $e) {
                toastr()->error('There was an Error');
            }
        }

        $this->closeModal('eligibility');
    }

    //ADDRESS + POSITIONS
    #[On('barSelect')]
    public function barSelect($id)
    {
        $barangay = Barangay::findOrFail($id);

        if ($barangay) {
            $this->barangayID = $id;
            $this->bar = $barangay->barangay_Name;
            $this->mun = $barangay->municipality->municipality_Name;
            $this->prov = $barangay->municipality->province->province_Name;
        }
    }

    #[On('positionSelect')]
    public function positionSelect($id)
    {
        $positionExist = Job_Preference::where('position_id', $id)
            ->where('employee_id', $this->empID)->exists();
        if ($positionExist) {
            toastr()->warning('This job position is already selected.');
            return;
        }

        $jobposition = Job_Positions::find($id);

        if ($jobposition) {
            Job_Preference::create([
                'employee_id' => $this->empID,
                'position_id' => $id,
            ]);
            $this->dispatch('close-modal', 'job-position-modal');
        } else {
            toastr()->error('Could not fetch data');
            $this->dispatch('close-modal', 'job-position-modal');
        }
    }

    #[On('industrySelect')]
    public function industrySelect($id)
    {

        $industryExist = Industry_Preference::where('industry_id', $id)
            ->where('employee_id', $this->empID)->exists();
        if ($industryExist) {
            toastr()->warning('This job industry is already selected.');
            return;
        }

        $industry = Job_Industry::find($id);

        if ($industry) {
            Industry_Preference::create([
                'employee_id' => $this->empID,
                'industry_id' => $id,
            ]);
            $this->dispatch('close-modal', 'industry-modal');
        } else {
            toastr()->error('Could not fetch data');
            $this->dispatch('close-modal', 'industry-modal');
        }
    }

    public function removePosition($positionId)
    {
        try {
            Job_Preference::where('job_preference_id', $positionId)
                ->where('employee_id', $this->empID)
                ->delete();

            toastr()->success('Job Preference record has been deleted.');
        } catch (\Exception $e) {

            toastr()->error('There was an Error');
        }
    }

    public function removeIndustry($industryId)
    {

        try {
            Industry_Preference::where('industry_pref_id', $industryId)
                ->where('employee_id', $this->empID)
                ->delete();

            toastr()->success('Industry Preference record has been deleted.');
        } catch (\Exception $e) {

            toastr()->error('There was an Error');
        }
    }

    public function render()
    {
        $user = Auth::user();
        $this->empID = $user->employee->employee_id;

        $this->disability = Disability::where('employee_id', '=', $this->empID)->get();

        // $langTypes = Language::where('language_Type', 'like', '%' . $this->search . '%')->get();
        $elTypes = Eligibility_Type::where('eligibility_Name', 'like', '%' . $this->search . '%')->get();
        $liTypes = License_Type::where('license_Name', 'like', '%' . $this->search . '%')->get();

        $employeeDetails = Employee::with([
            'job_preference',
            'industry_preference',
            'language',
            'eligibility' => function ($query) {
                $query->whereHas('eligibility_type', function ($q) {
                    $q->where('eligibility_Name', 'like', '%' . $this->search . '%');
                })->orderBy('eligibility_Date', 'desc');
            },
            'license' => function ($query) {
                $query->whereHas('License_Type', function ($q) {
                    $q->where('license_Name', 'like', '%' . $this->search . '%');
                })->orderBy('license_Validity', 'desc');
            },
        ])->find($this->empID);

        $this->fname = $employeeDetails->fname;
        $this->mname = $employeeDetails->mname;
        $this->lname = $employeeDetails->lname;
        $this->suffix = $employeeDetails->suffix;
        $this->birthdate = Carbon::parse($employeeDetails->birthdate)->format('Y-m-d');
        $this->gender = $employeeDetails->gender;
        $this->civilstatus = $employeeDetails->civilstatus;
        $this->religion = $employeeDetails->religion;
        $this->pnumber = $employeeDetails->pnumber;
        $this->tinnum = $employeeDetails->tinnum;
        $this->height = $employeeDetails->height;
        $this->address = $employeeDetails->address;
        $this->barangayID = $employeeDetails->barangay_id;

        $barangayDetails = Barangay::find($employeeDetails->barangay_id);
        $this->bar = $barangayDetails->barangay_Name;
        $this->mun = $barangayDetails->municipality->municipality_Name;
        $this->prov = $barangayDetails->municipality->province->province_Name;

        return view(
            'livewire.public.profile.jobseeker.partials.edit-details',
            compact('employeeDetails', 'elTypes', 'liTypes')
        );
    }
}
