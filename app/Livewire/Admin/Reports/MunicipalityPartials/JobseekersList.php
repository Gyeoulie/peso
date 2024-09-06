<?php

namespace App\Livewire\Admin\Reports\MunicipalityPartials;

use App\Models\Company;
use App\Models\Employee;
use App\Models\Job_Applicants;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Spatie\SimpleExcel\SimpleExcelWriter;

class JobseekersList extends Component
{

    use WithPagination;
    use WithoutUrlPagination;
    public $municipalityID;

    public $searchJobseekers, $searchCompany;
    public $startYear, $currentYear;

    public $Gender, $Age = [], $EmpStatus, $jobseekerfilter, $selectedMonths = [], $selectedYear;
    public $mountGender, $mountAge = [], $mountEmpStatus, $mountJobseekerfilter, $mountSelectedMonths = [], $mountSelectedYear;

    public $companyMun, $munYear, $munMonths = [];
    public $mountCompanyMun, $mountMunYear, $mountMunMonths = [];

    public $filterOption;

    public function updatedsearchJobseekers()
    {
        $this->resetPage('jobseeker');
    }
    public function updatedsearchCompany()
    {
        $this->resetPage('company');
    }

    public function mount()
    {
        $this->startYear = 2024;
        $this->currentYear = date('Y');

    }

    public function exportData($type)
    {
        if ($type == 'jobseekers') {

            $jobseekers = $this->getJobseekers($this->municipalityID)->get();

            if (!$jobseekers->isEmpty()) {

                $fileName = 'jobseekers-reports-' . now()->format('Y-m-d-H-i-s') . '.xlsx';

                $writer = SimpleExcelWriter::streamDownload($fileName);

                foreach ($jobseekers as $data) {
                    $writer->addRow([
                        'First Name' => $data->fname,
                        'Middle Name' => $data->mname,
                        'Last Name' => $data->lname,
                        'Gender' => $data->gender == 1 ? 'MALE' : ($data->gender == 2 ? 'FEMALE' : 'UNKNOWN'),
                        'Date of Birth' => $data->birthdate->format('Y-m-d'),
                        'Employment Status' => $data->empstatus == 1 ? 'EMPLOYED' : ($data->empstatus == 2 ? 'UNEMPLOYED' : 'UNKNOWN'),
                        'Job Applications' => $data->job_applications,
                        'Program Registrations' => $data->program_reg_count,
                    ]);
                }

                return Response::streamDownload(function () use ($writer) {
                    $writer->close();
                }, $fileName, ['Content-Type' => 'text/csv']);
            }

            return toastr()->warning('No data in the table to be exported.');

        } elseif ($type == 'employers') {
            $employers = $this->getEmployers($this->municipalityID)->get();

            if (!$employers->isEmpty()) {

                $fileName = 'employers-reports-' . now()->format('Y-m-d-H-i-s') . '.xlsx';

                $writer = SimpleExcelWriter::streamDownload($fileName);

                foreach ($employers as $data) {
                    $writer->addRow([
                        'Company' => $data->business_Name,
                        'Contact Person' => $data->contact_Person,
                        'Contact Number' => $data->company_Pnum,
                        'Job Postings' => $data->total_job_postings,
                        'Hired Applicants' => $data->hired_applicants,

                    ]);
                }

                return Response::streamDownload(function () use ($writer) {
                    $writer->close();
                }, $fileName, ['Content-Type' => 'text/csv']);
            }

            return toastr()->warning('No data in the table to be exported.');
        }
    }

    public function resetFilter()
    {
        $this->reset('mountGender', 'mountAge', 'mountEmpStatus', 'mountJobseekerfilter', 'mountSelectedMonths', 'mountSelectedYear',
            'Gender', 'Age', 'EmpStatus', 'jobseekerfilter', 'selectedMonths', 'selectedYear');
        $this->resetPage('jobseeker');

    }

    public function mountFilter()
    {
        $this->Gender = $this->mountGender;
        $this->Age = $this->mountAge;
        $this->EmpStatus = $this->mountEmpStatus;
        $this->jobseekerfilter = $this->mountJobseekerfilter;
        $this->selectedMonths = $this->mountSelectedMonths;
        $this->selectedYear = $this->mountSelectedYear;

        $this->resetPage('jobseeker');

        $this->dispatch('close-modal', 'filter-jobseekers-modal');
    }

    public function mountMunFilter()
    {
        $this->companyMun = $this->mountCompanyMun;
        $this->munYear = $this->mountMunYear;
        $this->munMonths = $this->mountMunMonths;
        $this->resetPage('company');

        $this->dispatch('close-modal', 'filter-employers-modal');

    }
    public function resetMunFilter()
    {
        $this->reset('companyMun', 'munYear', 'munMonths', 'mountCompanyMun', 'mountMunYear', 'mountMunMonths');
        $this->resetPage('company');
    }

