<?php

namespace App\Livewire\Public;

use App\Models\Programs;
use App\Models\Program_Reg;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class TrainingView extends Component
{

    public $id;
    public $agreeBox = false;

    public function mount()
    {
        $ProgramInfo = Programs::withCount('attendedJobseekers')->findOrFail($this->id);

        if (!$ProgramInfo) {
            return $this->redirectRoute('dashboard');
        } else if ($ProgramInfo->program_Status != 'ACTIVE') {
            return $this->redirectRoute('dashboard');

        }

    }
    public function register()
    {

        $existingRegistration = Program_Reg::where('employee_id', Auth::user()->employee->employee_id)
            ->where('program_id', $this->id)
            ->first();

        if ($existingRegistration) {
            // Handle the case where the employee is already registered for this program
            $this->dispatch('close-modal', 'register-modal');
            return toastr()->warning('You have already registered in this event.');

        }

        // If not registered, create a new registration
        $register = Program_Reg::create([
            'employee_id' => Auth::user()->employee->employee_id,
            'program_id' => $this->id,
            'program_reg_Status' => 'REGISTERED',
        ]);

        if ($register) {
            toastr()->success('You have successfully registered.');
            $this->dispatch('close-modal', 'register-modal');

        }

    }

    public function registerValidate()
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            // Open the login modal if the user is not logged in
            $this->dispatch('open-modal', 'login-modal');
            return; // Exit the method
        }

        // Get the job posting and user
        $training = Programs::find($this->id); // Use find() for a single record
        $user = Auth::user();
        $userMunicipalityId = $user->employee->barangay->municipality_id;

        if (!$training) {
            // Handle the case where the job posting is not found
            toastr()->error('Training not found.');
            return;
        }

        $trainingMunicipalityId = $training->peso->municipality_id;

        if ($userMunicipalityId == $trainingMunicipalityId) {
            // Open the apply modal if the user's municipality matches the job posting's municipality
            $this->dispatch('open-modal', 'register-modal');
        } else {
            // Show an error if the user's municipality does not match
            toastr()->error('This event is only available to ' . $training->peso->municipality_Name . ' residents.');
        }
    }

    public function render()
    {

        if (Auth::check() && Auth::user()->usertype === 4) {
            $isRegistered = Program_Reg::where('employee_id', Auth::user()->employee->employee_id)
                ->where('program_id', $this->id)
                ->exists();
        } else {
            $isRegistered = false; // or handle the case when the user is not authenticated
        }

        $ProgramInfo = Programs::withCount('attendedJobseekers')->find($this->id);

        return view('livewire.public.training-view', compact('ProgramInfo', 'isRegistered'));
    }
}
