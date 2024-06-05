<?php

namespace App\Livewire\Signup\Jobseeker\Partials;

use Livewire\Component;

class EmploymentStatus extends Component
{

    public $empStatus = "", $empDescription = "";

    public $stepNumber = 3;

    public function next()
    {

        $this->validate([
            'empStatus' => 'required|string',
            'empDescription' => 'required|string',

        ]);

        $this->dispatch('handleStepData', $this->stepNumber, [
            'empStatus' => $this->empStatus,
            'empDescription' => $this->empDescription,
        ]);

        $this->dispatch('nextStep');
    }

    public function prev()
    {
        $this->dispatch('prevStep');
    }

    public function render()
    {
        return view('livewire.signup.jobseeker.partials.employment-status');
    }
}
