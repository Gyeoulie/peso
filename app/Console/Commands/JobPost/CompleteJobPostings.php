<?php


namespace App\Console\Commands\JobPost;

use App\Mail\ApplicationFull;
use App\Mail\SlotsFilled;
use App\Models\Job_Applicants;
use App\Models\Job_Posting;
use App\Services\CustomAuditLogger;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CompleteJobPostings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:complete-job-postings {jobId}';

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
        $jobId = $this->argument('jobId');

        DB::beginTransaction();
        try {
            // Find the job posting
            $jobPosting = Job_Posting::find($jobId);

            if ($jobPosting && $jobPosting->slotsLeft() <= 0) {
                // Store old values for auditing
                $oldJobPostingValues = [
                    'job_Status' => $jobPosting->job_Status,
                ];

                // Mark the job posting as closed
                $jobPosting->update([
                    'job_Status' => 'COMPLETED', // Assuming 'CLOSED' is the status for closed job postings
                ]);

                // Log the job posting update
                CustomAuditLogger::log(
                    Job_Posting::class,
                    $jobId,
                    'updated',
                    $oldJobPostingValues, // Old values
                    ['job_Status' => 'COMPLETED'], // New values
                    0// System or user ID
                );

                Mail::to($jobPosting->company->user->email)
                    ->queue(new SlotsFilled($jobPosting));

                // Find remaining applicants who are not ACCEPTED, REJECTED, or CANCELLED
                $remainingApplicants = Job_Applicants::where('job_id', $jobId)
                    ->whereNotIn('applicant_Status', ['ACCEPTED', 'REJECTED', 'CANCELLED'])
                    ->get();

                foreach ($remainingApplicants as $remainingApplicant) {
                    $updateData = [
                        'applicant_Status' => 'CANCELLED',
                        'company_Remarks' => 'Position has already been filled',
                        'applicant_Notif' => 2,
                    ];

                    $oldApplicantValues = [];

                    if ($remainingApplicant->peso_Status === 'PENDING') {
                        $updateData['peso_Status'] = 'CANCELLED';
                        $updateData['peso_Remarks'] = 'Job Posting was completed.';

                        // Record old values including peso_Status and peso_Remarks
                        $oldApplicantValues = [
                            'applicant_Status' => $remainingApplicant->applicant_Status,
                            'peso_Status' => $remainingApplicant->peso_Status,
                            'peso_Remarks' => $remainingApplicant->peso_Remarks,
                            'company_Remarks' => $remainingApplicant->company_Remarks,
                            'applicant_Notif' => $remainingApplicant->applicant_Notif,
                        ];
                    } else {
                        $updateData['peso_Remarks'] = $remainingApplicant->peso_Remarks; // Ensure this is set even if not updated

                        // Record old values excluding peso_Status and peso_Remarks if not updated
                        $oldApplicantValues = [
                            'applicant_Status' => $remainingApplicant->applicant_Status,
                            'company_Remarks' => $remainingApplicant->company_Remarks,
                            'applicant_Notif' => $remainingApplicant->applicant_Notif,
                        ];
                    }

                    // Update the applicant record
                    $remainingApplicant->update($updateData);

                    // Log the applicant update only if there are changes
                    if (!empty($oldApplicantValues)) {
                        CustomAuditLogger::log(
                            Job_Applicants::class,
                            $remainingApplicant->applicant_id,
                            'updated',
                            $oldApplicantValues, // Old values
                            $updateData, // New values
                            0// System or user ID
                        );
                    }

                    // Queue email to remaining applicants
                    Mail::to($remainingApplicant->employee->user->email)
                        ->queue(new ApplicationFull($remainingApplicant->employee, $remainingApplicant));
                }
            }

            DB::commit();
            $this->info('Job posting closed and applicants notified.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            $this->error('Error closing job posting: ' . $e->getMessage());
        }
    }

}
