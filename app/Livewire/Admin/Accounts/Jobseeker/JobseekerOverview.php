<?php

namespace App\Livewire\Admin\Accounts\Jobseeker;

use App\Helpers\AuditFormatter;
use App\Mail\AdminResetPasswordNotification;
use App\Models\Barangay;
use App\Models\Education;
use App\Models\Employee;
use App\Models\Industry_preference;
use App\Models\Job_Applicants;
use App\Models\Job_Posting;
use App\Models\Job_Preference;
use App\Models\Program_Reg;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use OwenIt\Auditing\Models\Audit;

#[Layout('layouts.admin')]
class JobseekerOverview extends Component
{

    use WithPagination;
    use WithoutUrlPagination;

    public $id;

    public $searchApplications, $searchEvents, $searchJobs;

    // SETTING FIELD
    public $fname, $lname, $mname, $suffix, $birthdate, $gender, $civilstatus, $religion;

    public $agreeBox = false;

    public function recommendedJobs($id)
    {
        $highestEducationLevel = Education::where('employee_id', $id)
            ->max('edu_level');

        $userMunicipalityId = Barangay::where('barangay_id', $id)
            ->value('municipality_id');

        $userJobPreferences = Job_Preference::where('employee_id', $id)
            ->pluck('position_id');

        $userIndustryPreference = Industry_Preference::where('employee_id', $id)
            ->pluck('industry_id');

        return Job_Posting::with(['company', 'job_tags.job_positions', 'barangay.municipality', 'municipality', 'job_industry'])
            ->select([
                'job_posting.*',
                DB::raw('
                    job_Slots - COALESCE((
                        SELECT COUNT(*)
                        FROM job_applicants
                        WHERE job_applicants.job_id = job_posting.job_id
                        AND job_applicants.applicant_Status = "COMPLETED"
                    ), 0) AS available_slots
                '),
            ])
            ->where('job_Status', 'ACTIVE')
            ->where('peso_municipality_id', $userMunicipalityId)
            ->where('job_edu', '<=', $highestEducationLevel)
            ->where(function ($query) use ($userJobPreferences, $userIndustryPreference) {
                $query->where(function ($query) use ($userJobPreferences) {
                    $query->whereHas('job_tags', function ($query) use ($userJobPreferences) {
                        $query->whereIn('position_id', $userJobPreferences);
                    });
                })
                    ->orWhere(function ($query) use ($userIndustryPreference) {
                        $query->whereHas('job_industry', function ($query) use ($userIndustryPreference) {
                            $query->whereIn('industry_id', $userIndustryPreference);
                        });
                    });
            })
            ->where(function ($query) {
                $query->whereHas('company', function ($query) {
                    $query->where('business_Name', 'like', '%' . $this->searchJobs . '%')
                        ->orWhere('trade_Name', 'like', '%' . $this->searchJobs . '%');
                })
                    ->orWhere('job_Title', 'like', '%' . $this->searchJobs . '%')
                    ->orWhereHas('job_tags.job_positions', function ($query) {
                        $query->where('position_Title', 'like', '%' . $this->searchJobs . '%');
                    })
                    ->orWhereHas('job_industry', function ($query) {
                        $query->where('industry_Title', 'like', '%' . $this->searchJobs . '%');
                    });
            })
            ->withCount(['job_tags as job_tags_count' => function ($query) use ($userJobPreferences) {
                $query->whereIn('position_id', $userJobPreferences);
            }])
            ->withCount(['job_industry as industry_count' => function ($query) use ($userIndustryPreference) {
                $query->whereIn('industry_id', $userIndustryPreference);
            }])
            ->orderByRaw('
                CASE
                    WHEN industry_count > 0 AND job_tags_count > 0 THEN 1
                    WHEN industry_count > 0 AND job_tags_count = 0 THEN 2
                    WHEN industry_count = 0 AND job_tags_count > 0 THEN 3
                    ELSE 4
                END
            ')
            ->orderByDesc('job_tags_count')
            ->distinct()
            ->paginate(10);
    }

    public function applicationHistory($id)
    {
        return Job_Applicants::with('employee', 'job_posting.company')
            ->where('employee_id', $id)
            ->where(function ($query) {
                $query->whereHas('job_posting', function ($query) {
                    $query->where('job_Title', 'like', '%' . $this->searchApplications . '%')
                        ->orWhereHas('company', function ($query) {
                            $query->where('business_Name', 'like', '%' . $this->searchApplications . '%')
                                ->orWhere('trade_Name', 'like', '%' . $this->searchApplications . '%');
                        });
                });
            })
            ->paginate(5);
    }

    public function programHistory($id)
    {
        return $programHistory = Program_Reg::where('employee_id', $id)
            ->where(function ($query) {
                $query->whereHas('programs', function ($query) {
                    $query->where('program_Title', 'like', '%' . $this->searchEvents . '%')
                        ->orWhere('program_Host', 'like', '%' . $this->searchEvents . '%');
                });
            })
            ->paginate(10);
    }

    public function mountFields($jobseeker)
    {
        $this->fname = $jobseeker->fname;
        $this->lname = $jobseeker->lname;
        $this->mname = $jobseeker->mname;
        $this->suffix = $jobseeker->suffix;
        $this->birthdate = $jobseeker->birthdate;
        $this->gender = $jobseeker->gender;
        $this->civilstatus = $jobseeker->civilstatus;
        $this->religion = $jobseeker->religion;
    }

    public function saveDetails()
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
        ];

        $messages = [
            'fname.required' => 'First name is required.',
            'lname.required' => 'Last name is required.',
            'birthdate.required' => 'Birthdate is required.',
            'birthdate.date' => 'Birthdate must be a valid date.',
            'birthdate.before_or_equal' => 'You must be at least 18 years old.',
            'gender.required' => 'Gender is required.',
            'civilstatus.required' => 'Civil status is required.',
            'religion.required' => 'Religion is required.',
        ];

        $this->validate($rules, $messages);

        $jobseekerData = Employee::findOrFail($this->id);

        DB::beginTransaction();

        try {
            // Delete old image if a new one is uploaded and there is an existing image

            // Update model attributes
            $jobseekerData->fname = $this->fname;
            $jobseekerData->mname = $this->mname;
            $jobseekerData->lname = $this->lname;
            $jobseekerData->suffix = $this->suffix;
            $jobseekerData->gender = $this->gender;
            $jobseekerData->civilstatus = $this->civilstatus;
            $jobseekerData->religion = $this->religion;
            $jobseekerData->birthdate = $this->birthdate;

            // Check if any attributes have changed
            if ($jobseekerData->isDirty()) {
                $jobseekerData->save();

                DB::commit();

                toastr()->success('Jobseeker has been updated!');

            } else {
                DB::rollBack();

                toastr()->info('No changes detected.');
            }
        } catch (\Exception $e) {
            DB::rollBack();

            toastr()->error('There was an error updating the profile.');
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

        $jobseekerData = Employee::findOrFail($this->id);

        $this->agreeBox = false;
        if ($jobseekerData->user) {
            DB::beginTransaction();

            try {
                // Generate a new password
                $newPassword = $this->generatePassword();

                // Update the user's password (assuming 'password' is the column name)
                $jobseekerData->user->password = Hash::make($newPassword);
                $jobseekerData->user->save();

                DB::commit();

                $name = $jobseekerData->fname . ' ' . $jobseekerData->lname;
                Mail::to($jobseekerData->user->email)->queue(new AdminResetPasswordNotification($name, $newPassword));
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

        $jobseeker = Employee::findOrFail($this->id);

        $joblist = $this->recommendedJobs($jobseeker->employee_id);

        $application_history = $this->applicationHistory($jobseeker->employee_id);

        $programHistory = $this->programHistory($jobseeker->employee_id);

        $this->mountFields($jobseeker);

        $audits = Audit::where('user_id', $jobseeker->user_id)
            ->latest()
            ->paginate(5);

        $formattedAudits = $audits->map(function ($audit) {
            return AuditFormatter::format($audit);
        });

        return view('livewire.admin.accounts.jobseeker.jobseeker-overview',
            compact('jobseeker',
                'application_history',
                'joblist',
                'programHistory',
                'audits',
                'formattedAudits'));
    }
}
