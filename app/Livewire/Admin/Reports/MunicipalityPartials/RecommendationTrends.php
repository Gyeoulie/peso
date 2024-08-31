<?php

namespace App\Livewire\Admin\Reports\MunicipalityPartials;

use App\Models\Job_Applicants;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RecommendationTrends extends Component
{

    public $startYear, $currentYear;

    public $selectedMonths = [], $selectedYear;
    public $mountSelectedMonths = [], $mountSelectedYear;
    public $municipalityID;

    public function mount()
    {
        $this->startYear = 2024;
        $this->currentYear = date('Y');

    }

    public function resetFilter()
    {
        $this->reset('mountSelectedMonths', 'mountSelectedYear', 'selectedMonths', 'selectedYear');

    }

    public function mountFilter()
    {

        $this->selectedMonths = $this->mountSelectedMonths;
        $this->selectedYear = $this->mountSelectedYear;

        $this->dispatch('close-modal', 'filter-recommendation-trends-modal');
    }

    public function getRecommendationTrends($pesoMunicipalityId)
    {
        // Use the provided year or default to $this->currentYear
        $year = $this->selectedYear ?? $this->currentYear;

        // Use the provided months or default to all months (1 through 12)
        $months = !empty($this->selectedMonths) ? $this->selectedMonths : range(1, 12);

        // Fetch the job applicants with relevant data
        $query = Job_Applicants::whereHas('employee', function ($query) use ($pesoMunicipalityId) {
            $query->whereHas('barangay', function ($query) use ($pesoMunicipalityId) {
                $query->where('municipality_id', $pesoMunicipalityId);
            });
        })
            ->whereNotNull('responded_at')
            ->selectRaw('MONTH(responded_at) as month, peso_Status, COUNT(*) as count')
            ->groupBy('month', 'peso_Status')
            ->orderBy('month');

        // Apply year filter if selectedYear is set
        if ($this->selectedYear) {
            $query->whereYear('responded_at', $year);
        }

        // Apply months filter if selectedMonths is set
        if (!empty($this->selectedMonths)) {
            $query->whereIn(DB::raw('MONTH(responded_at)'), $months);
        }

        $jobApplicants = $query->get();

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

    public function render()
    {

        $recommendedLineModel = $this->getRecommendationTrends($this->municipalityID);

        return view('livewire.admin.reports.municipality-partials.recommendation-trends', compact('recommendedLineModel'));
    }
}
