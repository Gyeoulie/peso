<?php

namespace App\Livewire\Admin\Accounts\Jobseeker;

use App\Models\Employee;
use App\Models\Job_Applicants;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class JobseekerOverview extends Component
{

    public $id;

    public $search;
    public function render()
    {

        $jobseeker = Employee::findOrFail($this->id);

        $application_history = Job_Applicants::with('employee', 'job_posting.company')
            ->where('employee_id', $jobseeker->employee_id)
            ->where(function ($query) {
                $query->whereHas('job_posting', function ($query) {
                    $query->where('job_Title', 'like', '%' . $this->search . '%')
                        ->orWhereHas('company', function ($query) {
                            $query->where('business_Name', 'like', '%' . $this->search . '%')
                                ->orWhere('trade_Name', 'like', '%' . $this->search . '%');
                        });
                });
            })
            ->paginate(5);

        return view('livewire.admin.accounts.jobseeker.jobseeker-overview', compact('jobseeker', 'application_history'));
    }
}
