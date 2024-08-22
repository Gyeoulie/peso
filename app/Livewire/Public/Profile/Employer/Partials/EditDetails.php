<?php

namespace App\Livewire\Public\Profile\Employer\Partials;

use App\Models\Barangay;
use App\Models\Company;
use App\Models\Company_Industry_Line;
use App\Models\Job_Industry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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

    // COMPANY INFORMATION
    #[Validate]
    public $companyImage;

    public $businessName, $tradeName, $tin, $locType, $workforce, $empType, $empDesc, $companyAddress;
    public $barangayID, $bar, $mun, $prov;

    // CONTACT PERSON
    public $contactPerson, $contactPosition, $contactPnum, $contactTnum, $contactFnum, $contactEmail;

    public $industrypreference;

    public function rules()
    {
        return [
            // BASIC INFORMATION
            'companyImage' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ];
    }

    public function saveCompany()
    {

        $rules = [
            'workforce' => ['required'],
            'companyAddress' => ['required'],
            'bar' => ['required'],
            'mun' => ['required'],
            'prov' => ['required'],
        ];

        $messages = [
            'workforce.required' => 'Total workforce is required.',
            'companyAddress.required' => 'Address is required.',
            'bar.required' => 'Barangay is required.',
            'mun.required' => 'Municipality is required.',
            'prov.required' => 'Province is required.',
        ];

        $this->validate($rules, $messages);

        $companyData = Company::findOrFail($this->empID);
        $imgPath = null;

        if ($this->companyImage) {
            $imgPath = $this->companyImage->store('images/user_data', 'public');
        }

        DB::beginTransaction();

        try {

            // Delete old image if a new one is uploaded and there is an existing image
            if ($this->companyImage && $companyData->companyImage) {
                Storage::disk('public')->delete($companyData->company_img);
            }

            // Update model attributes
            $companyData->company_img = $imgPath ?? $companyData->company_img;
            $companyData->company_Address = $this->companyAddress;
            $companyData->company_Total_workforce = $this->workforce;
            $companyData->barangay_id = $this->barangayID;

            // Check if any attributes have changed
            if ($companyData->isDirty()) {
                $companyData->save();
                DB::commit();
                toastr()->success('Company details has been updated!');
            } else {
                DB::rollBack();
                toastr()->info('No changes detected.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('There was an error updating the Company details.');
        }
    }

    public function saveContact()
    {

        $rules = [
            'contactPerson' => ['required', 'string'],
            'contactPosition' => ['required', 'string'],
            'contactPnum' => ['required', 'regex:/^09\d{9}$/'], // must start with "09" and be followed by 9 digits
            'contactTnum' => ['required', 'regex:/^0[0-9]{9,10}$/'],
            'contactFnum' => ['required', 'digits:10'], // must have 10 digits
            'contactEmail' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
        ];

        $messages = [
            'contactPerson.required' => 'The contact person is required.',
            'contactPosition.required' => 'The contact position is required.',
            'contactPnum.required' => 'The contact mobile number is required.',
            'contactPnum.regex' => 'The contact mobile number must start with "09" and contain 11 digits.',
            'contactTnum.required' => 'The contact telephone number is required.',
            'contactTnum.regex' => 'The telephone number must start with "0" and contain 10 or 11 digits.',
            'contactFnum.required' => 'The contact fax number is required.',
            'contactFnum.digits' => 'The contact fax number must have exactly 10 digits.',
            'contactEmail.required' => 'The contact email is required.',
            'contactEmail.email' => 'The contact email must be a valid email address.',
            'contactEmail.regex' => 'The contact email must be a valid email address.',
        ];

        $this->validate($rules, $messages);

        $companyData = Company::findOrFail($this->empID);

        DB::beginTransaction();

        try {

            // Update model attributes
            $companyData->contact_Person = $this->contactPerson;
            $companyData->contact_Person_position = $this->contactPosition;
            $companyData->company_Pnum = $this->contactPnum;
            $companyData->company_Tnum = $this->contactTnum;
            $companyData->company_Fnum = $this->contactFnum;
            $companyData->company_Email = $this->contactEmail;

            // Check if any attributes have changed
            if ($companyData->isDirty()) {
                $companyData->save();
                DB::commit();
                toastr()->success('Contact information has been updated!');
            } else {
                DB::rollBack();
                toastr()->info('No changes detected.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('There was an error updating the contact information.');
        }
    }

    //ADDRESS + POSITIONS
    #[On('barSelect')]
    public function barSelect($id)
    {
        // dd($id);
        $barangay = Barangay::findOrFail($id);

        if ($barangay) {
            // dd($barangay);
            $this->barangayID = $id;
            $this->bar = $barangay->barangay_Name;
            $this->mun = $barangay->municipality->municipality_Name;
            $this->prov = $barangay->municipality->province->province_Name;
        }
        $this->skipRender();
    }

    #[On('industrySelect')]
    public function industrySelect($id)
    {
        $this->resetVal();

        $industryExist = Company_Industry_Line::where('industry_id', $id)
            ->where('company_id', $this->empID)->exists();
        if ($industryExist) {
            toastr()->warning('This job industry is already selected.');
            return;
        }

        $industry = Job_Industry::find($id);

        if ($industry) {
            Company_Industry_Line::create([
                'company_id' => $this->empID,
                'industry_id' => $id,
            ]);
            $this->dispatch('close-modal', 'industry-modal');
        } else {
            toastr()->error('Could not fetch data');
            $this->dispatch('close-modal', 'industry-modal');
        }
    }

    public function removeIndustry($industryId)
    {
        try {
            // Check the count of industry lines associated with the company
            $industryCount = Company_Industry_Line::where('company_id', $this->empID)->count();

            if ($industryCount <= 1) {
                toastr()->warning('The company must have at least one industry line.');
                $this->addError('industrypreference', 'A company must have atleast 1 industry line.');
                return; // Exit the function early if only one industry line exists
            }

            // Proceed to delete the industry line
            Company_Industry_Line::where('company_industry_line_id', $industryId)
                ->where('company_id', $this->empID)
                ->delete();

            toastr()->success('Industry Line record has been deleted.');
        } catch (\Exception $e) {
            toastr()->error('There was an error deleting the Industry Line record.');
        }
    }

    public function mountData()
    {

        $employerDetails = Company::with(['company_industry_line'])
            ->findOrFail($this->empID);

        // COMPANY DETAILS
        $this->businessName = $employerDetails->business_Name;
        $this->tradeName = $employerDetails->trade_Name;
        $this->tin = $employerDetails->company_TIN;
        $this->locType = $employerDetails->company_Type;
        $this->workforce = $employerDetails->company_Total_workforce;
        $this->empType = $employerDetails->employer_Type;
        $this->empDesc = $employerDetails->employer_Type_Desc;
        $this->companyAddress = $employerDetails->company_Address;
        $this->barangayID = $employerDetails->barangay_id;

        //CONTACT PERSON
        $this->contactPerson = $employerDetails->contact_Person;
        $this->contactPosition = $employerDetails->contact_Person_position;
        $this->contactPnum = $employerDetails->company_Pnum;
        $this->contactTnum = $employerDetails->company_Tnum;
        $this->contactFnum = $employerDetails->company_Fnum;
        $this->contactEmail = $employerDetails->company_Email;

        $this->barSelect($employerDetails->barangay_id);

        $this->resetVal();
    }

    public function resetVal()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {

        $user = Auth::user();
        $this->empID = $user->company->company_id;

        

        $employerDetails = Company::with(['company_industry_line'])
            ->findOrFail($this->empID);

        return view('livewire.public.profile.employer.partials.edit-details', compact('employerDetails'));
    }
}
