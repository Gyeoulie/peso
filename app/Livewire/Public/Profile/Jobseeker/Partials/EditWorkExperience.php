<?php

namespace App\Livewire\Public\Profile\Jobseeker\Partials;

use App\Models\Job_Positions;
use Livewire\Component;
use App\Models\Work_Exp;
use Carbon\Carbon;

class EditWorkExperience extends Component
{

    public $workName, $workPosition = "", $workStatus = "", $workAdd, $workStart, $workEnd, $workID;
    public $userID;

    public function rules()
    {
        return [
            'workName' => ['required', 'string'],
            'workAdd' => ['required', 'string'],
            'workPosition' => ['required'],
            'workStart' => ['required'],
            // 'work_End' => ['required'],
            'workStatus' => ['required'],
        ];
    }

    public function save()
    {
        $this->validate();

        if ($this->workID) {

            try {
                // Create the user record
                Work_Exp::where('workexp_id', $this->workID)->update([
                    'work_Name' => $this->workName,
                    'work_Address' => $this->workAdd,
                    'position_id' => $this->workPosition,
                    'work_Start' => $this->workStart,
                    'work_End' => $this->workEnd,
                    'work_Status' => $this->workStatus,
                ]);

                toastr()->success('Work Experience Record has been Updated!');
            } catch (\Exception $e) {

                // Show error toastr notification
                toastr()->error('There was an Error');
            }

        } else {

            try {
                // Create the user record
                Work_Exp::create([
                    'employee_id' => $this->userID,
                    'work_Name' => $this->workName,
                    'work_Address' => $this->workAdd,
                    'position_id' => $this->workPosition,
                    'work_Start' => $this->workStart,
                    'work_End' => $this->workEnd,
                    'work_Status' => $this->workStatus,
                ]);
                toastr()->success('New Work Experience Record Created!');

            } catch (\Exception $e) {

                // Show error toastr notification
                toastr()->error('There was an Error');
            }
        }
        $this->close();
        $this->dispatch('reload-table');
    }

    public function editModal($id)
    {
        $this->workID = $id;
        $work = Work_Exp::find($id);
        $this->workName = $work->work_Name;
        $this->workAdd = $work->work_Address;
        $this->workPosition = $work->position->position_Title;
        $this->workStatus = $work->work_Status;
        $this->workStart = Carbon::parse($work->work_Start)->format('Y-m-d');
        $this->workEnd = Carbon::parse($work->work_End)->format('Y-m-d');

        $this->dispatch('open-modal', 'workExp-modal');
    }

    public function addModal($id)
    {
        $this->workID = $id;
        $this->reset('workName', 'workAdd', 'workPosition', 'workStart', 'workEnd', 'workStatus', 'workID');
        $this->dispatch('open-modal', 'workExp-modal');
    }


    
    public function close()
    {
        $this->reset('workName', 'workAdd', 'workPosition', 'workStart', 'workEnd', 'workStatus', 'workID');
        $this->dispatch('close-modal', 'workExp-modal');
    }


    public function render()
    {
        $workexp = Work_Exp::where('employee_id', '=', $this->userID)
        ->orderBy('work_Start', 'desc')
        ->get();
        $allpositions = Job_Positions::all();

        return view('livewire.public.profile.jobseeker.partials.edit-work-experience', compact('workexp', 'allpositions'));
    }
}
