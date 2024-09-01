<?php

namespace App\Console\Commands\JobPost;

use App\Models\Job_Posting;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CloseExpiredJobPostings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:close-expired-job-postings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Update job postings where job_Status is ACTIVE and job_Duration is less than the current date
        $affectedRows = Job_Posting::where('job_Status', 'ACTIVE')
            ->where('job_Duration', '<', Carbon::now())
            ->update(['job_Status' => 'CLOSED']);

        // Output the result in the console
        $this->info("Closed {$affectedRows} expired job postings.");
    }
}
