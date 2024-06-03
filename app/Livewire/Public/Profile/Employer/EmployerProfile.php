<?php

namespace App\Livewire\Public\Profile\Employer;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class EmployerProfile extends Component
{
    public function render()
    {
        return view('livewire.public.profile.employer.employer-profile');
    }
}
