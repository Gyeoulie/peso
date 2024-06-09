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

    // ELIGIBILITY
    public $eliID;
    public $eliTypeID;
    public $eli_Name = 'Select Eligibility', $eli_Date;

    //LICENSE
    public $licName = 'Select License', $licValidity;
    public $licID, $licTypeID;

    public function rules()
    {
        return [
            // BASIC INFORMATION
            'fname' => ['required', 'string'],
            'lname' => ['required', 'string'],
            'birthdate' => ['required'],
            'gender' => ['required'],
            'civilstatus' => ['required'],
            'religion' => ['required'],
            'pnumber' => ['required'],
            'address' => ['required'],
            'bar' => ['required'],
            'mun' => ['required'],
            'prov' => ['required'],
            'pimg' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ];
    }

    public function openModal($modalName)
    {
        if ($modalName == "eligibility") {
            $this->reset('eliID', 'eli_Name', 'eli_Date', 'search');
            $this->dispatch('open-modal', 'eligibility-modal');
        } elseif ($modalName == "license") {
            $this->reset('licID', 'licName', 'licValidity', 'search');
            $this->dispatch('open-modal', 'license-modal');
        }
    }

    public function closeModal($modalName)
    {
        if ($modalName == "disability") {
            $this->reset('selectDisability', 'otherDisability');
            $this->dispatch('close-modal', 'disability-modal');
        } elseif ($modalName == "eligibility") {
            $this->reset('eliID', 'eli_Name', 'eli_Date', 'search');
            $this->dispatch('close-modal', 'eligibility-modal');
        } elseif ($modalName == "license") {
            $this->reset('licID', 'licName', 'licValidity', 'search');
            $this->dispatch('close-modal', 'license-modal');
        }
    }

    public function removeDisability($disID)
    {
        try {
            // Create the user record
            Disability::where('disability_id', $disID)
                ->where('employee_id', $this->empID)
                ->delete();

            toastr()->success('Disability record has been deleted.');
        } catch (\Exception $e) {

            // Show error toastr notification
            toastr()->error('There was an Error');
        }
    }

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

    public function saveDetails($name)
    {
        if ($name == "general") {
            $this->validate();

            $jobseekerData = Employee::findOrFail($this->empID);
            $imgPath = null;

            if ($this->pimg) {
                $imgPath = $this->pimg->store('images/user_data', 'public');
            }

            DB::beginTransaction();

            try {
                // Delete the old image if a new one is uploaded
                if ($this->pimg && $jobseekerData->pimg) {
                    Storage::disk('public')->delete($jobseekerData->pimg);
                }

                // Update the user record
                $jobseekerData->update([
                    'pimg' => $imgPath ?? $jobseekerData->pimg,
                    'fname' => $this->fname,
                    'mname' => $this->mname,
                    'lname' => $this->lname,
                    'suffix' => $this->suffix,
                    'height' => $this->height,
                    'gender' => $this->gender,
                    'civilstatus' => $this->civilstatus,
                    'religion' => $this->religion,
                    'birthdate' => $this->birthdate,
                    'pnumber' => $this->pnumber,
                    'address' => $this->address,
                    'barangay' => $this->barangayID, //fk
                    'tinnum' => $this->tinnum,
                ]);

                DB::commit();

                toastr()->success('Profile has been updated!');
            } catch (\Exception $e) {
                DB::rollBack();

                // Show error toastr notification
                toastr()->error('There was an error updating the profile.');
            }
        } elseif ($name == "disability") {
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
        } elseif ($name == "license") {
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
        } elseif ($name == "eligibility") {
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
    }

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

    public function mount()
    {
        $user = Auth::user();
        $this->empID = $user->employee->employee_id;

        $employeeDetails = Employee::find($this->empID);

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

        $barangayDetails = Barangay::find($employeeDetails->barangay->barangay_id);
        $this->bar = $barangayDetails->barangay_Name;
        $this->mun = $barangayDetails->municipality->municipality_Name;
        $this->prov = $barangayDetails->municipality->province->province_Name;

    }

    public function render()
    {
        $user = Auth::user();
        $this->empID = $user->employee->employee_id;

        $employeeDetails = Employee::find($this->empID);

        $this->disability = Disability::where('employee_id', '=', $this->empID)->get();

        $jobPreference = Job_Preference::where('employee_id', '=', $this->empID)->get();

        $industryPreference = Industry_Preference::where('employee_id', '=', $this->empID)->get();

        $eligibility = Eligibility::where('employee_id', '=', $this->empID)
            ->where(function ($query) {
                $query->whereHas('eligibilityType', function ($q) {
                    $q->where('eligibility_Name', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('eligibility_Date', 'desc')
            ->get();

        $elTypes = Eligibility_Type::where('eligibility_Name', 'like', '%' . $this->search . '%')->get();

        $license = License::where('employee_id', '=', $this->empID)
            ->where(function ($query) {
                $query->whereHas('License_Type', function ($q) {
                    $q->where('license_Name', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('license_Validity', 'desc')
            ->get();

        $liTypes = License_Type::where('license_Name', 'like', '%' . $this->search . '%')
            ->get();

        return view(
            'livewire.public.profile.jobseeker.partials.edit-details',
            compact('employeeDetails', 'eligibility', 'elTypes', 'license', 'liTypes', 'jobPreference', 'industryPreference')
        );
    }
}
