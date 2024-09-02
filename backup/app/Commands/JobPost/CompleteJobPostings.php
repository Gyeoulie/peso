<?php

namespace App\Console\Commands\JobPost;

use App\Models\Job_Applicants;
use App\Models\Job_Posting;
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
        // Update job postings that have been closed for more than 2 weeks
        $affectedRows = Job_Posting::where('job_Status', 'CLOSED')
            ->where('job_Duration', '<', Carbon::now()->subWeeks(2))
            ->update(['job_Status' => 'COMPLETED']);

        // Update job applicants related to those job postings
        if ($affectedRows) {
            $jobPostings = Job_Posting::where('job_Status', 'COMPLETED')
                ->pluck('job_id');

            Job_Applicants::whereIn('job_id', $jobPostings)
                ->whereNotIn('applicant_Status', ['REJECTED', 'COMPLETED'])
                ->update(['applicant_Status' => 'REJECTED']);
        }

        $this->info("Completed job postings and updated related job applicants successfully.");

        return 0;
    }
}
