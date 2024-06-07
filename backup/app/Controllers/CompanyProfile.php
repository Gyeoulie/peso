<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Company_Industry_Line;
use Illuminate\Http\Request;

class CompanyProfile extends Controller
{
    public function index()
    {
        return view('company.profile');
    }

    public function companyProfile(Request $request)
    {
        $user = $request->user();

        $company = Company::where('user_id', $user->id)->first();

        $industryLine = Company_Industry_Line::with('industry')
            ->where('company_id', $company->company_id)
            ->get();

        $companyTypeDescription = [
            '1' => 'Direct Hire',
            '2' => 'Private Employment Agency',
            '3' => 'Overseas Recruitment Agency',
            '4' => 'D.O. 174, s. 2017',
            '5' => 'National Government Agency',
            '6' => 'Local Government Unit',
            '7' => 'Government-owned and Controlled Corporation',
            '8' => 'State/Local University or College',
        ];
        $companyType = [
            '1' => 'Public',
            '2' => 'Private',
        ];

        $locType = [
            '1' => 'Main',
            '2' => 'Branch',
        ];

        $data = [
            'companyInfo' => $company,
            'industryLine' => $industryLine,
            'companyTypeDescription' => $companyTypeDescription,
            'companyType' => $companyType,
            'locType' => $locType,

        ];

        //dd($industryLine);

        return view('employer.profile', ['data' => $data]);

    }
    public function updateDescCompany(Request $request)
    {
        // Validate the request data
        $request->validate([
            'descPost' => 'required|string', // Add any additional validation rules as needed
        ]);


        $user = $request->user();
        

        // Retrieve the authenticated user's company
        $company = Company::where('user_id', $user->id)->first();
       
        if ($company) {
            // Update the company description
            $company->update([
                'company_Desc' => $request->input('descPost'),
            ]);

            // Redirect back with success message
            return back()->with('success', 'Company description updated successfully.');
        } else {
            // Redirect back with error message
            return back()->with('error', 'User does not have a company relationship.');
        }
    }
}
