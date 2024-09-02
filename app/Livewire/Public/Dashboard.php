<?php

namespace App\Livewire\Public;

use App\Models\Announcements;
use App\Models\Barangay;
use App\Models\Education;
use App\Models\Industry_preference;
use App\Models\Job_Posting;
use App\Models\Job_Preference;
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

    public $filter, $sort = 'Newest';
    public $pagination = 5;

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
            ->where('job_posting.company_id', $empID) // Replace with the actual company ID
            ->where(function ($query) {
                // Filter job postings with a responded_at timestamp
                $query->whereNotNull('job_posting.responded_at')
                    ->orWhereNotNull('job_applicants.responded_at');
            })
            ->orderBy('job_posting.responded_at', 'desc')
            ->orderBy('job_applicants.responded_at', 'desc')
            ->get();

        return $notifications->map(function ($notification) {
            // Determine the type based on which responded_at is set
            $type = $notification->applicant_responded_at ? 'applicant' : 'posting';

            // Choose the responded_at value
            $respondedAt = $notification->applicant_responded_at ?? $notification->job_responded_at;

            // Construct the message based on the type
            $message = $type === 'applicant'
            ? 'A new applicant is has applied on your job "' . $notification->job_title . '".'
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
            $query->where('peso_id', $pesoId);
        }

        return $query->latest()->limit(5)->get();
    }

    public function mount()
    {

        $user = Auth::user();

        if ($user && $user->usertype == 4) {
            $this->filter = 'Recommended';
        } else if ($user && $user->usertype >= 8) {
            $this->filter = 'My Municipality';
        } else {
            $this->filter = 'All';
        }
    }

    public function updateFilter($value)
    {
        $this->filter = $value;
        $this->sort = 'Newest';
    }

    public function updateSort($value)
    {
        $this->sort = $value;
    }

    public function render()
    {
        if (!Auth::check()) {
            dd('yes');
            return redirect()->route('dashboard'); // Redirect to login page
        }

        $joblist = null;
        $user = Auth::user();
        $formattedNotifications = null;

        if ($this->filter == 'Recommended') {

            // Get the highest education level of the user
            // Get the highest education level of the user
            $highestEducationLevel = Education::where('employee_id', $user->employee->employee_id)
                ->max('edu_level');

// Get the user's municipality ID via their barangay
            $userMunicipalityId = Barangay::where('barangay_id', $user->employee->barangay_id)
                ->value('municipality_id');

// Get the user's job preferences (array of position_id)
            $userJobPreferences = Job_Preference::where('employee_id', $user->employee->employee_id)
                ->pluck('position_id');

// Get the user's industry preference
            $userIndustryPreference = Industry_Preference::where('employee_id', $user->employee->employee_id)
                ->pluck('industry_id');

// Query for matching job postingsz`
            $joblist = Job_Posting::with(['company', 'job_tags.job_positions', 'barangay.municipality', 'peso.municipality', 'job_industry'])
                ->where('job_Status', 'ACTIVE')
                ->whereHas('peso', function ($query) use ($userMunicipalityId) {
                    $query->where('municipality_id', $userMunicipalityId);
                })
                ->where('job_edu', '<=', $highestEducationLevel)
                ->where(function ($query) use ($userJobPreferences, $userIndustryPreference) {
                    // Ensure that either job tags match or industry matches, or both
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
                        ->orWhereHas('job_industry', function ($query) {
                            $query->where('industry_Title', 'like', '%' . $this->search . '%');
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

        } else if ($this->filter == 'My Municipality') {
            // dd($this->filter);
            if ($user->usertype == 4) {

                $joblist = Job_Posting::with(['company', 'job_tags.job_positions', 'barangay.municipality', 'peso.municipality', 'job_industry'])
                    ->where('job_Status', 'ACTIVE')
                    ->whereHas('peso.municipality', function ($query) use ($user) {
                        $query->where('municipality_id', $user->employee->barangay->municipality->municipality_id);
                    })
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
                            ->orWhereHas('job_industry', function ($query) {
                                $query->where('industry_Title', 'like', '%' . $this->search . '%');
                            })
                            ->orWhereHas('barangay.municipality', function ($query) {
                                $query->where('barangay_Name', 'like', '%' . $this->search . '%')
                                    ->orWhere('municipality_Name', 'like', '%' . $this->search . '%');
                            })
                            ->orWhereHas('peso.municipality', function ($query) {
                                $query->where('municipality_Name', 'like', '%' . $this->search . '%');

                            });
                    })
                    ->distinct(); // Ensure distinct job postings

            } else if ($user->usertype >= 8) {
                $joblist = Job_Posting::with(['company', 'job_tags.job_positions', 'barangay.municipality', 'peso.municipality', 'job_industry'])
                    ->where('job_Status', 'ACTIVE')
                    ->whereHas('peso.municipality', function ($query) use ($user) {
                        $query->where('municipality_id', $user->peso_accounts->peso->municipality_id);
                    })
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
                            ->orWhereHas('job_industry', function ($query) {
                                $query->where('industry_Title', 'like', '%' . $this->search . '%');
                            })
                            ->orWhereHas('barangay.municipality', function ($query) {
                                $query->where('barangay_Name', 'like', '%' . $this->search . '%')
                                    ->orWhere('municipality_Name', 'like', '%' . $this->search . '%');
                            })
                            ->orWhereHas('peso.municipality', function ($query) {
                                $query->where('municipality_Name', 'like', '%' . $this->search . '%');

                            });
                    })
                    ->distinct();
            }

        } else if ($this->filter == 'All') {
            $joblist = Job_Posting::with(['company', 'job_tags.job_positions', 'barangay.municipality', 'peso.municipality', 'job_industry'])
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
                        ->orWhereHas('job_industry', function ($query) {
                            $query->where('industry_Title', 'like', '%' . $this->search . '%');
                        })
                        ->orWhereHas('barangay.municipality', function ($query) {
                            $query->where('barangay_Name', 'like', '%' . $this->search . '%')
                                ->orWhere('municipality_Name', 'like', '%' . $this->search . '%');
                        })
                        ->orWhereHas('peso.municipality', function ($query) {
                            $query->where('municipality_Name', 'like', '%' . $this->search . '%');
                        });
                })
                ->distinct(); // Ensure distinct job postings
            //

        }

        if ($this->sort == 'Newest') {
            $joblist = $joblist->orderBy('created_at', 'DESC');
        } elseif ($this->sort == 'Oldest') {
            $joblist = $joblist->orderBy('created_at', 'ASC');
        } elseif ($this->sort == 'Random') {
            $joblist = $joblist->inRandomOrder();
        }

        $joblist = $joblist->paginate($this->pagination);

        $programList = Programs::orderBy('created_at', 'desc')->take(4)->get();

        if ($user->company) {
            $formattedNotifications = $this->companyNotifications($user->company->company_id);
        }

        $announcements = $this->getAnnouncements();

        return view('livewire.public.dashboard', compact('joblist', 'programList', 'formattedNotifications', 'announcements'));
    }
}
