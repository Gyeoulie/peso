<?php

namespace App\Http\Controllers;

use App\Models\Disability;
use App\Models\Education;
use App\Models\Eligibility;
use App\Models\Employee;
use App\Models\Industry_preference;
use App\Models\Job_Preference;
use App\Models\License;
use App\Models\Skills;
use App\Models\Training;
use App\Models\Work_Exp;
use Illuminate\Http\Request;

class EmployeeProfile extends Controller
{
    public function index()
    {
        return view('employee.profile');
    }

    public function employeeProfile(Request $request)
    {
        $user = $request->user();

        $employee = Employee::where('user_id', $user->id)->first();

        // Retrieve education records for the employee
        $educations = Education::where('employee_id', $employee->employee_id)->get();

        // Retrieve work experience records for the employee
        $workExperiences = Work_Exp::with('position')
            ->where('employee_id', $employee->employee_id)
            ->get();

        // Retrieve training records for the employee
        $trainings = Training::where('employee_id', $employee->employee_id)->get();

        // Retrieve disability records for the employee
        $disabilities = Disability::where('employee_id', $employee->employee_id)->get();

        // Retrieve license records for the employee
        $licenses = License::with('License_Type')
            ->where('employee_id', $employee->employee_id)
            ->get();

        // Retrieve eligibility records for the employee
        $eligibilities = Eligibility::with('eligibilityType')
            ->where('employee_id', $employee->employee_id)
            ->get();

        // Retrieve job preference records for the employee
        $jobPreferences = Job_Preference::where('employee_id', $employee->employee_id)->get();

        // Retrieve industry preference records for the employee
        $industryPreferences = Industry_preference::where('employee_id', $employee->employee_id)->get();

        // Retrieve skill records for the employee
        $skills = Skills::where('employee_id', $employee->employee_id)->get();

        // Now you have all the related records for the employee

        // Define an array mapping option values to their respective text descriptions
        $eduLevels = [
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

        $data = [
            'employee' => $employee,
            'educations' => $educations,
            'workExperiences' => $workExperiences,
            'trainings' => $trainings,
            'disabilities' => $disabilities,
            'licenses' => $licenses,
            'eligibilities' => $eligibilities,
            'jobPreferences' => $jobPreferences,
            'industryPreferences' => $industryPreferences,
            'skills' => $skills,
            'eduLevel' => $eduLevels,
        ];

        // Pass the array of data to the view
        return view('employee.profile', ['data' => $data]);

    }

    public function updateDescEmp(Request $request)
    {
        // Validate the request data
        $request->validate([
            'descPost' => 'required|string', // Add any additional validation rules as needed
        ]);

        $user = $request->user();

        // Retrieve the authenticated user's company
        $employee = Employee::where('user_id', $user->id)->first();

        if ($employee) {
            // Update the company description
            $employee->update([
                'empDesc' => $request->input('descPost'),
            ]);

            // Redirect back with success message
            return back()->with('success', 'Employee description updated successfully.');
        } else {
            // Redirect back with error message
            return back()->with('error', 'User does not have a Employee relationship.');
        }
    }
}

// return [
//     'educations' => $educations,
//     'work_experiences' => $workExperiences,
//     'trainings' => $trainings,
//     'disabilities' => $disabilities,
//     'licenses' => $licenses,
//     'eligibilities' => $eligibilities,
//     'job_preferences' => $jobPreferences,
//     'industry_preferences' => $industryPreferences,
//     'skills' => $skills,
// ];
