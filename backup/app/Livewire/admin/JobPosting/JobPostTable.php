<?php

namespace App\Livewire\Admin\JobPosting;

use App\Models\Job_Posting;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class JobPostTable extends Component
{

    use WithPagination;
    public $search;
    public $filter;

    public function updateFilter($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $user = Auth::user();

        $jobpost = Job_Posting::with('company', 'barangay.municipality.province')
            ->where('job_posting.peso_municipality_id', '=', $user->peso->municipality_id)
            ->where(function ($query) {
                $query->where('job_Title', 'like', '%' . $this->search . '%')
                    ->orWhereHas('company', function ($query) {
                        $query->where('business_Name', 'like', '%' . $this->search . '%')
                            ->orWhere('trade_Name', 'like', '%' . $this->search . '%')
                            ->orWhere('company_Address', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('barangay', function ($query) {
                        $query->where('barangay_Name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('barangay.municipality', function ($query) {
                        $query->where('municipality_Name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('barangay.municipality.province', function ($query) {
                        $query->where('province_Name', 'like', '%' . $this->search . '%');
                    });
            });

        if ($this->filter == "") {
            $jobpost->orderByRaw("FIELD(job_Status, 'PENDING') DESC");
        } else if ($this->filter == 'PENDING') {
            $jobpost->where('job_Status', '=', 'PENDING');
        } elseif ($this->filter == 'ACTIVE') {
            $jobpost->where('job_Status', '=', 'ACTIVE');
        } elseif ($this->filter == 'OTHERS') {
            $jobpost->whereNotIn('job_Status', ['PENDING', 'ACTIVE']);
        }

        $jobpost = $jobpost->orderBy('job_posting.created_at', 'DESC')->withCount('job_applicants')->paginate(10);

        $allCount = Job_Posting::where('peso_municipality_id', '=', $user->peso->municipality_id)->count();
        $pendingCount = Job_Posting::where('job_Status', '=', 'PENDING')
            ->where('peso_municipality_id', '=', $user->peso->municipality_id)->count();
        $activeCount = Job_Posting::where('job_Status', '=', 'ACTIVE')
            ->where('peso_municipality_id', '=', $user->peso->municipality_id)->count();
        $othersCount = Job_Posting::whereNotIn('job_Status', ['PENDING', 'ACTIVE'])
            ->where('peso_municipality_id', '=', $user->peso->municipality_id)->count();

        return view('livewire.admin.job-posting.job-post-table', compact('jobpost', 'allCount', 'pendingCount', 'activeCount', 'othersCount'));
    }

}

// $user = Auth::user();
//         $jobpostQuery = Job_Posting::leftJoin('company', 'job_posting.company_id', '=', 'company.company_id')
//             ->leftJoin('barangay', 'job_posting.barangay_id', '=', 'barangay.barangay_id')
//             ->leftJoin('municipality', 'barangay.municipality_id', '=', 'municipality.municipality_id')
//             ->leftJoin('province', 'municipality.province_id', '=', 'province.province_id')
//             ->where('job_posting.peso_municipality_id', '=', $user->peso->municipality_id)
//             ->where(function ($query) {
//                 $query->where('job_posting.job_Title', 'like', '%' . $this->search . '%')
//                     ->orWhere('company.business_Name', 'like', '%' . $this->search . '%')
//                     ->orWhere('company.trade_Name', 'like', '%' . $this->search . '%')
//                     ->orWhere('company.company_Address', 'like', '%' . $this->search . '%')
//                     ->orWhere('barangay.barangay_Name', 'like', '%' . $this->search . '%')
//                     ->orWhere('municipality.municipality_Name', 'like', '%' . $this->search . '%')
//                     ->orWhere('province.province_Name', 'like', '%' . $this->search . '%');
//             });

//         if ($this->filter == 'PENDING') {
//             $jobpostQuery->where('job_posting.job_Status', '=', 'PENDING');
//         } elseif ($this->filter == 'ACTIVE') {
//             $jobpostQuery->where('job_posting.job_Status', '=', 'ACTIVE');
//         } elseif ($this->filter == 'OTHERS') {
//             $jobpostQuery->whereNotIn('job_posting.job_Status', ['PENDING', 'ACTIVE']);
//         }

//         $jobpost = $jobpostQuery->withCount('job_applicants')->paginate(10);
