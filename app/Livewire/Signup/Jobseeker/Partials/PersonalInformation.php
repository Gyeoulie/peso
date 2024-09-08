<?php

namespace App\Livewire\Signup\Jobseeker\Partials;

use App\Models\Barangay;
use Livewire\Attributes\On;
use Livewire\Component;

class PersonalInformation extends Component
{

    public $address, $barangayID, $civilstatus = "", $religion = "", $phone, $tin, $height;
    public $disabilityBox = [];
    public $otherDisability;

    public $mun, $prov, $bar;

    public $stepNumber = 2;

    #[On('barSelect')]
    public function barSelect($id)
    {
        $barangay = Barangay::findOrFail($id);

        if ($barangay) {
            $this->barangayID = $id;
            $this->bar = $barangay->barangay_Name;
            $this->mun = $barangay->municipality->municipality_Name;
            $this->prov = $barangay->municipality->province->province_Name;

        }

    }

    public function next()
    {

        $rules = [
            'address' => 'required|string|max:255',
            'barangayID' => 'required',
            'civilstatus' => 'required|in:1,2,3',
            'religion' => 'required',
            'phone' => 'required|regex:/^09\d{9}$/',
            'tin' => 'nullable|digits:9|unique:employee,tinnum',
            'height' => 'nullable|numeric|digits_between:1,3',
        ];

        $messages = [
            'address.required' => 'The address is required.',
            'address.string' => 'The address must be a string.',
            'address.max' => 'The address must not exceed 255 characters.',
            'barangayID.required' => 'The barangay ID is required.',
            'civilstatus.required' => 'The civil status is required.',
            'civilstatus.in' => 'The civil status must be one of the provided values.',
            'religion.required' => 'The religion is required.',
            'religion.string' => 'The religion must be a string.',
            'phone.required' => 'The phone number is required.',
            'phone.regex' => 'The phone number must start with 09 and be exactly 11 digits long.',
            'tin.digits' => 'The TIN must be 11 digits long.',
            'height.numeric' => 'The height must be a number.',
            'height.digits_between' => 'The height must be between 1 and 3 digits long.',

        ];

        $this->validate($rules, $messages);

        $this->dispatch('handleStepData', $this->stepNumber, [
            'address' => $this->address,
            'barangayID' => $this->barangayID,
            'civilstatus' => $this->civilstatus,
            'religion' => $this->religion,
            'phone' => $this->phone,
            'tin' => $this->tin,
            'height' => $this->height,
            'disabilityBox' => $this->disabilityBox,
            'otherDisability' => $this->otherDisability,
        ]);

        $this->dispatch('nextStep');
    }

    public function prev()
    {
        $this->dispatch('prevStep');
    }
    public function render()
    {
        return view('livewire.signup.jobseeker.partials.personal-information');
    }
}
