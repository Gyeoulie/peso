<?php

namespace App\Livewire\Public;

use App\Models\Programs;
use App\Models\Program_Reg;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Trainings extends Component
{
    public function render()
    {

        $programList = Programs::orderBy('created_at', 'desc')->get();

        $user = Auth::user();

        $programHistory = Program_Reg::where('employee_id', $user->employee->employee_id)
            ->paginate(10);

        return view('livewire.public.trainings', compact('programList', 'programHistory'));
    }
}
