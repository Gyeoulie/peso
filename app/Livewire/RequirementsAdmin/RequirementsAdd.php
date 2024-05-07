<?php

namespace App\Livewire\RequirementsAdmin;

use App\Models\Requirements;
use Illuminate\Validation\Rule;
use Livewire\Component;

class RequirementsAdd extends Component
{

    public $reqPost;
    public $statusPost;

    public function rules()
    {
        return [
            'reqPost' => ['required', 'string', Rule::unique('requirements', 'requirement_Description')],
            'statusPost' => ['required', 'string'],
        ];
    }

    public function addReq()
    {

        $this->validate();

        try {
            // Create the user record
            Requirements::create([
                'requirement_Description' => strtoupper($this->reqPost),
                'requirement_Type' => $this->statusPost,
            ]);

            $this->reset();
            toastr()->success('New Requirement Created!');

        } catch (\Exception $e) {
            $this->reset();
            // Show error toastr notification
            toastr()->error('There was an Error');
        }
        $this->dispatch('reload-table');
    }

    public function render()
    {
        return view('livewire.requirements-admin.requirements-add');
    }
}
