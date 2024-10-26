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
        // Retrieve municipalities for the given province and their job seeker counts
        $municipalities = Municipality::where('province_id', $provinceId)
            ->withCount(['barangay as job_seeker_count' => function ($query) {
                $query->withCount('employee'); // Count employees in each barangay
            }])
            ->get();

        // Calculate the total count of job seekers across all municipalities
        $totalJobSeekers = $municipalities->sum('job_seeker_count');

        // Create a pie chart model
        $municipalityChartModel = new PieChartModel();

        // Add each municipality to the pie chart
        foreach ($municipalities as $municipality) {
            // Generate a random color for each municipality
            $randomColor = '#' . substr(md5(rand()), 0, 6);

            $municipalityChartModel->addSlice(
                $municipality->municipality_Name,
                $municipality->job_seeker_count,
                $randomColor // Use the random color for each municipality
            );
        }

        // Optionally add a slice for 'Others' if there are remaining job seekers
        if ($totalJobSeekers > 0) {
            $otherCount = 0; // Logic for counting 'Others' can be defined if needed
            if ($otherCount > 0) {
                $municipalityChartModel->addSlice('Others', $otherCount, '#' . substr(md5(rand()), 0, 6)); // Random color for 'Others'
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
                    'width' => '100%', // Set to 100% or specify a pixel value like 400, 500, etc.
                    'height' => '300px', // Specify the height for the chart
                ],
                'plotOptions' => [
                    'pie' => [
                        'dataLabels' => [
                            'offset' => -15, // Adjust this to center the labels vertically
                            'style' => [
                                'fontSize' => '16px',
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

        return $municipalityChartModel;
    }

    public function render()
    {
        $municipalityChartModel = $this->getMunicipalityChart($this->provinceID);
        return view('livewire.admin.super.reports.province-partials.municipality-jobseekers', compact('municipalityChartModel'));
    }
}
