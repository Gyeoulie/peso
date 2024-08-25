<?php

namespace App\Livewire\Admin;

use App\Models\Employee;
use App\Models\Job_Applicants;
use App\Models\Job_Industry;
use App\Models\Job_Posting;
use App\Models\Job_Preference;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Dashboard extends Component
{
    protected $listeners = ['qrCodeScanned' => 'qrCodeScanned', 'scanQRCode' => 'addQRProduct'];

    public function render()
    {

        $user = auth()->user(); // Assuming you are fetching the current authenticated user

        // Get the current user's municipality ID from PESO relation
        $pesoMunicipalityId = optional($user->peso)->municipality_id;

        $totalJobPostings = Job_Posting::where('peso_municipality_id', $pesoMunicipalityId)->count();
        $recentJobPostings = Job_Posting::where('peso_municipality_id', $pesoMunicipalityId)
            ->where('created_at', '>=', Carbon::now()->subHours(24))
            ->count();

        $totalJobSeekers = Employee::whereHas('barangay.municipality', function ($query) use ($pesoMunicipalityId) {
            $query->where('municipality_id', $pesoMunicipalityId);
        })
            ->count();
        $recentJobSeekers = Employee::whereHas('barangay.municipality', function ($query) use ($pesoMunicipalityId) {
            $query->where('municipality_id', $pesoMunicipalityId);
        })
            ->where('created_at', '>=', Carbon::now()->subHours(24))
            ->count();

        $totalEmployed = Employee::where('empstatus', '=', 1)
            ->whereHas('barangay.municipality', function ($query) use ($pesoMunicipalityId) {
                $query->where('municipality_id', $pesoMunicipalityId);
            })
            ->count();
        $totalUnemployed = Employee::where('empstatus', '=', 2)
            ->whereHas('barangay.municipality', function ($query) use ($pesoMunicipalityId) {
                $query->where('municipality_id', $pesoMunicipalityId);
            })
            ->count();
        $totalActiveApplicants = Job_Applicants::whereNotIn('applicant_Status', ['REJECTED', 'COMPLETED', 'CANCELLED'])
            ->whereHas('job_posting.barangay.municipality', function ($query) use ($pesoMunicipalityId) {
                $query->where('municipality_id', $pesoMunicipalityId);
            })
            ->count();

        $recentActiveApplicants = Job_Applicants::whereNotIn('applicant_Status', ['REJECTED', 'COMPLETED', 'CANCELLED'])
            ->whereHas('job_posting.barangay.municipality', function ($query) use ($pesoMunicipalityId) {
                $query->where('municipality_id', $pesoMunicipalityId);
            })
            ->where('created_at', '>=', Carbon::now()->subHours(24))
            ->count();

        $recentJobPost = Job_Posting::where('peso_municipality_id', $pesoMunicipalityId)
            ->orderByDesc('created_at') // Optionally, order by created_at descending
            ->take(5) // Limit to 5 records
            ->get();

        $recentApplicants = Job_Applicants::with('job_posting', 'job_posting.municipality')
            ->whereHas('job_posting.municipality', function ($query) use ($pesoMunicipalityId) {
                $query->where('municipality_id', $pesoMunicipalityId);
            })
            ->where('peso_Status', 'PENDING')
            ->orderByDesc('created_at') // Optionally, order by created_at descending
            ->take(5) // Limit to 5 records
            ->get();

        $recentJobPost = Job_Posting::where('peso_municipality_id', $pesoMunicipalityId)
            ->orderByDesc('created_at') // Optionally, order by created_at descending
            ->take(5) // Limit to 5 records
            ->get();

        $topJobPreferences = Job_Preference::select('position_id', DB::raw('COUNT(*) as total_count'))
            ->with('job_positions') // Eager load job_positions relationship
            ->groupBy('position_id')
            ->orderByDesc('total_count')
            ->limit(5)
            ->get();

        // Prepare data for the column chart
        $columnChartModel = new ColumnChartModel();
        $columnChartModel->setTitle('Most Job Preferences');

        foreach ($topJobPreferences as $jobPreference) {
            // Add each job preference as a column in the chart
            $positionTitle = $jobPreference->job_positions->position_Title ?? 'Unknown'; // Get position_Title, fallback to 'Unknown'
            $totalCount = $jobPreference->total_count;

            $columnChartModel->addColumn($jobPreference->job_positions->position_Title, $totalCount, '#' . substr(md5(rand()), 0, 6)); // Generate random color for each column
        }

        // Optionally customize chart properties
        $columnChartModel
            ->setAnimated(true)
            ->setXAxisVisible(true)
            ->setDataLabelsEnabled(true)
            ->setLegendVisibility(false)
            ->setColumnWidth(50); // Adjust column width as needed
// Adjust column width as needed

        $topJobIndustries = Job_Posting::select('industry_id', DB::raw('COUNT(*) as total_count'))
            ->groupBy('industry_id')
            ->orderByDesc('total_count')
            ->limit(5)
            ->get();

// Fetch the industry names
        $industryNames = Job_Industry::whereIn('industry_id', $topJobIndustries->pluck('industry_id'))->pluck('industry_Title', 'industry_id');

// Calculate the count for the other job industries
        $otherCount = Job_Posting::whereNotIn('industry_id', $topJobIndustries->pluck('industry_id'))->count();

// Create a pie chart model
        $pieChartModel = new PieChartModel();

// Add top 5 industries to the pie chart
        foreach ($topJobIndustries as $industry) {
            $pieChartModel->addSlice(
                $industryNames[$industry->industry_id],
                $industry->total_count,
                $this->colors[$industry->industry_id] ?? '#' . substr(md5(rand()), 0, 6) // Use a default color if not set
            );
        }

// Add 'Others' to the pie chart if there are any remaining job postings
        if ($otherCount > 0) {
            $pieChartModel->addSlice('Others', $otherCount, '#' . substr(md5(rand()), 0, 6));
        }

// Customize the pie chart model
        $pieChartModel->setAnimated(true)
            ->setType('pie')
            ->withOnSliceClickEvent('onSliceClick')
            ->legendPositionBottom()
            ->legendHorizontallyAlignedCenter()
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
                    'height' => '400px', // Specify the height for the chart
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
                'legend' => [
                    'position' => 'bottom', // 'top', 'bottom', 'left', 'right'
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
                    'markers' => [
                        'width' => 10, // Width of legend markers
                        'height' => 10, // Height of legend markers
                        'strokeWidth' => 0, // Stroke width
                        'strokeColor' => '#000000', // Stroke color
                        'fillColors' => ['#FFFFFF'], // Fill color for markers
                    ],
                ],
            ]);

        return view('livewire.admin.dashboard', compact('totalJobPostings', 'recentJobPostings', 'totalJobSeekers', 'recentJobSeekers', 'totalEmployed', 'totalUnemployed', 'totalActiveApplicants', 'recentActiveApplicants', 'recentJobPost', 'columnChartModel', 'pieChartModel', 'recentApplicants'));
    }
}
