<?php

namespace App\Livewire\Signup\Employer;

use App\Models\Company;
use App\Models\Company_Industry_Line;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.empty')]
class EmployerInformation extends Component
{

    public $formData = [];

    public $currentStep = 1;

    #[On('handleStepData')]
    public function handleStepData($stepNumber, $data)
    {
        $this->formData[$stepNumber] = $data;
    }

    #[On('saveUser')]
    public function saveUser()
    {
        $allData = collect($this->formData)->collapse()->toArray();

        // dd($allData);

        $success = true; // Flag to track success

        $user = Auth::user();

        try {

            DB::beginTransaction();

            $employer = Company::create([
                'user_id' => $user->id,
                'business_Name' => $allData['business'],
                'trade_Name' => $allData['trade'],
                'company_TIN' => $allData['tin'],
                'company_Type' => $allData['locType'],
                'employer_Type' => $allData['empType'],
                'employer_Type_Desc' => $allData['empDesc'],
                'company_Total_workforce' => $allData['workForce'],
                'company_Address' => $allData['address'],
                'barangay_id' => $allData['barangayID'],
                'contact_Person' => $allData['name'],
                'contact_Person_position' => $allData['position'],
                'company_Pnum' => $allData['phone'],
                'company_Tnum' => $allData['tel'],
                'company_Fnum' => $allData['fax'],
                'company_Email' => $allData['email'],
                'company_Status' => 'ACTIVE',
                'company_img' => $allData['cimg'],
            ]);

            if ($employer->company_id) {

                // ADDING INDUSTRY PREFERENCE
                foreach ($allData['industryData'] as $industryPref) {
                    Company_Industry_Line::create([
                        'company_id' => $employer->company_id, // Assuming 'employee_id' is the foreign key column
                        'industry_id' => $industryPref['industry_id'],
                    ]);
                }

                // ADD LANGUAGE PREFERENCE

                $user = Auth::user();
                $user->userType = '5';

                /** @var \App\Models\User $user **/
                $user->save();
                // Update the user's role

                DB::commit();
            }

        } catch (\Exception $e) {
            DB::rollback();
            $success = false;
            toastr()->error('Error in updating user details, please try again later');

        }

        if ($success) {
            toastr()->success('Account Successfully Updated!');
            return redirect()->route('dashboard');
        }

    }

    #[On('nextStep')]
    public function nextStep()
    {
        $this->currentStep++;
    }

    #[On('prevStep')]
    public function prevStep()
    {
        $this->currentStep--;
    }

    public function render()
    {
        return view('livewire.signup.employer.employer-information');
    }
}
