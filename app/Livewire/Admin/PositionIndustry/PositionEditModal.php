<?php

namespace App\Livewire\Admin\PositionIndustry;

use App\Models\Job_Positions;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class PositionEditModal extends Component
{

    public $positionId;
    public $positionPost;
    public $pcodePost;

    public function rules()
    {
        return [
            'positionId' => ['required'],
            'pcodePost' => ['required', 'string', Rule::unique('job_positions', 'position_Code')->ignore($this->positionId, 'position_id')],
            'positionPost' => ['required', 'string', Rule::unique('job_positions', 'position_Title')->ignore($this->positionId, 'position_id')],
        ];
    }

    #[On('edit-pos')]
    public function editPos($id)
    {
        $jobposition = Job_Positions::find($id);

        if ($jobposition) {
            $this->positionId = $jobposition->position_id;
            $this->positionPost = $jobposition->position_Title;
            $this->pcodePost = $jobposition->position_Code;
            $this->dispatch('open-modal', 'edit-position-modal');
        } else {
            toastr()->error('Could not fetch data');
        }

    }

    public function updatePosition()
    {

        $this->validate();

        try {
            // Create the user record
            Job_Positions::where('position_id', $this->positionId)->update([
                'position_Title' => strtoupper($this->positionPost),
                'position_Code' => strtoupper($this->pcodePost),
            ]);

            toastr()->success('Job Position Updated!');
        } catch (\Exception $e) {

            // Show error toastr notification
            toastr()->error('There was an Error');
        }
        $this->close();
        $this->dispatch('reload-table');
    }

    public function close()
    {
        $this->reset();
        $this->dispatch('close');
    }
    public function render()
    {
        return view('livewire.admin.position-industry.position-edit-modal');
    }
}
