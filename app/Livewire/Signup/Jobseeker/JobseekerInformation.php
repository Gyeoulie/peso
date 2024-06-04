<?php

namespace App\Livewire\Signup\Jobseeker;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.empty')]
class JobseekerInformation extends Component
{
    public function render()
    {
        return view('livewire.signup.jobseeker.jobseeker-information');
    }
}
