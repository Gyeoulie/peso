<?php

namespace App\Console\Commands\JobPost;

use App\Mail\ApplicationFull;
use App\Mail\SlotsFilled;
use App\Models\Job_Applicants;
use App\Models\Job_Posting;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ProcessClosedJobPosting extends Command
{
    protected $signature = 'jobposting:process {jobId}';
    protected $description = 'Close job posting if no slots left and notify remaining applicants.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $jobId = $this->argument('jobId');

        DB::beginTransaction();
        try {
            // Find the job posting
            $jobPosting = Job_Posting::find($jobId);

            if ($jobPosting && $jobPosting->slotsLeft() <= 0) {
                // Mark the job posting as closed
                $jobPosting->update([
                    'job_Status' => 'CLOSED', // Assuming 'CLOSED' is the status for closed job postings
                ]);

                Mail::to($jobPosting->company->user->email)
                    ->queue(new SlotsFilled($jobPosting));

                // Find remaining applicants who are not COMPLETED, REJECTED, or CANCELLED
                $remainingApplicants = Job_Applicants::where('job_id', $jobId)
                    ->whereNotIn('applicant_Status', ['ACCEPTED', 'REJECTED', 'CANCELLED'])
                    ->get();

                // Update their status and remarks, and send emails
                foreach ($remainingApplicants as $remainingApplicant) {
                    $remainingApplicant->update([
                        'applicant_Status' => 'CANCELLED',
                        'company_Remarks' => 'Position has already been filled',
                    ]);

                    // Queue email to remaining applicants
                    Mail::to($remainingApplicant->employee->user->email)
                        ->queue(new ApplicationFull($remainingApplicant->employee, $remainingApplicant));
                }
            }

            DB::commit();
            $this->info('Job posting closed and applicants notified.');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error('Error closing job posting: ' . $e->getMessage());
        }
    }
}
