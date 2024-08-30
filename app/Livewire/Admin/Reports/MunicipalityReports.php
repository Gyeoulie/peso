<?php

namespace App\Livewire\Admin\Reports;

use App\Helpers\AuditFormatter;
use App\Models\Barangay;
use App\Models\Job_Applicants;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use OwenIt\Auditing\Models\Audit;

#[Layout('layouts.admin')]
class MunicipalityReports extends Component
{

    use WithPagination, WithoutUrlPagination;

    public $currentYear = 2024;
    public $modelFilter;
    public $perPage = 10;
    public $selectedMonths = []; // Default to all months if empty

    public function getBarangayChart($id)
    {
        $barangays = Barangay::where('municipality_id', $id)
            ->withCount('employee') // Ensure this relationship exists
            ->get();

        // Calculate the total count of residents across all barangays
        $totalResidents = $barangays->sum('employee_count');

        // Create a pie chart model
        $barangayChartModel = new PieChartModel();

        // Add each barangay to the pie chart
        foreach ($barangays as $barangay) {
            $barangayChartModel->addSlice(
                $barangay->barangay_Name,
                $barangay->employee_count,
                $this->colors[$barangay->barangay_id] ?? '#' . substr(md5(rand()), 0, 6) // Use a default color if not set
            );
        }

        // Optionally add a slice for 'Others' if there are remaining residents
        if ($totalResidents > 0) {
            $otherCount = 0; // You can define logic for counting 'Others' if needed
            if ($otherCount > 0) {
                $barangayChartModel->addSlice('Others', $otherCount, '#' . substr(md5(rand()), 0, 6));
            }
        }

        $barangayChartModel->setTitle('Number of Job Seekers per Barangay')
            ->setAnimated(true)
            ->setType('pie')
            ->withOnSliceClickEvent('onSliceClick')
            ->withoutLegend()
            ->setDataLabelsEnabled(true)
            ->setColors([
                '#' . substr(md5(rand()), 0, 6),
                '#' . substr(md5(rand()), 0, 6),
                '#' . substr(md5(rand()), 0, 6),
                '#' . substr(md5(rand()), 0, 6),
                '#' . substr(md5(rand()), 0, 6),
            ])
            ->setJsonConfig([
                'chart' => [
                    'width' => '100%', // Set to 100% or specify a pixel value like 400, 500, etc.
                    'height' => '300px', // Specify the height for the chart
                ],
                'plotOptions' => [
                    'pie' => [
                        'dataLabels' => [
                            'offset' => -15, // Adjust this to center the labels vertically
                            'style' => [
                                'fontSize' => '16px', // Corrected from '16x' to '16px'
                                'fontFamily' => 'Helvetica, Arial, sans-serif',
                                'fontWeight' => 'bold',
                                'colors' => ['#FFFFFF'], // Set text color
                                'textAlign' => 'center', // Align text in the center of each slice
                            ],
                        ],
                    ],
                ],
                'dataLabels' => [
                    'style' => [
                        'fontSize' => '16px', // Adjust font size for data labels
                        'fontWeight' => 'bold',
                    ],
                    'dropShadow' => [
                        'enabled' => true,
                        'top' => 1,
                        'left' => 1,
                        'blur' => 1,
                        'color' => '#000000',
                        'opacity' => 0.5,
                    ],
                ],

            ]);

        return $barangayChartModel;
    }

    public function getRecommendationTrends($pesoMunicipalityId, $year = 2024, $months = [])
    {
        // Use the provided year or default to $this->currentYear
        $year = $year ?? $this->currentYear;

        // Use the provided months or default to all months (1 through 12)
        $months = !empty($months) ? $months : range(1, 12);

        // Fetch the job applicants with relevant data
        $jobApplicants = Job_Applicants::whereHas('employee', function ($query) use ($pesoMunicipalityId) {
            $query->whereHas('barangay', function ($query) use ($pesoMunicipalityId) {
                $query->where('municipality_id', $pesoMunicipalityId);
            });
        })
            ->whereYear('responded_at', $year) // Filter by the selected year
            ->whereIn(DB::raw('MONTH(responded_at)'), $months) // Filter by the selected months
            ->whereNotNull('responded_at')
            ->selectRaw('MONTH(responded_at) as month, peso_Status, COUNT(*) as count')
            ->groupBy('month', 'peso_Status')
            ->orderBy('month')
            ->get();

        // Initialize arrays for months and counts
        $monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $recommended = array_fill(0, 12, 0); // Initialize array with months
        $notRecommended = array_fill(0, 12, 0); // Same for not recommended

        // Populate the counts
        foreach ($jobApplicants as $applicant) {
            $index = $applicant->month - 1; // Adjust index for zero-based array
            if ($applicant->peso_Status == 'RECOMMENDED') {
                $recommended[$index] = $applicant->count;
            } else {
                $notRecommended[$index] = $applicant->count;
            }
        }

        // Create the multi-line chart model
        $multiLineChartModel = LivewireCharts::multiLineChartModel()
            ->setTitle("Monthly Job Applicant Recommendations for {$year}")
            ->setAnimated(true)
            ->multiLine() // Ensures that the chart is a multi-line chart
            ->setSmoothCurve() // Smooth the curves
            ->setDataLabelsEnabled(true) // Display data labels
            ->setColors(['#00FF00', '#FF0000']); // Green for RECOMMENDED, Red for NOT RECOMMENDED

        // Add data points for each selected month
        foreach ($monthNames as $index => $monthName) {
            if (in_array($index + 1, $months)) { // Ensure only selected months are included
                $multiLineChartModel
                    ->addSeriesPoint('RECOMMENDED', $monthName, $recommended[$index])
                    ->addSeriesPoint('NOT RECOMMENDED', $monthName, $notRecommended[$index]);
            }
        }

        return $multiLineChartModel
            ->setAnimated(true)
            ->setYAxisVisible(true)
            ->setDataLabelsEnabled(true)
            ->setJsonConfig([
                'chart' => [
                    'width' => '100%',
                    'height' => '300px',
                ],
                'yaxis.tickAmount' => 1,
                'yaxis.labels.formatter' => '(val) => Math.floor(val)',
                'legend' => [
                    'position' => 'top', // 'top', 'bottom', 'left', 'right'
                    'horizontalAlign' => 'center', // Align horizontally at the center
                    'verticalAlign' => 'middle', // Align vertically at the middle
                    'fontSize' => '14px', // Font size
                    'fontFamily' => 'Helvetica, Arial, sans-serif', // Font family
                    'fontWeight' => 'normal', // Font weight (normal, bold, etc.)
                    'labels' => [
                        'colors' => '#333333', // Legend text color
                        'useSeriesColors' => true, // Use series colors for legend labels
                        'formatter' => '(val) => val.toUpperCase()', // Formatter function to modify label text
                    ],
                ],
            ]);
    }

