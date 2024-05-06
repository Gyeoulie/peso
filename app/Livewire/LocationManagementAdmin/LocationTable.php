<?php

namespace App\Livewire\LocationManagementAdmin;

use App\Models\Barangay;
use App\Models\Municipality;
use App\Models\Province;
use Livewire\Attributes\On;
use Livewire\Component;

class LocationTable extends Component
{

    public $defaultFilter;

    public $search;

    public function mount()
    {
        // Initialize the public key
        $this->defaultFilter = 'Barangay';
    }

    public function editProv($id)
    {

        $this->dispatch('edit-prov', $id);
    }
    public function editMun($id)
    {

        $this->dispatch('edit-mun', $id);
    }
    public function editBar($id)
    {

        $this->dispatch('edit-bar', $id);
    }

    public function updatePublicKey($newValue)
    {
        // Update the public key
        $this->defaultFilter = $newValue;
    }

    #[On('reload-table')]
    public function render()
    {

        if ($this->defaultFilter === 'Barangay') {
            $locationData = Barangay::with('municipality.province')
                ->where('barangay_Name', 'like', '%' . $this->search . '%')
                ->orWhereHas('municipality', function ($query) {
                    $query->where('municipality_Name', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('municipality.province', function ($query) {
                    $query->where('province_Name', 'like', '%' . $this->search . '%');
                })
                ->paginate(20);
        } else if ($this->defaultFilter === 'Municipalities') {
            $locationData = Municipality::with('province')
                ->where('municipality_Name', 'like', '%' . $this->search . '%')
                ->orWhereHas('province', function ($query) {
                    $query->where('province_Name', 'like', '%' . $this->search . '%');
                })
                ->paginate(20);
        } else if ($this->defaultFilter === 'Provinces') {
            $locationData = Province::where('province_Name', 'like', '%' . $this->search . '%')
                ->paginate(20);
        }

        return view('livewire.location-management-admin.location-table', compact('locationData'));
    }
}
