<?php

namespace App\Livewire\Admin\Reports\BarangayPartials;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Spatie\SimpleExcel\SimpleExcelWriter;

class JobseekerList extends Component
{

    use WithPagination;
    use WithoutUrlPagination;

    public $barangayID;

    public $currentYear;
    public $startYear;

    public $searchJobseekers;

    // MOUNT
    public $mountGender, $mountAge = [], $mountEmpStatus;

    // REAL FILTER VALUES
    public $Gender, $Age = [], $EmpStatus;

    public $mountSelectedMonths = [];

    public $selectedMonths = [];
    public $selectedYear;

    public function updatedsearchJobseekers()
    {
        $this->resetPage();
    }

    public function changeYear($year)
    {
        $this->selectedYear = $year;
    }

    public function changeMonth()
    {
        $this->mountSelectedMonths = $this->selectedMonths;

    }

    public function resetFilter()
    {
        $this->reset('mountGender', 'mountAge', 'mountEmpStatus', 'Gender', 'Age', 'EmpStatus');

    }

    #[On('updateBar')]
    public function updateBar($id)
    {
        $this->barangayID = $id;
    }

    public function mount()
    {

        $this->currentYear = date('Y');
        $this->startYear = 2024;
        $this->selectedYear = $this->startYear;

    }

    public function mountFilter()
    {
        $this->Gender = $this->mountGender;
        $this->Age = $this->mountAge;
        $this->EmpStatus = $this->mountEmpStatus;
        $this->dispatch('close-modal', 'filter-jobseekers-modal');
    }

    private function getJobseekers()
    {

        // return Employee::where('barangay_id', $filters)
        //     ->withCount(['job_applicants as active_applications' => function ($query) {
        //         $query->whereNotIn('applicant_Status', ['REJECTED', 'COMPLETED']);
        //     }])
        //     ->paginate(10);

        $employee = Employee::where('barangay_id', $this->barangayID)
            ->withCount(['activeApplications', 'program_reg'])
            ->where(function ($query) {
                $query->where('fname', 'like', '%' . $this->searchJobseekers . '%')
                    ->orWhere('mname', 'like', '%' . $this->searchJobseekers . '%')
                    ->orWhere('lname', 'like', '%' . $this->searchJobseekers . '%');
            });

        if ($this->Gender) {
            $employee = $employee->where('gender', $this->Gender);
        }
        if ($this->EmpStatus) {
            $employee = $employee->where('empstatus', $this->EmpStatus);
        }
        if ($this->Age) {
            $employee = $employee->where(function ($query) {
                $currentYear = Carbon::now()->year;
                foreach ($this->Age as $range) {
                    list($minAge, $maxAge) = explode('-', $range);
                    $minYear = $currentYear - $maxAge;
                    $maxYear = $currentYear - $minAge;
                    $query->orWhereBetween('birthdate', [$minYear . '-01-01', $maxYear . '-12-31']);
                }
            });
            $employee = $employee->orderByRaw('TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) ASC');
        }

        return $employee;
    }

    public function exportData()
    {
        $employees = $this->getJobseekers()->get();
        if (!$employees->isEmpty()) {

            $fileName = $this->barTitle . '-jobseekers-' . now()->format('Y-m-d-H-i-s') . '.xlsx';

            $writer = SimpleExcelWriter::streamDownload($fileName);

            foreach ($employees as $employee) {
                $writer->addRow([
                    'First Name' => $employee->fname,
                    'Middle Name' => $employee->mname,
                    'Last Name' => $employee->lname,
                    'Gender' => $employee->gender == 1 ? 'MALE' : ($employee->gender == 2 ? 'FEMALE' : 'UNKNOWN'),
                    'Date of Birth' => $employee->birthdate->format('Y-m-d'),
                    'Employment Status' => $employee->empstatus == 1 ? 'EMPLOYED' : ($employee->empstatus == 2 ? 'UNEMPLOYED' : 'UNKNOWN'),
                    'Active Applications' => $employee->active_applications_count,
                    'Program Registrations' => $employee->program_reg_count,
                ]);
            }

            return Response::streamDownload(function () use ($writer) {
                $writer->close();
            }, $fileName, ['Content-Type' => 'text/csv']);
        }

        return toastr()->warning('No data in the table to be exported.');

    }

    public function render()
    {
        $barangayJobSeekers = $this->getJobseekers()->paginate(10);

        return view('livewire.admin.reports.barangay-partials.jobseeker-list', compact('barangayJobSeekers'));
    }
}
