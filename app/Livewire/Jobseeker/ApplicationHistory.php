<?php

namespace App\Livewire\Jobseeker;

use App\Models\Job_Applicants;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class ApplicationHistory extends Component
{

    use WithPagination;
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

    public $selectedJob;
    public $search, $filter;

    public function updateSelection($id)
    {
        $this->selectedJob = $id;
    }
    public function render()
    {
        $user = Auth::user(); // Correct usage of the Auth facade

        $applications = Job_Applicants::with(['job_posting.company'])
            ->where('employee_id', '=', $user->employee->employee_id)
            ->where(function ($query) {
                $query->whereHas('job_posting', function ($query) {
                    $query->where('job_Title', 'like', '%' . $this->search . '%');
                })

                    ->orWhereHas('job_posting.company', function ($query) {
                        $query->where('bussines_Name', 'like', '%' . $this->search . '%');
                    });
            });

        //     if ($this->filter) {
        // $applications
        //     }

        $applications = $applications->paginate(5);
        $applicationInfo = null;
        if ($this->selectedJob) {
            $applicationInfo = Job_Applicants::find($this->selectedJob);
        }
        return view('livewire.jobseeker.application-history', compact('applications', 'applicationInfo'));
    }
}
