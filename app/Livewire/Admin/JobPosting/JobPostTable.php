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

    // public function render()
    // {

    //     $user = Auth::user();
    //     if ($user->userType != 11) {
    //         if ($this->filter == '') {
    //             $jobpost = Job_Posting::leftJoin('company', 'job_posting.company_id', '=', 'company.company_id')
    //                 ->leftJoin('barangay', 'job_posting.barangay_id', '=', 'barangay.barangay_id')
    //                 ->leftJoin('municipality', 'barangay.municipality_id', '=', 'municipality.municipality_id')
    //                 ->leftJoin('province', 'municipality.province_id', '=', 'province.province_id')

    //                 ->where(function ($query) {
    //                     $query->where('job_posting.job_Title', 'like', '%' . $this->search . '%')
    //                         ->orWhere('company.bussines_Name', 'like', '%' . $this->search . '%')
    //                         ->orWhere('company.trade_Name', 'like', '%' . $this->search . '%')
    //                         ->orWhere('company.company_Address', 'like', '%' . $this->search . '%')
    //                         ->orWhere('barangay.barangay_Name', 'like', '%' . $this->search . '%')
    //                         ->orWhere('municipality.municipality_Name', 'like', '%' . $this->search . '%')
    //                         ->orWhere('province.province_Name', 'like', '%' . $this->search . '%');
    //                 })
    //                 ->withCount('job_applicants')
    //                 ->paginate(10);

    //         } else if ($this->filter == 'PENDING') {
    //             $jobpost = Job_Posting::leftJoin('company', 'job_posting.company_id', '=', 'company.company_id')
    //                 ->leftJoin('barangay', 'job_posting.barangay_id', '=', 'barangay.barangay_id')
    //                 ->leftJoin('municipality', 'barangay.municipality_id', '=', 'municipality.municipality_id')
    //                 ->leftJoin('province', 'municipality.province_id', '=', 'province.province_id')
    //                 ->where('job_posting.peso_municipality_id', '=', $user->peso->municipality_id)
    //                 ->where('job_posting.job_Status', '=', 'PENDING')
    //                 ->where(function ($query) {
    //                     $query->where('job_posting.job_Title', 'like', '%' . $this->search . '%')
    //                         ->orWhere('company.bussines_Name', 'like', '%' . $this->search . '%')
    //                         ->orWhere('company.trade_Name', 'like', '%' . $this->search . '%')
    //                         ->orWhere('company.company_Address', 'like', '%' . $this->search . '%')
    //                         ->orWhere('barangay.barangay_Name', 'like', '%' . $this->search . '%')
    //                         ->orWhere('municipality.municipality_Name', 'like', '%' . $this->search . '%')
    //                         ->orWhere('province.province_Name', 'like', '%' . $this->search . '%');
    //                 })
    //                 ->paginate(10);
    //         } else if ($this->filter == 'ACTIVE') {
    //             $jobpost = Job_Posting::leftJoin('company', 'job_posting.company_id', '=', 'company.company_id')
    //             ->leftJoin('barangay', 'job_posting.barangay_id', '=', 'barangay.barangay_id')
    //             ->leftJoin('municipality', 'barangay.municipality_id', '=', 'municipality.municipality_id')
    //             ->leftJoin('province', 'municipality.province_id', '=', 'province.province_id')
    //             ->where('job_posting.peso_municipality_id', '=', $user->peso->municipality_id)
    //             ->where('job_posting.job_Status', '=', 'ACTIVE')
    //             ->where(function ($query) {
    //                 $query->where('job_posting.job_Title', 'like', '%' . $this->search . '%')
    //                     ->orWhere('company.bussines_Name', 'like', '%' . $this->search . '%')
    //                     ->orWhere('company.trade_Name', 'like', '%' . $this->search . '%')
    //                     ->orWhere('company.company_Address', 'like', '%' . $this->search . '%')
    //                     ->orWhere('barangay.barangay_Name', 'like', '%' . $this->search . '%')
    //                     ->orWhere('municipality.municipality_Name', 'like', '%' . $this->search . '%')
    //                     ->orWhere('province.province_Name', 'like', '%' . $this->search . '%');
    //             })
    //             ->withCount('job_applicants') // Count the number of applicants
    //             ->paginate(10);

    //         } else if ($this->filter == 'OTHERS') {
    //             $jobpost = Job_Posting::leftJoin('company', 'job_posting.company_id', '=', 'company.company_id')
    //                 ->leftJoin('barangay', 'job_posting.barangay_id', '=', 'barangay.barangay_id')
    //                 ->leftJoin('municipality', 'barangay.municipality_id', '=', 'municipality.municipality_id')
    //                 ->leftJoin('province', 'municipality.province_id', '=', 'province.province_id')
    //                 ->where('job_posting.peso_municipality_id', '=', $user->peso->municipality_id)
    //                 ->whereNotIn('job_posting.job_Status', ['PENDING', 'ACTIVE'])
    //                 ->where(function ($query) {
    //                     $query->where('job_posting.job_Title', 'like', '%' . $this->search . '%')
    //                         ->orWhere('company.bussines_Name', 'like', '%' . $this->search . '%')
    //                         ->orWhere('company.trade_Name', 'like', '%' . $this->search . '%')
    //                         ->orWhere('company.company_Address', 'like', '%' . $this->search . '%')
    //                         ->orWhere('barangay.barangay_Name', 'like', '%' . $this->search . '%')
    //                         ->orWhere('municipality.municipality_Name', 'like', '%' . $this->search . '%')
    //                         ->orWhere('province.province_Name', 'like', '%' . $this->search . '%');
    //                 })
    //                 ->paginate(10);
    //         }

    //     }

    //     return view('livewire.admin.job-posting.job-post-table', compact('jobpost'));
    // }

    public function render()
    {
        $user = Auth::user();

        $jobpost = Job_Posting::with('company', 'barangay.municipality.province')
            ->where('job_posting.peso_municipality_id', '=', $user->peso->municipality_id)
            ->where(function ($query) {
                $query->where('job_Title', 'like', '%' . $this->search . '%')
                    ->orWhereHas('company', function ($query) {
                        $query->where('bussines_Name', 'like', '%' . $this->search . '%')
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

        if ($this->filter == 'PENDING') {
            $jobpost->where('job_Status', '=', 'PENDING');
        } elseif ($this->filter == 'ACTIVE') {
            $jobpost->where('job_Status', '=', 'ACTIVE');
        } elseif ($this->filter == 'OTHERS') {
            $jobpost->whereNotIn('job_Status', ['PENDING', 'ACTIVE']);
        }

        $jobpost = $jobpost->withCount('job_applicants')->paginate(10);

        return view('livewire.admin.job-posting.job-post-table', compact('jobpost'));
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
//                     ->orWhere('company.bussines_Name', 'like', '%' . $this->search . '%')
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
