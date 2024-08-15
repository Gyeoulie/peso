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
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class BarangayReports extends Component
{

    use WithPagination, WithoutUrlPagination;
    public $searchBar;
    public $selectedBar, $barTitle;

    public function mount()
    {
        $user = auth()->user();
        $pesoMunicipalityId = optional($user->peso)->municipality_id;

        // Fetch the first barangay for the given municipality
        $barangay = Barangay::with('municipality')
            ->where('municipality_id', $pesoMunicipalityId)
            ->orderBy('barangay_Name', 'ASC')
            ->first(); // Fetch a single Barangay record

        // Check if a Barangay was found and call barSelect with its barangay_id
        if ($barangay) {
            $this->barSelect($barangay->barangay_id);
        } else {
            // Handle the case where no Barangay was found if needed
            $this->barSelect(null); // Or handle as appropriate
        }
    }
    public function barSelect($id)
    {
        // dd($id);
        $barangay = Barangay::findOrFail($id);

        if ($barangay) {
            // dd($barangay);
            $this->selectedBar = $id;
            $this->barTitle = $barangay->barangay_Name;
        }
    }

    public function render()
    {
        $user = auth()->user(); // Assuming you are fetching the current authenticated user

        // Get the current user's municipality ID from PESO relation
        $pesoMunicipalityId = optional($user->peso)->municipality_id;

        $barangay = Barangay::with('municipality')
            ->where('municipality_id', $pesoMunicipalityId)
            ->where('barangay_Name', 'like', '%' . $this->searchBar . '%')
            ->orderBy('barangay_Name', 'ASC')
            ->get();

        // Total Job Seekers
        $totalJobSeekers = Employee::whereHas('barangay', function ($query) {
            $query->where('barangay_id', $this->selectedBar);
        })->count();

        // Recent Job Seekers (last 24 hours)
        $recentJobSeekers = Employee::whereHas('barangay', function ($query) {
            $query->where('barangay_id', $this->selectedBar);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(24))
            ->count();

        // Total Employed
        $totalEmployed = Employee::where('empstatus', 1)
            ->whereHas('barangay', function ($query) {
                $query->where('barangay_id', $this->selectedBar);
            })
            ->count();

        // Total Unemployed
        $totalUnemployed = Employee::where('empstatus', 2)
            ->whereHas('barangay', function ($query) {
                $query->where('barangay_id', $this->selectedBar);
            })
            ->count();

        // Total Active Applicants
        $totalActiveApplicants = Job_Applicants::whereNotIn('applicant_Status', ['REJECTED', 'COMPLETED', 'CANCELLED'])
            ->whereHas('employee.barangay', function ($query) {
                $query->where('barangay_id', $this->selectedBar);
            })
            ->count();

        // Recent Active Applicants (last 24 hours)
        $recentActiveApplicants = Job_Applicants::whereNotIn('applicant_Status', ['REJECTED', 'COMPLETED', 'CANCELLED'])
            ->whereHas('job_posting.barangay', function ($query) {
                $query->where('barangay_id', $this->selectedBar);
            })
            ->where('created_at', '>=', Carbon::now()->subHours(24))
            ->count();

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

        $jobtags_chart = new ColumnChartModel();
        $jobtags_chart->setTitle('JOB TAGS');

        foreach ($topJobPreferences as $jobPreference) {
            // Add each job preference as a column in the chart
            $positionTitle = $jobPreference->job_positions->position_Title ?? 'Unknown'; // Get position_Title, fallback to 'Unknown'
            $totalCount = $jobPreference->total_count;

            $jobtags_chart->addColumn($jobPreference->job_positions->position_Title, $totalCount, '#' . substr(md5(rand()), 0, 6)); // Generate random color for each column
        }

        // Optionally customize chart properties
        $jobtags_chart
            ->setAnimated(true)
            ->setYAxisVisible(true)
            ->setDataLabelsEnabled(true)
            ->setLegendVisibility(true)
            ->setJsonConfig([
                'chart' => [
                    'width' => '100%', // Set to 100% or specify a pixel value like 400, 500, etc.
                    'height' => '300px', // Specify the height for the chart
                ],
                'yaxis.tickAmount' => 1, // Force the x-axis to display whole numbers
                'yaxis.labels.formatter' => '(val) => Math.floor(val)', // Format x-axis labels as whole numbers
            ]);

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

        // Create a column chart model
        $industries_chart = new ColumnChartModel();
        $industries_chart->setTitle('INDUSTRIES');

        // Add each job industry to the chart
        foreach ($topJobIndustries as $industry) {
            $industryTitle = $industry->job_industry->industry_Title ?? 'Unknown'; // Get industry_Title, fallback to 'Unknown'
            $totalCount = $industry->total_count;

            // Generate a random color for each column
            $industries_chart->addColumn($industryTitle, $totalCount, '#' . substr(md5(rand()), 0, 6));
        }

        // Optionally customize chart properties
        $industries_chart
            ->setAnimated(true)
            ->setYAxisVisible(true)
            ->setDataLabelsEnabled(true)
            ->setLegendVisibility(true)
            ->setJsonConfig([
                'chart' => [
                    'width' => '100%', // Set to 100% or specify a pixel value like 400, 500, etc.
                    'height' => '300px', // Specify the height for the chart
                ],
                'yaxis.tickAmount' => 1, // Force the x-axis to display whole numbers
                'yaxis.labels.formatter' => '(val) => Math.floor(val)', // Format x-axis labels as whole numbers
            ]);

        $jobseekers = Employee::where('barangay_id', $this->selectedBar)
            ->withCount(['job_applicants as active_applications' => function ($query) {
                $query->whereNotIn('applicant_Status', ['REJECTED', 'COMPLETED']);
            }])
            ->paginate(10);

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

        // Initialize monthly data with default value of 0 for each month
        $monthlyData = array_fill(1, 12, 0);

        // Populate monthly data with actual counts
        foreach ($monthlyHiredCounts as $month => $data) {
            $monthlyData[$month] = $data->total;
        }

        // Create and configure the line chart model
        $lineChartModel = (new LineChartModel())
            ->setAnimated(true)
            ->withOnPointClickEvent('onPointClick')
            ->setSmoothCurve()
            ->setXAxisVisible(true)
            ->setDataLabelsEnabled(true)
            ->setXAxisCategories(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);

        // Add data points to the line chart
        foreach ($monthlyData as $month => $count) {
            $lineChartModel->addPoint($month, $count, ['month' => $month]);
        }

        $lineChartModel
            ->setJsonConfig([
                'chart' => [
                    'width' => '100%', // Set to 100% or specify a pixel value like 400, 500, etc.
                    'height' => '300px', // Specify the height for the chart
                ],
                'yaxis.tickAmount' => 1, // Force the x-axis to display whole numbers
                'yaxis.labels.formatter' => '(val) => Math.floor(val)', // Format x-axis labels as whole numbers
            ]);

        return view('livewire.admin.reports.barangay-reports',
            compact('barangay',
                'totalJobSeekers',
                'recentJobSeekers',
                'totalEmployed',
                'totalUnemployed',
                'totalActiveApplicants',
                'recentActiveApplicants',
                'jobtags_chart',
                'industries_chart',
                'jobseekers',
                'lineChartModel')
        );
    }
}
