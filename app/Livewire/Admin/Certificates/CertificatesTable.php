<?php

namespace App\Livewire\Admin\Certificates;

use App\Models\Certificate_Type;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CertificatesTable extends Component
{

    use WithPagination;
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
        $query = Certificate_Type::where('cert_Name', 'like', '%' . $this->search . '%')
            ->orWhere("cert_Code", "like", '%' . $this->search . '%');

        $certificate_type = $query->get();

        $hello = 2;
        return view('livewire.admin.certificates.certificates-table', compact('hello'));

    }
}
