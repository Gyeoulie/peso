<?php

namespace App\Livewire\Admin\Super\Reports\ProvincePartials;

use App\Models\Municipality;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Livewire\Attributes\On;
use Livewire\Component;

class MunicipalityJobseekers extends Component
{
    public $provinceID;

    #[On('updateProv')]
    public function updateProv($id)
    {
        $this->provinceID = $id;
    }

    public function getMunicipalityChart($provinceId)
    {
        // Retrieve municipalities with their employee counts through the relationship chain
        $municipalities = Municipality::where('province_id', $provinceId)
            ->withCount(['barangay' => function ($query) {
                $query->withCount('employee');
            }])
            ->get()
            ->map(function ($municipality) {
                // Sum up all employees from all barangays in this municipality
                $employeeCount = $municipality->barangay->sum('employees_count');
                return [
                    'name' => $municipality->municipality_Name,
                    'count' => $employeeCount,
                ];
            });

        // Calculate the total count of employees
        $totalEmployees = $municipalities->sum('count');

        // Create a pie chart model
        $municipalityChartModel = new PieChartModel();

        // Add each municipality to the pie chart
        foreach ($municipalities as $municipality) {
            if ($municipality['count'] > 0) {
                // Generate a random color for each municipality
                $randomColor = '#' . substr(md5(rand()), 0, 6);

                $municipalityChartModel->addSlice(
                    $municipality['name'],
                    $municipality['count'],
                    $randomColor
                );
            }
        }

        $municipalityChartModel->setTitle('Number of Job Seekers per Municipality')
            ->setAnimated(true)
            ->setType('pie')
            ->withOnSliceClickEvent('onSliceClick')
            ->withoutLegend()
            ->setDataLabelsEnabled(true)
            ->setJsonConfig([
                'chart' => [
                    'width' => '100%',
                    'height' => '300px',
                ],
                'plotOptions' => [
                    'pie' => [
                        'dataLabels' => [
                            'offset' => -15,
                            'style' => [
                                'fontSize' => '16px',
                                'fontFamily' => 'Helvetica, Arial, sans-serif',
                                'fontWeight' => 'bold',
                                'colors' => ['#FFFFFF'],
                                'textAlign' => 'center',
                            ],
                        ],
                    ],
                ],
                'dataLabels' => [
                    'style' => [
                        'fontSize' => '16px',
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

        return $municipalityChartModel;
    }
    public function render()
    {
        $municipalityChartModel = $this->getMunicipalityChart($this->provinceID);
        return view('livewire.admin.super.reports.province-partials.municipality-jobseekers', compact('municipalityChartModel'));
    }
}
