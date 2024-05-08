<?php

namespace App\Livewire\Admin\EligibilityLicense;

use App\Models\License_Type;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class LicenseEditModal extends Component
{

    public $licenseId;
    public $licensePost;
    public $lcodePost;

    public function rules()
    {
        return [
            'licenseId' => ['required'],
            'lcodePost' => ['required', 'string', Rule::unique('license_type', 'license_Code')->ignore($this->licenseId, 'license_type_id')],
            'licensePost' => ['required', 'string', Rule::unique('license_type', 'license_Name')->ignore($this->licenseId, 'license_type_id')],
        ];
    }

    #[On('edit-license')]
    public function editLicense($id)
    {

        $license = License_Type::find($id);

        if ($license) {
            $this->licenseId = $license->license_type_id;
            $this->licensePost = $license->license_Name;
            $this->lcodePost = $license->license_Code;
            $this->dispatch('open-modal', 'edit-license-modal');
        } else {
            toastr()->error('Could not fetch data');
        }

    }

    public function updateLicense()
    {

        $this->validate();

        try {
            // Create the user record
            License_Type::where('license_type_id', $this->licenseId)->update([
                'license_Name' => strtoupper($this->licensePost),
                'license_Code' => strtoupper($this->lcodePost),
            ]);

            toastr()->success('License Updated!');
        } catch (\Exception $e) {

            // Show error toastr notification
            toastr()->error('There was an Error');
        }
        $this->close();
        $this->dispatch('reload-table');
    }

    public function close()
    {
        $this->reset();
        $this->dispatch('close');
    }
    public function render()
    {
        return view('livewire.admin.eligibility-license.license-edit-modal');
    }
}
