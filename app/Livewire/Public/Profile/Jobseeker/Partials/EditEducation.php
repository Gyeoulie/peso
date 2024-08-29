<?php

namespace App\Livewire\Public\Profile\Jobseeker\Partials;

use App\Models\Education;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditEducation extends Component
{
    public $eduSchool, $eduCourse, $eduLevel = "", $eduStart, $eduEnd, $eduID, $eduOngoing;
    public $userID;

    public function save()
    {

        $rules = [
            'eduSchool' => 'required|string|max:255',
            'eduLevel' => 'required|string|max:255',
            'eduCourse' => [
                function ($attribute, $value, $fail) {
                    if ($this->eduLevel >= 19 && empty($value)) {
                        $fail('You must input a course');
                    }
                },
                'max:255',
            ],
            'eduStart' => [
                'required',
                'date',
                'before_or_equal:today', // Ensure eduStart is not in the future
            ],
            'eduEnd' => [
                'nullable',
                'date',
                'before_or_equal:today', // Ensure eduEnd is not in the future
                'after:eduStart', // Ensure eduEnd is after or equal to eduStart
            ],
        ];

        if (!$this->eduOngoing) {
            $rules['eduEnd'][] = 'required'; // Ensure eduEnd is required if eduOngoing is false
        }

        $messages = [
            'eduSchool.required' => 'The school name is required.',
            'eduSchool.string' => 'The school name must be a string.',
            'eduSchool.max' => 'The school name must not exceed 255 characters.',
            'eduLevel.required' => 'The education level is required.',
            'eduLevel.string' => 'The education level must be a string.',
            'eduLevel.max' => 'The education level must not exceed 255 characters.',
            'eduCourse.required' => 'The course name is required.',
            'eduCourse.string' => 'The course name must be a string.',
            'eduCourse.max' => 'The course name must not exceed 255 characters.',
            'eduStart.required' => 'The start date is required.',
            'eduStart.date' => 'The start date must be a valid date.',
            'eduStart.before_or_equal' => 'The start date must be a date before or equal to today.',
            'eduEnd.date' => 'The end date must be a valid date.',
            'eduEnd.before_or_equal' => 'The end date must be a date before or equal to today.',
            'eduEnd.after' => 'The end date must be a date after the start date.',
            'eduEnd.required' => 'The end date is required when education is not ongoing.',
        ];

        $this->validate($rules, $messages);

        DB::beginTransaction(); // Start transaction

        try {
            if ($this->eduID) {
                // Update existing record
                $education = Education::findOrFail($this->eduID);

                // Set attributes
                $education->edu_School = $this->eduSchool;
                $education->edu_Level = $this->eduLevel;
                $education->edu_Course = $this->eduCourse;
                $education->edu_Started = Carbon::parse($this->eduStart)->format('Y-m-d');
                $education->edu_Ended = $this->eduEnd ? Carbon::parse($this->eduEnd)->format('Y-m-d') : null;
                $education->edu_Ongoing = $this->eduOngoing ? 1 : 2;

                // Check if any attributes are dirty (i.e., have changed)
                if ($education->isDirty()) {
                    $education->save();
                    toastr()->success('Education Record has been Updated!');
                } else {
                    toastr()->info('No changes detected. Education Record remains the same.');
                }
            } else {
                // Create new record
                Education::create([
                    'employee_id' => $this->userID,
                    'edu_School' => $this->eduSchool,
                    'edu_Level' => $this->eduLevel,
                    'edu_Course' => $this->eduCourse,
                    'edu_Started' => Carbon::parse($this->eduStart)->format('Y-m-d'),
                    'edu_Ended' => $this->eduEnd ? Carbon::parse($this->eduEnd)->format('Y-m-d') : null,
                    'edu_Ongoing' => $this->eduOngoing ? 1 : 2,
                ]);

                toastr()->success('New Education Record Created!');
            }

            DB::commit(); // Commit transaction
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction on error
            toastr()->error('There was an error, please try again later.');
        }

        $this->close();
        $this->dispatch('reload-table');
    }

    public function editModal($id)
    {
        $this->eduID = $id;
        $edu_Data = Education::find($id);
        $this->eduSchool = $edu_Data->edu_School;
        $this->eduCourse = $edu_Data->edu_Course;
        $this->eduLevel = $edu_Data->edu_Level;
        $this->eduStart = Carbon::parse($edu_Data->edu_Started)->format('Y-m-d');
        $this->eduEnd = Carbon::parse($edu_Data->edu_Ended)->format('Y-m-d');
        $this->eduOngoing = $edu_Data->edu_Ongoing == 1 ? true : false; // Set eduOngoing based on value

        $this->dispatch('open-modal', 'education-modal');
    }

    public function addModal()
    {
        $this->reset('eduSchool', 'eduCourse', 'eduLevel', 'eduStart', 'eduEnd', 'eduID', 'eduOngoing');
        $this->dispatch('open-modal', 'education-modal');
    }

    public function close()
    {
        $this->reset('eduSchool', 'eduCourse', 'eduLevel', 'eduStart', 'eduEnd', 'eduID', 'eduOngoing');
        $this->dispatch('close-modal', 'education-modal');
    }

    public function render()
    {

        $educ = Education::where('employee_id', '=', $this->userID)
            ->orderBy('edu_Started', 'desc')
            ->get();
        return view('livewire.public.profile.jobseeker.partials.edit-education', compact('educ'));
    }
}