    private function getJobseekers($id)
    {
        $employee = Employee::whereHas('barangay', function ($query) use ($id) {
            $query->where('municipality_id', $id);
        })
            ->whereHas('job_applicants', function ($query) {
                // Apply year filter if provided
                if (!empty($this->selectedYear)) {
                    $query->whereYear('created_at', $this->selectedYear);
                }

                // Apply month filter if provided
                if (!empty($this->selectedMonths) && is_array($this->selectedMonths)) {
                    $query->whereIn(DB::raw('MONTH(created_at)'), $this->selectedMonths);
                }
            })
            ->withCount(['job_applicants as job_applications' => function ($query) {
                // Count job applications with the same filters
                if (!empty($this->selectedYear)) {
                    $query->whereYear('created_at', $this->selectedYear);
                }

                if (!empty($this->selectedMonths) && is_array($this->selectedMonths)) {
                    $query->whereIn(DB::raw('MONTH(created_at)'), $this->selectedMonths);
                }
            }])
            ->withCount('program_reg')
            ->where(function ($query) {
                $query->where('fname', 'like', '%' . $this->searchJobseekers . '%')
                    ->orWhere('mname', 'like', '%' . $this->searchJobseekers . '%')
                    ->orWhere('lname', 'like', '%' . $this->searchJobseekers . '%');
            });

        // Filter by gender
        if ($this->Gender) {
            $employee->where('gender', $this->Gender);
        }

        // Filter by employment status
        if ($this->EmpStatus) {
            $employee->where('empstatus', $this->EmpStatus);
        }

        // Filter by age
        if ($this->Age) {
            $employee->where(function ($query) {
                $currentYear = Carbon::now()->year;
                foreach ($this->Age as $range) {
                    list($minAge, $maxAge) = explode('-', $range);
                    $minYear = $currentYear - $maxAge;
                    $maxYear = $currentYear - $minAge;
                    $query->orWhereBetween('birthdate', [$minYear . '-01-01', $maxYear . '-12-31']);
                }
            });
            $employee->orderByRaw('TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) ASC');
        }

        // Filter for jobseekers based on job applications
        if (isset($this->jobseekerfilter)) {
            switch ($this->jobseekerfilter) {
                case 'with_applications':
                    $employee->whereHas('job_applicants');
                    break;
                case 'without_applications':
                    $employee->doesntHave('job_applicants');
                    break;
                case 'all':
                default:
                    // No additional filtering needed for 'all'
                    break;
            }
        }

        // Debug the query
        // dd($employee->toSql(), $employee->getBindings());

        // Return paginated results
        return $employee;
    }

    private function getEmployers($adminMunicipalityId)
    {
        $companiesQuery = Company::query();

        // Apply company municipality filter first
        $companiesQuery->where(function ($query) use ($adminMunicipalityId) {
            switch ($this->companyMun) {
                case 'within_municipality':
                    // Filter companies where the associated barangay's municipality_id matches the admin's municipality
                    $query->whereHas('barangay', function ($innerQuery) use ($adminMunicipalityId) {
                        $innerQuery->where('municipality_id', $adminMunicipalityId);
                    });
                    break;
                case 'outside_municipality':
                    // Filter companies where the associated barangay's municipality_id is different or null
                    $query->whereHas('barangay', function ($innerQuery) use ($adminMunicipalityId) {
                        $innerQuery->where('municipality_id', '!=', $adminMunicipalityId)
                            ->orWhereNull('municipality_id');
                    });
                    break;
                case 'all':
                default:
                    // No additional filtering needed for 'all'
                    break;
            }
        });

        // Filter job postings based on the admin's municipality
        $companiesQuery->whereHas('job_posting', function ($query) use ($adminMunicipalityId) {
            $query->whereHas('barangay', function ($innerQuery) use ($adminMunicipalityId) {
                $innerQuery->where('municipality_id', $adminMunicipalityId);
            });
        });

        $companiesQuery->whereHas('job_posting', function ($query) {
            // Apply year filter if provided
            if (!empty($this->munYear)) {
                $query->whereYear('created_at', $this->munYear);
            }

            if (!empty($this->munMonths) && is_array($this->munMonths)) {
                $query->whereIn(DB::raw('MONTH(created_at)'), $this->munMonths);
            }
        });
        // Count job postings in the admin's municipality with date and month filters
        $companiesQuery->withCount(['job_posting as total_job_postings' => function ($query) use ($adminMunicipalityId) {
            $query->whereHas('barangay', function ($innerQuery) use ($adminMunicipalityId) {
                $innerQuery->where('municipality_id', $adminMunicipalityId);
            });

            if (!empty($this->munYear)) {
                $query->whereYear('created_at', $this->munYear);
            }

            if (!empty($this->munMonths) && is_array($this->munMonths)) {
                $query->whereIn(DB::raw('MONTH(created_at)'), $this->munMonths);
            }
        }]);

        // Apply search filter
        if (!empty($this->searchCompany)) {
            $companiesQuery->where(function ($query) {
                $query->where('business_Name', 'like', '%' . $this->searchCompany . '%')
                    ->orWhere('trade_Name', 'like', '%' . $this->searchCompany . '%');
            });
        }

        // Add subquery to count hired applicants
        $companiesQuery->addSelect([
            'hired_applicants' => Job_Applicants::selectRaw('COUNT(*)')
                ->join('job_posting', 'job_posting.job_id', '=', 'job_applicants.job_id')
                ->whereIn('applicant_status', ['HIRED', 'COMPLETED'])
                ->whereColumn('job_posting.company_id', 'company.company_id'),
        ]);

        // Debug the query
        // dd($companiesQuery->toSql(), $companiesQuery->getBindings());

        // Return paginated results
        return $companiesQuery;
    }

    public function render()
    {

        $jobseekers = $this->getJobseekers($this->municipalityID)->paginate(10, ['*'], 'jobseeker');
        $employers = $this->getEmployers($this->municipalityID)->paginate(10, ['*'], 'company');

        // dd($employers);

        return view('livewire.admin.reports.municipality-partials.jobseekers-list', compact('jobseekers', 'employers'));
    }
}
