<?php

namespace App\Livewire\Public;

use App\Models\Programs;
use App\Models\Program_Reg;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class TrainingView extends Component
{

    #[Layout('layouts.app')]

    public $id;
    public $agreeBox = false;

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
