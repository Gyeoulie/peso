<?php

namespace App\Livewire\EligibilityLicense;

use App\Models\License_Type;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class LicenseTable extends Component
{
    use WithPagination;

    public $rows = 5;

    public $search;

    public function editLicense($id)
    {
        $this->dispatch('edit-license', $id);
    }

    #[On('reload-table')]
    public function render()
    {
        $license = License_Type::where('license_Name', 'like', '%' . $this->search . '%')
            ->orderBy('license_Name', 'asc')
            ->paginate($this->rows);

        return view('livewire.eligibility-license.license-table', compact('license'));
    }
}
