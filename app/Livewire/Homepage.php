<?php

namespace App\Livewire;

use App\Models\Announcements;
use App\Models\Job_Positions;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Livewire\Component;

class Homepage extends Component
{

    public function getTopJobOpenings()
    {

        $jobPositions = Job_Positions::whereHas('job_tags.job_posting', function ($query) {
            // Ensure job postings are ACTIVE
            $query->where('job_Status', 'ACTIVE');
        })
        // Count active job postings associated with each position
            ->withCount(['job_tags as active_job_posting_count' => function ($query) {
                $query->whereHas('job_posting', function ($subQuery){
                    $subQuery->where('job_Status', 'ACTIVE'); // Count only active postings
                        
                });
            }])
            ->orderBy('active_job_posting_count', 'desc') // Order by count of active job postings
            ->take(5) // Limit to top 5 positions
            ->get();




        // Prepare data for the column chart
        $columnChartModel = new ColumnChartModel();
        // $columnChartModel->setTitle('Top Job Tags for Municipality ID ' . $municipalityId);

        foreach ($jobPositions as $tagName) {
            $columnChartModel->addColumn($tagName->position_Title, $tagName->active_job_posting_count, '#' . substr(md5(rand()), 0, 6)); // Generate random color for each column
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

                ],
                'yaxis.tickAmount' => 1,
                'yaxis.labels.formatter' => '(val) => Math.floor(val)',
                'xaxis.labels.show' => false,
            ]);
        // dd($columnChartModel);
        return $columnChartModel;
    }

    public function render()
    {
        $announ = Announcements::orderBy('created_at', 'desc')
        ->where('announcement_Status', 'ACTIVE')
        ->limit(5)
        ->get();

        $chartn = $this->getTopJobOpenings();

        return view('livewire.homepage', compact('announ', 'chartn'));
    }
}

