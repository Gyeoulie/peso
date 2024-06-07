<?php

namespace App\Livewire\Employer\Dashboard;

use App\Models\Job_Posting;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class JobPostList extends Component
{
    public $search;

    public $filter = 'ALL', $sortDate;
    public function changeFilter($filter)
    {
        $this->filter = $filter;
        $this->reset('sortDate');
    }

    public function updateSort($sort)
    {
        $this->sortDate = $sort;
    }

    public function render()
    {
        $user = Auth::user();

        $applicantsQuery = Job_Posting::withCount([
            'job_applicants as pending_count' => function ($query) {
                $query->where('applicant_Status', 'PENDING');
            },
            'job_applicants as interested_count' => function ($query) {
                $query->where('applicant_Status', 'INTERESTED');
            },
            'job_applicants as interview_count' => function ($query) {
                $query->where('applicant_Status', 'INTERVIEW');
            }, 'job_applicants as hired_count' => function ($query) {
                $query->where('applicant_Status', 'HIRED');
            }, 'job_applicants as rejected_count' => function ($query) {
                $query->where('applicant_Status', 'REJECTED');
            },
        ])->where('company_id', $user->company->company_id)
            ->where(function ($query) {
                $query->where('job_Title', 'like', '%' . $this->search . '%');
            });

        if ($this->filter != 'ALL') {
            if ($this->filter == 'OTHERS') {
                $applicantsQuery = $applicantsQuery->whereNotIn('job_status', ['PENDING', 'ACTIVE']);
            } else {
                $applicantsQuery = $applicantsQuery->where('job_status', $this->filter);
            }
        }

        if ($this->sortDate !== null && $this->sortDate !== '') {
            $applicantsQuery->orderBy('created_at', $this->sortDate);
        }

        $applicants = $applicantsQuery->paginate(5);

        $allCount = Job_Posting::where('company_id', $user->company->company_id)->count();
        $activeCount = Job_Posting::where('company_id', $user->company->company_id)->where('job_status', 'active')->count();
        $pendingCount = Job_Posting::where('company_id', $user->company->company_id)->where('job_status', 'pending')->count();
        $othersCount = Job_Posting::where('company_id', $user->company->company_id)
            ->whereNotIn('job_status', ['active', 'pending'])->count();

        return view('livewire.employer.dashboard.job-post-list', compact('applicants', 'allCount', 'pendingCount', 'activeCount', 'othersCount'));
    }
}

// $applicantsQuery = Job_Posting::leftJoin('company', 'company.company_id', '=', 'job_posting.company_id')
// ->leftJoin('job_applicants', 'job_applicants.job_id', '=', 'job_posting.job_id')
// ->where('job_posting.company_id', $user->company->company_id)
// ->where(function ($query) {
//     $query->where('job_posting.job_Title', 'like', '%' . $this->search . '%');
// });

// $applicants = [
// 'total' => $applicantsQuery->count(),
// 'list' => $applicantsQuery->paginate(5),
// 'pending' => $applicantsQuery->where('job_applicants.applicant_Status', 'pending')->count(),
// 'interested' => $applicantsQuery->where('job_applicants.applicant_Status', 'interested')->count(),
// 'hired' => $applicantsQuery->where('job_applicants.applicant_Status', 'hired')->count(),
// ];

//     public function render()
//     {
//         $user = Auth::user();

//         $applicantsQuery = Job_Posting::with('job_applicants')
//             ->where('company_id', $user->company->company_id)
//             ->where(function ($query) {
//                 $query->where('job_Title', 'like', '%' . $this->search . '%');
//             });

//         $applicants = $applicantsQuery->paginate(5);

//         if($applicants->isEmpty()){
//             return view('livewire.employer.dashboard.job-post-list', compact('applicants'));
//         }

//         // Iterate through each job posting and calculate counts
//         foreach ($applicants as $jobPosting) {
//             $pendingCount = $jobPosting->job_applicants->where('applicant_Status', 'pending')->count();
//             $approvedCount = $jobPosting->job_applicants->where('applicant_Status', 'approved')->count();
//             $hiredCount = $jobPosting->job_applicants->where('applicant_Status', 'hired')->count();

//             // Assign counts to each job posting
//             $jobPosting->pending_count = $pendingCount;
//             $jobPosting->approved_count = $approvedCount;
//             $jobPosting->hired_count = $hiredCount;
//         }

//         $total = $applicants->total();

//         return view('livewire.employer.dashboard.job-post-list', compact('applicants', 'pendingCount', 'approvedCount', 'hiredCount'));
//     }
// }
