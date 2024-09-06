<?php

namespace App\Livewire\Admin\Reports;

use App\Models\Barangay;
use App\Models\Employee;
use App\Models\Industry_preference;
use App\Models\Job_Applicants;
use App\Models\Job_Preference;
use App\Models\Programs;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Spatie\SimpleExcel\SimpleExcelWriter;

#[Layout('layouts.admin')]
class BarangayReports extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    public $searchBar;
    public $selectedBar, $barTitle;

    public $currentYear;
    public $startYear;

    public $searchJobseekers;

    // MOUNT
    public $mountGender, $mountAge = [], $mountEmpStatus;

    // REAL FILTER VALUES
    public $Gender, $Age = [], $EmpStatus;

    public $mountSelectedMonths = [];

    public $selectedMonths = [];
    public $selectedYear;

    public function updatedsearchJobseekers()
    {
        $this->resetPage();
    }

    public function changeYear($year)
    {
        $this->selectedYear = $year;
    }

    public function changeMonth()
    {
        $this->mountSelectedMonths = $this->selectedMonths;

    }

    public function mount()
    {
        $user = Auth::user();
        $this->initializeBarangay($user);
        $this->currentYear = date('Y');
        $this->startYear = 2024;
        $this->selectedYear = $this->startYear;

    }

    public function exportData()
    {
        $filters = ['barangay_id' => $this->selectedBar];
        $employees = $this->getJobseekers($filters)->get();
        if (!$employees->isEmpty()) {

            $fileName = $this->barTitle . '-jobseekers-' . now()->format('Y-m-d-H-i-s') . '.xlsx';

            $writer = SimpleExcelWriter::streamDownload($fileName);

            foreach ($employees as $employee) {
                $writer->addRow([
                    'First Name' => $employee->fname,
                    'Middle Name' => $employee->mname,
                    'Last Name' => $employee->lname,
                    'Gender' => $employee->gender == 1 ? 'MALE' : ($employee->gender == 2 ? 'FEMALE' : 'UNKNOWN'),
                    'Date of Birth' => $employee->birthdate->format('Y-m-d'),
                    'Employment Status' => $employee->empstatus == 1 ? 'EMPLOYED' : ($employee->empstatus == 2 ? 'UNEMPLOYED' : 'UNKNOWN'),
                    'Active Applications' => $employee->active_applications_count,
                    'Program Registrations' => $employee->program_reg_count,
                ]);
            }

            return Response::streamDownload(function () use ($writer) {
                $writer->close();
            }, $fileName, ['Content-Type' => 'text/csv']);
        }

        return toastr()->warning('No data in the table to be exported.');

    }
    private function generateCsvContent($employees, $headers)
    {
        $output = fopen('php://temp', 'r+'); // Use a temporary stream for CSV content

        // Add headers to the CSV
        fputcsv($output, $headers);

        foreach ($employees as $employee) {
            fputcsv($output, [
                $employee->fname,
                $employee->mname,
                $employee->lname,
                $employee->gender,
                $employee->birthdate->format('Y-m-d'),
                $employee->empstatus,
                $employee->active_applications_count,
                $employee->program_reg_count,
            ]);
        }

        rewind($output); // Rewind to the beginning of the stream
        $csvContent = stream_get_contents($output); // Get the content of the stream
        fclose($output); // Close the stream

        return $csvContent;
    }

    public function mountFilter()
    {
        $this->Gender = $this->mountGender;
        $this->Age = $this->mountAge;
        $this->EmpStatus = $this->mountEmpStatus;
        $this->dispatch('close-modal', 'filter-jobseekers-modal');
    }

    public function resetFilter()
    {
        $this->reset('mountGender', 'mountAge', 'mountEmpStatus', 'Gender', 'Age', 'EmpStatus');

    }

    private function initializeBarangay($user)
    {
        $pesoMunicipalityId = optional($user->peso_accounts->peso)->municipality_id;

        $barangay = Barangay::with('municipality')
            ->where('municipality_id', $pesoMunicipalityId)
            ->orderBy('barangay_Name', 'ASC')
            ->first();

        $this->barSelect($barangay?->barangay_id);
    }

    public function barSelect($id)
    {
        $barangay = Barangay::findOrFail($id);

        $this->selectedBar = $id;
        $this->barTitle = $barangay->barangay_Name;
        $this->dispatch('updateBar', $id);
    }
    private function getBarangays($municipalityId)
    {
        $barangay = Barangay::with('municipality')
            ->where('municipality_id', $municipalityId)
            ->where('barangay_Name', 'like', '%' . $this->searchBar . '%')
            ->orderBy('barangay_Name', 'ASC')
            ->get();

        return compact('barangay');
    }

    private function getStatistics()
    {
        $filters = ['barangay_id' => $this->selectedBar];

        return [
            'barangayJobSeekers' => $this->getJobseekers($filters)->paginate(10),
            'totalJobSeekers' => $this->getEmployeeCount($filters),
            'recentJobSeekers' => $this->getRecentEmployeeCount($filters),
            'totalEmployed' => $this->getEmployeeCount(array_merge($filters, ['empstatus' => 1])),
            'totalUnemployed' => $this->getEmployeeCount(array_merge($filters, ['empstatus' => 2])),
            'totalActiveApplicants' => $this->getActiveApplicantCount($filters),
            'recentActiveApplicants' => $this->getRecentActiveApplicantCount($filters),
            'topPrograms' => $this->getTopPrograms($filters),
        ];
    }
    private function getJobseekers(array $filters)
    {

        // return Employee::where('barangay_id', $filters)
        //     ->withCount(['job_applicants as active_applications' => function ($query) {
        //         $query->whereNotIn('applicant_Status', ['REJECTED', 'COMPLETED']);
        //     }])
        //     ->paginate(10);

        $employee = Employee::where('barangay_id', $filters)
            ->withCount(['activeApplications', 'program_reg'])
            ->where(function ($query) {
                $query->where('fname', 'like', '%' . $this->searchJobseekers . '%')
                    ->orWhere('mname', 'like', '%' . $this->searchJobseekers . '%')
                    ->orWhere('lname', 'like', '%' . $this->searchJobseekers . '%');
            });

        if ($this->Gender) {
            $employee = $employee->where('gender', $this->Gender);
        }
        if ($this->EmpStatus) {
            $employee = $employee->where('empstatus', $this->EmpStatus);
        }
        if ($this->Age) {
            $employee = $employee->where(function ($query) {
                $currentYear = Carbon::now()->year;
                foreach ($this->Age as $range) {
                    list($minAge, $maxAge) = explode('-', $range);
                    $minYear = $currentYear - $maxAge;
                    $maxYear = $currentYear - $minAge;
                    $query->orWhereBetween('birthdate', [$minYear . '-01-01', $maxYear . '-12-31']);
                }
            });
            $employee = $employee->orderByRaw('TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) ASC');
        }

        return $employee;
    }

    private function getEmployeeCount(array $filters)
    {
        return Employee::where(function ($query) use ($filters) {
            // Apply the barangay filter
            if (isset($filters['barangay_id'])) {
                $query->whereHas('barangay', function ($query) use ($filters) {
                    $query->where('barangay_id', $filters['barangay_id']);
                });
            }

            // Apply the empstatus filter (and any other filters passed in)
            if (isset($filters['empstatus'])) {
                $query->where('empstatus', $filters['empstatus']);
            }

            // Add more filters as needed
            // ...
        })->count();
    }
    private function getRecentEmployeeCount(array $filters)
    {
        return Employee::whereHas('barangay', function ($query) use ($filters) {
            $query->where('barangay_id', $filters['barangay_id']);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(24))
            ->count();
    }

    private function getActiveApplicantCount(array $filters)
    {
        return Job_Applicants::whereNotIn('applicant_Status', ['REJECTED', 'COMPLETED', 'CANCELLED'])
            ->whereHas('employee.barangay', function ($query) use ($filters) {
                $query->where('barangay_id', $filters['barangay_id']);
            })
            ->count();
    }

    private function getRecentActiveApplicantCount(array $filters)
    {
        return Job_Applicants::whereNotIn('applicant_Status', ['REJECTED', 'COMPLETED', 'CANCELLED'])
            ->whereHas('job_posting.barangay', function ($query) use ($filters) {
                $query->where('barangay_id', $filters['barangay_id']);
            })
            ->where('created_at', '>=', Carbon::now()->subHours(24))
            ->count();
    }

    private function getTopPrograms(array $filters)
    {
        return Programs::withCount(['program_reg as registration_count' => function ($query) use ($filters) {
            $query->whereHas('employee', function ($query) use ($filters) {
                $query->where('barangay_id', $filters['barangay_id']);
            });
        }])
            ->having('registration_count', '>', 0) // Ensure registration count is greater than zero
            ->orderBy('registration_count', 'desc')
            ->limit(10)
            ->get();
    }

    private function getCharts()
    {
        return [
            'jobtags_chart' => $this->createJobTagsChart(),
            'industries_chart' => $this->createIndustriesChart(),
        ];
    }

    private function createJobTagsChart()
    {
        $topJobPreferences = Job_Preference::select('position_id', DB::raw('COUNT(*) as total_count'))
            ->whereHas('employee', function ($query) {
                $query->whereHas('barangay', function ($query) {
                    $query->where('barangay_id', $this->selectedBar);
                });
            })
            ->groupBy('position_id')
            ->orderByDesc('total_count')
            ->limit(5)
            ->get();

        $chart = new ColumnChartModel();
        $chart->setTitle('JOB TAGS');

        foreach ($topJobPreferences as $preference) {
            $positionTitle = $preference->job_positions->position_Title ?? 'Unknown';
            $chart->addColumn($positionTitle, $preference->total_count, '#' . substr(md5(rand()), 0, 6));
        }

        return $this->configureChart($chart);
    }

    private function createIndustriesChart()
    {
        $topJobIndustries = Industry_preference::select('industry_id', DB::raw('COUNT(*) as total_count'))
            ->whereHas('employee', function ($query) {
                $query->whereHas('barangay', function ($query) {
                    $query->where('barangay_id', $this->selectedBar);
                });
            })
            ->groupBy('industry_id')
            ->orderByDesc('total_count')
            ->limit(5)
            ->get();

        $chart = new ColumnChartModel();
        $chart->setTitle('INDUSTRIES');

        foreach ($topJobIndustries as $industry) {
            $industryTitle = $industry->job_industry->industry_Title ?? 'Unknown';
            $chart->addColumn($industryTitle, $industry->total_count, '#' . substr(md5(rand()), 0, 6));
        }

        return $this->configureChart($chart);
    }

    private function configureChart($chart)
    {
        return $chart->setAnimated(true)
            ->setYAxisVisible(true)
            ->setDataLabelsEnabled(true)
            ->setLegendVisibility(true)
            ->setJsonConfig([
                'chart' => [
                    'width' => '100%',
                    'height' => '300px',
                ],
                'yaxis.tickAmount' => 1,
                'yaxis.labels.formatter' => '(val) => Math.floor(val)',
            ]);
    }
    public function render()
    {
        $user = Auth::user();

        $pesoMunicipalityId = optional($user->peso_accounts->peso)->municipality_id;

        $barangays = $this->getBarangays($pesoMunicipalityId);
        $stats = $this->getStatistics();

        $charts = $this->getCharts();

        return view('livewire.admin.reports.barangay-reports', array_merge($barangays, $stats, $charts));
    }

}
