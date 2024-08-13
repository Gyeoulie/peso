<?php

namespace App\Livewire\Public\Profile\Employer\Partials;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class EditDetails extends Component
{
    public function render()
    {
        return view('livewire.public.profile.employer.partials.edit-details');
    }
}
