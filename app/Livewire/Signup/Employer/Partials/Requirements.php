<?php

namespace App\Livewire\Signup\Employer\Partials;

use App\Models\Requirements as ModelsRequirements;
use Livewire\Component;
use Livewire\WithFileUploads;

class Requirements extends Component
{

    use WithFileUploads;
    public $req = [];

    public $stepNumber = 3;

    public function mount()
    {
        // Fetch all requirements
        $requirements = ModelsRequirements::all();

        // Initialize the $req array with requirement IDs
        foreach ($requirements as $requirement) {
            $this->req[$requirement->requirement_id] = null;
        }
    }

    public function next()
    {
        $validationRules = [];
        $reqData = [];

        foreach ($this->req as $requirementId => $file) {
            $validationRules['req.' . $requirementId] = 'mimes:pdf';
        }

        $this->validate($validationRules);

        foreach ($this->req as $requirementId => $file) {
            if ($file) {
                // Store the file temporarily

                $tempPath = $file->store('temp/requirements', 'public');

                $reqData[] = [
                    'requirement_id' => $requirementId,
                    'temp_path' => $tempPath,
                ];
            }
        }

        $this->dispatch('handleStepData', $this->stepNumber, [
            'reqData' => $reqData,

        ]);

        $this->dispatch('nextStep');

    }

    public function render()
    {

        $requirements = ModelsRequirements::where('requirement_Status', 1);

        return view('livewire.signup.employer.partials.requirements', compact('requirements'));
    }
}
