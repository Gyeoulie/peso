<?php

namespace App\Livewire\Signup\Employer;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.empty')]
class EmployerInformation extends Component
{
    public function render()
    {
        return view('livewire.signup.employer.employer-information');
    }
}
