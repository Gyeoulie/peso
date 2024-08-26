<?php

namespace App\Livewire\Admin\Training;

use App\Models\Barangay;
use App\Models\Industry_preference;
use App\Models\Job_Preference;
use App\Models\Programs;
use App\Models\Program_Reg;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class TrainingRegistrants extends Component
{

    use WithPagination, WithoutUrlPagination;
    public $id;

    public $search;

    public $selectedJobseeker;

    public $sortDate, $filter = 'All';

    protected $listeners = ['qrCodeScanned' => 'qrCodeScanned'];

    public function getJobseeker($id)
    {
        $this->selectedJobseeker = $id;
        // dd($id);
        $this->reset('sortDate');
    }

    public function changeFilter($filter)
    {
        $this->filter = $filter;
        $this->reset('sortDate');
    }
    public function updateSort($sort)
    {
        $this->sortDate = $sort;

    }

    public function scanQr()
    {
        $this->dispatch('open-modal', 'qr-scanner-modal');
        $this->dispatch('startScanner');

    }
    public function qrStop()
    {
        $this->dispatch('endScanner');
        $this->dispatch('close-modal', 'qr-scanner-modal');

    }

    public function qrCodeScanned($decodedText)
    {
        // Example: Find a record by the QR code content
        // You can replace this with your own logic
        $ticketData = json_decode($decodedText, true);

        // dd($ticketData);

        try {
            // Fetch the ticket based on the provided data
            $ticket = Program_Reg::where('program_reg_id', $ticketData['program_reg_id'])
                ->where('program_id', $ticketData['program_id'])
                ->where('employee_id', $ticketData['employee_id'])
                ->where('created_at', \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ticketData['created_at']))
                ->first();

            // Check if the ticket is found
            if ($ticket) {
                $this->getJobseeker($ticket->employee_id);
                $this->dispatch('close-modal', 'qr-scanner-modal');
            } else {
                toastr()->info('Ticket is not valid');
                $this->qrStop();
            }
        } catch (\Exception $e) {
            // Handle database query exceptions

            toastr()->error('An error occurred while processing the ticket.');
            $this->qrStop();
        }
    }

    public function confirmReg($action, $id)
    {

        try {
            DB::beginTransaction();

            // Perform the update
            Program_Reg::where('program_reg_id', $id)->update([
                'program_reg_Status' => $action,
                'responded_at' => now(),
            ]);

            // Commit the transaction
            DB::commit();

            // Show success notification
            toastr()->success('Job seeker successfully updated.');

        } catch (\Exception $e) {
            // Rollback the transaction
            DB::rollBack();

            // Show error notification
            toastr()->error('There was a problem updating the job seeker. Please try again.');
        }
    }

    public function render()
    {

        $programInfo = Programs::withCount('program_reg')
            ->findOrFail($this->id);
        $jobseekerInfo = null;
        $isMatch = false;

        $query = Program_Reg::with(['employee', 'programs.program_tags', 'programs.job_industry'])
            ->where('program_id', $this->id)
            ->whereHas('employee', function ($query) {
                $query->where('fname', 'like', '%' . $this->search . '%')
                    ->orWhere('mname', 'like', '%' . $this->search . '%')
                    ->orWhere('lname', 'like', '%' . $this->search . '%');
            });

        if ($this->filter != 'All') {
            if ($this->filter == 'Others') {
                $query->whereNotIn('program_reg_Status', ['REGISTERED', 'COMPLETED']);

            } else {
                $query->where('program_reg_Status', $this->filter);

            }

        }

        if ($this->sortDate !== null && $this->sortDate !== '') {
            $query->orderBy('created_at', $this->sortDate);
        }
        // Paginate the results
        $programRegistrants = $query->paginate(10);

        if ($this->selectedJobseeker) {
            $jobseekerInfo = Program_Reg::findOrFail($this->selectedJobseeker);

            // Get the employee's municipality ID via their barangay
            $employeeMunicipalityId = Barangay::where('barangay_id', $jobseekerInfo->employee->barangay_id)
                ->value('municipality_id');

            // Get the employee's job preferences (array of position_id)
            $employeeJobPreferences = Job_Preference::where('employee_id', $jobseekerInfo->employee->employee_id)
                ->pluck('position_id')->toArray();

            $employeeIndustryPreference = Industry_preference::where('employee_id', $jobseekerInfo->employee->employee_id)
                ->pluck('industry_id')->toArray();

            // Determine if the jobseeker matches the program criteria
            $isMatch = Programs::where('program_id', $this->id)
                ->where('program_Status', 'ACTIVE')
                ->where('municipality_id', $employeeMunicipalityId)
                ->where(function ($query) use ($employeeJobPreferences) {
                    $query->whereHas('program_tags', function ($query) use ($employeeJobPreferences) {
                        $query->whereIn('position_id', $employeeJobPreferences);
                    });
                })
                ->orWhere(function ($query) use ($employeeIndustryPreference) {
                    $query->whereHas('job_industry', function ($query) use ($employeeIndustryPreference) {
                        $query->whereIn('industry_id', $employeeIndustryPreference);
                    });
                })
                ->exists();

        }

        return view('livewire.admin.training.training-registrants', compact('programInfo', 'programRegistrants', 'jobseekerInfo', 'isMatch'));
    }
}
