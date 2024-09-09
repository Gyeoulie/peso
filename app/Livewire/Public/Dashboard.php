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
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class Dashboard extends Component
{
    use WithPagination, WithoutUrlPagination;

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

    public function updatedSearch()
    {
        $this->resetPage();
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
            } elseif ($user->usertype >= 8 && $user->usertype < 11) {
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
        $this->resetPage();
    }

    public function updateSort($value)
    {
        $this->sort = $value;
        $this->resetPage();

    }

    private function getHighestEducationLevel()
    {
        $user = Auth::user();
        return Education::where('employee_id', $user->employee->employee_id)
            ->max('edu_Level');
    }

    private function getUserMunicipalityId()
    {
        $user = Auth::user();
        return Barangay::where('barangay_id', $user->employee->barangay_id)
            ->value('municipality_id');
    }

    private function getUserJobPreferences()
    {
        $user = Auth::user();
        return Job_Preference::where('employee_id', $user->employee->employee_id)
            ->pluck('position_id');
    }

    private function getUserIndustryPreference()
    {
        $user = Auth::user();
        return Industry_Preference::where('employee_id', $user->employee->employee_id)
            ->pluck('industry_id');
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

        if ($this->filter == 'Recommended') {
            // Get the highest education level of the user
            $highestEducationLevel = $this->getHighestEducationLevel();
            $userMunicipalityId = $this->getUserMunicipalityId();
            $userJobPreferences = $this->getUserJobPreferences();
            $userIndustryPreference = $this->getUserIndustryPreference();

            // Query for matching job postings
            $query
                ->whereHas('peso', function ($query) use ($userMunicipalityId) {
                    $query->where('municipality_id', $userMunicipalityId);
                })->where('job_Edu', '<=', $highestEducationLevel)

                ->where(function ($query) use ($userJobPreferences, $userIndustryPreference) {
                    $query->where(function ($query) use ($userJobPreferences) {
                        $query->whereHas('job_tags', function ($query) use ($userJobPreferences) {
                            $query->whereIn('position_id', $userJobPreferences);
                        });
                    })
                        ->orWhere(function ($query) use ($userIndustryPreference) {
                            $query->whereHas('job_industry', function ($query) use ($userIndustryPreference) {
                                $query->whereIn('industry_id', $userIndustryPreference);
                            });
                        });
                })

                ->withCount(['job_tags as job_tags_count' => function ($query) use ($userJobPreferences) {
                    $query->whereIn('position_id', $userJobPreferences);
                }])
                ->withCount(['job_industry as industry_count' => function ($query) use ($userIndustryPreference) {
                    $query->whereIn('industry_id', $userIndustryPreference);
                }])
                ->orderByRaw('
                    CASE
                        WHEN industry_count > 0 AND job_tags_count > 0 THEN 1
                        WHEN industry_count > 0 AND job_tags_count = 0 THEN 2
                        WHEN industry_count = 0 AND job_tags_count > 0 THEN 3
                        ELSE 4
                    END
                ')
                ->orderByDesc('job_tags_count')
                ->distinct();
                // dd($query->get(), $userJobPreferences, $userIndustryPreference, $highestEducationLevel, $userMunicipalityId);


        } elseif ($this->filter === 'My Municipality') {
            $municipalityId = $user->usertype == 4
            ? $user->employee->barangay->municipality->municipality_id
            : $user->peso_accounts->peso->municipality_id;

            $query->whereHas('peso.municipality', function ($query) use ($municipalityId) {
                $query->where('municipality_id', $municipalityId);
            });
        }

        if ($this->search) {
            $query->where(function ($query) {
                $query->whereHas('company', function ($query) {
                    $query->where('business_Name', 'like', '%' . $this->search . '%')
                        ->orWhere('trade_Name', 'like', '%' . $this->search . '%');
                })
                    ->orWhere('job_Title', 'like', '%' . $this->search . '%')
                    ->orWhereHas('job_tags.job_positions', function ($query) {
                        $query->where('position_Title', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('job_industry', function ($query) {
                        $query->where('industry_Title', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('peso.municipality', function ($query) {
                        $query->where('municipality_name', 'like', '%' . $this->search . '%');
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
                // case 'Random':
                //     $query->inRandomOrder();
                //     break;
        }

        return $query->paginate($this->pagination);
    }

    public function companyNotificationsWait($empID)
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

    public function companyNotifications($empID)
    {
        // Fetch job postings and applicants notifications
        $jobPostingsAndApplicants = DB::table('job_posting')
            ->leftJoin('job_applicants', 'job_posting.job_id', '=', 'job_applicants.job_id')
            ->select(
                'job_posting.job_id',
                'job_posting.job_title',
                'job_posting.responded_at as job_responded_at',
                'job_applicants.responded_at as applicant_responded_at',
                'job_applicants.applicant_Status as applicant_status'
            )
            ->where('job_posting.company_id', $empID)
            ->where(function ($query) {
                $query->whereNotNull('job_posting.responded_at')
                    ->orWhereNotNull('job_applicants.responded_at');
            })
            ->orderBy('job_posting.responded_at', 'desc')
            ->orderBy('job_applicants.responded_at', 'desc')
            ->get();

        // Fetch partnerships notifications
        $partnerships = DB::table('partnerships')
            ->leftJoin('peso', 'partnerships.peso_id', '=', 'peso.peso_id')
            ->leftJoin('municipality', 'peso.municipality_id', '=', 'municipality.municipality_id')
            ->select(
                'partnerships.responded_at as partnership_responded_at',
                'partnerships.partnership_Status as partnership_status',
                'municipality.municipality_Name'
            )
            ->where('partnerships.company_id', $empID)
            ->whereNotNull('partnerships.responded_at')
            ->orderBy('partnerships.responded_at', 'desc')
            ->get();

        // Merge notifications
        $notifications = $jobPostingsAndApplicants->merge($partnerships);

        // Format notifications
        $formattedNotifications = $notifications->map(function ($notification) {
            if (isset($notification->partnership_responded_at)) {
                // Handle partnership notifications
                $type = 'partnership';
                $status = $notification->partnership_status;
                $respondedAt = $notification->partnership_responded_at;
                $municipalityName = $notification->municipality_Name;
                $message = match ($status) {
                    'REJECTED' => 'Your partnership application with PESO' . $municipalityName . ' has been rejected.',
                    'APPROVED' => 'Your partnership application with PESO ' . $municipalityName . ' has been accepted.',
                    'CANCELLED' => 'Partnership with PESO ' . $municipalityName . ' has been cancelled.',
                    default => 'Status unknown.',
                };
                // Municipality name for partnerships
            } elseif (isset($notification->applicant_responded_at)) {
                // Handle job applicant notifications
                $type = 'applicant';
                $status = $notification->applicant_status;
                $respondedAt = $notification->applicant_responded_at;
                $message = 'A new applicant has applied for your job "' . $notification->job_title . '".';
                $municipalityName = null; // No municipality name for job postings
            } else {
                // Handle job posting notifications
                $type = 'posting';
                $status = null; // No status for postings
                $respondedAt = $notification->job_responded_at;
                $message = 'The job post application for "' . $notification->job_title . '" has been responded to.';
                $municipalityName = null; // No municipality name for job postings
            }

            return [
                'type' => $type,
                'status' => $status,
                'job_title' => $notification->job_title ?? null,
                'responded_at' => $respondedAt,
                'message' => $message,
                'municipality_Name' => $municipalityName, // Include municipality name only for partnerships
            ];
        })->toArray();

        return $formattedNotifications;
    }

    public function getAnnouncements($pesoId = null)
    {
        $query = Announcements::query();

        if ($pesoId) {
            $query->where('peso_id', $pesoId);

        }
        return $query->where('announcement_Status', 'ACTIVE')->latest()->limit(5)->get();
    }

    public function setAnnouncements($user = null)
    {
        // Check if a user is provided and authenticated
        if ($user && $user->employee) {
            // Fetch PESO ID based on employee's municipality
            $peso = PESO::where('municipality_id', $user->employee->barangay->municipality_id)->first();
            $pesoId = $peso ? $peso->id : null;
        } elseif ($user && $user->peso_accounts) {
            // Fetch PESO ID based on user's PESO account
            $pesoId = $user->peso_accounts->peso_id;
        } else {
            // If no user or not logged in, set PESO ID to null and fetch all announcements
            $pesoId = null;
        }

        // Return announcements based on the PESO ID or fetch all if no specific PESO ID
        return $this->getAnnouncements($pesoId);
    }

    private function buildProgramQuery()
    {
        $query = Programs::with([
            'program_tags.job_positions',
            'job_industry',
            'peso.municipality',
        ]);

        if (Auth::check()) {
            $user = Auth::user();

            // Get user preferences
            if ($user->employee) {
                $userJobPreferences = $this->getUserJobPreferences();
                $userIndustryPreference = $this->getUserIndustryPreference();
                $userMunicipalityId = $this->getUserMunicipalityId();
            }

            if ($this->filter == 'Recommended') {
                $query->whereHas('peso.municipality', function ($q) use ($userMunicipalityId) {
                    $q->where('municipality_id', $userMunicipalityId);
                })
                    ->where(function ($query) use ($userJobPreferences, $userIndustryPreference) {
                        $query->where(function ($query) use ($userJobPreferences, $userIndustryPreference) {
                            $query->whereHas('program_tags.job_positions', function ($q) use ($userJobPreferences) {
                                $q->whereIn('position_id', $userJobPreferences);
                            })
                                ->whereHas('job_industry', function ($q) use ($userIndustryPreference) {
                                    $q->whereIn('industry_id', $userIndustryPreference);
                                });
                        })
                            ->orWhere(function ($query) use ($userIndustryPreference) {
                                $query->whereHas('job_industry', function ($q) use ($userIndustryPreference) {
                                    $q->whereIn('industry_id', $userIndustryPreference);
                                });
                            })
                            ->orWhere(function ($query) use ($userJobPreferences) {
                                $query->whereHas('program_tags.job_positions', function ($q) use ($userJobPreferences) {
                                    $q->whereIn('position_id', $userJobPreferences);
                                });
                            });
                    })
                    ->withCount(['program_tags as tags_count' => function ($query) use ($userJobPreferences) {
                        $query->whereIn('position_id', $userJobPreferences);
                    }])
                    ->withCount(['job_industry as industry_count' => function ($query) use ($userIndustryPreference) {
                        $query->whereIn('industry_id', $userIndustryPreference);
                    }])
                    ->orderByRaw('
                CASE
                    WHEN industry_count > 0 AND tags_count > 0 THEN 1
                    WHEN industry_count > 0 AND tags_count = 0 THEN 2
                    WHEN industry_count = 0 AND tags_count > 0 THEN 3
                    ELSE 4
                END
            ')
                    ->orderByDesc('tags_count')
                    ->orderByDesc('industry_count')
                    ->distinct();

            } elseif ($this->filter === 'My Municipality') {
                $municipalityId = $user->usertype == 4 ?
                $user->employee->barangay->municipality->municipality_id :
                $user->peso_accounts->peso->municipality_id;

                $query->whereHas('peso.municipality', function ($q) use ($municipalityId) {
                    $q->where('municipality_id', $municipalityId);
                });
            }
        }

        return $query;
    }

    public function getRecommendedPrograms()
    {
        $programQuery = $this->buildProgramQuery();
        return $programQuery->orderBy('created_at', 'desc')->take(4)->get();
    }

    public function render()
    {
        $joblist = $this->getPaginatedJobs();
        // $programList = Programs::orderBy('created_at', 'desc')->take(4)->get();
        $programList = $this->buildProgramQuery()->orderBy('created_at', 'desc')->take(4)->get();

        $user = Auth::user();
        $formattedNotifications = $user && $user->company ? $this->companyNotifications($user->company->company_id) : [];
        // dd($formattedNotifications);

        $announcements = $this->setAnnouncements($user);

        return view('livewire.public.dashboard', compact('joblist', 'programList', 'formattedNotifications', 'announcements'));
    }
}
