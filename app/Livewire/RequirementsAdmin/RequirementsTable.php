<?php

namespace App\Livewire\RequirementsAdmin;

use App\Models\Requirements;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class RequirementsTable extends Component
{
    use WithPagination;
    public $search;
    public $rows = 5;

    public $filter = '';

    public function editReq($id)
    {
        $this->dispatch('edit-req', $id);
    }

    public function updateFilter($filter)
    {
        $this->filter = $filter;
    }

    #[On('reload-table')]
    public function render()
    {
        $query = Requirements::where('requirement_Description', 'like', '%' . $this->search . '%');

        if (!empty($this->filter)) {
            $query->where('requirement_Type', '=', $this->filter);
        }

        $requirements = $query->paginate($this->rows);

        return view('livewire.requirements-admin.requirements-table', compact('requirements'));
    }
}
