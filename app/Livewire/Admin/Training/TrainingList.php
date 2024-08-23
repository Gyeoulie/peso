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

    public $filter, $sortType, $sortDate;

    public function updateFilter($filter)
    {
        $this->filter = $filter;
        $this->reset('sortType', 'sortDate', 'search');
    }

    public function updateSort($value, $type)
    {

        if ($type == 1) {
            $this->sortType = $value;
        } else if ($type == 2) {
            $this->sortDate = $value;
        }
        $this->reset('search');

    }

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
            });

        if ($this->filter === "ALL") {
            $programList->orderByRaw("FIELD(program_Status, 'ACTIVE') DESC");
        } elseif ($this->filter === 'ACTIVE') {
            $programList->where('program_Status', 'ACTIVE');
        } elseif ($this->filter === 'OTHERS') {
            $programList->whereNotIn('program_Status', ['ACTIVE']);
        }

        if ($this->sortType) {
            $programList->where('program_Type', $this->sortType);
        }
        if ($this->sortDate) {
            $programList->orderBy('created_at', $this->sortDate);
        }

        $programList = $programList->orderBy('created_at', 'DESC')->paginate($this->rows);

        return view('livewire.admin.training.training-list', compact('programList'));
    }
}
