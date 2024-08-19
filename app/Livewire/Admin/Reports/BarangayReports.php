<?php

namespace App\Livewire\Admin\Reports;

use App\Models\Barangay;
use App\Models\Employee;
use App\Models\Industry_preference;
use App\Models\Job_Applicants;
use App\Models\Job_Preference;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class BarangayReports extends Component
{
    use WithPagination;

    public $searchBar;
    public $selectedBar, $barTitle;

    public function mount()
    {
        $user = auth()->user();
        $this->initializeBarangay($user);
    }

    private function initializeBarangay($user)
    {
        $pesoMunicipalityId = optional($user->peso)->municipality_id;

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
    }

    public function render()
    {
        $user = auth()->user();
        $pesoMunicipalityId = optional($user->peso)->municipality_id;

        $barangays = $this->getBarangays($pesoMunicipalityId);
        $stats = $this->getStatistics();
        $charts = $this->getCharts();

        return view('livewire.admin.reports.barangay-reports', array_merge($barangays, $stats, $charts));
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
            'barangayJobSeekers' => $this->getJobseekers($filters),
            'totalJobSeekers' => $this->getEmployeeCount($filters),
            'recentJobSeekers' => $this->getRecentEmployeeCount($filters),
            'totalEmployed' => $this->getEmployeeCount(array_merge($filters, ['empstatus' => 1])),
            'totalUnemployed' => $this->getEmployeeCount(array_merge($filters, ['empstatus' => 2])),
            'totalActiveApplicants' => $this->getActiveApplicantCount($filters),
            'recentActiveApplicants' => $this->getRecentActiveApplicantCount($filters),
        ];
    }
    private function getJobseekers(array $filters)
    {

        return Employee::where('barangay_id', $filters)
            ->withCount(['job_applicants as active_applications' => function ($query) {
                $query->whereNotIn('applicant_Status', ['REJECTED', 'COMPLETED']);
            }])
            ->paginate(10);
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

    private function getCharts()
    {
        return [
            'jobtags_chart' => $this->createJobTagsChart(),
            'industries_chart' => $this->createIndustriesChart(),
            'employment_chart' => $this->createLineChartModel(),
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

    private function createLineChartModel()
    {
        $year = Carbon::now()->year;

        $monthlyHiredCounts = Job_Applicants::selectRaw('MONTH(updated_at) as month, COUNT(*) as total')
            ->where('applicant_Status', 'PENDING')
            ->whereHas('employee', function ($query) {
                $query->where('barangay_id', $this->selectedBar);
            })
            ->whereYear('created_at', $year)
            ->groupByRaw('MONTH(updated_at)')
            ->orderByRaw('MONTH(updated_at)')
            ->get()
            ->keyBy('month');

        $monthlyData = array_fill(1, 12, 0);

        foreach ($monthlyHiredCounts as $month => $data) {
            $monthlyData[$month] = $data->total;
        }

        $chart = new LineChartModel();
        $chart->setAnimated(true)
            ->withOnPointClickEvent('onPointClick')
            ->setSmoothCurve()
            ->setXAxisVisible(true)
            ->setDataLabelsEnabled(true)
            ->setXAxisCategories(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);

        foreach ($monthlyData as $month => $count) {
            $chart->addPoint($month, $count, ['month' => $month]);
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
}
