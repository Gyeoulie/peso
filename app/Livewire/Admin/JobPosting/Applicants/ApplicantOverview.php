<?php

namespace App\Livewire\Admin\JobPosting\Applicants;

use App\Models\Barangay;
use App\Models\Education;
use App\Models\Employee;
use App\Models\Industry_preference;
use App\Models\Job_Applicants;
use App\Models\Job_Posting;
use App\Models\Job_Preference;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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

    public function viewFile($id, $fileToView)
    {

        if ($fileToView === 3) {

            $this->dispatch('viewFile', [
                'url' => route('view.recommendation'),
                'app_id' => $id,
            ]);

        } else {

            $this->dispatch('viewFile', [
                'url' => route('view.resume'),
                'emp_id' => $id,
                'resume_type' => $fileToView,
            ]);
        }

    }

    public function printResume($id, $type)
    {

        $employee = Employee::findOrFail($id);
        $filename = $employee->fname . '_' . $employee->lname . '_resume.pdf';
        if ($type == 1) {
            // dd(public_path('storage/' . $employee->pimg));

            $pdf = Pdf::loadView('resume', ['employee' => $employee]);

            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->download();
            }, $filename);
            toastr()->success('Download Success');

        } elseif ($type == 2) {

            if (Storage::exists('public/' . $employee->resume)) {
                // Get the URL of the PDF file
                // $pdfUrl = Storage::url($path);

                $fileContent = Storage::get('public/' . $employee->resume);

                return response()->streamDownload(function () use ($fileContent) {
                    echo $fileContent;
                }, $filename);
                // Redirect the user to the PDF URL
                toastr()->success('Download Success');
            } else {
                // PDF file not found, handle the error accordingly
                // For example, you can redirect the user or show a message
            }
        }

    }

    // public function printRecom($id)
    // {

    //     $applicant = Job_Applicants::findOrFail($id);

    //     if (Storage::exists('public/' . $applicant->peso_Letter)) {
    //         $filename = $applicant->employee->fname . '_' . $applicant->employee->lname . '_recommendation.pdf';

    //         $fileContent = Storage::get('public/' . $applicant->peso_Letter);

    //         return response()->streamDownload(function () use ($fileContent) {
    //             echo $fileContent;
    //         }, $filename);
    //         // Redirect the user to the PDF URL
    //         toastr()->success('Download Success');
    //     } else {
    //         // PDF file not found, handle the error accordingly
    //         // For example, you can redirect the user or show a message
    //         toastr()->error('Recommendation Letter not found!');

    //     }

    // }

    public function updateApplicant($action, $modal)
    {
        // Check if action is valid
        if (!in_array($action, ['RECOMMENDED', 'REJECT'])) {
            toastr()->error('Invalid action specified!');
            return;
        }

        // Retrieve the job applicant instance
        $applicant = Job_Applicants::find($this->id);

        if (!$applicant) {
            toastr()->error('Applicant not found!');
            return;
        }

        // Start a database transaction
        DB::beginTransaction();

        try {
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

                // Update job applicant with recommended status and recommendation letter path
                $applicant->peso_Status = $action;
                $applicant->peso_Remarks = $this->recommendationRemarks;
                $applicant->peso_Letter = $recLetterPath;
                $applicant->applicant_Notif = 1;
            } elseif ($action === 'REJECT') {
                $this->validate([
                    'rejectRemarks' => ['required', 'string', 'min:10'],
                ]);

                // Update job applicant with rejected status
                $applicant->peso_Status = $action;
                $applicant->peso_Remarks = $this->rejectRemarks;
                $applicant->applicant_Notif = 1;
            } else {
                toastr()->error('Invalid action specified!');
                DB::rollBack();
                return;
            }

            // Save the changes
            $applicant->save();

            // Commit the transaction
            DB::commit();

            toastr()->success('Applicant updated successfully!');
        } catch (\Exception $e) {
            // Roll back the transaction on error
            DB::rollBack();
            toastr()->error('There was an error in updating the applicant!');
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

        $employeeIndustryPreference = Industry_Preference::where('employee_id', $applicant->employee->employee_id)
            ->pluck('industry_id');

// Query to check if the specific job posting matches the employee
        $isMatch = Job_Posting::where('job_id', $applicant->job_id)
            ->where('job_Status', 'ACTIVE')
            ->whereHas('peso.municipality', function ($query) use ($employeeMunicipalityId) {
                $query->where('municipality_id', $employeeMunicipalityId);
            })
            ->where('job_edu', '<=', $highestEducationLevel)
            ->where(function ($query) use ($employeeJobPreferences) {
                $query->whereHas('job_tags', function ($query) use ($employeeJobPreferences) {
                    $query->whereIn('position_id', $employeeJobPreferences);
                });
            })
            ->orWhere(function ($query) use ($employeeIndustryPreference) {
                $query->whereHas('job_industry', function ($query) use ($employeeIndustryPreference) {
                    $query->whereIn('industry_id', $employeeIndustryPreference);
                });
            })
            ->exists();

        return view('livewire.admin.job-posting.applicants.applicant-overview', compact('applicant', 'isMatch'));
    }

}
