<?php

namespace App\Http\Controllers\JobPost;

use App\Http\Controllers\Controller;
use App\Models\Job_Posting;

class JobPostView extends Controller
{
    //

    public function show($id)
    {

        $JobPost = Job_Posting::find($id);

        if (!$JobPost) {
            return redirect()->route('dashboard');
        }

        if (auth()->user()->usertype >= 4 && $JobPost->job_Status == 'PENDING') {
            return redirect()->route('dashboard');
        }

        return view('dashboard.partials.job-posting-view', compact('JobPost'));
    }
}
