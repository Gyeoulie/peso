<?php

namespace App\Livewire\Public\Profile\Jobseeker\Partials;

use App\Models\Disability;
use App\Models\Eligibility;
use App\Models\Eligibility_Type;
use App\Models\Employee;
use App\Models\License;
use App\Models\License_Type;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.app')]
class EditDetails extends Component
{
    public $empID;
    public $search;

    // BASIC INFORMATION
    public $pimg;
    public $fname, $mname, $lname, $suffix, $birthdate, $gender = 0, $civilstatus = 0, $religion = 0,
        $pnumber, $tinnum, $height, $address;
    public $barangay, $municipality, $province;
    public $disability;


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
            'barangay' => ['required'],
            'municipality' => ['required'],
            'province' => ['required'],
            'municipality' => ['required'],

            // ELIGIBILITY
        ];
    }


    // function previewImage(event) {
    //     var fileInput = event.target;
    //     var uploadedImage = document.getElementById('uploadedImage');
    //     var imageContainer = document.querySelector('.w-160.h-160');

    //     // Ensure a file is selected
    //     if (fileInput.files && fileInput.files[0]) {
    //         var reader = new FileReader();

    //         reader.onload = function (e) {
    //             uploadedImage.src = e.target.result;
    //             imageContainer.style.backgroundImage = 'url(' + e.target.result + ')';
    //             imageContainer.style.backgroundSize = 'cover';
    //             imageContainer.style.backgroundPosition = 'center';
    //         };

    //         // Read the file as a data URL
    //         reader.readAsDataURL(fileInput.files[0]);
    //     }
    // }

    // BASIC INFO
    public function save()
    {
        $this->validate();

        try {
            // Create the user record
            Employee::where('employee_id', $this->empID)->update([
                'pimg' => $this->pimg,
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
                // 'barangay' => $this->barangay, //fk
                'tinnum' => $this->tinnum,

            ]);

            toastr()->success('Profile has been Updated!');
        } catch (\Exception $e) {

            // Show error toastr notification
            toastr()->error('There was an Error');
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
    // BASIC INFO



    //ELIGIBILITY
    public function setEli($newEliID)
    {

        $this->reset('search');
        $eligibilityType = Eligibility_Type::find($newEliID);
        $this->eli_Name = $eligibilityType->eligibility_Name;
        $this->eliTypeID = $newEliID;
    }

    public function addEli()
    {
        $this->reset('eliID', 'eli_Name', 'eli_Date', 'search');
        $this->dispatch('open-modal', 'eligibility-modal');
    }

    public function editEligibility($eliID)
    {
        $this->reset('search');
        $this->eliID = $eliID;
        $this->dispatch('open-modal', 'eligibility-modal');

        $eliData = Eligibility::find($eliID);
        $this->eli_Name = $eliData->eligibilityType->eligibility_Name;
        $this->eli_Date = Carbon::parse($eliData->eligibility_Date)->format('Y-m-d');

        $this->eliTypeID = $eliData->eligibility_Type;
    }

    public function saveEli()
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

        $this->close();
    }

    public function close()
    {
        $this->reset('eliID', 'eli_Name', 'eli_Date', 'search');
        $this->dispatch('close-modal', 'eligibility-modal');
    }
    //ELIGIBILITY



    // LICENSE
    public function addlicense()
    {
        $this->reset('licID', 'licName', 'licValidity', 'search');
        $this->dispatch('open-modal', 'license-modal');
    }

    public function editLicense($licID)
    {
        $this->licID = $licID;

        $licenseData = License::find($licID);
        $this->licName = $licenseData->license_type->license_Name;
        $this->licValidity = Carbon::parse($licenseData->license_Validity)->format('Y-m-d');

        $this->licTypeID = $licenseData->license_type_id;

        $this->dispatch('open-modal', 'license-modal');

    }

    public function selectLicense($newLicID){
        $this->reset('search');

        $licenseType = License_Type::find($newLicID);
        $this->licName = $licenseType->license_Name;
        $this->licTypeID = $newLicID;
    }

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

        $this->closeLic();
    }

    public function closeLic(){
        $this->reset('licID', 'licName', 'licValidity', 'search');
        $this->dispatch('close-modal', 'license-modal');
    }
    // LICENSE

    public function render()

    {
        // BASIC INFO
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

        // $this->barangay = $employeeDetails->tinnum;
        // $this->municipality = $employeeDetails->tinnum;
        // $this->province = $employeeDetails->tinnum;

        $this->disability = Disability::where('employee_id', '=', $this->empID)->get();
        // $this->jobPref = $employeeDetails->tinnum;

        // BASIC INFO



        //ELIGIBILITY
        $eligibility = Eligibility::where('employee_id', '=', $this->empID)
            ->where(function ($query) {
                $query->whereHas('eligibilityType', function ($q) {
                    $q->where('eligibility_Name', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('eligibility_Date', 'desc')
            ->get();


        $elTypes = Eligibility_Type::where('eligibility_Name', 'like', '%' . $this->search . '%')
            ->get();

        //ELIGIBILITY



        //LICENSE
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
        //LICENSE



        // $eligibility = Eligibility::join('eligibility_types', 'eligibilities.eligibility_type_id', '=', 'eligibility_types.id')
        //     ->where('eligibilities.employee_id', '=', $this->empID)
        //     ->where(function ($query) {
        //         $query->where('eligibility_types.eligibility_Name', 'like', '%' . $this->search . '%')
        //             ->orWhere('eligibilities.eligibility_Name', 'like', '%' . $this->search . '%');
        //     })
        //     ->orderBy('eligibilities.eligibility_Date', 'desc')
        //     ->get(['eligibilities.*']); // Select eligibilities columns
        //ELIGIBILITY

        return view(
            'livewire.public.profile.jobseeker.partials.edit-details',
            compact('employeeDetails', 'eligibility', 'elTypes', 'license', 'liTypes')
        );
    }
}
