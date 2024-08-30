<?php

namespace App\Livewire\Admin\Reports;

use App\Helpers\AuditFormatter;
use App\Models\Barangay;
use App\Models\Job_Applicants;
use App\Models\Job_Posting;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use OwenIt\Auditing\Models\Audit;

#[Layout('layouts.admin')]
class MunicipalityReports extends Component
{

    use WithPagination, WithoutUrlPagination;

    public $currentYear = 2024;
    public $modelFilter;
    public $perPage = 10;
    public $selectedMonths = []; // Default to all months if empty

    public function getBarangayChart($id)
    {
        $barangays = Barangay::where('municipality_id', $id)
            ->withCount('employee') // Ensure this relationship exists
            ->get();

        // Calculate the total count of residents across all barangays
        $totalResidents = $barangays->sum('employee_count');

        // Create a pie chart model
        $barangayChartModel = new PieChartModel();

        // Add each barangay to the pie chart
        foreach ($barangays as $barangay) {
            $barangayChartModel->addSlice(
                $barangay->barangay_Name,
                $barangay->employee_count,
                $this->colors[$barangay->barangay_id] ?? '#' . substr(md5(rand()), 0, 6) // Use a default color if not set
            );
        }

        // Optionally add a slice for 'Others' if there are remaining residents
        if ($totalResidents > 0) {
            $otherCount = 0; // You can define logic for counting 'Others' if needed
            if ($otherCount > 0) {
                $barangayChartModel->addSlice('Others', $otherCount, '#' . substr(md5(rand()), 0, 6));
            }
        }

        $barangayChartModel->setTitle('Number of Job Seekers per Barangay')
            ->setAnimated(true)
            ->setType('pie')
            ->withOnSliceClickEvent('onSliceClick')
            ->withoutLegend()
            ->setDataLabelsEnabled(true)
            ->setColors([
                '#' . substr(md5(rand()), 0, 6),
                '#' . substr(md5(rand()), 0, 6),
                '#' . substr(md5(rand()), 0, 6),
                '#' . substr(md5(rand()), 0, 6),
                '#' . substr(md5(rand()), 0, 6),
            ])
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
                                'fontSize' => '16px', // Corrected from '16x' to '16px'
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

        return $barangayChartModel;
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

    public function render()
    {

        $user = Auth::user();
        $pesoMunicipalityId = optional($user->peso)->municipality_id;

        $barangayChartModel = $this->getBarangayChart($pesoMunicipalityId);

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
            compact('barangayChartModel', 'activeJobPosting', 'recentJobPosting',
                'totalJobSlots', 'remainingSlots', 'activeApplicants', 'recentApplicants', 'formattedAudits', 'audits', 'pesoMunicipalityId'));
    }
}