    public function getEmploymentTrends($pesoMunicipalityId, $selectedYear = null, $selectedMonths = [])
    {
        $year = $selectedYear ?: Carbon::now()->year;

        $query = Job_Applicants::selectRaw('MONTH(updated_at) as month, COUNT(*) as total')
            ->where('applicant_Status', 'PENDING')
            ->whereHas('employee', function ($query) use ($pesoMunicipalityId) {
                $query->whereHas('barangay', function ($query) use ($pesoMunicipalityId) {
                    $query->where('municipality_id', $pesoMunicipalityId);
                });
            })
            ->whereYear('created_at', $year);

        if (!empty($selectedMonths)) {
            // Filter by the selected months
            $query->whereIn(DB::raw('MONTH(updated_at)'), $selectedMonths);
        }

        $monthlyHiredCounts = $query->groupByRaw('MONTH(updated_at)')
            ->orderByRaw('MONTH(updated_at)')
            ->get()
            ->keyBy('month');

        // Determine the categories for the X-axis based on the selected months or default to all months
        if (!empty($selectedMonths)) {
            $monthNames = array_map(function ($month) {
                return Carbon::create()->month($month)->format('M');
            }, $selectedMonths);
            $monthlyData = array_fill(0, count($selectedMonths), 0);
        } else {
            $monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            $monthlyData = array_fill(0, 12, 0); // Ensure correct indexing
        }

        // Populate the data
        foreach ($monthlyHiredCounts as $month => $data) {
            if (!empty($selectedMonths)) {
                $index = array_search($month, $selectedMonths);
                if ($index !== false) {
                    $monthlyData[$index] = $data->total;
                }
            } else {
                $monthlyData[$month - 1] = $data->total; // Adjust index for all months
            }
        }

        $chart = new LineChartModel();
        $chart->setAnimated(true)
            ->setTitle("Monthly Employment for {$year}")
            ->withOnPointClickEvent('onPointClick')
            ->setSmoothCurve()
            ->setXAxisVisible(true)
            ->setDataLabelsEnabled(true)
            ->setXAxisCategories($monthNames)
            ->setJsonConfig([
                'chart' => [
                    'width' => '100%',
                    'height' => '300px',
                ],
                'yaxis.tickAmount' => 1,
                'yaxis.labels.formatter' => '(val) => Math.floor(val)',
            ]);

        // Add points to the chart
        foreach ($monthlyData as $index => $count) {
            $chart->addPoint($monthNames[$index], $count, ['month' => $selectedMonths[$index] ?? ($index + 1)]);
        }

        return $chart;
    }
    public function render()
    {

        $user = auth()->user();
        $pesoMunicipalityId = optional($user->peso)->municipality_id;

        $barangayChartModel = $this->getBarangayChart($pesoMunicipalityId);
        $recommendedLineModel = $this->getRecommendationTrends($pesoMunicipalityId);
        $employmentLineModel = $this->getEmploymentTrends($pesoMunicipalityId);

        $audits = Audit::when($this->modelFilter, function ($query) {
            $query->where('auditable_type', $this->modelFilter);
        })
            ->latest()
            ->paginate($this->perPage);

        // Format each audit entry
        $municipalityId = 1;
        $audits = Audit::whereHas('user.employee.barangay.municipality', function ($query) use ($municipalityId) {
            $query->where('municipality_id', $municipalityId);
        })
            ->latest()
            ->paginate(5); // Adjust the number of items per page as needed
        // Adjust the number of items per page as needed

        // Format each audit entry
        $formattedAudits = $audits->map(function ($audit) {
            return AuditFormatter::format($audit);
        });

        // dd($formattedAudits);

        return view('livewire.admin.reports.municipality-reports', compact('barangayChartModel', 'recommendedLineModel', 'employmentLineModel', 'formattedAudits', 'audits'));
    }
}
