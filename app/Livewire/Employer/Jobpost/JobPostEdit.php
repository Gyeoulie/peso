<?php

namespace App\Livewire\Employer\Jobpost;

use App\Models\Job_Posting;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class JobPostEdit extends Component
{

    public $jobTags = [];
    public $jobpostData;

    public function mount()
    {
        $this->jobpostData = session()->get('jobpostData');

        $this->mountData($this->programData);

    }

    public $jobTitlePost;
    public $jobIndustryPost, $jobIndustryHidden;
    public $minWagePost, $maxWagePost, $eduPost = '', $jtypePost = '', $wAddPost, $barPost, $barHidden, $pesoPost = '', $pesoTitle, $durationPost, $slotsPost, $descPost, $qualPostm, $remPost, $mun, $prov;

    public function mountData($id)
    {
        $jobPost = Job_Posting::findOrFail($id);

        $this->jobTitlePost = $jobPost->job_Title;
        $this->jobIndustryPost = $jobPost->industry->industry_Title;
        $this->minWagePost = $jobPost->job_MinWage;
        $this->maxWagePost = $jobPost->job_MaxWage;
        $this->eduPost = $jobPost->job_Edu;
        $this->jtypePost = $jobPost->job_Type;

        $this->pesoPost = $jobPost->peso_id;
        $this->pesoTitle = $jobPost->peso->municipaliy_Name;

        $this->durationPost = $jobPost->job_Duration;
        $this->slotsPost = $jobPost->job_Slots;

        $this->descPost = $jobPost->job_Description;
        $this->qualPostm = $jobPost->job_Qualifications;
        $this->remPost = $jobPost->job_Remarks;

        $this->wAddPost = $jobPost->job_Address;
        $this->barPost = $jobPost->barangay->barangay_Name;
        $this->mun = $jobPost->barangay->municipality->municipality_Name;
        $this->prov = $jobPost->barangay->municipality->province->province_Name;




    }

    public function render()
    {
        return view('livewire.employer.jobpost.job-post-edit');
    }
}
