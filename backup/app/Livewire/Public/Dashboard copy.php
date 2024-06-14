<?php

namespace App\Livewire\Public;

use App\Models\Barangay;
use App\Models\Education;
use App\Models\Job_Posting;
use App\Models\Job_Preference;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]

class Dashboard extends Component
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

    public $search;

    public $filter;
    public $pagination = 5;




    pu

    public function render()
    {

        $user = Auth::user();

        if ($user->usertype === 4) {
            // Get the highest education level of the user
            $highestEducationLevel = Education::where('employee_id', $user->employee->employee_id)
                ->max('edu_level');

            // Get the user's municipality ID via their barangay
            $userMunicipalityId = Barangay::where('barangay_id', $user->employee->barangay_id)
                ->value('municipality_id');

            // Get the user's job preferences (array of position_id)
            $userJobPreferences = Job_Preference::where('employee_id', $user->employee->employee_id)
                ->pluck('position_id');

            // Query for matching job postings
            $joblist = Job_Posting::with(['company', 'job_tags.job_positions', 'barangay.municipality', 'municipality'])
                ->where('job_Status', 'ACTIVE')
                ->where('peso_municipality_id', $userMunicipalityId)
                ->where('job_edu', '<=', $highestEducationLevel)
                ->whereHas('job_tags', function ($query) use ($userJobPreferences) {
                    // Check if any of the jobTags' position_id is in the user's job preferences
                    $query->whereIn('position_id', $userJobPreferences);
                })
                ->where(function ($query) {
                    // Additional search filters for company, job title, and position name
                    $query->whereHas('company', function ($query) {
                        $query->where('business_Name', 'like', "%{$this->search}%")
                            ->orWhere('trade_Name', 'like', "%{$this->search}%");
                    })
                        ->orWhere('job_Title', 'like', "%{$this->search}%")
                        ->orWhereHas('job_tags.job_positions', function ($query) {
                            $query->where('position_Title', 'like', "%{$this->search}%");
                        });
                })
                ->distinct() // Ensure distinct job postings
                ->paginate($this->pagination);

        } else {
            $joblist = Job_Posting::with(['company', 'job_tags.job_positions', 'barangay.municipality', 'municipality'])
                ->where('job_Status', 'ACTIVE')
                ->where(function ($query) {
                    // Additional search filters for company, job title, and position name
                    $query->whereHas('company', function ($query) {
                        $query->where('business_Name', 'like', '%' . $this->search . '%')
                            ->orWhere('trade_Name', 'like', '%' . $this->search . '%');
                    })
                        ->orWhere('job_Title', 'like', '%' . $this->search . '%')
                        ->orWhereHas('job_tags.job_positions', function ($query) {
                            $query->where('position_Title', 'like', '%' . $this->search . '%');
                        })
                        ->orWhereHas('barangay.municipality', function ($query) {
                            $query->where('barangay_Name', 'like', '%' . $this->search . '%')
                                ->orWhere('municipality_Name', 'like', '%' . $this->search . '%');
                        })
                        ->orWhereHas('municipality', function ($query) {
                            $query->where('municipality_Name', 'like', '%' . $this->search . '%');
                        });
                })
                ->distinct() // Ensure distinct job postings
                ->paginate($this->pagination);

        }

        return view('livewire.public.dashboard', compact('joblist'));
    }
}

// $joblist = Job_Posting::query()
//     ->select('job_posting.*', 'm1.municipality_Name as peso_municipality', 'p1.province_Name as peso_province', 'm2.municipality_Name as job_municipality', 'p2.province_Name as job_province')
//     ->leftJoin('company', 'job_posting.company_id', '=', 'company.company_id')
//     ->leftJoin('job_tags', 'job_posting.job_id', '=', 'job_tags.job_id')
//     ->leftJoin('job_positions', 'job_tags.position_id', '=', 'job_positions.position_id')
//     ->leftJoin('job_industry', 'job_posting.industry_id', '=', 'job_industry.industry_id')
//     ->leftJoin('municipality as m1', 'job_posting.peso_municipality_id', '=', 'm1.municipality_id')
//     ->leftJoin('province as p1', 'm1.province_id', '=', 'p1.province_id')
//     ->leftJoin('barangay', 'job_posting.barangay_id', '=', 'barangay.barangay_id')
//     ->leftJoin('municipality as m2', 'barangay.municipality_id', '=', 'm2.municipality_id')
//     ->leftJoin('province as p2', 'm2.province_id', '=', 'p2.province_id')
//     ->distinct('job_posting.job_id')
//     ->where('job_posting.job_Status', '=', 'ACTIVE')
//     ->where(function ($query) {
//         $query->where('job_posting.job_Title', 'like', '%' . $this->search . '%')
//             ->orWhere('company.business_Name', 'like', '%' . $this->search . '%')
//             ->orWhere('company.company_Address', 'like', '%' . $this->search . '%')
//             ->orWhere('job_posting.job_Address', 'like', '%' . $this->search . '%')
//             ->orWhere('m1.municipality_Name', 'like', '%' . $this->search . '%')
//             ->orWhere('m2.municipality_Name', 'like', '%' . $this->search . '%')
//             ->orWhere('p1.province_Name', 'like', '%' . $this->search . '%')
//             ->orWhere('p2.province_Name', 'like', '%' . $this->search . '%')
//             ->orWhere('job_industry.industry_Title', 'like', '%' . $this->search . '%')
//             ->orWhereHas('job_tags', function ($query) {
//                 $query->where('position_Title', 'like', '%' . $this->search . '%');
//             });
//     })
//     ->paginate(5);

// $joblist = Job_Posting::query()
//     ->select('job_posting.*')
//     ->leftJoin('company', 'job_posting.company_id', '=', 'company.company_id')
//     ->leftJoin('job_tags', 'job_posting.job_id', '=', 'job_tags.job_id')
//     ->leftJoin('job_positions', 'job_tags.position_id', '=', 'job_positions.position_id')
//     ->distinct('job_posting.job_id')
//     ->where('job_posting.job_Status', '=', 'ACTIVE')
//     ->where(function ($query) {
//         $query->where('job_posting.job_Title', 'like', '%' . $this->search . '%')
//             ->orWhere('company.bussines_Name', 'like', '%' . $this->search . '%')
//             ->orWhere('company.company_Address', 'like', '%' . $this->search . '%')
//             ->orWhere('job_posting.job_Address', 'like', '%' . $this->search . '%')
//             ->orWhereHas('job_tags', function ($query) {
//                 $query->where('position_Title', 'like', '%' . $this->search . '%');
//             });
//     })
//     ->paginate(10);

// dd($joblist);
