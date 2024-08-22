<?php

namespace App\Livewire\Admin\Training;

use App\Models\Programs;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class TrainingList extends Component
{

    public $search;

    public $rows = 10;

    public function render()
    {
        $user = Auth::user();

        $programList = Programs::where('municipality_id', '=', $user->peso->municipality_id)
            ->withCount(['program_reg', 'attendedJobseekers'])
            ->where(function ($query) {
                $query->where('program_Title', 'like', '%' . $this->search . '%')
                    ->orWhereHas('job_industry', function ($query) {
                        $query->where('industry_Title', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('program_tags.job_positions', function ($query) {
                        $query->where('position_Title', 'like', '%' . $this->search . '%');
                    });
            })
            ->paginate($this->rows);

        return view('livewire.admin.training.training-list', compact('programList'));
    }
}
