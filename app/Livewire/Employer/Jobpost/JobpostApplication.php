<?php

namespace App\Livewire\Employer\Jobpost;

use App\Models\Barangay;
use App\Models\Job_Industry;
use App\Models\Job_Positions;
use App\Models\Job_Posting;
use App\Models\Job_Tags;
use App\Models\PESO;
use App\Models\Requirements;
use App\Models\Requirements_Passed;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class JobpostApplication extends Component
{

    use WithFileUploads;

    public $jobTitlePost;
    public $jobIndustryPost, $jobIndustryHidden;
    public $minWagePost;
    public $maxWagePost;
    public $eduPost = '';
    public $jtypePost = '';
    public $wAddPost;
    public $barPost, $barHidden;
    public $pesoPost = '';
    public $durationPost;
    public $slotsPost;
    public $jobTags = [];
    public $descPost;
    public $qualPost;
    public $remPost;

    public $mun, $prov;

    public $req = [];
    public $agreePost;

    public $currentSlide = 1;

    public function mount()
    {
        // Fetch all requirements
        $requirements = Requirements::all();

        // Initialize the $req array with requirement IDs
        foreach ($requirements as $requirement) {
            $this->req[$requirement->requirement_id] = null;
        }
    }

    public function prevSection($id)
    {
        $this->currentSlide = $id;
    }

    public function nextSection($id)
    {

        if ($id == 2) {
            $this->validate([
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
                'jobTags' => ['required', 'array', 'min:1'],
            ]);

            $this->currentSlide++;
        } else if ($id == 3) {
            //dd($this->req);
            $validationRules = [];

            foreach ($this->req as $requirementId => $file) {
                $validationRules['req.' . $requirementId] = 'mimes:pdf';
            }

            $this->validate($validationRules);
            $this->currentSlide++;

            // foreach ($this->req as $requirementId => $file) {
            //     if ($file) {
            //         // Store the file
            //         $fileName = $file->store('requirements', 'public');

            //         // Create a new RequirementsPassed record
            //         RequirementsPassed::create([
            //             'requirement_id' => $requirementId,
            //             'req_passed_Input' => $fileName,
            //         ]);
            //     }
            // }

        }

    }

    public function createApplication()
    {

        $this->validate([
            'agreePost' => ['required'],
        ]);

        $user = Auth::user();
        $companyId = $user->company->company_id;

        $jobposting = Job_Posting::create([
            'company_id' => $companyId,
            'industry_id' => $this->jobIndustryHidden,
            'job_Title' => $this->jobTitlePost,
            'job_Description' => $this->descPost,
            'job_Qualifications' => $this->qualPost,
            'job_Remarks' => $this->remPost,
            'job_MinWage' => $this->minWagePost,
            'job_MaxWage' => $this->maxWagePost,
            'job_Type' => $this->jtypePost,
            'job_Edu' => $this->eduPost,
            'job_Slots' => $this->slotsPost,
            'job_Address' => $this->wAddPost,
            'barangay_id' => $this->barHidden,
            'job_Duration' => $this->durationPost,
            'job_Status' => 'PENDING',
            'peso_municipality_id' => $this->pesoPost,

        ]);

        if ($jobposting) {

            foreach ($this->jobTags as $jobTag) {
                Job_Tags::create([
                    'job_id' => $jobposting->job_id,
                    'position_id' => $jobTag['position_id'],
                ]);
            }

            foreach ($this->req as $requirementId => $file) {
                if ($file) {
                    $fileName = $file->store('files/requirements', 'public');

                    Requirements_Passed::create([
                        'job_id' => $jobposting->job_id,
                        'requirement_id' => $requirementId,
                        'req_passed_Input' => $fileName,
                    ]);
                }
            }

        }
    }

    #[On('tagSelect')]
    public function tagSelect($id)
    {
        // Check if the selected job position already exists in the $jobTags array
        if (collect($this->jobTags)->contains('position_id', $id)) {
            toastr()->warning('This job position is already selected.');
            return;
        }

        // If the job position does not exist in the array, add it
        $jobposition = Job_Positions::find($id);

        if ($jobposition) {
            $this->jobTags[] = [
                'position_id' => $jobposition->position_id,
                'position_Title' => $jobposition->position_Title,
            ];
            $this->dispatch('close-modal');
        } else {
            toastr()->error('Could not fetch data');
            $this->dispatch('close-modal');
        }
    }

    public function removeTag($positionId)
    {
        // Find the index of the element with the given position_id
        $index = array_search($positionId, array_column($this->jobTags, 'position_id'));

        // If the element exists in the array, remove it
        if ($index !== false) {
            unset($this->jobTags[$index]);
            // Reindex the array to maintain sequential keys
            $this->jobTags = array_values($this->jobTags);
        }
    }

    #[On('industrySelect')]
    public function industrySelect($id)
    {
        $industry = Job_Industry::find($id);

        if ($industry) {
            $this->jobIndustryHidden = $industry->industry_id;
            $this->jobIndustryPost = $industry->industry_Title;

        } else {
            toastr()->error('Could not fetch data');
        }

    }

    #[On('barSelect')]
    public function barSelect($id)
    {
        $barangay = Barangay::with('municipality.province')->find($id);

        if ($barangay) {
            $this->barHidden = $barangay->barangay_id;
            $this->barPost = $barangay->barangay_Name;
            $this->mun = $barangay->municipality->municipality_Name;
            $this->prov = $barangay->municipality->province->province_Name;

        } else {
            toastr()->error('Could not fetch data');
        }

    }

    public function render()
    {

        $requirements = Requirements::All();
        $pesoBranches = PESO::with('municipality')->distinct('municipality_id')->get();

        return view('livewire.employer.jobpost.jobpost-application', [
            'requirements' => $requirements,
            'pesoBranches' => $pesoBranches,
        ]);
    }
}
