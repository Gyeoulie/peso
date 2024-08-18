<?php

namespace App\Livewire\Admin\EligibilityLicense;

use App\Models\Eligibility_Type;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EligibilityAddModal extends Component
{

    public $eligibilityPost;
    public $ecodePost;

    public function rules()
    {
        return [
            'eligibilityPost' => ['required', 'string', Rule::unique('eligibility_type', 'eligibility_Name')],
            'ecodePost' => ['required', 'string', Rule::unique('eligibility_type', 'eligibility_Code')],
        ];
    }

    public function addEligibility()
    {

        $this->validate();

        try {
            // Create the user record
            Eligibility_Type::create([
                'eligibility_Name' => strtoupper($this->eligibilityPost),
                'eligibility_Code' => strtoupper($this->ecodePost),
            ]);

            $this->close();
            toastr()->success('Eligibilty Record Created!');
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
        return view('livewire.admin.eligibility-license.eligibility-add-modal');
    }
}
