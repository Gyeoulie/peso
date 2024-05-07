<?php

namespace App\Livewire\RequirementsAdmin;

use App\Models\Requirements;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class RequirementsEdit extends Component
{

    public $reqId;
    public $reqPost;
    public $statusPost;

    public function rules()
    {
        return [
            'reqId' => ['required'],
            'reqPost' => ['required', 'string', Rule::unique('requirements', 'requirement_Description')->ignore($this->reqId, 'requirement_id')],
            'statusPost' => ['required'],
        ];
    }

    public function updateReq()
    {
        $this->validate();

        try {
            // Create the user record
            Requirements::where('requirement_id', $this->reqId)->update([
                'requirement_Description' => strtoupper($this->reqPost),
                'requirement_Type' => $this->statusPost,
            ]);

            toastr()->success('Requirement Updated!');
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

    #[On('edit-req')]
    public function editReq($id)
    {

        $requirement = Requirements::find($id);

        if ($requirement) {
            $this->reqId = $requirement->requirement_id;
            $this->reqPost = $requirement->requirement_Description;
            $this->statusPost = $requirement->requirement_Type;
            $this->dispatch('open-modal', 'edit-requirement-modal');
        } else {
            toastr()->error('Could not fetch data');
        }

    }

    public function render()
    {
        return view('livewire.requirements-admin.requirements-edit');
    }
}
