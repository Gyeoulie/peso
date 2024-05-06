<?php

namespace App\Livewire\LocationManagementAdmin;

use App\Models\Province;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ProvinceModal extends Component
{
    use WithPagination;
    public $search;

    public function onSelect($id)
    {
        $this->dispatch('setProv', $id);

    }

    #[On('reload-table')]
    public function render()
    {

        $provinces = Province::query()
            ->where('province_Name', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.location-management-admin.province-modal', compact('provinces'));
    }
}
