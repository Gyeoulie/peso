<?php

namespace App\Livewire\Admin\Reports\MunicipalityPartials;

use App\Models\Program_Reg;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProgramRegistrantsTrends extends Component
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

    public function getAreaProgramRegistrationsTrend($municipalityId)
    {
        // Use the provided year or default to the current year
        $year = $this->selectedYear ?? Carbon::now()->year;

        // Use the provided months or default to all months (1 through 12)
        $months = !empty($this->selectedMonths) ? $this->selectedMonths : range(1, 12);

        // Fetch the registrations data from the program_reg table
        $query = Program_Reg::selectRaw('MONTH(program_reg.created_at) as month, COUNT(*) as total')
            ->join('programs', 'program_reg.program_id', '=', 'programs.program_id')
            ->where('programs.municipality_id', $municipalityId)
            ->groupByRaw('MONTH(program_reg.created_at)')
            ->orderByRaw('MONTH(program_reg.created_at)');

        // Apply year filter if selectedYear is set
        if ($this->selectedYear) {
            $query->whereYear('program_reg.created_at', $year);
        }

        // Apply months filter if selectedMonths is set
        if (!empty($this->selectedMonths)) {
            $query->whereIn(DB::raw('MONTH(program_reg.created_at)'), $months);
        }

        $monthlyData = $query->get()
            ->keyBy('month');

        // Define month names
        $monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $data = array_fill(0, count($monthNames), 0); // Initialize array with months

        // Populate the counts
        foreach ($monthlyData as $month => $dataEntry) {
            if (in_array($month, $months)) {
                $index = $month - 1; // Adjust index for zero-based array
                $data[$index] = $dataEntry->total;
            }
        }

        // Create the area chart model
        $chart = LivewireCharts::areaChartModel()
        // ->setTitle("Monthly Program Registrations for Municipality ID {$municipalityId} in {$year}")
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
                'xaxis' => [
                    'categories' => $monthNames,
                ],
                'dataLabels' => [
                    'enabled' => true,
                ],
                'stroke' => [
                    'curve' => 'smooth',
                ],
                'fill' => [
                    'opacity' => 0.3, // Adjust the fill opacity
                ],
            ]);

        // Add points to the chart for program registrations
        foreach ($monthNames as $index => $monthName) {
            if (in_array($index + 1, $months)) { // Ensure only selected months are included
                $chart->addPoint($monthName, $data[$index]);
            }
        }

        return $chart;
    }
    public function render()
    {
        $programRegistrants = $this->getAreaProgramRegistrationsTrend($this->municipalityID);

        return view('livewire.admin.reports.municipality-partials.program-registrants-trends', compact('programRegistrants'));
    }
}
