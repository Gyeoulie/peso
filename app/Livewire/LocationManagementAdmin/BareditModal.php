<?php

namespace App\Livewire\LocationManagementAdmin;

use App\Models\Barangay;
use App\Models\Municipality;
use Livewire\Attributes\On;
use Livewire\Component;

class BareditModal extends Component
{

    public $search;

    public $barID;
    public $barPost;
    public $bcodePost;
    public $munSelect;
    public $munHidden;

    public function barUpdate()
    {
        $this->validate([
            'barID' => 'required',
            'barPost' => 'required|string',
            'bcodePost' => 'required|string',
            'munSelect' => 'required|string',
            'munHidden' => 'required',
        ]);

        try {
            // Create the user record
            Barangay::where('barangay_id', $this->barID)->update([
                'municipality_id' => $this->munHidden,
                'barangay_Name' => $this->barPost,
                'barangay_Code' => $this->bcodePost,
            ]);

            toastr()->success('Barangay Updated!');
        } catch (\Exception $e) {

            // Show error toastr notification
            toastr()->error('There was an Error');
        }
        $this->close();
        $this->dispatch('reload-table');

    }
    public function updateMunSelect($id)
    {
        $municipality = Municipality::with('province')->find($id);

        if ($municipality) {
            $this->munSelect = $municipality->municipality_Name;
            $this->munHidden = $municipality->municipality_id;

            $this->dispatch('open-modal', 'bar-edit-modal');
        }

    }

    #[On('edit-bar')]
    public function editBar($id)
    {

        $barangay = Barangay::with('municipality')->find($id);

        if ($barangay) {
            $this->barID = $barangay->barangay_id;
            $this->barPost = $barangay->barangay_Name;
            $this->bcodePost = $barangay->barangay_Code;
            $this->munSelect = $barangay->municipality->municipality_Name;
            $this->munHidden = $barangay->municipality->municipality_id;

            $this->dispatch('open-modal', 'bar-edit-modal');
        }

    }

    public function close()
    {
        $this->reset();
        $this->dispatch('close');
    }

    public function render()
    {
        $municipalities = Municipality::with('province')
            ->where('municipality_Name', 'like', '%' . $this->search . '%')
            ->orWhereHas('province', function ($query) {
                $query->where('province_Name', 'like', '%' . $this->search . '%');
            })
            ->get();

        return view('livewire.location-management-admin.baredit-modal', compact('municipalities'));
    }
}
