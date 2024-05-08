<?php

namespace App\Livewire\Employer\Jobpost;

use App\Models\Job_Industry;
use Livewire\Component;
use Livewire\WithPagination;

class IndustryModal extends Component
{
    use WithPagination;
    public $search;

    public function industrySelect($id)
    {
        $this->dispatch('industrySelect', $id);
        $this->dispatch('close');
        $this->resetPage();
    }

    public function render()
    {

        $industry = Job_Industry::where('industry_Title', 'like', '%' . $this->search . '%')
            ->paginate(8, ['*'], 'industry');

        return view('livewire.employer.jobpost.industry-modal', compact('industry'));
    }
}
