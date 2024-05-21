<?php

namespace App\Livewire\Public\Profile\Jobseeker;

use App\Models\Employee;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class JobseekerProfile extends Component
{

    public $id;
    public function render()
    {

        $jobseeker = Employee::find($this->id);

        return view('livewire.public.profile.jobseeker.jobseeker-profile', compact('jobseeker'));
    }
}
