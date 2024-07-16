<?php

namespace App\Livewire\Admin\Certificates;

use App\Models\Certificate_Type;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CertificatesAdd extends Component
{
    public $certCode;
    public $certName;

    public function rules()
    {
        return [
            'certCode' => ['required', 'string', Rule::unique('certificate_type', 'cert_Code')],
            'certName' => ['required', 'string'],
        ];
    }

    public function addCert()
    {

        $this->validate();

        try {
            // Create the user record
            Certificate_Type::create([
                'cert_Code' => strtoupper($this->certCode),
                'cert_Name' => $this->certName,
            ]);

            $this->reset();
            toastr()->success('New Certificate Created!');

        } catch (\Exception $e) {
            $this->reset();
            // Show error toastr notification
            toastr()->error('There was an Error');
        }
        $this->dispatch('reload-table');
    }

    public function render()
    {
        // return view('livewire.certificates-admin.certificates-add');
        return view('livewire.admin.certificates.certificates-add');

    }
}
