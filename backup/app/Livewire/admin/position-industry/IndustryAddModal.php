<?php

namespace App\Livewire\Admin\PositionIndustry;

use App\Models\Job_Industry;
use Illuminate\Validation\Rule;
use Livewire\Component;

class IndustryAddModal extends Component
{
    public $industryPost;
    public $icodePost;
    public function rules()
    {
        return [
            'icodePost' => ['required', 'string', Rule::unique('job_industry', 'industry_Code')],
            'industryPost' => ['required', 'string', Rule::unique('job_industry', 'industry_Title')],
        ];
    }

    public function addIndustry()
    {

        $validatedData = $this->validate();

        try {
            // Create the user record
            Job_Industry::create([
                'industry_Code' => strtoupper($this->icodePost),
                'industry_Title' => strtoupper($this->industryPost), // Validate role selection
            ]);

            $this->close();
            toastr()->success('Industry Created!');
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
        return view('livewire.admin.position-industry.industry-add-modal');
    }
}
