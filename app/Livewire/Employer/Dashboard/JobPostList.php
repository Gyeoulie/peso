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
public function render()
{
    $user = Auth::user();

    $applicantsQuery = Job_Posting::withCount([
        'job_applicants as pending_count' => function ($query) {
            $query->where('applicant_Status', 'pending');
        },
        'job_applicants as approved_count' => function ($query) {
            $query->where('applicant_Status', 'approved');
        },
        'job_applicants as hired_count' => function ($query) {
            $query->where('applicant_Status', 'hired');
        }
    ])->where('company_id', $user->company->company_id)
      ->where(function ($query) {
          $query->where('job_Title', 'like', '%' . $this->search . '%');
      });

    $applicants = $applicantsQuery->paginate(5);

    $total = $applicants->total();

    return view('livewire.employer.dashboard.job-post-list', compact('applicants', 'total'));
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
