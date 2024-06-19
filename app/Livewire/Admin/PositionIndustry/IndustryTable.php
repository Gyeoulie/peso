<?php

namespace App\Livewire\Admin\PositionIndustry;

use App\Models\Job_Industry;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class IndustryTable extends Component
{
    use WithPagination, WithoutUrlPagination; 

    public $rows = 10;

    public $search;

    public function editIndustry($id)
    {
        $this->dispatch('edit-industry', $id);
    }

    #[On('reload-table')]
    public function render()
    {
        $industry = Job_Industry::where('industry_Title', 'like', '%' . $this->search . '%')
            ->orderBy('industry_Title', 'asc')
            ->paginate($this->rows);

        return view('livewire.admin.position-industry.industry-table', compact('industry'));
    }
}
