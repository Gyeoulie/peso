<?php

namespace App\Livewire\CertificatesAdmin;

use App\Models\Certificate_Type;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class CertificatesTable extends Component
{

    public $search;
    public $rows = 5;
    public $orderBy = '';

    public function editCert($id)
    {
        $this->dispatch('edit-cert', $id);
    }

    #[On('reload-table')]
    public function render()
    {
        $query = Certificate_Type::where('cert_Name','like','%' . $this->search . '%')
        ->orWhere("cert_Code","like",'%' . $this->search . '%');


        $certificate_type = $query->paginate($this->rows);

        return view('livewire.certificates-admin.certificates-table', compact('certificate_type'));
    }
}
