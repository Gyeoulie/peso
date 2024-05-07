<?php

namespace App\Livewire\LocationManagementAdmin;

use App\Models\Barangay;
use App\Models\Municipality;
use App\Models\Province;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class AddLocations extends Component
{

    //Add Barangay
    #[Rule('required', 'string')]
    public $barPost;
    #[Rule('required', 'string')]
    public $bcodePost;
    #[Rule('required', 'string')]
    public $munSelect;
    #[Rule('required')]
    public $munHidden;

    // Add Municipality
    #[Rule('required', 'string')]
    public $munPost;
    #[Rule('required', 'string')]
    public $mcodePost;
    #[Rule('required', 'string')]
    public $provSelect;
    #[Rule('required')]
    public $provHidden;

    // Add Province
    #[Rule('required', 'string')]
    public $provPost;
    #[Rule('required', 'string')]
    public $pcodePost;

    #[On('setMun')]
    public function setMun($id)
    {
        $municipality = Municipality::find($id);

        // Check if the municipality exists
        if ($municipality) {
            // Get the province name using the 'province' relationship
            $provinceName = $municipality->province->province_Name;

            // Combine the municipality name and province name
            $result = $municipality->municipality_Name . ' , ' . $provinceName;

            // Return the result
            $this->munSelect = $result;
            $this->munHidden = $id;
        }

    }

    #[On('setProv')]
    public function setProv($id)
    {
        $province = Province::find($id);

        // Check if the municipality exists
        if ($province) {

            $this->provSelect = $province->province_Name;
            $this->provHidden = $id;
        }

    }

    public function addProv()
    {
        $this->validate([
            'provPost' => 'required|string',
            'pcodePost' => 'required|string',

        ]);

        try {
            // Create the user record
            Province::create([
                'province_Name' => strtoupper($this->provPost),
                'province_Code' => strtoupper($this->pcodePost),
            ]);

            $this->reset();
            toastr()->success('Province Added!');
        } catch (\Exception $e) {
            $this->reset();
            // Show error toastr notification
            toastr()->error('There was an Error');
        }
        $this->dispatch('reload-table');

    }

    public function addMun()
    {
        $this->validate([
            'munPost' => 'required|string',
            'mcodePost' => 'required|string',
            'provSelect' => 'required|string',
            'provHidden' => 'required',
        ]);

        try {
            // Create the user record
            Municipality::create([
                'province_id' => $this->provHidden,
                'municipality_Name' => strtoupper($this->munPost),
                'municipality_Code' => strtoupper($this->mcodePost),
            ]);

            $this->reset();
            toastr()->success('Barangay Added!');
        } catch (\Exception $e) {
            $this->reset();
            // Show error toastr notification
            toastr()->error('There was an Error');
        }
        $this->dispatch('reload-table');

    }

    public function addBar()
    {
        $this->validate([
            'barPost' => 'required|string',
            'bcodePost' => 'required|string',
            'munSelect' => 'required|string',
            'munHidden' => 'required',
        ]);

        try {
            // Create the user record
            Barangay::create([
                'municipality_id' => $this->munHidden,
                'barangay_Name' => strtoupper($this->barPost),
                'barangay_Code' => strtoupper($this->bcodePost),
            ]);

            $this->reset();
            toastr()->success('Barangay Added!');
        } catch (\Exception $e) {
            $this->reset();
            // Show error toastr notification
            toastr()->error('There was an Error');
        }
        $this->dispatch('reload-table');

    }

    public function render()
    {
        return view('livewire.location-management-admin.add-locations');
    }
}
