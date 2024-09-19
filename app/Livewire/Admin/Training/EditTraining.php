<?php

namespace App\Livewire\Admin\Training;

use App\Models\Job_Industry;
use App\Models\Job_Positions;
use App\Models\Programs;
use App\Models\Program_Tags;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class EditTraining extends Component
{

    use WithFileUploads;

    public $programData;

    public $progTitle, $progHost, $regDeadline, $progSlots, $progType = '', $progDate, $progTime, $progLoc, $progModality = '';

    public $descPost, $qualPost, $remPost;

    public $jobIndustryPost, $jobIndustryHidden;

    #[Validate]
    public $progImg;

    public function rules()
    {
        return [
            // BASIC INFORMATION
            'progImg' => 'nullable|image|mimes:jpeg,png,jpg|max:10240', // Validation rules
        ];
    }

    public function messages()
    {
        return [
            // Custom messages for validation rules
            'progImg.image' => 'The file must be an image.',
            'progImg.mimes' => 'The image must be a file of type: jpeg, png, jpg.',
            'progImg.max' => 'The image may not be greater than 10 MB.',
        ];
    }
    public function mount()
    {
        $this->programData = session()->get('programData');

        // dd($this->programData);
        $this->mountData($this->programData);

    }

    public function validateInput()
    {

        $rules = [
            'progTitle' => 'required|string|max:255',
            'progHost' => 'required|string|max:255',
            'regDeadline' => 'required|date|after:tomorrow',
            'progSlots' => 'required|integer|nullable',
            'progType' => 'required|string',
            'progDate' => 'required_if:progType,PESO Hosted|date|after:tomorrow',
            'progTime' => 'required_if:progType,PESO Hosted|date_format:H:i',
            'progLoc' => 'required|string|max:255',
            'progModality' => 'required|string|max:255',
            'progImg' => 'nullable|image|mimes:jpg,jpeg,png|max:10240', // 10MB max
            'descPost' => 'required|string',
            'qualPost' => 'required|string',
            'remPost' => 'nullable|string', // Remarks are not required
            'jobIndustryPost' => 'required',

        ];
        $messages = [
            'progTitle.required' => 'The program title is required.',
            'progTitle.string' => 'The program title must be a string.',
            'progTitle.max' => 'The program title may not be greater than 255 characters.',

            'progHost.required' => 'The program host is required.',
            'progHost.string' => 'The program host must be a string.',
            'progHost.max' => 'The program host may not be greater than 255 characters.',

            'regDeadline.required' => 'The registration deadline is required.',
            'regDeadline.date' => 'The registration deadline must be a valid date.',
            'regDeadline.after' => 'The registration deadline must be at least one day from now.',

            'progSlots.required' => 'The number of slots is required.',
            'progSlots.integer' => 'The number of slots must be an integer.',

            'progType.required' => 'The program type is required.',
            'progType.string' => 'The program type must be a string.',

            'progDate.required_if' => 'The program date is required if the program type is "PESO Hosted".',
            'progDate.date' => 'The program date must be a valid date.',
            'progDate.after' => 'The program date must be at least one day from now.',

            'progTime.required_if' => 'The program time is required if the program type is "PESO Hosted".',
            'progTime.date_format' => 'The program time must be in the format HH:MM.',

            'progLoc.required' => 'The program location is required.',
            'progLoc.string' => 'The program location must be a string.',
            'progLoc.max' => 'The program location may not be greater than 255 characters.',

            'progModality.required' => 'The program modality is required.',
            'progModality.string' => 'The program modality must be a string.',
            'progModality.max' => 'The program modality may not be greater than 255 characters.',

            'progImg.image' => 'The program image must be an image file.',
            'progImg.mimes' => 'The program image must be a file of type: jpg, jpeg, png.',
            'progImg.max' => 'The program image may not be greater than 10MB.',

            'descPost.required' => 'The description is required.',
            'descPost.string' => 'The description must be a string.',

            'qualPost.required' => 'The qualifications is required.',
            'qualPost.string' => 'The qualifications must be a string.',

            'remPost.string' => 'The remarks must be a string.',

            'jobIndustryPost.required' => 'The industry is required.',

        ];

        $this->validate($rules, $messages);

        $this->dispatch('open-modal', 'confirm-modal');

    }

    public function mountData($id)
    {
        $user = Auth::user();

        $programInfo = Programs::findOrFail($id);

        if ($user->peso_accounts->peso_id != $programInfo->peso_id) {
            return redirect()->back();
        }

        $this->progTitle = $programInfo->program_Title;
        $this->progHost = $programInfo->program_Host;
        $this->regDeadline = Carbon::parse($programInfo->program_Deadline)->format('Y-m-d');
        $this->progSlots = $programInfo->program_Slots;
        $this->progType = $programInfo->program_Type;
        $this->progDate = $programInfo->program_Datetime ? Carbon::parse($programInfo->program_Datetime)->format('Y-m-d') : '';
        $this->progTime = $programInfo->program_Datetime ? Carbon::parse($programInfo->program_Datetime)->format('H:i') : '';

        $this->progLoc = $programInfo->program_Location;
        $this->progModality = $programInfo->program_Modality;

        $this->descPost = $programInfo->program_Description;
        $this->qualPost = $programInfo->program_Qualification;
        $this->remPost = $programInfo->program_Remarks;

        $this->jobIndustryPost = $programInfo->job_industry->industry_Title;
        $this->jobIndustryHidden = $programInfo->industry_id;

        // dd($this->descPost);
    }

    public function cancelEdit()
    {
        $this->redirectRoute('admin-view-training', ['id' => $this->programData], navigate: true);
        // session()->forget('programData');

    }
    public function saveProgram()
    {
        $programInfo = Programs::findOrFail($this->programData);
        $programDatetime = null;
        $imgPath = null;

        if ($this->progImg) {
            $imgPath = $this->progImg->store('images/trainings', 'public');
        }

        DB::beginTransaction();

        try {
            // Delete old image if a new one is uploaded and there is an existing image
            if ($this->progImg && $programInfo->program_pubmat) {
                Storage::disk('public')->delete($programInfo->program_pubmat);
            }

            if ($this->progType === 'PESO Hosted') {
                // Combine progDate and progTime into a single datetime
                if ($this->progDate && $this->progTime) {
                    $programDatetime = Carbon::createFromFormat('Y-m-d H:i', $this->progDate . ' ' . $this->progTime);
                } else {
                    $programDatetime = null;
                }
            }

            // Update model attributes
            $programInfo->program_Title = $this->progTitle;
            $programInfo->program_Host = $this->progHost;
            $programInfo->program_Deadline = $this->regDeadline;
            $programInfo->program_Type = $this->progType;
            $programInfo->program_Slots = ($this->progSlots === 0 || $this->progSlots === null) ? null : $this->progSlots;
            $programInfo->program_Datetime = $programDatetime;
            $programInfo->program_Location = $this->progLoc;
            $programInfo->program_Modality = $this->progModality;
            $programInfo->program_Description = $this->descPost;
            $programInfo->program_Qualification = $this->qualPost;
            $programInfo->program_Remarks = $this->remPost;
            $programInfo->industry_id = $this->jobIndustryHidden;

            // Set the new image path or retain the old one
            $programInfo->program_pubmat = $imgPath ?? $programInfo->program_pubmat;

            // Check if any attributes have changed
            if ($programInfo->isDirty()) {
                $programInfo->save();
                DB::commit();

                $this->redirectRoute('admin-view-training', ['id' => $programInfo->program_id], navigate: true);
                // session()->forget('programData');

                toastr()->success('Program has been updated!');

            } else {
                DB::rollBack();
                toastr()->info('No changes detected.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            // Delete new image if it was uploaded and an error occurred
            if ($imgPath) {
                Storage::disk('public')->delete($imgPath);
            }

            toastr()->error('There was an error updating the program: ');
        }
        $this->mount();
        $this->dispatch('close-modal', 'confirm-modal');
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
    #[On('positionSelect')]
    public function positionSelect($id)
    {
        $positionExist = Program_Tags::where('position_id', $id)
            ->where('program_id', $this->programData)->exists();
        if ($positionExist) {
            toastr()->warning('This job tag is already selected.');
            return;
        }

        $jobposition = Job_Positions::find($id);

        if ($jobposition) {
            Program_Tags::create([
                'program_id' => $this->programData,
                'position_id' => $id,
            ]);
            $this->dispatch('close-modal', 'job-position-modal');
        } else {
            toastr()->error('Could not fetch data');
            $this->dispatch('close-modal', 'job-position-modal');
        }
    }

    public function removeTag($positionId)
    {
        try {
            // Count the number of tags for the current program
            $tagCount = Program_Tags::where('program_id', $this->programData)->count();

            // Check if there is at least one tag remaining
            if ($tagCount > 1) {
                // Proceed to delete the tag
                Program_Tags::where('program_tags_id', $positionId)
                    ->where('program_id', $this->programData)
                    ->delete();

                toastr()->success('Job tag record has been deleted.');
            } else {
                toastr()->warning('You must have at least one job tag.');
            }
        } catch (\Exception $e) {
            toastr()->error('There was an error: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $programInfo = Programs::findOrFail($this->programData);

        // dd($this->programData);
        return view('livewire.admin.training.edit-training', compact('programInfo'));
    }
}
