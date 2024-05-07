<?php

namespace App\Livewire\PositionIndustry;

use App\Models\Job_Positions;
use Illuminate\Validation\Rule;
use Livewire\Component;

class PositionAddModal extends Component
{

    public $positionPost;
    public $pcodePost;
    public function rules()
    {
        return [
            'pcodePost' => ['required', 'string', Rule::unique('job_positions', 'position_Code')],
            'positionPost' => ['required', 'string', Rule::unique('job_positions', 'position_Title')],
        ];
    }

    public function addPosition()
    {

        $validatedData = $this->validate();

        try {
            // Create the user record
            Job_Positions::create([
                'position_Code' => strtoupper($this->pcodePost),
                'position_Title' => strtoupper($this->positionPost), // Validate role selection
            ]);

            $this->close();
            toastr()->success('Job Position Created!');
        } catch (\Exception $e) {
            $this->close();
            // Show error toastr notification
            toastr()->error('There was an Error');
        }
        $this->dispatch('reload-table');

    }

    public function close()
    {
        $this->reset();
        $this->dispatch('close');
    }
    public function render()
    {
        return view('livewire.position-industry.position-add-modal');
    }
}
