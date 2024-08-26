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
    public $ticket = [];

    public function viewTicket($id)
    {

        $data = Program_Reg::findOrFail($id);

        if ($data) {

            $this->ticket = json_encode([
                'program_reg_id' => $data->program_reg_id,
                'program_id' => $data->program_id,
                'employee_id' => $data->employee_id,
                'created_at' => $data->created_at->format('Y-m-d H:i:s'), // Explicitly format the timestamp
            ]);

            $this->dispatch('open-modal', 'ticket-modal');

        }

    }

    public function closeTicket()
    {
        $this->dispatch('close-modal', 'ticket-modal');
        $this->reset('ticket');
    }
    public function render()
    {

        $programList = Programs::orderBy('created_at', 'desc')->get();

        $user = Auth::user();

        $programHistory = Program_Reg::where('employee_id', $user->employee->employee_id)
            ->paginate(10);

        return view('livewire.public.trainings', compact('programList', 'programHistory'));
    }
}
