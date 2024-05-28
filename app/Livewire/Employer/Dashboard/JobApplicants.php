<?php

namespace App\Livewire\Employer\Dashboard;

use App\Models\Company;
use App\Models\Employee;
use App\Models\Job_Applicants;
use App\Models\Job_Posting;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
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

    public $remarks, $applicantId;

    public $applicantSearch, $postSearch;
    public $selectedJob;

    public $filter = 'ALL', $sortDate, $jobFilter = 'ALL';

    public function printResume($id)
    {
        toastr()->success('hello');

        $employee = Employee::findOrFail($id);

        $pdf = Pdf::loadView('resume', ['employee' => $employee]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->download();
        }, 'report.pdf');

        // return response()->streamDownload(function () {
        //     $pdf = Pdf::loadView('resume', ['employee' => $employee]);
        //     echo $pdf->stream();
        // }, 'test.pdf');

        // return response()->streamDownload(function () {
        //     $pdf = App::make('dompdf.wrapper');
        //     $pdf->loadHTML('<h1>Test</h1>');
        //     echo $pdf->stream();
        // }, 'test.pdf');

        // $pdfContent = PDF::loadView('resume')->output();
        // return response()->streamDownload(
        //     fn() => print($pdfContent),
        //     "filename.pdf"
        // );
    }

    public function openModal($modal, $applicantId)
    {
        $this->reset('remarks', 'applicantId');
        $this->applicantId = $applicantId;
        $this->dispatch('open-modal', $modal . '-modal');
    }
    public function closeModal($modal)
    {
        $this->reset('remarks', 'applicantId');
        $this->dispatch('close-modal', $modal . '-modal');
    }

    public function updateApplicant($status, $modal)
    {

        $this->validate([
            'remarks' => ['required', 'string'],
        ]);

        try {
            // Create the user record
            Job_Applicants::where('applicant_id', $this->applicantId)->update([
                'applicant_Status' => $status,
                'company_Remarks' => $this->remarks,
            ]);

            toastr()->success('Applicant has been Updated!');
        } catch (\Exception $e) {

            // Show error toastr notification
            toastr()->error('There was an Error');
        }

        $this->closeModal($modal);

    }

    public function getJob($id)
    {
        $this->selectedJob = $id;
        $this->reset('sortDate');
        // $this->filter = 'ALL';
        // $this->reset('applicantSearch');

    }

    public function changeFilter($filter)
    {
        $this->filter = $filter;
        $this->reset('sortDate');
    }
    public function updateSort($sort)
    {
        $this->sortDate = $sort;

    }

    public function updateJobFilter($status)
    {
        $this->jobFilter = $status;
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

            if($this->sortDate !== null && $this->sortDate !== '') {
                $applicantsQuery->orderBy('job_applicants.created_at', $this->sortDate);
            }

            // Get the counts
            $total = Job_Applicants::where('job_id', $this->selectedJob)->count();
            $pending = Job_Applicants::where('job_id', $this->selectedJob)->where('job_applicants.applicant_Status', 'pending')->count();
            $interested = Job_Applicants::where('job_id', $this->selectedJob)->where('job_applicants.applicant_Status', 'interested')->count();
            $interview = Job_Applicants::where('job_id', $this->selectedJob)->where('job_applicants.applicant_Status', 'interview')->count();
            $hired = Job_Applicants::where('job_id', $this->selectedJob)->where('job_applicants.applicant_Status', 'hired')->count();
            $rejected = Job_Applicants::where('job_id', $this->selectedJob)->where('job_applicants.applicant_Status', 'rejected')->count();

            // Get the paginated list of applicants
            $list = $applicantsQuery->paginate(5);

            // Set the applicants array
            $applicants = [
                'total' => $total,
                'pending' => $pending,
                'interested' => $interested,
                'interview' => $interview,
                'hired' => $hired,
                'rejected' => $rejected,
                'list' => $list,
            ];
        }

        // Fetch jobs for the authenticated user's company
        $user = Auth::user();
        $userCompanyId = $user->company->company_id;
        $jobsQuery = Job_Posting::withCount('job_applicants')
            ->where('company_id', $userCompanyId)
            ->where(function ($query) {
                $query->where('job_Title', 'like', '%' . $this->postSearch . '%');
            });

        if ($this->jobFilter !== 'ALL') {
            $jobsQuery->where('job_Status', $this->jobFilter);
        }

        $jobs = $jobsQuery->paginate(5);

        return view('livewire.employer.dashboard.job-applicants', compact('jobs', 'applicants'));
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
