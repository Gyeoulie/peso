<?php

namespace App\Livewire\Admin\Accounts\Jobseeker;

use App\Models\Barangay;
use App\Models\Education;
use App\Models\Employee;
use App\Models\Industry_preference;
use App\Models\Job_Applicants;
use App\Models\Job_Posting;
use App\Models\Job_Preference;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class JobseekerOverview extends Component
{

    public $id;

    public $searchApplications, $searchJobs;
    public function render()
    {

        $jobseeker = Employee::findOrFail($this->id);

        $application_history = Job_Applicants::with('employee', 'job_posting.company')
            ->where('employee_id', $jobseeker->employee_id)
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

        // Get the highest education level of the user
        // Get the highest education level of the user
        $highestEducationLevel = Education::where('employee_id', $jobseeker->employee_id)
            ->max('edu_level');

// Get the user's municipality ID via their barangay
        $userMunicipalityId = Barangay::where('barangay_id', $jobseeker->employee_id)
            ->value('municipality_id');

// Get the user's job preferences (array of position_id)
        $userJobPreferences = Job_Preference::where('employee_id', $jobseeker->employee_id)
            ->pluck('position_id');

// Get the user's industry preference
        $userIndustryPreference = Industry_Preference::where('employee_id', $jobseeker->employee_id)
            ->pluck('industry_id');

        $joblist = Job_Posting::with(['company', 'job_tags.job_positions', 'barangay.municipality', 'municipality', 'job_industry'])
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

        return view('livewire.admin.accounts.jobseeker.jobseeker-overview', compact('jobseeker', 'application_history', 'joblist'));
    }
}
