<?php

namespace App\Livewire\EligibilityLicense;

use App\Models\License_Type;
use Illuminate\Validation\Rule;
use Livewire\Component;

class LicenseAddModal extends Component
{
    public $licensePost;
    public $lcodePost;

    public function rules()
    {
        return [
            'licensePost' => ['required', 'string', Rule::unique('license_type', 'license_name')],
            'lcodePost' => ['required', 'string', Rule::unique('license_type', 'license_code')],
        ];
    }

    public function addLicense()
    {

        $this->validate();

        try {
            // Create the user record
            License_Type::create([
                'license_name' => strtoupper($this->licensePost),
                'license_code' => strtoupper($this->lcodePost),
            ]);

            $this->close();
            toastr()->success('License Record Created!');
        } catch (\Exception $e) {
            $this->close();
            // Show error toastr notification
            toastr()->error('There was an Error');
        }
        $this->dispatch('reload-table');

    }

    public function close()
    {
        $this->reset();
        $this->dispatch('close');
    }
    public function render()
    {
        return view('livewire.eligibility-license.license-add-modal');
    }
}
