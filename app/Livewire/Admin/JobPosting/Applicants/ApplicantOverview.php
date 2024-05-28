<?php

namespace App\Livewire\Admin\JobPosting\Applicants;

use App\Models\Job_Applicants;
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
        return view('livewire.admin.job-posting.applicants.applicant-overview', compact('applicant'));
    }

}
