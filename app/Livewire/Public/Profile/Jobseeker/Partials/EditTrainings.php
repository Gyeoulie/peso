<?php

namespace App\Livewire\Public\Profile\Jobseeker\Partials;

use Livewire\Component;
use App\Models\Training;
use Carbon\Carbon;

class EditTrainings extends Component
{
    // training-modal
    public $trainName, $trainStart, $trainEnd, $trainInstitution, $trainCert, $trainStat, $trainingID;
    public $userID;

    public function rules()
    {
        return [
            'trainName' => ['required', 'string'],
            'trainInstitution' => ['required', 'string'],
            'trainCert' => ['required'],
            'trainStart' => ['required'],
            // 'trainEnd' => ['required'],
            'trainStat' => ['required'],
        ];
    }


    public function save(){
        $this->validate();

        if ($this->trainingID) {

            try {
                // Create the user record
                Training::where('training_id', $this->trainingID)->update([
                    'training_Name' => ucwords(strtolower($this->trainName)),
                    'training_From' => $this->trainInstitution,
                    'training_Cert' => ucwords(strtolower($this->trainCert)),
                    'training_Start' => $this->trainStart,
                    'training_End' => $this->trainEnd,
                    'training_Status' => $this->trainStat,

                ]);

                toastr()->success('Trainings Record has been Updated!');
            } catch (\Exception $e) {

                // Show error toastr notification
                toastr()->error('There was an Error');
            }

        } else {

            try {
                // Create the user record
                Training::create([
                    'employee_id' => $this->userID,
                    'training_Name' => ucwords(strtolower($this->trainName)),
                    'training_From' => $this->trainInstitution,
                    'training_Cert' => ucwords(strtolower($this->trainCert)),
                    'training_Start' => $this->trainStart,
                    'training_End' => $this->trainEnd,
                    'training_Status' => $this->trainStat,
                ]);
                toastr()->success('New Training Record Created!');

            } catch (\Exception $e) {

                // Show error toastr notification
                toastr()->error('There was an Error');
            }
        }
        $this->close();
        $this->dispatch('reload-table');

    }

    public function editModal($id){
        $this->trainingID = $id;
        $training = Training::find($id);

        $this->trainName = $training->training_Name;
        $this->trainInstitution = $training->training_From;
        $this->trainCert = $training->training_Cert;
        $this->trainStart = Carbon::parse($training->training_Start)->format('Y-m-d');
        $this->trainEnd = Carbon::parse($training->training_End)->format('Y-m-d');
        $this->trainStat = $training->training_Status;

        $this->dispatch('open-modal', 'training-modal');

    }

    public function addModal(){
        $this->reset('trainName' , 'trainStart', 'trainEnd', 'trainInstitution', 'trainCert', 'trainStat', 'trainingID');
        $this->dispatch('open-modal', 'training-modal');

    }

    public function close(){
        $this->reset('trainName' , 'trainStart', 'trainEnd', 'trainInstitution', 'trainCert', 'trainStat', 'trainingID');
        $this->dispatch('close-modal', 'training-modal');
    }

    public function render()
    {
        $trainings = Training::where('employee_id', '=', $this->userID)
        ->orderBy('training_Start', 'desc')
        ->get();
        return view('livewire.public.profile.jobseeker.partials.edit-trainings', compact('trainings'));
    }
}
