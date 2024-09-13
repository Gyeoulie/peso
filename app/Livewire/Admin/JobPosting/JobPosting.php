<?php

namespace App\Livewire\Admin\JobPosting;

use App\Models\Job_Posting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Spatie\SimpleExcel\SimpleExcelWriter;

#[Layout('layouts.admin')]
class JobPosting extends Component
{

    use WithPagination;
    use WithoutUrlPagination;
    public $search;
    public $filter = "ALL";
    public function updatedsearch()
    {
        $this->resetPage();
    }
    public function updateFilter($filter)
    {
        $this->filter = $filter;
        $this->resetPage(); // Reset pagination for eligibility search

    }

    public function exportData()
    {
        $user = Auth::user();

        $jobpost = $this->getJobPost($user->peso_accounts->peso->municipality_id)->get();
        foreach ($jobpost as $jobposts) {
            $jobposts->slotsLeft = $jobposts->slotsLeft();
        }

        if (!$jobpost->isEmpty()) {

            $fileName = '-jobposting-' . now()->format('Y-m-d-H-i-s') . '.xlsx';

            $writer = SimpleExcelWriter::streamDownload($fileName);

            foreach ($jobpost as $data) {
                $writer->addRow([
                    'Company' => $data->company->business_Name,
                    'Job Offering' => $data->job_Title,
                    'Employment Type' => $data->job_Title == 1 ? 'PART TIME' : 'FULL TIME',
                    'Date Posted' => $data->created_at->format('F j, Y'),
                    'Deadline' => $data->job_Duration->format('F j, Y'),
                    'Status' => $data->job_Status,
                    'Posted Slots' => $data->job_Slots,
                    'Slots Left' => $data->slotsLeft,
                    'Total Applicants' => $data->job_applicants_count,
                ]);
            }

            return Response::streamDownload(function () use ($writer) {
                $writer->close();
            }, $fileName, ['Content-Type' => 'text/csv']);
        }

        return toastr()->warning('No data in the table to be exported.');

    }

    public function getJobPost($id)
    {
        $jobposts = Job_Posting::with('company', 'barangay.municipality.province')
            ->withCount(['job_applicants', 'hiredApplicants'])
            ->whereHas('peso.municipality', function ($query) use ($id) {
                $query->where('municipality_id', $id);
            })
            ->where(function ($query) {
                $query->where('job_Title', 'like', '%' . $this->search . '%')
                    ->orWhereHas('company', function ($query) {
                        $query->where('business_Name', 'like', '%' . $this->search . '%')
                            ->orWhere('trade_Name', 'like', '%' . $this->search . '%')
                            ->orWhere('company_Address', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('barangay', function ($query) {
                        $query->where('barangay_Name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('barangay.municipality', function ($query) {
                        $query->where('municipality_Name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('barangay.municipality.province', function ($query) {
                        $query->where('province_Name', 'like', '%' . $this->search . '%');
                    });
            });

        if ($this->filter == "ALL") {
            $jobposts->orderByRaw("FIELD(job_Status, 'PENDING') DESC");

        } elseif ($this->filter == 'OTHERS') {
            $jobposts->whereIn('job_Status', ['REJECTED', 'CANCELLED']);
        } else {
            $jobposts->where('job_Status', $this->filter);
        }

        return $jobposts->orderBy('job_posting.created_at', 'DESC');
    }

    public function render()
    {
        $user = Auth::user();

        $jobpost = $this->getJobPost($user->peso_accounts->peso->municipality_id)->paginate(10);

// Calculate slots left dynamically for each job posting
        foreach ($jobpost as $jobposts) {
            $jobposts->slotsLeft = $jobposts->slotsLeft();
        }
        // Fetch job counts for filtering
        $statusCounts = Job_Posting::selectRaw('
        COUNT(*) AS allCount,
        SUM(CASE WHEN job_Status = "PENDING" THEN 1 ELSE 0 END) AS pendingCount,
        SUM(CASE WHEN job_Status = "ACTIVE" THEN 1 ELSE 0 END) AS activeCount,
        SUM(CASE WHEN job_Status = "CLOSED" THEN 1 ELSE 0 END) AS closedCount,
        SUM(CASE WHEN job_Status = "COMPLETED" THEN 1 ELSE 0 END) AS completedCount,
        SUM(CASE WHEN job_Status IN ("REJECTED", "CANCELLED") THEN 1 ELSE 0 END) AS othersCount
    ')
            ->whereHas('peso.municipality', function ($query) use ($user) {
                $query->where('municipality_id', $user->peso_accounts->peso->municipality_id);
            })
            ->first();

        return view('livewire.admin.job-posting.job-posting', [
            'jobpost' => $jobpost,
            'allCount' => $statusCounts->allCount,
            'pendingCount' => $statusCounts->pendingCount,
            'activeCount' => $statusCounts->activeCount,
            'closedCount' => $statusCounts->closedCount,
            'completedCount' => $statusCounts->completedCount,
            'othersCount' => $statusCounts->othersCount,
        ]);
    }
}
