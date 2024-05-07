<?php

namespace App\Livewire\Employer\Jobpost;

use Livewire\Component;

class JobpostApplication extends Component
{

    public $jobTitlePost;
    public $jobIndustryPost;
    public $minWagePost;
    public $maxWagePost;
    public $eduPost;
    public $jtypePost;
    public $wAddPost;
    public $barPost;
    public $pesoPost;
    public $durationPost;
    public $slotsPost;
    public $jobTags = [];
    public $descPost;
    public $qualPost;
    public $remPost;

    public function nextSection($id)
    {
        return [
            'jobTitlePost' => ['required', 'string'],
            'jobIndustryPost' => ['required'],
            'minWagePost' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'min:1'],
            'maxWagePost' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'min:1', 'gte:minWagePost'],
            'eduPost' => ['required'],
            'jtypePost' => ['required'],
            'wAddPost' => ['required', 'string'],
            'barPost' => ['required'],
            'pesoPost' => ['required'],
            'durationPost' => ['required', 'date'],
            'slotsPost' => ['required', 'string'],
            'descPost' => ['required', 'string'],
            'qualPost' => ['required', 'string'],
            'remPost' => ['string'],
        ];
    }

    public function render()
    {
        return view('livewire.employer.jobpost.jobpost-application');
    }
}
