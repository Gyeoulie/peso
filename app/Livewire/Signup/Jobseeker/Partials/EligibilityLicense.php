<?php

namespace App\Livewire\Signup\Jobseeker\Partials;

use Livewire\Attributes\On;
use Livewire\Component;

class EligibilityLicense extends Component
{

    public $eligibilityData = [], $licenseData = [];

    public function editEligibility($id)
    {
        $this->dispatch('editEligibility', id: $id);
    }

    public function removeEligibility($id)
    {
        $index = array_search($id, array_column($this->eligibilityData, 'eligibilityId'));

        if ($index !== false) {
            unset($this->eligibilityData[$index]);
            $this->eligibilityData = array_values($this->eligibilityData);
            toastr()->error('Record removed!');

        }
    }

    public function editLicense($id)
    {
        $this->dispatch('editLicense', id: $id);
    }

    public function removeLicense($id)
    {
        $index = array_search($id, array_column($this->licenseData, 'licenseId'));

        if ($index !== false) {
            unset($this->licenseData[$index]);
            $this->licenseData = array_values($this->licenseData);
            toastr()->error('Record removed!');

        }
    }

    #[On('refreshEligibilityLicense')]
    public function render()
    {
        return view('livewire.signup.jobseeker.partials.eligibility-license');
    }
}
