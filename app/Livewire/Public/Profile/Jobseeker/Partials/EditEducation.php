<?php

namespace App\Livewire\Public\Profile\Jobseeker\Partials;

use App\Models\Education;
use Carbon\Carbon;
use Livewire\Component;

class EditEducation extends Component
{
    public $educName, $educCourse, $educLevel, $educStart, $educEnd, $educID;
    public $userID;

    public function rules()
    {
        return [
            'educName' => ['required', 'string'],
            'educLevel' => ['required', 'string'],
            'educStart' => ['required'],
        ];
    }

    public function close()
    {
        $this->reset('educName', 'educCourse', 'educLevel', 'educStart', 'educEnd', 'educID');
        $this->dispatch('close-modal', 'education-modal');
    }

    public function save()
    {

        $this->validate();

        if ($this->educID) {

            try {
                // Create the user record
                Education::where('education_id', $this->educID)->update([
                    'edu_School' => $this->educName,
                    'edu_Level' => $this->educLevel,
                    'edu_Course' => $this->educCourse,
                    'edu_Started' => $this->educStart,
                    'edu_Ended' => $this->educEnd,
                ]);

                toastr()->success('Education Record has been Updated!');
            } catch (\Exception $e) {

                // Show error toastr notification
                toastr()->error('There was an Error');
            }

        } else {

            try {
                // Create the user record
                Education::create([
                    'employee_id' => $this->userID,
                    'edu_School' => $this->educName,
                    'edu_Level' => $this->educLevel,
                    'edu_Course' => $this->educCourse,
                    'edu_Started' => $this->educStart,
                    'edu_Ended' => $this->educEnd,
                ]);
                toastr()->success('New Education Record Created!');

            } catch (\Exception $e) {

                // Show error toastr notification
                toastr()->error('There was an Error');
            }
        }
        $this->close();
        $this->dispatch('reload-table');

    }
    public function editModal($id)
    {

        $this->educID = $id;
        $educ2 = Education::find($id);
        $this->educName = $educ2->edu_School;
        $this->educCourse = $educ2->edu_Course;
        $this->educLevel = $educ2->edu_Level;
        $this->educStart = Carbon::parse($educ2->edu_Started)->format('Y-m-d');
        $this->educEnd = Carbon::parse($educ2->edu_Ended)->format('Y-m-d');

        $this->dispatch('open-modal', 'education-modal');

    }

    public function render()
    {

        $educ = Education::findMany($this->userID);
        return view('livewire.public.profile.jobseeker.partials.edit-education', compact('educ'));
    }
}
