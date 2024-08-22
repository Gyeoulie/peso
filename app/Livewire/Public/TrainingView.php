<?php

namespace App\Livewire\Public;

use App\Models\Programs;
use Livewire\Attributes\Layout;
use Livewire\Component;

class TrainingView extends Component
{

    #[Layout('layouts.app')]

    public $id;

    public function render()
    {

        $isRegistered = false;
        $ProgramInfo = Programs::withCount('attendedJobseekers')->find($this->id);

        return view('livewire.public.training-view', compact('ProgramInfo'));
    }
}
