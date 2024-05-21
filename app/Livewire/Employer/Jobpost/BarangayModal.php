<?php

namespace App\Livewire\Employer\Jobpost;

use App\Models\Barangay;
use Livewire\Component;
use Livewire\WithPagination;

class BarangayModal extends Component
{

    use WithPagination;

    public $search;

    public function barSelect($id)
    {
        $this->dispatch('barSelect', $id);
        $this->dispatch('close');
        $this->resetPage();
    }

    public function render()
    {

        $barangay = Barangay::with('municipality.province')
            ->where('barangay_Name', 'like', '%' . $this->search . '%')
            ->orWhereHas('municipality', function ($query) {
                $query->where('municipality_Name', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('municipality.province', function ($query) {
                $query->where('province_Name', 'like', '%' . $this->search . '%');
            })
            ->paginate(10, ['*'], 'barangay');

        return view('livewire.employer.jobpost.barangay-modal', compact('barangay'));
    }
}
