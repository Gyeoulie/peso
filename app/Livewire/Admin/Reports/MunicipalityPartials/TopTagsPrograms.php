<?php

namespace App\Livewire\Admin\Reports\MunicipalityPartials;

use App\Models\Program_Tags;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TopTagsPrograms extends Component
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

        $this->dispatch('close-modal', 'filter-trainings-tags-modal');
    }

    private function getTopProgramTags($id)
    {
        $query = Program_Tags::select('job_positions.position_Title', DB::raw('COUNT(program_reg.program_reg_id) as total_count'))
            ->join('programs', 'program_tags.program_id', '=', 'programs.program_id')
            ->join('program_reg', 'program_reg.program_id', '=', 'programs.program_id')
            ->join('job_positions', 'program_tags.position_id', '=', 'job_positions.position_id')
            ->where('programs.municipality_id', $id) // Filter programs by municipality_id
            ->groupBy('job_positions.position_Title')
            ->orderBy('total_count', 'desc')
            ->limit(5);

        // Apply year filter if provided
        if (!empty($this->selectedYear)) {
            $query->whereYear('programs.created_at', $this->selectedYear);
        }

        // Apply month filter if provided
        if (!empty($this->selectedMonths) && is_array($this->selectedMonths)) {
            $query->whereIn(DB::raw('MONTH(programs.created_at)'), $this->selectedMonths);
        }

        return $query->get();
    }

    public function createProgramTagsChart($id)
    {
        $topProgramTags = $this->getTopProgramTags($id);

        $columnChartModel = new ColumnChartModel();

        foreach ($topProgramTags as $tag) {
            $columnChartModel->addColumn($tag->position_Title, $tag->total_count, '#' . substr(md5(rand()), 0, 6));
        }

        // Optionally customize chart properties
        $columnChartModel
            ->setAnimated(true)
            ->setXAxisVisible(true)
            ->setDataLabelsEnabled(true)
            ->setLegendVisibility(true)
            ->setColumnWidth(50)
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
            ]); // Adjust column width as needed

        return $columnChartModel;
    }

    public function render()
    {

        $programTagsChart = $this->createProgramTagsChart($this->municipalityID);
        return view('livewire.admin.reports.municipality-partials.top-tags-programs', compact('programTagsChart'));
    }
}
