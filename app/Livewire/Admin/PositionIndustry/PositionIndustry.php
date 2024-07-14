<?php

namespace App\Livewire\Admin\PositionIndustry;

use App\Models\Job_Industry;
use App\Models\Job_Positions;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class PositionIndustry extends Component
{

    use WithPagination, WithoutUrlPagination;

    public $rows = 10;

    public $searchIndustry, $searchPosition;

    public $positionPost, $pcodePost, $positionID;

    public $industryPost, $icodePost, $industryID;

    public function savePosition()
    {

        if ($this->positionID) {
            $rules = [
                'positionID' => ['required'],
                'pcodePost' => ['required', 'string', Rule::unique('job_positions', 'position_Code')->ignore($this->positionID, 'position_id')],
                'positionPost' => ['required', 'string', Rule::unique('job_positions', 'position_Title')->ignore($this->positionID, 'position_id')],
            ];

            $messages = [
                'positionID.required' => 'The position ID is required.',
                'pcodePost.required' => 'The position code is required.',
                'pcodePost.string' => 'The position code must be a string.',
                'pcodePost.unique' => 'The position code has already been taken.',
                'positionPost.required' => 'The position title is required.',
                'positionPost.string' => 'The position title must be a string.',
                'positionPost.unique' => 'The position title has already been taken.',
            ];

            $this->validate($rules, $messages);
            DB::beginTransaction();

            try {
                $jobPosition = Job_Positions::findOrFail($this->positionID);

                $jobPosition->position_Code = strtoupper($this->pcodePost);
                $jobPosition->position_Title = strtoupper($this->positionPost);
                if ($jobPosition->isDirty()) {
                    $jobPosition->save();
                    toastr()->success('Job Position has been updated!');
                } else {
                    toastr()->info('No changes detected.');
                }
                DB::commit();

            } catch (\Exception $e) {
                DB::rollBack();
                toastr()->error('There was an error updating the job position.');
            }
        } else {
            $rules = [
                'pcodePost' => ['required', 'string', Rule::unique('job_positions', 'position_Code')],
                'positionPost' => ['required', 'string', Rule::unique('job_positions', 'position_Title')],
            ];

            $messages = [
                'pcodePost.required' => 'The position code is required.',
                'pcodePost.string' => 'The position code must be a string.',
                'pcodePost.unique' => 'The position code has already been taken.',
                'positionPost.required' => 'The position title is required.',
                'positionPost.string' => 'The position title must be a string.',
                'positionPost.unique' => 'The position title has already been taken.',
            ];

            $this->validate($rules, $messages);
            DB::beginTransaction();
            try {
                Job_Positions::create([
                    'position_Code' => strtoupper($this->pcodePost),
                    'position_Title' => strtoupper($this->positionPost),
                ]);
                DB::commit();

            } catch (\Exception $e) {
                DB::rollBack();
                toastr()->error('There was an error updating the job position.');
            }
            toastr()->success('Job Position Created!');
        }

        $this->close('jobposition');

    }

    public function editPosition($id)
    {
        $jobposition = Job_Positions::findOrFail($id);

        if ($jobposition) {
            $this->positionID = $jobposition->position_id;
            $this->positionPost = $jobposition->position_Title;
            $this->pcodePost = $jobposition->position_Code;
            $this->dispatch('open-modal', 'jobposition-modal');
        } else {
            toastr()->error('There was an error in finding the data.');
        }
    }

    public function saveIndustry()
    {

        if ($this->industryID) {
            $rules = [
                'industryID' => ['required'],
                'icodePost' => ['required', 'string', Rule::unique('job_industry', 'industry_Code')->ignore($this->industryID, 'industry_id')],
                'industryPost' => ['required', 'string', Rule::unique('job_industry', 'industry_Title')->ignore($this->industryID, 'industry_id')],
            ];

            $messages = [
                'industryID.required' => 'The industry ID is required.',
                'icodePost.required' => 'The industry code is required.',
                'icodePost.string' => 'The industry code must be a string.',
                'icodePost.unique' => 'The industry code has already been taken.',
                'industryPost.required' => 'The industry title is required.',
                'industryPost.string' => 'The industry title must be a string.',
                'industryPost.unique' => 'The industry title has already been taken.',
            ];

            $this->validate($rules, $messages);
            DB::beginTransaction();

            try {
                $industry = Job_Industry::findOrFail($this->industryID);

                $industry->industry_Code = strtoupper($this->icodePost);
                $industry->industry_Title = strtoupper($this->industryPost);
                if ($industry->isDirty()) {
                    $industry->save();
                    toastr()->success('Industry has been updated!');
                } else {
                    toastr()->info('No changes detected.');
                }
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                toastr()->error('There was an error updating the industry.');
            }
        } else {
            $rules = [
                'icodePost' => ['required', 'string', Rule::unique('job_industry', 'industry_Code')],
                'industryPost' => ['required', 'string', Rule::unique('job_industry', 'industry_Title')],
            ];

            $messages = [
                'icodePost.required' => 'The industry code is required.',
                'icodePost.string' => 'The industry code must be a string.',
                'icodePost.unique' => 'The industry code has already been taken.',
                'industryPost.required' => 'The industry title is required.',
                'industryPost.string' => 'The industry title must be a string.',
                'industryPost.unique' => 'The industry title has already been taken.',
            ];

            $this->validate($rules, $messages);
            DB::beginTransaction();

            try {
                Job_Industry::create([
                    'industry_Code' => strtoupper($this->icodePost),
                    'industry_Title' => strtoupper($this->industryPost), // Validate role selection
                ]);

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                toastr()->error('There was an error updating the industry.');
            }

            toastr()->success('Industry Created!');
        }
        $this->close('industry');

    }

    public function editIndustry($id)
    {
        $industry = Job_Industry::findOrFail($id);

        if ($industry) {
            $this->industryID = $industry->industry_id;
            $this->industryPost = $industry->industry_Title;
            $this->icodePost = $industry->industry_Code;
            $this->dispatch('open-modal', 'industry-modal');
        } else {
            toastr()->error('There was an error in finding the data.');
        }
    }

    public function open($modal)
    {
        $this->reset('positionPost', 'pcodePost', 'positionID');
        $this->resetValidation();
        $this->dispatch('open-modal', $modal . '-modal');

    }

    public function close($modal)
    {
        $this->dispatch('close-modal', $modal . '-modal');
        $this->reset('searchIndustry', 'searchPosition', 'positionPost', 'pcodePost', 'positionID');
        $this->resetValidation();
    }

    public function render()
    {
        $industry = Job_Industry::where('industry_Title', 'like', '%' . $this->searchIndustry . '%')
            ->orderBy('industry_Title', 'asc')
            ->paginate($this->rows);

        $jobpositions = Job_Positions::where('position_Title', 'like', '%' . $this->searchPosition . '%')
            ->orderBy('position_Title', 'asc')
            ->paginate($this->rows);

        return view('livewire.admin.position-industry.position-industry', compact('industry', 'jobpositions'));
    }
}
