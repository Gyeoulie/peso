<?php

namespace App\Livewire\Admin\JobPosting\Applicants;

use App\Models\Barangay;
use App\Models\Education;
use App\Models\Job_Applicants;
use App\Models\Job_Posting;
use App\Models\Job_Preference;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class ApplicantOverview extends Component
{

    use WithFileUploads;

    public $id;
    public $eduLevels = [
        '1' => 'GRADE I',
        '2' => 'GRADE II',
        '3' => 'GRADE III',
        '4' => 'GRADE IV',
        '5' => 'GRADE V',
        '6' => 'GRADE VI',
        '7' => 'GRADE VII',
        '8' => 'GRADE VIII',
        '9' => 'ELEMENTARY GRADUATE',
        '10' => '1ST YEAR HIGH SCHOOL/GRADE VII (FOR K TO 12)',
        '11' => '2ND YEAR HIGH SCHOOL/GRADE VIII (FOR K TO 12)',
        '12' => '3RD YEAR HIGH SCHOOL/GRADE IX (FOR K TO 12)',
        '13' => '4TH YEAR HIGH SCHOOL/GRADE X (FOR K TO 12)',
        '14' => 'GRADE XI (FOR K TO 12)',
        '15' => 'GRADE XII (FOR K TO 12)',
        '16' => 'HIGH SCHOOL GRADUATE',
        '17' => 'VOCATIONAL UNDERGRADUATE',
        '18' => 'VOCATIONAL GRADUATE',
        '19' => '1ST YEAR COLLEGE LEVEL',
        '20' => '2ND YEAR COLLEGE LEVEL',
        '21' => '3RD YEAR COLLEGE LEVEL',
        '22' => '4TH YEAR COLLEGE LEVEL',
        '23' => '5TH YEAR COLLEGE LEVEL',
        '24' => 'COLLEGE GRADUATE',
        '25' => 'MASTERAL/POST GRADUATE LEVEL',
        '26' => 'MASTERAL/POST GRADUATE',
    ];

    public $recommendationRemarks, $rejectRemarks, $recLetter;
    public function updateApplicant($action, $modal)
    {

        // Check if action is valid
        if (!in_array($action, ['RECOMMENDED', 'REJECT'])) {
            toastr()->error('Invalid action specified!');
            return;
        }

        // Handle recommended action
        if ($action === 'RECOMMENDED') {
            // Validate recommendation letter
            $this->validate([
                'recommendationRemarks' => ['required', 'string', 'min:10'],
                'recLetter' => [
                    'required',
                    'file',
                    'mimes:pdf',
                    'max:5120', // 'max' is in kilobytes (5MB = 5120KB)
                ],
            ], [
                'recLetter.required' => 'The recommendation letter is required.',
                'recLetter.file' => 'The recommendation letter must be a file.',
                'recLetter.mimes' => 'The recommendation letter must be a PDF file.',
                'recLetter.max' => 'The recommendation letter may not be greater than 5MB in size.',
            ]);

            // Store recommendation letter
            $recLetterPath = $this->recLetter->store('peso/recommendation', 'public');

            try {
                // Update job applicant with recommended status and recommendation letter path
                Job_Applicants::where('applicant_id', $this->id)->update([
                    'peso_Status' => $action,
                    'peso_Remarks' => $this->recommendationRemarks,
                    'peso_Letter' => $recLetterPath,
                ]);
                toastr()->success('Applicant updated successfully!');
            } catch (\Exception $e) {
                toastr()->error('There was an error in uploading the recommendation letter!');
                return;
            }
        } elseif ($action === 'REJECT') {

            $this->validate([
                'rejectRemarks' => ['required', 'string', 'min:10'],
            ]);
            try {
                // Update job applicant with rejected status
                Job_Applicants::where('applicant_id', $this->id)->update([
                    'peso_Status' => $action,
                    'peso_Remarks' => $this->rejectRemarks,
                ]);
                toastr()->success('Applicant updated successfully!');
            } catch (\Exception $e) {
                toastr()->error('There was an error in rejecting the applicant!');
                return;
            }
        }

        // Close the modal after updating
        $this->closeModal($modal);
    }

    public function closeModal($modal)
    {
        $this->resetValidation();
        $this->reset('recommendationRemarks', 'rejectRemarks', 'recLetter');
        $this->dispatch('close-modal', $modal . '-modal');
    }

    public function render()
    {
        $applicant = Job_Applicants::findOrFail($this->id);

        // Get the highest education level of the employee
        $highestEducationLevel = Education::where('employee_id', $applicant->employee->employee_id)
            ->max('edu_level');

        // Get the employee's municipality ID via their barangay
        $employeeMunicipalityId = Barangay::where('barangay_id', $applicant->employee->barangay_id)
            ->value('municipality_id');

        // Get the employee's job preferences (array of position_id)
        $employeeJobPreferences = Job_Preference::where('employee_id', $applicant->employee->employee_id)
            ->pluck('position_id');

        // Query to check if the specific job posting matches the employee
        $isMatch = Job_Posting::where('job_id', $applicant->job_id)
            ->where('job_Status', 'ACTIVE')
            ->where('peso_municipality_id', $employeeMunicipalityId)
            ->where('job_Edu', '<=', $highestEducationLevel)
            ->whereHas('job_tags', function ($query) use ($employeeJobPreferences) {
                // Check if any of the jobTags' position_id is in the employee's job preferences
                $query->whereIn('position_id', $employeeJobPreferences);
            })
            ->exists();

        return view('livewire.admin.job-posting.applicants.applicant-overview', compact('applicant', 'isMatch'));
    }

}
