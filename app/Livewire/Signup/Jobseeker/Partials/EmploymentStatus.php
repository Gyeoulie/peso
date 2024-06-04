<?php

namespace App\Livewire\Signup\Jobseeker\Partials;

use Livewire\Component;

class EmploymentStatus extends Component
{

    public $empStatus = "", $empDescription = "";

    public function next()
    {

        $this->validate([
            'empStatus' => 'required|string',
            'empDescription' => 'required|string',

        ]);

    }

    public function render()
    {
        return view('livewire.signup.jobseeker.partials.employment-status');
    }
}
