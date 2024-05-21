<?php

namespace App\Livewire\Admin\Requirements;

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
        $query = Requirements::where('requirement_Title', 'like', '%' . $this->search . '%');

        if (!empty($this->filter)) {
            $query->where('requirement_Status', '=', $this->filter);
        }

        $requirements = $query->paginate($this->rows);

        return view('livewire.admin.requirements.requirements-table', compact('requirements'));
    }
}
