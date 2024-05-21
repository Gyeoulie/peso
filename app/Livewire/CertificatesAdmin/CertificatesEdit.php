<?php

namespace App\Livewire\CertificatesAdmin;

use App\Models\Certificate_Type;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;

class CertificatesEdit extends Component
{
    public $certId;
    public $certCodeInput;
    public $certNameInput;

    public function rules()
    {
        return [
            'certId' => ['required'],
            'certCodeInput' => ['required', 'string', Rule::unique('certificate_type', 'cert_Code')->ignore($this->certId, 'cert_type_id')],
            'certNameInput' => ['required'],
        ];
    }

    public function updateCert()
    {
        $this->validate();

        try {
            // Create the user record
            Certificate_Type::where('cert_type_id', $this->certId)->update([
                'cert_Code' => strtoupper($this->certCodeInput),
                'cert_Name' => $this->certNameInput,
            ]);

            toastr()->success('Certificate Updated!');
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

    #[On('edit-cert')]
    public function editCert($id)
    {

        $certType = Certificate_Type::find($id);

        if ($certType) {
            $this->certId = $certType->cert_type_id;
            $this->certCodeInput = $certType->cert_Code;
            $this->certNameInput = $certType->cert_Name;
            $this->dispatch('open-modal', 'edit-certificates-admin-modal');
        } else {
            toastr()->error('Could not fetch data');
        }

    }


    public function render()
    {
        return view('livewire.certificates-admin.certificates-edit');
    }
}
