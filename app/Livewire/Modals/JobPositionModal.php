<?php

namespace App\Livewire\Modals;

use App\Models\Job_Positions;
use Livewire\Component;
use Livewire\WithPagination;

class JobPositionModal extends Component
{

    use WithPagination;
    public $search;

    public function positionSelect($id)
    {
        $this->dispatch('positionSelect', id: $id);

    }
    public function render()
    {

        $jobposition = Job_Positions::where('position_Title', 'like', '%' . $this->search . '%')
            ->paginate(8, ['*'], 'jobTags');

        return view('livewire.modals.job-position-modal', compact('jobposition'));
    }
}
