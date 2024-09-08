<?php

namespace App\Livewire\Admin\Reports\MunicipalityPartials;

use App\Models\Employee;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class EmploymentAgeGroup extends Component
{

    public $municipalityID;

    #[On('updateMun')]
    public function updateMun($id)
    {
        $this->municipalityID = $id;
    }

    public function getEmploymentByAgeGroup($municipalityId)
    {
        $ageGroups = [
            '18-19' => [18, 19],
            '20-29' => [20, 29],
            '30-39' => [30, 39],
            '40-49' => [40, 49],
            '50-59' => [50, 59],
            '60-69' => [60, 69],
            '70+' => [70, 150], // Adjust the upper limit as needed
        ];

        $employedCounts = [];
        $unemployedCounts = [];

        foreach ($ageGroups as $label => $range) {
            [$minAge, $maxAge] = $range;

            $employedCount = Employee::whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, birthdate, CURDATE())'), [$minAge, $maxAge])
                ->where('empStatus', 1)
                ->whereHas('barangay', function ($query) use ($municipalityId) {
                    $query->where('municipality_id', $municipalityId);
                })
                ->count();

            $unemployedCount = Employee::whereBetween(DB::raw('TIMESTAMPDIFF(YEAR, birthdate, CURDATE())'), [$minAge, $maxAge])
                ->where('empStatus', 2)
                ->whereHas('barangay', function ($query) use ($municipalityId) {
                    $query->where('municipality_id', $municipalityId);
                })
                ->count();

            $employedCounts[$label] = $employedCount;
            $unemployedCounts[$label] = $unemployedCount;
        }

        $columnChartModel = LivewireCharts::multiColumnChartModel()
            ->setTitle('Employment by Age Group')
            ->setAnimated(true)
        // ->withOnPointClickEvent('onPointClick')
            ->setSmoothCurve()
            ->setXAxisVisible(true)
            ->setDataLabelsEnabled(true)
            ->setXAxisCategories(array_keys($ageGroups))
            ->setJsonConfig([
                'chart' => [
                    'width' => '100%',
                    'height' => '300px',
                ],
                'yaxis.tickAmount' => 1,
                'yaxis.labels.formatter' => '(val) => Math.floor(val)',
            ]);

        foreach ($employedCounts as $ageGroup => $count) {
            $columnChartModel->addSeriesColumn('Employed', $ageGroup, $count);
        }

        foreach ($unemployedCounts as $ageGroup => $count) {
            $columnChartModel->addSeriesColumn('Unemployed', $ageGroup, $count);
        }

        return $columnChartModel;
    }
    public function render()
    {
        $employmentAgeGroup = $this->getEmploymentByAgeGroup($this->municipalityID);

        return view('livewire.admin.reports.municipality-partials.employment-age-group', compact('employmentAgeGroup'));
    }
}
