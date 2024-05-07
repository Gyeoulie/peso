<?php

namespace App\Livewire\EligibilityLicense;

use App\Models\Eligibility_Type;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class EligibilityEditModal extends Component
{
    public $eligibilityId;
    public $eligibilityPost;
    public $ecodePost;

    public function rules()
    {
        return [
            'eligibilityId' => ['required'],
            'ecodePost' => ['required', 'string', Rule::unique('eligibility_type', 'eligibility_Code')->ignore($this->eligibilityId, 'eligibility_type_id')],
            'eligibilityPost' => ['required', 'string', Rule::unique('eligibility_type', 'eligibility_Name')->ignore($this->eligibilityId, 'eligibility_type_id')],
        ];
    }

    #[On('edit-eligibility')]
    public function editEligibility($id)
    {

        $eligibility = Eligibility_Type::find($id);

        if ($eligibility) {
            $this->eligibilityId = $eligibility->eligibility_type_id;
            $this->eligibilityPost = $eligibility->eligibility_Name;
            $this->ecodePost = $eligibility->eligibility_Code;
            $this->dispatch('open-modal', 'edit-eligibility-modal');
        } else {
            toastr()->error('Could not fetch data');
        }

    }

    public function updateEligibility()
    {

        $this->validate();

        try {
            // Create the user record
            Eligibility_Type::where('eligibility_type_id', $this->eligibilityId)->update([
                'eligibility_Name' => strtoupper($this->eligibilityPost),
                'eligibility_Code' => strtoupper($this->ecodePost),
            ]);

            toastr()->success('Eligibility Updated!');
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
        return view('livewire.eligibility-license.eligibility-edit-modal');
    }
}
