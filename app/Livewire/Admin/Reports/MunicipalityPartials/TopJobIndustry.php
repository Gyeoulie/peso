<?php

namespace App\Livewire\Admin\Reports\MunicipalityPartials;

use App\Models\Job_Posting;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TopJobIndustry extends Component
{
    public $municipalityID;
    public function getTopJobIndustriesDonut($municipalityId)
    {
        // Fetch the top job industries directly from Job_Posting with a join to Job_Industry
        $topIndustries = Job_Posting::select('job_industry.industry_Title', DB::raw('COUNT(job_posting.industry_id) as total_count'))
            ->join('job_industry', 'job_posting.industry_id', '=', 'job_industry.industry_id') // Join Job_Industry
            ->where('job_posting.job_Status', 'ACTIVE')
            ->where('job_posting.peso_municipality_id', $municipalityId)
            ->groupBy('job_industry.industry_Title')
            ->orderByDesc('total_count')
            ->limit(5)
            ->get();

        // Calculate the total count of all active job postings for the given municipality
        $totalCount = Job_Posting::where('job_Status', 'ACTIVE')
            ->where('peso_municipality_id', $municipalityId)
            ->count();

        // Calculate the total count of the top industries
        $topIndustryCount = $topIndustries->sum('total_count');

        // Calculate "Others" count
        $otherCount = $totalCount - $topIndustryCount;

        // Prepare data for the donut chart
        $donutChartModel = LivewireCharts::pieChartModel()
        // ->setTitle('Top Job Industries for Active Postings in Municipality ID ' . $municipalityId)
            ->setAnimated(true)
            ->asDonut()
            ->setDataLabelsEnabled(true)
            ->setJsonConfig([
                'chart' => [
                    'type' => 'donut',
                    'height' => '300px',
                ],
                'plotOptions' => [
                    'pie' => [
                        'donut' => [
                            'size' => '40%',
                        ],
                    ],
                ],
                'dataLabels' => [
                    'enabled' => true,
                ],
                'legend' => [
                    'show' => true,
                ],
            ]);

        // Add slices to the chart
        foreach ($topIndustries as $industry) {
            $donutChartModel->addSlice($industry->industry_Title, $industry->total_count, '#' . substr(md5(rand()), 0, 6)); // Generate random color for each slice
        }

        // Add "Others" category to the chart if there are any
        if ($otherCount > 0) {
            $donutChartModel->addSlice('Others', $otherCount, '#' . substr(md5(rand()), 0, 6)); // Generate random color for "Others"
        }

        return $donutChartModel;
    }
    public function render()
    {
        $topJobIndustries = $this->getTopJobIndustriesDonut($this->municipalityID);

        return view('livewire.admin.reports.municipality-partials.top-job-industry', compact('topJobIndustries'));
    }
}
