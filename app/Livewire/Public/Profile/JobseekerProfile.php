<?php

namespace App\Livewire\Public\Profile;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class JobseekerProfile extends Component
{
    public function render()
    {
        return view('livewire.public.profile.jobseeker-profile');
    }
}
