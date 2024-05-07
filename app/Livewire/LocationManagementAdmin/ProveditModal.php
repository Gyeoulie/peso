<?php

namespace App\Livewire\LocationManagementAdmin;

use App\Models\Province;
use Livewire\Attributes\On;
use Livewire\Component;

class ProveditModal extends Component
{
    public $search;

    public $provID;
    public $provPost;
    public $pcodePost;

    public function provUpdate()
    {
        $this->validate([
            'provID' => 'required',
            'provPost' => 'required|string',
            'pcodePost' => 'required|string',
        ]);

        try {
            // Create the user record
            Province::where('province_id', $this->provID)->update([
                'province_Name' => strtoupper($this->provPost),
                'province_Code' => strtoupper($this->pcodePost),
            ]);

            toastr()->success('Province Updated!');
        } catch (\Exception $e) {

            // Show error toastr notification
            toastr()->error('There was an Error');
        }
        $this->close();
        $this->dispatch('reload-table');

    }

    #[On('edit-prov')]
    public function editProv($id)
    {

        $province = Province::find($id);

        if ($province) {
            $this->provID = $province->province_id;
            $this->provPost = $province->province_Name;
            $this->pcodePost = $province->province_Code;

            $this->dispatch('open-modal', 'prov-edit-modal');
        }

    }

    public function close()
    {
        $this->reset();
        $this->dispatch('close');
    }public function render()
    {
        return view('livewire.location-management-admin.provedit-modal');
    }
}
