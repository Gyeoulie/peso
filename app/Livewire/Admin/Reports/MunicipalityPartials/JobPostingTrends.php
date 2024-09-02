<?php

namespace App\Livewire\Admin\Reports\MunicipalityPartials;

use App\Models\Job_Posting;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class JobPostingTrends extends Component
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

        $this->dispatch('close-modal', 'filter-employment-trends-modal');
    }
    public function getJobPostingsTrend($municipalityId)
    {
        // Use the provided year or default to the current year
        $year = $this->selectedYear ?? Carbon::now()->year;

        // Use the provided months or default to all months (1 through 12)
        $months = !empty($this->selectedMonths) ? $this->selectedMonths : range(1, 12);

        // Fetch the job postings with relevant data
        $query = Job_Posting::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereHas('peso.municipality', function ($query) use ($municipalityId) {
                $query->where('municipality_id', $municipalityId);
            });

        // Apply year filter if selectedYear is set
        if ($this->selectedYear) {
            $query->whereYear('created_at', $year);
        }

        // Apply months filter if selectedMonths is set
        if (!empty($this->selectedMonths)) {
            $query->whereIn(DB::raw('MONTH(created_at)'), $months);
        }

        $monthlyPostings = $query->groupByRaw('MONTH(created_at)')
            ->orderByRaw('MONTH(created_at)')
            ->get()
            ->keyBy('month');

        // Define month names
        $monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $monthlyData = array_fill(0, count($monthNames), 0); // Initialize array with months

        // Populate the counts
        foreach ($monthlyPostings as $month => $data) {
            if (in_array($month, $months)) {
                $index = $month - 1; // Adjust index for zero-based array
                $monthlyData[$index] = $data->total;
            }
        }

        // Create the line chart model
        $chart = LivewireCharts::lineChartModel()
            ->setTitle("Monthly Job Postings for Municipality ID {$municipalityId} in {$year}")
            ->setAnimated(true)
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
        foreach ($monthNames as $index => $monthName) {
            if (in_array($index + 1, $months)) { // Ensure only selected months are included
                $chart->addPoint($monthName, $monthlyData[$index]);
            }
        }

        return $chart;
    }

    public function render()
    {

        $jobPostingTrend = $this->getJobPostingsTrend($this->municipalityID);

        return view('livewire.admin.reports.municipality-partials.job-posting-trends', compact('jobPostingTrend'));
    }
}
