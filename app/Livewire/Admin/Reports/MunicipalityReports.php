<?php

namespace App\Livewire\Admin\Reports;

use App\Helpers\AuditFormatter;
use App\Models\Job_Applicants;
use App\Models\Job_Posting;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\AreaChartModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use OwenIt\Auditing\Models\Audit;

#[Layout('layouts.admin')]
class MunicipalityReports extends Component
{

    use WithPagination, WithoutUrlPagination;
    public $selectedAnalytics;
    public $currentYear = 2024;
    public $modelFilter;
    public $perPage = 10;
    public $selectedYear; // Default to all months if empty

    public $selectedMonths = []; // Default to all months if empty

    public function updateAnalytics($id)
    {
        $this->selectedAnalytics = $id;
    }

    public function mount()
    {
        $this->selectedAnalytics = 1;
    }

    public function getTotalJobSlots($municipalityId)
    {
        // Get total number of job slots for the given municipality
        $totalJobSlots = Job_Posting::where('peso_municipality_id', $municipalityId)
            ->where('job_Status', 'ACTIVE')
            ->sum('job_Slots'); // Sum up all job slots for the municipality

        // Get the total number of hired applicants for the given municipality
        $hiredApplicantsCount = Job_Applicants::join('job_posting', 'job_posting.job_id', '=', 'job_applicants.job_id')
            ->where('job_posting.peso_municipality_id', $municipalityId)
            ->whereIn('job_applicants.applicant_status', ['HIRED', 'COMPLETED'])
            ->count();

        // Calculate the remaining slots
        $remainingSlots = max($totalJobSlots - $hiredApplicantsCount, 0);

        return [
            'total_job_slots' => $totalJobSlots,
            'remaining_slots' => $remainingSlots,
        ];
    }

    public function getJobPosting($id)
    {
        return Job_Posting::where('peso_municipality_id', $id)
            ->where('job_Status', 'ACTIVE')->count();

    }

    public function getRecentJobPosting($id)
    {
        return Job_Posting::where('peso_municipality_id', $id)
            ->where('job_Status', 'ACTIVE')
            ->where('created_at', '>=', Carbon::now()->subHours(24))
            ->count();
    }
    private function getActiveApplicantCount($municipalityId)
    {
        return Job_Applicants::whereNotIn('applicant_Status', ['REJECTED', 'COMPLETED', 'CANCELLED'])
            ->whereHas('employee.barangay.municipality', function ($query) use ($municipalityId) {
                $query->where('municipality_id', $municipalityId);
            })
            ->count();
    }

    private function getRecentActiveApplicantCount($municipalityId)
    {
        return Job_Applicants::whereNotIn('applicant_Status', ['REJECTED', 'COMPLETED', 'CANCELLED'])
            ->whereHas('job_posting.barangay.municipality', function ($query) use ($municipalityId) {
                $query->where('municipality_id', $municipalityId);
            })
            ->where('created_at', '>=', Carbon::now()->subHours(24))
            ->count();
    }

    public function getAreaJobPostingsTrend($municipalityId)
    {
        // Use the provided year or default to the current year
        $year = $this->selectedYear ?? Carbon::now()->year;

        // Use the provided months or default to all months (1 through 12)
        $months = !empty($this->selectedMonths) ? $this->selectedMonths : range(1, 12);

        // Fetch the job postings with relevant data
        $query = Job_Posting::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->where('peso_municipality_id', $municipalityId);

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

        // Create the area chart model
        $chart = LivewireCharts::areaChartModel()
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
                    'opacity' => 0.3, // Adjust the fill opacity as needed
                ],
            ]);

        // Add points to the area chart
        foreach ($monthNames as $index => $monthName) {
            $chart->addPoint($monthName, $monthlyData[$index]);
        }

        return $chart;
    }

    public function render()
    {

        $user = Auth::user();
        $pesoMunicipalityId = optional($user->peso)->municipality_id;

        // dd($topJobCharts);

        // dd($jobPostingTrend1);

        $activeJobPosting = $this->getJobPosting($pesoMunicipalityId);
        $recentJobPosting = $this->getRecentJobPosting($pesoMunicipalityId);

        // JOB SLOTS
        $jobSlotsData = $this->getTotalJobSlots($pesoMunicipalityId);
        $totalJobSlots = $jobSlotsData['total_job_slots'];
        $remainingSlots = $jobSlotsData['remaining_slots'];

        // ACTIVE APPLICATIONS
        $activeApplicants = $this->getActiveApplicantCount($pesoMunicipalityId);
        $recentApplicants = $this->getRecentActiveApplicantCount($pesoMunicipalityId);

        $audits = Audit::when($this->modelFilter, function ($query) {
            $query->where('auditable_type', $this->modelFilter);
        })
            ->latest()
            ->paginate($this->perPage);

        // Format each audit entry
        $municipalityId = 1;
        $audits = Audit::whereHas('user.employee.barangay.municipality', function ($query) use ($municipalityId) {
            $query->where('municipality_id', $municipalityId);
        })
            ->latest()
            ->paginate(5); // Adjust the number of items per page as needed
        // Adjust the number of items per page as needed

        // Format each audit entry
        $formattedAudits = $audits->map(function ($audit) {
            return AuditFormatter::format($audit);
        });

        // dd($formattedAudits);

        return view('livewire.admin.reports.municipality-reports',
            compact('activeJobPosting', 'recentJobPosting',
                'totalJobSlots', 'remainingSlots', 'activeApplicants', 'recentApplicants', 'formattedAudits', 'audits', 'pesoMunicipalityId'));
    }
}
