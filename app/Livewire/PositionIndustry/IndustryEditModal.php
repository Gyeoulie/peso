<?php

namespace App\Livewire\PositionIndustry;

use App\Models\Job_Industry;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class IndustryEditModal extends Component
{

    public $industryId;
    public $industryPost;
    public $icodePost;

    public function rules()
    {
        return [
            'industryId' => ['required'],
            'icodePost' => ['required', 'string', Rule::unique('job_industry', 'industry_Code')->ignore($this->industryId, 'industry_id')],
            'industryPost' => ['required', 'string', Rule::unique('job_industry', 'industry_Title')->ignore($this->industryId, 'industry_id')],
        ];
    }

    #[On('edit-industry')]
    public function editIndustry($id)
    {
        $industry = Job_Industry::find($id);

        if ($industry) {
            $this->industryId = $industry->industry_id;
            $this->industryPost = $industry->industry_Title;
            $this->icodePost = $industry->industry_Code;
            $this->dispatch('open-modal', 'edit-industry-modal');
        } else {
            toastr()->error('Could not fetch data');
        }

    }

    public function updateIndustry()
    {

        $this->validate();

        try {
            // Create the user record
            Job_Industry::where('industry_id', $this->industryId)->update([
                'industry_Title' => strtoupper($this->industryPost),
                'industry_Code' => strtoupper($this->icodePost),
            ]);

            toastr()->success('Industry Updated!');
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
        return view('livewire.position-industry.industry-edit-modal');
    }
}
