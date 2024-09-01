<?php

namespace App\Console\Commands\JobPost;

use App\Models\Job_Applicants;
use App\Models\Job_Posting;
use App\Services\CustomAuditLogger;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CompleteJobPostings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:complete-job-postings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mark closed job postings as completed and reject applicable job applicants';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get the current date
        $now = Carbon::now();

        // Fetch job postings that have been closed for more than 2 weeks
        $expiredJobPostings = Job_Posting::where('job_Status', 'CLOSED')
            ->where('updated_at', '<', $now->subWeeks(2)) // Update condition to `updated_at`
            ->get();

        // Store old values for auditing
        $oldValues = $expiredJobPostings->mapWithKeys(function ($posting) {
            return [$posting->job_id => ['job_Status' => $posting->job_Status]];
        })->toArray();

        // Update job postings to COMPLETED
        $affectedRows = Job_Posting::where('job_Status', 'CLOSED')
            ->where('updated_at', '<', $now)
            ->update(['job_Status' => 'COMPLETED']);

        // Log the audit for job postings
        foreach ($expiredJobPostings as $posting) {
            CustomAuditLogger::log(
                Job_Posting::class,
                $posting->job_id,
                'updated',
                $oldValues[$posting->job_id] ?? [], // Old values
                ['job_Status' => 'COMPLETED'], // New values
                0// System or user ID
            );
        }

        // Fetch job postings that are now COMPLETED
        $completedJobPostings = Job_Posting::where('job_Status', 'COMPLETED')
            ->pluck('job_id');

        // Update job applicants related to those completed job postings
        $affectedApplicants = Job_Applicants::whereIn('job_id', $completedJobPostings)
            ->whereNotIn('applicant_Status', ['REJECTED', 'COMPLETED'])
            ->get();

        // Store old values for auditing
        $oldApplicantValues = $affectedApplicants->mapWithKeys(function ($applicant) {
            return [$applicant->applicant_id  => ['applicant_Status' => $applicant->applicant_Status]];
        })->toArray();

        // Update applicants to REJECTED
        Job_Applicants::whereIn('job_id', $completedJobPostings)
            ->whereNotIn('applicant_Status', ['REJECTED', 'COMPLETED'])
            ->update(['applicant_Status' => 'REJECTED']);

        // Log the audit for job applicants
        foreach ($affectedApplicants as $applicant) {
            CustomAuditLogger::log(
                Job_Applicants::class,
                $applicant->applicant_id ,
                'updated',
                $oldApplicantValues[$applicant->applicant_id ] ?? [], // Old values
                ['applicant_Status' => 'REJECTED'], // New values
                0// System or user ID
            );
        }

        // Output the result in the console
        $this->info("Completed {$affectedRows} job postings and updated {$affectedApplicants->count()} job applicants.");
    }
}
