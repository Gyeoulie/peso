<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;

class ResumeController extends Controller
{
    //

    public function downloadResume($id)
    {
        $employee = Employee::findOrFail($id);
        $pdf = PDF::loadView('resume', ['employee' => $employee])->output();

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf;
        }, 'resume.pdf');
    }
}
