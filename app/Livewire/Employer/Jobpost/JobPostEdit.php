<?php

namespace App\Livewire\Employer\Jobpost;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class JobPostEdit extends Component
{

    public $jobTags = [];
    public function render()
    {
        return view('livewire.employer.jobpost.job-post-edit');
    }
}
