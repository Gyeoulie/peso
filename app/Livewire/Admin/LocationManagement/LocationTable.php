<?php

namespace App\Livewire\Admin\LocationManagement;

use App\Models\Barangay;
use App\Models\Municipality;
use App\Models\Province;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class LocationTable extends Component
{

    use WithPagination;
    public $defaultFilter;

    public $search;

    public function mount()
    {
        // Initialize the public key
        $this->defaultFilter = 'Barangay';
    }

    public function editModal($modal, $id)
    {

        $this->dispatch($modal, $id);
    }

    public function updatePublicKey($newValue)
    {
        // Update the public key
        $this->defaultFilter = $newValue;
    }

    #[On('reload-table')]
    public function render()
    {

        // $locationData = Barangay::with('municipality.province')
        // ->join('municipality', 'barangay.municipality_id', '=', 'municipality.municipality_id')
        // ->leftJoin('province', 'municipality.province_id', '=', 'province.province_id')
        // ->where('barangay.barangay_Name', 'like', '%' . $this->search . '%')
        // ->orWhere('municipality.municipality_Name', 'like', '%' . $this->search . '%')
        // ->orWhere('province.province_Name', 'like', '%' . $this->search . '%')
        // ->orderBy('province.province_Name', 'asc')
        // ->paginate(20);

        if ($this->defaultFilter === 'Barangay') {
            $locationData = Barangay::with('municipality.province')
                ->where('barangay_Name', 'like', '%' . $this->search . '%')
                ->orWhereHas('municipality', function ($query) {
                    $query->where('municipality_Name', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('municipality.province', function ($query) {
                    $query->where('province_Name', 'like', '%' . $this->search . '%');
                })
                ->paginate(10);
        } else if ($this->defaultFilter === 'Municipalities') {
            $locationData = Municipality::with('province')
                ->where('municipality_Name', 'like', '%' . $this->search . '%')
                ->orWhereHas('province', function ($query) {
                    $query->where('province_Name', 'like', '%' . $this->search . '%');
                })
                ->paginate(10);
        } else if ($this->defaultFilter === 'Provinces') {
            $locationData = Province::where('province_Name', 'like', '%' . $this->search . '%')
                ->paginate(10);
        }

        return view('livewire.admin.location-management.location-table', compact('locationData'));
    }
}
