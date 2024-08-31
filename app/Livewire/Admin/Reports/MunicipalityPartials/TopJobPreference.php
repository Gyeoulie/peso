<?php

namespace App\Livewire\Admin\Reports\MunicipalityPartials;

use App\Models\Job_Preference;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TopJobPreference extends Component
{
    public $municipalityID;

    public function getTopJobPreferencesInMunicipality($municipalityId)
    {
        // Fetch the top job preferences within the specified municipality
        $topJobPreferences = Job_Preference::select('position_id', DB::raw('COUNT(*) as total_count'))
            ->whereHas('employee', function ($query) use ($municipalityId) {
                $query->whereHas('barangay', function ($query) use ($municipalityId) {
                    $query->where('municipality_id', $municipalityId);
                });
            })
            ->with('job_positions') // Eager load job_positions relationship
            ->groupBy('position_id')
            ->orderByDesc('total_count')
            ->limit(5)
            ->get();

        // Prepare data for the column chart
        $columnChartModel = new ColumnChartModel();
        // $columnChartModel->setTitle('Top Job Preferences in Municipality ID ' . $municipalityId);

        foreach ($topJobPreferences as $jobPreference) {
            // Add each job preference as a column in the chart
            $positionTitle = $jobPreference->job_positions->position_Title ?? 'Unknown'; // Get position_Title, fallback to 'Unknown'
            $totalCount = $jobPreference->total_count;

            $columnChartModel->addColumn($positionTitle, $totalCount, '#' . substr(md5(rand()), 0, 6)); // Generate random color for each column
        }

        // Optionally customize chart properties
        $columnChartModel
            ->setAnimated(true)
            ->setYAxisVisible(false)
            ->setDataLabelsEnabled(true)
            ->setLegendVisibility(true)
            ->setJsonConfig([
                'chart' => [
                    'width' => '100%',
                    'height' => '300px',
                ],
                'yaxis.tickAmount' => 1,
                'yaxis.labels.formatter' => '(val) => Math.floor(val)',
                'xaxis.labels.show' => false,
            ]); // Adjust column width as neede

        return $columnChartModel;
    }

    public function render()
    {
        $topJobPreference = $this->getTopJobPreferencesInMunicipality($this->municipalityID);

        return view('livewire.admin.reports.municipality-partials.top-job-preference', compact('topJobPreference'));
    }
}
