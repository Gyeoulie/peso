<?php

namespace App\Livewire\EligibilityLicense;

use App\Models\Eligibility_Type;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class EligibilityTable extends Component
{
    use WithPagination;

    public $rows = 5;

    public $search;

    public function editEligibility($id)
    {
        $this->dispatch('edit-eligibility', $id);
    }

    #[On('reload-table')]
    public function render()
    {

        $eligibility = Eligibility_Type::where('eligibility_Name', 'like', '%' . $this->search . '%')
            ->orderBy('eligibility_Name', 'asc')
            ->paginate($this->rows);

        return view('livewire.eligibility-license.eligibility-table', compact('eligibility'));
    }
}
