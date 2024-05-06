<?php

namespace App\Livewire\LocationManagementAdmin;

use App\Models\Municipality;
use App\Models\Province;
use Livewire\Attributes\On;
use Livewire\Component;

class MuneditModal extends Component
{

    public $search;

    public $munID;
    public $munPost;
    public $mcodePost;
    public $provSelect;
    public $provHidden;

    public function munUpdate()
    {
        $this->validate([
            'munID' => 'required',
            'munPost' => 'required|string',
            'mcodePost' => 'required|string',
            'provSelect' => 'required|string',
            'provHidden' => 'required',
        ]);

        try {
            // Create the user record
            Municipality::where('municipality_id', $this->munID)->update([
                'province_id' => $this->provHidden,
                'municipality_Name' => $this->munPost,
                'municipality_Code' => $this->mcodePost,
            ]);

            toastr()->success('Municipality Updated!');
        } catch (\Exception $e) {

            // Show error toastr notification
            toastr()->error('There was an Error');
        }
        $this->close();
        $this->dispatch('reload-table');

    }
    public function updateMunSelect($id)
    {
        $province = Province::find($id);

        if ($province) {
            $this->provSelect = $province->province_Name;
            $this->provHidden = $province->province_id;

            $this->dispatch('open-modal', 'mun-edit-modal');
        }

    }

    #[On('edit-mun')]
    public function editMun($id)
    {

        $municipality = Municipality::with('province')->find($id);

        if ($municipality) {
            $this->munID = $municipality->municipality_id;
            $this->munPost = $municipality->municipality_Name;
            $this->mcodePost = $municipality->municipality_Code;
            $this->provSelect = $municipality->province->province_Name;
            $this->provHidden = $municipality->province->province_id;

            $this->dispatch('open-modal', 'mun-edit-modal');
        }

    }

    public function close()
    {
        $this->reset();
        $this->dispatch('close');
    }

    public function render()
    {
        $provinces = Province::query()
            ->where('province_Name', 'like', '%' . $this->search . '%')
            ->get();
        return view('livewire.location-management-admin.munedit-modal', compact('provinces'));
    }
}
