<?php

namespace App\Livewire\Public;

use App\Models\Announcements;
use App\Models\Barangay;
use App\Models\Education;
use App\Models\Industry_preference;
use App\Models\Job_Posting;
use App\Models\Job_Preference;
use App\Models\PESO;
use App\Models\Programs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    public $filter = 'All';
    public $sort = 'Newest';
    public $pagination = 5;

    public function updatedsearch()
    {
        $this->resetPage('');
    }
    public function mount()
    {
        $this->initializeFilter();
    }

    private function initializeFilter()
    {
        $user = Auth::user();
        if ($user) {
            if ($user->usertype == 4) {
                $this->filter = 'Recommended';
            } elseif ($user->usertype >= 8) {
                $this->filter = 'My Municipality';
            } else {
                $this->filter = 'All';
            }
        }
    }

    public function updateFilter($value)
    {
        $this->filter = $value;
        $this->sort = 'Newest';
        $this->resetPage('');
    }

    public function updateSort($value)
    {
        $this->sort = $value;
        $this->resetPage('');
    }

    private function getHighestEducationLevel()
    {
        $user = Auth::user();
        return Education::where('employee_id', $user->employee->employee_id)->max('edu_level');
    }

    private function getUserMunicipalityId()
    {
        $user = Auth::user();
        return Barangay::where('barangay_id', $user->employee->barangay_id)->value('municipality_id');
    }

    private function getUserJobPreferences()
    {
        $user = Auth::user();
        return Job_Preference::where('employee_id', $user->employee->employee_id)->pluck('position_id');
    }

    private function getUserIndustryPreference()
    {
        $user = Auth::user();
        return Industry_preference::where('employee_id', $user->employee->employee_id)->pluck('industry_id');
    }

    private function buildJobQuery()
    {
        $query = Job_Posting::with([
            'company',
            'job_tags.job_positions',
            'barangay.municipality',
            'peso.municipality',
            'job_industry',
        ])
            ->where('job_Status', 'ACTIVE');

        $user = Auth::user();

        if ($this->filter === 'Recommended') {
            $highestEducationLevel = $this->getHighestEducationLevel();
            $userMunicipalityId = $this->getUserMunicipalityId();
            $userJobPreferences = $this->getUserJobPreferences();
            $userIndustryPreference = $this->getUserIndustryPreference();

            $query->where('job_edu', '<=', $highestEducationLevel)
                ->whereHas('peso', function ($q) use ($userMunicipalityId) {
                    $q->where('municipality_id', $userMunicipalityId);
                })
                ->where(function ($q) use ($userJobPreferences, $userIndustryPreference) {
                    $q->whereHas('job_tags', function ($q) use ($userJobPreferences) {
                        $q->whereIn('position_id', $userJobPreferences);
                    })
                        ->orWhereHas('job_industry', function ($q) use ($userIndustryPreference) {
                            $q->whereIn('industry_id', $userIndustryPreference);
                        });
                });

        } elseif ($this->filter === 'My Municipality') {
            $municipalityId = $user->usertype == 4 ?
            $user->employee->barangay->municipality->municipality_id :
            $user->peso_accounts->peso->municipality_id;

            $query->whereHas('peso.municipality', function ($q) use ($municipalityId) {
                $q->where('municipality_id', $municipalityId);
            });
        }

        if ($this->search) {
            $query->where(function ($q) {
                $q->whereHas('company', function ($q) {
                    $q->where('business_Name', 'like', '%' . $this->search . '%')
                        ->orWhere('trade_Name', 'like', '%' . $this->search . '%');
                })
                    ->orWhere('job_Title', 'like', '%' . $this->search . '%')
                    ->orWhereHas('job_tags.job_positions', function ($q) {
                        $q->where('position_Title', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('job_industry', function ($q) {
                        $q->where('industry_Title', 'like', '%' . $this->search . '%');
                    });
            });
        }

        return $query;
    }

    private function getPaginatedJobs()
    {
        $query = $this->buildJobQuery();

        switch ($this->sort) {
            case 'Newest':
                $query->orderBy('created_at', 'DESC');
                break;
            case 'Oldest':
                $query->orderBy('created_at', 'ASC');
                break;
            case 'Random':
                $query->inRandomOrder();
                break;
        }

        return $query->paginate($this->pagination);
    }

    public function companyNotifications($empID)
    {
        $notifications = DB::table('job_posting')
            ->leftJoin('job_applicants', 'job_posting.job_id', '=', 'job_applicants.job_id')
            ->select(
                'job_posting.job_id',
                'job_posting.job_title',
                'job_posting.responded_at as job_responded_at',
                'job_applicants.responded_at as applicant_responded_at',
                'job_applicants.applicant_Status'
            )
            ->where('job_posting.company_id', $empID)
            ->where(function ($query) {
                $query->whereNotNull('job_posting.responded_at')
                    ->orWhereNotNull('job_applicants.responded_at');
            })
            ->orderBy('job_posting.responded_at', 'desc')
            ->orderBy('job_applicants.responded_at', 'desc')
            ->get();

        return $notifications->map(function ($notification) {
            $type = $notification->applicant_responded_at ? 'applicant' : 'posting';
            $respondedAt = $notification->applicant_responded_at ?? $notification->job_responded_at;
            $message = $type === 'applicant'
            ? 'A new applicant has applied on your job "' . $notification->job_title . '".'
            : 'The job post application for "' . $notification->job_title . '" has been responded to.';

            return [
                'type' => $type,
                'job_title' => $notification->job_title,
                'responded_at' => $respondedAt,
                'message' => $message,
            ];
        })->toArray();
    }

    public function getAnnouncements($pesoId = null)
    {
        $query = Announcements::query();

        if ($pesoId) {
            $query->where('peso_id', $pesoId)
                ->where('announcement_Status', 'ACTIVE');
        }

        return $query->latest()->limit(5)->get();
    }

    public function setAnnouncements($user)
    {
        if ($user->employee) {
            $peso = PESO::where('municipality_id', $user->employee->barangay->municipality_id)->first();
            $pesoId = $peso ? $peso->id : null; // Ensure $pesoId is set or null
        } elseif ($user->peso_accounts) {
            $pesoId = $user->peso_accounts->peso_id;
        } else {
            $pesoId = null; // No specific PESO ID, fetch all announcements
        }

        // Optionally return the announcements if you need to
        return $this->getAnnouncements($pesoId);
    }

    public function render()
    {
        $joblist = $this->getPaginatedJobs();
        $programList = Programs::orderBy('created_at', 'desc')->take(4)->get();

        $user = Auth::user();
        $formattedNotifications = $user && $user->company ? $this->companyNotifications($user->company->company_id) : [];

        $announcements = $this->setAnnouncements($user);

        return view('livewire.public.dashboard', compact('joblist', 'programList', 'formattedNotifications', 'announcements'));
    }
}
