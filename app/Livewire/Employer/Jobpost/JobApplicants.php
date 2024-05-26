<?php

namespace App\Livewire\Employer\Jobpost;

use App\Models\Company;
use App\Models\Employee;
use App\Models\Job_Applicants;
use App\Models\Job_Posting;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

// use Symfony\Component\HttpFoundation\StreamedResponse;

#[Layout('layouts.app')]
class JobApplicants extends Component
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

    public $filter = 'ALL';

    public $selectedJob;
    public $applicantSearch;
    public $postSearch;

    public function printResume($id)
    {
        toastr()->success('hello');

        $employee = Employee::findOrFail($id);

        $pdf = Pdf::loadView('resume', ['employee' => $employee])->output();

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf;
        }, 'filename.pdf');
    }

    public function getJob($id)
    {
        $this->selectedJob = $id;
        // $this->filter = 'ALL';
        // $this->reset('applicantSearch');

    }

    public function changeFilter($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $applicants = null; // Initialize $applicants variable

        if ($this->selectedJob) {
            // Create the initial query for applicants
            $applicantsQuery = Job_Applicants::leftJoin('employee', 'job_applicants.employee_id', '=', 'employee.employee_id')
                ->where('job_applicants.job_id', $this->selectedJob)
                ->where(function ($query) {
                    $query->where('employee.fname', 'like', '%' . $this->applicantSearch . '%')
                        ->orWhere('employee.mname', 'like', '%' . $this->applicantSearch . '%')
                        ->orWhere('employee.lname', 'like', '%' . $this->applicantSearch . '%');
                });

            // Apply the filter if it's not 'ALL'
            if ($this->filter != 'ALL') {
                $applicantsQuery->where('job_applicants.applicant_Status', $this->filter);
            }

            // Get the counts
            $total = Job_Applicants::where('job_id', $this->selectedJob)->count();
            $pending = Job_Applicants::where('job_id', $this->selectedJob)->where('job_applicants.applicant_Status', 'pending')->count();
            $interested = Job_Applicants::where('job_id', $this->selectedJob)->where('job_applicants.applicant_Status', 'interested')->count();
            $hired = Job_Applicants::where('job_id', $this->selectedJob)->where('job_applicants.applicant_Status', 'hired')->count();

            // Get the paginated list of applicants
            $list = $applicantsQuery->paginate(5);

            // Set the applicants array
            $applicants = [
                'total' => $total,
                'pending' => $pending,
                'interested' => $interested,
                'hired' => $hired,
                'list' => $list,
            ];
        }

        // Fetch jobs for the authenticated user's company
        $user = Auth::user();
        $userCompanyId = $user->company->company_id;
        $jobs = Job_Posting::withCount('job_applicants')
            ->where('company_id', $userCompanyId)
            ->where(function ($query) {
                $query->where('job_Title', 'like', '%' . $this->postSearch . '%');
            })
            ->paginate(5);

        return view('livewire.employer.jobpost.job-applicants', compact('jobs', 'applicants'));
    }
}
// if ($this->selectedJob) {
//     // Fetch applicants for the selected job
//     $applicantsQuery = Job_Applicants::leftJoin('employee', 'job_applicants.employee_id', '=', 'employee.employee_id')
//         ->where('job_applicants.job_id', $this->selectedJob)
//         ->where(function ($query) {
//             $query->where('employee.fname', 'like', '%' . $this->applicantSearch . '%')
//                 ->orWhere('employee.mname', 'like', '%' . $this->applicantSearch . '%')
//                 ->orWhere('employee.lname', 'like', '%' . $this->applicantSearch . '%');
//         });

//     if ($this->filter != 'ALL') {
//         $applicantsQuery = $applicantsQuery->where('job_applicants.applicant_Status', '=', $this->filter);
//     }

//     $applicantsQuery = $applicantsQuery->get();

//     $totalApplicants = $applicantsQuery->count();
//     $pendingApplicants = $applicantsQuery->where('status', 'pending')->count();
//     $interestedApplicants = $applicantsQuery->where('status', 'interested')->count();
//     $hiredApplicants = $applicantsQuery->where('status', 'hired')->count();

//     // Store applicant counts together
//     $applicants = [
//         'total' => $totalApplicants,
//         'pending' => $pendingApplicants,
//         'interested' => $interestedApplicants,
//         'hired' => $hiredApplicants,
//         'list' => $applicantsQuery,
//     ];
// }
