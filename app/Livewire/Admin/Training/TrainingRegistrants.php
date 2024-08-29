<?php

namespace App\Livewire\Admin\Training;

use App\Models\Barangay;
use App\Models\Industry_preference;
use App\Models\Job_Preference;
use App\Models\Programs;
use App\Models\Program_Reg;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Spatie\SimpleExcel\SimpleExcelWriter;

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
        DB::beginTransaction();

        try {
            // Retrieve the model instance using Eloquent
            $programReg = Program_Reg::find($id);

            if (!$programReg) {
                toastr()->error('Job seeker not found.');
                DB::rollBack();
                return;
            }

            // Update the model attributes
            $programReg->program_reg_Status = $action;
            $programReg->responded_at = now();

            // Check if any attributes are dirty
            if ($programReg->isDirty()) {
                // Save changes only if there are modifications
                $programReg->save();
            }

            // Commit the transaction
            DB::commit();

            // Show success notification
            toastr()->success('Job seeker successfully updated.');

        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollBack();

            // Show error notification
            toastr()->error('There was a problem updating the job seeker. Please try again.');
        }
    }

    public function exportData()
    {

        $registrants = $this->getRegistrants($this->id)->get();

        if (!$registrants->isEmpty()) {

            $fileName = $registrants->first()->program_id . '-program_registrants-' . now()->format('Y-m-d-H-i-s') . '.xlsx';

            $writer = SimpleExcelWriter::streamDownload($fileName);

            foreach ($registrants as $data) {
                $writer->addRow([
                    'Last Name' => $data->employee->lname,
                    'First Name' => $data->employee->mname,
                    'Middle Name' => $data->employee->fname,
                    'Status' => $data->program_reg_Status,
                    'Date Registered' => $data->created_at->format('F j, Y'),
                    'Gender' => $data->employee->gender == 1 ? 'MALE' : ($data->employee->gender == 2 ? 'FEMALE' : 'UNKNOWN'),
                    'Birth Date' => $data->employee->birthdate->format('Y-m-d'),
                    'Address' => $data->employee->address . " " . $data->employee->barangay->barangay_Name,

                ]);
            }

            toastr()->success('Data Exported');
            return Response::streamDownload(function () use ($writer) {
                $writer->close();
            }, $fileName, ['Content-Type' => 'text/csv']);
        }

        return toastr()->warning('No data in the table to be exported.');

    }

    public function isMatch($programID, $jobseekerInfo)
    {

        $employeeMunicipalityId = Barangay::where('barangay_id', $jobseekerInfo->employee->barangay_id)
            ->value('municipality_id');

        // Get the employee's job preferences (array of position_id)
        $employeeJobPreferences = Job_Preference::where('employee_id', $jobseekerInfo->employee->employee_id)
            ->pluck('position_id')->toArray();

        $employeeIndustryPreference = Industry_preference::where('employee_id', $jobseekerInfo->employee->employee_id)
            ->pluck('industry_id')->toArray();

        return Programs::where('program_id', $this->id)
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
    public function getRegistrants($id)
    {
        $query = Program_Reg::with(['employee', 'programs.program_tags', 'programs.job_industry'])
            ->where('program_id', $id)
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

        return $query;

    }

    public function render()
    {

        $programInfo = Programs::withCount('program_reg')
            ->findOrFail($this->id);
        $jobseekerInfo = null;
        $isMatch = false;

        // Paginate the results
        $programRegistrants = $this->getRegistrants($programInfo->program_id)->paginate(10);

        if ($this->selectedJobseeker) {
            $jobseekerInfo = Program_Reg::findOrFail($this->selectedJobseeker);

            // Determine if the jobseeker matches the program criteria
            $isMatch = $this->isMatch($programInfo->program_id, $jobseekerInfo);

        }

        return view('livewire.admin.training.training-registrants', compact('programInfo', 'programRegistrants', 'jobseekerInfo', 'isMatch'));
    }
}
