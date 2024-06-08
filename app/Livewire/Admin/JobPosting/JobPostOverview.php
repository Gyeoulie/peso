<?php

namespace App\Livewire\Admin\JobPosting;

use App\Models\Employee;
use App\Models\Job_Posting;
use App\Models\Requirements_Passed;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class JobPostOverview extends Component
{

    public $id;

    public $remarks;

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

    public function updateJob($id, $status, $modal)
    {

        $user = Auth::user();

        $this->validate([
            'remarks' => 'required|string',
        ]);

        try {
            Job_Posting::where('job_id', $id)->update([
                'job_Status' => $status,
                'peso_Remarks' => $this->remarks,
                'peso_id' => $user->id,
            ]);
            $this->dispatch('close-modal', $modal);
            toastr()->success('Job Posting Approved');

        } catch (\Exception $e) {
            toastr()->error($e);
        }

    }

    public function close($modal)
    {
        $this->reset('remarks');
        $this->resetValidation();
        $this->dispatch('close-modal', $modal);
    }

    public function downloadPDF($id)
    {

        try {
            $reqpassed = Requirements_Passed::findOrFail($id);

        } catch (\Exception $e) {
            toastr()->error($e);
        }

        $pdfPath = $reqpassed->req_passed_Input;
        $pdfName = $reqpassed->requirement->requirement_Title . '_' . $reqpassed->job_posting->company->business_Name . '.pdf';

        //$path = storage_path('public/' . $pdfPath);
        if (Storage::exists('public/' . $pdfPath)) {
            // Get the URL of the PDF file
            // $pdfUrl = Storage::url($path);

            $fileContent = Storage::get('public/' . $pdfPath);

            return response()->streamDownload(function () use ($fileContent) {
                echo $fileContent;
            }, $pdfName);
            // Redirect the user to the PDF URL
            toastr()->success('PDF file.');
        } else {
            // PDF file not found, handle the error accordingly
            // For example, you can redirect the user or show a message
            toastr()->error('PDF file not found.' . $pdfPath);
        }
    }

    public function render()
    {

        $jobpost = Job_Posting::with(['job_tags'])->findOrFail($this->id);

        $jobMunicipalityId = $jobpost->peso_municipality_id;
        $jobEducationLevel = $jobpost->job_Edu;
        $jobTagIds = $jobpost->job_tags->pluck('position_id');

        $matchingEmployees = Employee::whereHas('barangay.municipality', function ($query) use ($jobMunicipalityId) {
            $query->where('municipality_id', $jobMunicipalityId);
        })
            ->whereHas('education', function ($query) use ($jobEducationLevel) {
                $query->where('edu_level', '<=', $jobEducationLevel);
            })
            ->whereHas('job_preference', function ($query) use ($jobTagIds) {
                $query->whereIn('position_id', $jobTagIds);
            })
            ->withCount('job_preference as num_matched_tags') // Count the number of matched job tags
            ->orderByDesc('num_matched_tags') // Order by the number of matched job tags in descending order
            ->get();

        // Find applicants that match the job posting criteria
        // $matchingEmployees = Employee::whereHas('barangay.municipality', function ($query) use ($jobMunicipalityId) {
        //     $query->where('municipality_id', $jobMunicipalityId);
        // })
        //     ->whereHas('education', function ($query) use ($jobEducationLevel) {
        //         $query->where('edu_level', '<=', $jobEducationLevel);
        //     })
        //     ->whereHas('job_preference', function ($query) use ($jobTagIds) {
        //         $query->whereIn('position_id', $jobTagIds);
        //     })
        //     ->get();
        return view('livewire.admin.job-posting.job-post-overview', compact('jobpost', 'matchingEmployees'));
    }
}
