<?php

namespace App\Livewire\Modals;

use App\Models\PESO;
use Livewire\Attributes\Modelable;
use Livewire\Component;

class PartnershipModal extends Component
{

    public $partnershipId, $partnershipName;
    public $search;

    #[Modelable]
    public $eligibilityData = [];

    public function pesoSelect($id)
    {

        $this->dispatch('selectPartnership', $id);

    }

    public function render()
    {

        $PESO = PESO::paginate(10);

        return view('livewire.modals.partnership-modal', compact('PESO'));
    }
}
