<?php

namespace App\Livewire\Admin\Accounts\Employer;

use App\Models\Company;
use App\Models\Job_Posting;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class EmployerOverview extends Component
{

    use WithPagination;use WithoutUrlPagination;
    public $id;

    public $searchJobs;
    public function render()
    {

        $employer = Company::findOrFail($this->id);

        $joblist = Job_Posting::withCount(['job_applicants as applicants_count'])
            ->where('company_id', $employer->company_id)
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

        return view('livewire.admin.accounts.employer.employer-overview', compact('employer', 'joblist'));
    }
}
