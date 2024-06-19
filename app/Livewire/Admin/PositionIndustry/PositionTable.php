<?php

namespace App\Livewire\Admin\PositionIndustry;

use App\Models\Job_Positions;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class PositionTable extends Component
{

    use WithPagination, WithoutUrlPagination; 

    public $rows = 10;

    public $search;

    public function editPos($id)
    {
        $this->dispatch('edit-pos', $id);
    }

    #[On('reload-table')]
    public function render()
    {

        $jobpositions = Job_Positions::where('position_Title', 'like', '%' . $this->search . '%')
            ->orderBy('position_Title', 'asc')
            ->paginate($this->rows);

        return view('livewire.admin.position-industry.position-table', compact('jobpositions'));
    }
}
