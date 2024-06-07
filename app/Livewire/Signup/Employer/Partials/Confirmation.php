<?php

namespace App\Livewire\Signup\Employer\Partials;

use Livewire\Component;

class Confirmation extends Component
{
    public $agreeBox = false;

    public function save()
    {
        $this->dispatch('saveUser');
    }

    public function prev()
    {
        $this->dispatch('prevStep');
        $this->agreeBox = false;
    }
    public function render()
    {
        return view('livewire.signup.employer.partials.confirmation');
    }
}
