<?php

namespace App\Livewire\Public;

use App\Models\Job_Applicants;
use App\Models\Job_Posting;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class JobpostView extends Component
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

    public $option;
    public $resume;

    public function updateOption($option)
    {
        $this->option = $option;

    }

    // public function apply()
    // {
    //     $user = auth()->user();

    //     $this->validate([
    //         'option' => ['required'],
    //     ]);

    //     if ($this->option == 2) {
    //         if (empty($user->employee->resume)) {
    //             $this->validate([
    //                 'resume' => ['required', 'file', 'mimes:pdf', 'max:5120'], // 'max' is in kilobytes (5MB = 5120KB)
    //             ], [
    //                 'resume.required' => 'The resume file is required.',
    //                 'resume.file' => 'The resume must be a file.',
    //                 'resume.mimes' => 'The resume must be a PDF file.',
    //                 'resume.max' => 'The resume may not be greater than 5MB in size.',
    //             ]);
    //             // $fileName = $file->store('requirements', 'public');
    //             $resumePath = $this->resume->store('resumes', 'public');

    //             try {
    //                 $user->employee->update([
    //                     'resume' => $resumePath,
    //                 ]);

    //                 try {
    //                     Job_Applicants::create([
    //                         'employee_id' => $user->employee->employee_id,
    //                         'job_id' => $this->id,
    //                         'applicant_Resume' => $this->option, // Validate role selection
    //                         'applicant_Status' => $this->emailPost,
    //                         'peso_Status' => "PENDING",
    //                     ]);

    //                 } catch (\Exception $e) {
    //                     toastr()->error('There was an error in the application!');
    //                 }

    //             } catch (\Exception $e) {
    //                 toastr()->error('There was an error uploading your resume!');
    //             }

    //             return;
    //         } else {

    //             try {
    //                 Job_Applicants::create([
    //                     'employee_id' => $user->employee->employee_id,
    //                     'job_id' => $this->id,
    //                     'applicant_Resume' => $this->option, // Validate role selection
    //                     'applicant_Status' => $this->emailPost,
    //                     'peso_Status' => "PENDING",
    //                 ]);

    //             } catch (\Exception $e) {
    //                 toastr()->error('There was an error in the application!');
    //             }
    //         }

    //     } else if ($this->option) {

    //         try {
    //             Job_Applicants::create([
    //                 'employee_id' => $user->employee->employee_id,
    //                 'job_id' => $this->id,
    //                 'applicant_Resume' => $this->option, // Validate role selection
    //                 'applicant_Status' => $this->emailPost,
    //                 'peso_Status' => "PENDING",
    //             ]);

    //         } catch (\Exception $e) {
    //             toastr()->error('There was an error in the application!');
    //         }
    //     }
    // }

    public function apply()
    {
        $this->validate([
            'option' => ['required'],
        ]);

        // Get the authenticated user
        $user = auth()->user();

        // If the user selected option 2
        if ($this->option == 2) {
            // If the user doesn't have a resume already
            if (empty($user->employee->resume)) {
                // Validate the resume upload
                $this->validate([
                    'resume' => ['required', 'file', 'mimes:pdf', 'max:5120'], // 'max' is in kilobytes (5MB = 5120KB)
                ], [
                    'resume.required' => 'The resume file is required.',
                    'resume.file' => 'The resume must be a file.',
                    'resume.mimes' => 'The resume must be a PDF file.',
                    'resume.max' => 'The resume may not be greater than 5MB in size.',
                ]);

                // Store the resume file
                $resumePath = $this->resume->store('resumes', 'public');

                // Update the user's employee record with the resume path
                try {
                    $user->employee->update([
                        'resume' => $resumePath,
                    ]);
                    toastr()->success('Application submitted successfully.');
                } catch (\Exception $e) {
                    toastr()->error('There was an error in uploading the resume!');
                    return;
                }

            }
        }

        // Create a new job applicant record
        try {
            Job_Applicants::create([
                'employee_id' => $user->employee->employee_id,
                'job_id' => $this->id,
                'applicant_Resume' => $this->option,
                'applicant_Status' => "PENDING",
                'peso_Status' => "PENDING",
            ]);
            toastr()->success('Application submitted successfully.');
            // session()->flash('message', );
        } catch (\Exception $e) {
            toastr()->error('There was an error in the application!');
        }

    }

    public function close()
    {
        $this->reset('resume', 'option');
        $this->dispatch('close-modal', 'apply-modal');
    }

    public function render()
    {

        $isApplied = false;
        $JobPost = Job_Posting::find($this->id);

        if (!$JobPost) {
            return redirect()->route('dashboard');
        }

        if (auth()->user()->usertype >= 4 && $JobPost->job_Status == 'PENDING') {
            return redirect()->route('dashboard');
        }

        if (auth()->user()->usertype === 4) {
            $isApplied = Job_Applicants::where('job_id', $this->id)
                ->where('employee_id', auth()->user()->employee->employee_id)
                ->exists();

        }

        return view('livewire.public.jobpost-view', compact('JobPost', 'isApplied'));
    }
}
