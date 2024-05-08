<?php

namespace App\Livewire\Admin\LocationManagement;

use App\Models\Municipality;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class MunModal extends Component
{

    use WithPagination;

    public $search;

    public function onSelect($id)
    {

        $this->dispatch('setMun', $id);

    }

    #[On('reload-table')]
    public function render()
    {

        $municipalities = Municipality::with('province')
            ->where(function ($query) {
                $query->where('municipality_Name', 'like', '%' . $this->search . '%')
                    ->orWhereHas('province', function ($subQuery) {
                        $subQuery->where('province_Name', 'like', '%' . $this->search . '%');
                    });
            })
            ->paginate(10);

        return view('livewire.admin.location-management.mun-modal', compact('municipalities'));
    }
}
