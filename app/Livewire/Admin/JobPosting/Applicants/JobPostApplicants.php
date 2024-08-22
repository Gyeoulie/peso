<?php

namespace App\Livewire\Admin\JobPosting\Applicants;

use App\Models\Job_Applicants;
use App\Models\Job_Posting;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class JobPostApplicants extends Component
{

    public $id;

    public $search;

    public $eduLevels = [
        '1' => 'GRADE I',
        '2' => 'GRADE II',
        '3' => 'GRADE III',
        '4' => 'GRADE IV',
        '5' => 'GRADE V',
        '6' => 'GRADE VI',
        '7' => 'GRADE VII',
        '8' => 'GRADE VIII',
        '9' => 'ELEMENTARY GRADUATE',
        '10' => '1ST YEAR HIGH SCHOOL/GRADE VII (FOR K TO 12)',
        '11' => '2ND YEAR HIGH SCHOOL/GRADE VIII (FOR K TO 12)',
        '12' => '3RD YEAR HIGH SCHOOL/GRADE IX (FOR K TO 12)',
        '13' => '4TH YEAR HIGH SCHOOL/GRADE X (FOR K TO 12)',
        '14' => 'GRADE XI (FOR K TO 12)',
        '15' => 'GRADE XII (FOR K TO 12)',
        '16' => 'HIGH SCHOOL GRADUATE',
        '17' => 'VOCATIONAL UNDERGRADUATE',
        '18' => 'VOCATIONAL GRADUATE',
        '19' => '1ST YEAR COLLEGE LEVEL',
        '20' => '2ND YEAR COLLEGE LEVEL',
        '21' => '3RD YEAR COLLEGE LEVEL',
        '22' => '4TH YEAR COLLEGE LEVEL',
        '23' => '5TH YEAR COLLEGE LEVEL',
        '24' => 'COLLEGE GRADUATE',
        '25' => 'MASTERAL/POST GRADUATE LEVEL',
        '26' => 'MASTERAL/POST GRADUATE',
    ];

    public function render()
    {
        // Fetch job posting details
        $jobpost = Job_Posting::with(['company'])
            ->withCount('hiredApplicants')
            ->where('job_id', $this->id)
            ->first();

        if ($jobpost) {
            $jobpost->slotsLeft = $jobpost->job_Slots - $jobpost->hired_applicants_count;
        }

        // Fetch job applicants
        $jobApplicants = Job_Applicants::with(['employee'])
            ->join('employee', 'job_applicants.employee_id', '=', 'employee.employee_id')
            ->where('job_applicants.job_id', $this->id)
            ->where(function ($query) {
                $query->where('employee.fname', 'like', '%' . $this->search . '%')
                    ->orWhere('employee.mname', 'like', '%' . $this->search . '%')
                    ->orWhere('employee.lname', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.admin.job-posting.applicants.job-post-applicants', compact('jobpost', 'jobApplicants'));
    }

}
