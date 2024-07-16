<?php

namespace App\Livewire\Admin\EligibilityLicense;

use App\Models\Eligibility_Type;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class EligibilityTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $rows = 10;

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

        return view('livewire.admin.eligibility-license.eligibility-table', compact('eligibility'));
    }
}
