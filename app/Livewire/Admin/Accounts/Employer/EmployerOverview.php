<?php

namespace App\Livewire\Admin\Accounts\Employer;

use App\Helpers\AuditFormatter;
use App\Mail\AdminResetPasswordNotification;
use App\Models\Company;
use App\Models\Job_Posting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use OwenIt\Auditing\Models\Audit;

#[Layout('layouts.admin')]
class EmployerOverview extends Component
{

    use WithPagination, WithoutUrlPagination;
    public $id;

    public $searchJobs;

    public $businessName, $tradeName, $TIN, $locType = '', $workforce = '', $empType = '', $empDesc = '';

    public $agreeBox = false;

    public function getJobs($id)
    {
        return Job_Posting::withCount(['job_applicants as applicants_count'])
            ->where('company_id', $id)
            ->where(function ($query) {
                $query->where('job_Title', 'like', '%' . $this->searchJobs . '%')
                    ->orWhereHas('job_tags.job_positions', function ($query) {
                        $query->where('position_Title', 'like', '%' . $this->searchJobs . '%');
                    })
                    ->orWhereHas('job_industry', function ($query) {
                        $query->where('industry_Title', 'like', '%' . $this->searchJobs . '%');
                    });
            })
            ->paginate(10);
    }

    public function mountFields($employer)
    {
        $this->businessName = $employer->business_Name;
        $this->tradeName = $employer->trade_Name;
        $this->TIN = $employer->company_TIN;
        $this->locType = $employer->company_Type;
        $this->workforce = $employer->company_Total_workforce;
        $this->empType = $employer->employer_Type;
        $this->empDesc = $employer->employer_Type_Desc;
    }

    public function saveDetails()
    {
        $rules = [
            'businessName' => 'required|string|max:255',
            'tradeName' => 'required|string|max:255',
            'TIN' => 'required|digits:11', // Assuming TIN is exactly 9 digits
            'locType' => 'required', // Example valid types
            'workforce' => 'required', // Nullable, but if present must be an integer and at least 1
            'empType' => 'required', // Example valid types
            'empDesc' => 'required', // Optional, but if present should be a string and max 500 characters
        ];

        $messages = [
            'businessName.required' => 'The business name field is required.',
            'businessName.string' => 'The business name must be a string.',
            'businessName.max' => 'The business name cannot exceed 255 characters.',

            'tradeName.required' => 'The trade name field is required.',
            'tradeName.string' => 'The trade name must be a string.',
            'tradeName.max' => 'The trade name cannot exceed 255 characters.',

            'TIN.required' => 'The TIN field is required.',
            'TIN.digits' => 'The TIN must be exactly 11 digits.',

            'locType.required' => 'The location type field is required.',

            'workforce.required' => 'The workforce field is required.',
            'workforce.integer' => 'The workforce must be an integer.',
            'workforce.min' => 'The workforce must be at least 1.',

            'empType.required' => 'The employer type field is required.',

            'empDesc.required' => 'The employer description field is required.',
        ];

        $this->validate($rules, $messages);

        $companyData = Company::findOrFail($this->id);

        DB::beginTransaction();

        try {

            // Delete old image if a new one is uploaded and there is an existing image

            // Update model attributes
            $companyData->business_Name = $this->businessName;
            $companyData->trade_Name = $this->tradeName;
            $companyData->company_TIN = $this->TIN;
            $companyData->company_Type = $this->locType;
            $companyData->employer_Type = $this->empType;
            $companyData->employer_Type_Desc = $this->empDesc;
            $companyData->company_Total_workforce = $this->workforce;

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
        $this->dispatch('close-modal', 'confirm-modal');
    }

    public function generatePassword()
    {
        // Define the password criteria
        $length = 12;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_=+';

        // Generate a random password
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Set the generated password to the pwdPost property
        return $password;

    }

    public function resetPassword()
    {
        $rules = [
            'agreeBox' => 'required|boolean',
        ];
        $messages = [
            'agreeBox.required' => 'Please check before you continue.',
        ];
        $this->validate($rules, $messages);

        $companyData = Company::findOrFail($this->id);

        $this->agreeBox = false;
        if ($companyData->user) {
            DB::beginTransaction();

            try {
                // Generate a new password
                $newPassword = $this->generatePassword();

                // Update the user's password (assuming 'password' is the column name)
                $companyData->user->password = Hash::make($newPassword);
                $companyData->user->save();

                DB::commit();

                $name = $companyData->business_Name;
                Mail::to($companyData->user->email)->queue(new AdminResetPasswordNotification($name, $newPassword));
                toastr()->success('Password has been reset successfully!');

            } catch (\Exception $e) {
                DB::rollBack();
                toastr()->error('There was an error resetting the password.');
            }
        } else {
            toastr()->error('User not found.');
        }
        $this->dispatch('close-modal', 'reset-password-modal');
    }

    public function render()
    {
        $joblist = null;
        $employer = Company::findOrFail($this->id);

        if ($employer) {
            $joblist = $this->getJobs($employer->company_id);
            $this->mountFields($employer);

        }

        $audits = Audit::where('user_id', $employer->user_id)
            ->latest()
            ->paginate(5);

        $formattedAudits = $audits->map(function ($audit) {
            return AuditFormatter::format($audit);
        });

        return view('livewire.admin.accounts.employer.employer-overview', compact('employer', 'joblist', 'audits', 'formattedAudits'));
    }
}
