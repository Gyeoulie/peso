<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\Certificate;
use App\Models\Certificate_Type;
use App\Models\Company;
use App\Models\Company_Industry_Line;
use App\Models\Disability;
use App\Models\Education;
use App\Models\Eligibility;
use App\Models\Eligibility_Type;
use App\Models\Employee;
use App\Models\Industry_preference;
use App\Models\Job_Industry;
use App\Models\Job_Positions;
use App\Models\Job_Preference;
use App\Models\Language;
use App\Models\License;
use App\Models\License_Type;
use App\Models\Municipality;
use App\Models\Province;
use App\Models\Skills;
use App\Models\Training;
use App\Models\Work_Exp;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NSRP extends Controller
{
    //

    public function loadData()
    {
        $data = [
            'provinces' => Province::all(),
            'municipalities' => Municipality::all(),
            'barangays' => Barangay::all(),
            'certificateTypes' => Certificate_Type::all(),
            'licenseTypes' => License_Type::all(),
            'eligibilityTypes' => Eligibility_Type::all(),
            'jobPositions' => Job_Positions::all(),
            'jobIndustries' => Job_Industry::all(),
        ];

        // dd($data);

        return view('fill.fill_profile')->with('datainfo', $data);
    }
    public function fetchMunicipalities($province)
    {
        $municipalities = Municipality::where('province_id', $province)->get();
        return response()->json($municipalities);
    }

    public function fetchBarangays($municipality)
    {
        $barangays = Barangay::where('municipality_id', $municipality)->get();
        return response()->json($barangays);
    }

    public function loadEmployer()
    {
        $data = [
            'provinces' => Province::all(),
            'municipalities' => Municipality::all(),
            'barangays' => Barangay::all(),
            'jobIndustries' => Job_Industry::all(),
        ];

        // dd($data);

        return view('fill.fill_employer')->with('datainfo', $data);

    }

    public function storeInfo(Request $request)
    {
        //dd($request);
        $user = Auth::user();

        if ($request->hasFile('pimagePost')) {
            $image = $request->file('pimagePost');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Store the image in the 'images/user_data' directory within the 'public' disk
            $path = $image->storeAs('images/user_data', $imageName, 'public');
        }

        $employee = Employee::create([
            'user_id' => $user->id,
            'fname' => $request->input('fnamePost'),
            'lname' => $request->input('lnamePost'),
            'mname' => $request->input('mnamePost'),
            'suffix' => $request->input('suffixPost'),
            'height' => $request->input('heightPost'),
            'gender' => $request->input('genderPost'),
            'civilstatus' => $request->input('civilstatusPost'),
            'religion' => $request->input('religionPost'),
            'birthdate' => $request->input('bdayPost'),
            'pnumber' => $request->input('pnumPost'),
            'address' => $request->input('hnumPost'),
            'barangay' => $request->input('barangayPost'),
            'tinnum' => $request->input('tinPost'),
            'empstatus' => $request->input('empstatusPost'),
            'empstatusdesc' => $request->input('empdescPost'),
            'pimg' => $path,

        ]);

        //PREFERED JOB
        if ($request->has('jobPref')) {
            foreach ($request->input('jobPref') as $jobPreference) {
                Job_Preference::create([
                    'employee_id' => $employee->employee_id, // Assuming 'employee_id' is the foreign key column
                    'position_id' => $jobPreference,
                ]);
            }
        }

        //PREFER INDUSTRY
        if ($request->has('locPref')) {
            foreach ($request->input('locPref') as $industryPreference) {
                Industry_preference::create([
                    'employee_id' => $employee->employee_id, // Assuming 'employee_id' is the foreign key column
                    'industry_id' => $industryPreference,
                ]);
            }
        }

        //PREFER Skills
        if ($request->has('otherSkillPost')) {
            foreach ($request->input('otherSkillPost') as $otherSkills) {
                Skills::create([
                    'employee_id' => $employee->employee_id, // Assuming 'employee_id' is the foreign key column
                    'skill_Type' => $otherSkills,
                ]);
            }
        }

        if ($request->has('skillsPost')) {
            foreach ($request->input('skillsPost') as $skillsPost) {
                Skills::create([
                    'employee_id' => $employee->employee_id, // Assuming 'employee_id' is the foreign key column
                    'skill_Type' => $skillsPost,
                ]);
            }
        }

        // Check if otherDisabilityPost has a value
        // Check if otherDisabilityPost has a value
        if ($request->has('disabilityBox')) {
            if ($request->input('disabilityBox', [])) {
                foreach ($request->input('disabilityBox', []) as $disabilityType) {
                    Disability::create([
                        'employee_id' => $employee->employee_id,
                        'disability_Type' => $disabilityType,
                    ]);
                }
            }
        }

// Check if otherDisabilityPost has a value and create a Disability record for other disability
        if ($request->filled('disabilityBox[5]') && $request->filled('otherDisabilityPost')) {
            Disability::create([
                'employee_id' => $employee->employee_id,
                'disability_Type' => $request->input('otherDisabilityPost'),
            ]);
        }

        // if ($$request->filled('disabilityBox[0]')) {
        //     Disability::create([
        //         'employee_id' => $employee->employee_id,
        //         'disability_Type' => 'disabilityBox[0]',
        //     ]);
        // }
        // if ($$request->filled('disabilityBox[1]')) {
        //     Disability::create([
        //         'employee_id' => $employee->employee_id,
        //         'disability_Type' => 'disabilityBox[1]',
        //     ]);
        // }
        // if ($$request->filled('disabilityBox[2]')) {
        //     Disability::create([
        //         'employee_id' => $employee->employee_id,
        //         'disability_Type' => 'disabilityBox[2]',
        //     ]);
        // }
        // if ($$request->filled('disabilityBox[3]')) {
        //     Disability::create([
        //         'employee_id' => $employee->employee_id,
        //         'disability_Type' => 'disabilityBox[3]',
        //     ]);
        // }
        // if ($$request->filled('disabilityBox[4]')) {
        //     Disability::create([
        //         'employee_id' => $employee->employee_id,
        //         'disability_Type' => 'disabilityBox[4]',
        //     ]);
        // }
        // if ($$request->filled('disabilityBox[5]')) {
        //     if ($request->filled('otherDisabilityPost')) {
        //         // Create a Disability record for other disability
        //         Disability::create([
        //             'employee_id' => $employee->employee_id,
        //             'disability_Type' => $request->input('otherDisabilityPost'),
        //         ]);
        //     }
        // }

        // for ($i = 0; $i < min(count($request->disabilityBox), 5); $i++) {
        //     // Check if the current index exists in the array
        //     if (isset($request->disabilityBox[$i])) {
        //         $value = $request->disabilityBox[$i];

        //         // Ensure $value is not null or empty before creating a Disability record
        //         if ($value !== null && $value !== '') {
        //             Disability::create([
        //                 'employee_id' => $employee->employee_id,
        //                 'disability_Type' => $value,
        //             ]);
        //         }
        //     }
        // }

        if ($request->has('languageRow')) {
            foreach ($request->languageRow as $index => $language) {
                // Check if the checkbox for read is checked
                $read = isset($request->read[$index]) ? 1 : 2;
                // Check if the checkbox for write is checked
                $write = isset($request->write[$index]) ? 1 : 2;
                // Check if the checkbox for speak is checked
                $speak = isset($request->speak[$index]) ? 1 : 2;
                // Check if the checkbox for understand is checked
                $understand = isset($request->understand[$index]) ? 1 : 2;

                // Create a Language record
                Language::create([
                    'employee_id' => $employee->employee_id,
                    'language_Type' => $language,
                    'language_read' => $read,
                    'language_write' => $write,
                    'language_speak' => $speak,
                    'language_understand' => $understand,
                ]);
            }
        }

        if ($request->has('eduSchoolPost')) {
            foreach ($request->eduSchoolPost as $index => $school) {
                // Create an Education record
                Education::create([
                    'employee_id' => $employee->employee_id,
                    'edu_School' => $school,
                    'edu_Level' => $request->eduLevelPost[$index],
                    'edu_Course' => $request->eduCoursePost[$index],
                    'edu_Started' => $request->eduStartPost[$index],
                    'edu_Ended' => $request->eduEndPost[$index],
                ]);
            }
        }

        if ($request->has('certTypePost')) {
            foreach ($request->certTypePost as $index => $cert) {
                // Create an Education record
                Certificate::create([
                    'employee_id' => $employee->employee_id,
                    'cert_Type_id' => $cert,
                    'cert_From' => $request->certIssuedPost[$index],
                    'cert_Date_Issued' => $request->certDatePost[$index],
                    'cert_Rating' => $request->certRatingPost[$index],
                ]);
            }
        }

        if ($request->has('trainingNamePost')) {
            foreach ($request->trainingNamePost as $index => $training) {
                // Create an Education record
                Training::create([
                    'employee_id' => $employee->employee_id,
                    'training_Name' => $training,
                    'training_From' => $request->trainingInstiPost[$index],
                    'training_Cert' => $request->trainingCertPost[$index],
                    'training_Start' => $request->trainingStartPost[$index],
                    'training_End' => $request->trainingEndPost[$index],
                    'training_Status' => $request->trainingStatusPost[$index],
                ]);
            }
        }

        if ($request->has('eligibilityTypePost')) {
            foreach ($request->eligibilityTypePost as $index => $eligibility) {
                // Create an Education record
                Eligibility::create([
                    'employee_id' => $employee->employee_id,
                    'eligibility_Type' => $eligibility,
                    'eligibility_Date' => $request->eligibilityDatePost[$index],
                ]);
            }
        }

        if ($request->has('licenseTypePost')) {
            foreach ($request->licenseTypePost as $index => $license) {
                // Create an Education record
                License::create([
                    'employee_id' => $employee->employee_id,
                    'license_type_id' => $license,
                    'license_validity' => $request->licenseDatePost[$index],
                ]);
            }
        }

        if ($request->has('workEmpPost')) {
            foreach ($request->workEmpPost as $index => $workExp) {
                // Create an Education record
                Work_Exp::create([
                    'employee_id' => $employee->employee_id,
                    'work_Name' => $workExp,
                    'work_Address' => $request->workAddressPost[$index],
                    'position_id' => $request->workPosPost[$index],
                    'work_Start' => $request->workStartPost[$index],
                    'work_End' => $request->workEndPost[$index],
                    'work_Status' => $request->workStatusPost[$index],
                ]);
            }
        }
// Update the current user's userType to '4'
        $user = Auth::user();
        $user->userType = '4';

        /** @var \App\Models\User $user **/
        $user->save();
        // Update the user's role

        return redirect(RouteServiceProvider::HOME);
    }

    public function postEmployer(Request $request)
    {

        //dd($request);

        $user = Auth::user();

        if ($request->hasFile('cimagePost')) {
            $image = $request->file('cimagePost');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Store the image in the 'images/user_data' directory within the 'public' disk
            $path = $image->storeAs('images/user_data', $imageName, 'public');
        }

        $company = Company::create([
            'user_id' => $user->id,
            'bussines_Name' => $request->input('bnamePost'),
            'trade_Name' => $request->input('tnamePost'),
            'company_TIN' => $request->input('tinPost'),
            'company_Type' => $request->input('locPost'),
            'employer_Type' => $request->input('empTypePost'),
            'employer_Type_Desc' => $request->input('empdescPost'),
            'company_Total_workforce' => $request->input('workforcePost'),
            'company_Address' => $request->input('hnumPost'),
            'barangay_id' => $request->input('barPost'),
            'contact_Person' => $request->input('cpersonPost'),
            'contact_Person_position' => $request->input('postionPost'),
            'company_Pnum' => $request->input('mobPost'),
            'company_Tnum' => $request->input('telPost'),
            'company_Fnum' => $request->input('faxPost'),
            'company_Email' => $request->input('emailPost'),
            'company_Status' => 'ACTIVE',
            'company_img' => $path,

        ]);

        if ($request->has('industryPost')) {
            foreach ($request->input('industryPost') as $industryLine) {
                Company_Industry_Line::create([
                    'company_id' => $company->company_id, //
                    'industry_id' => $industryLine,
                ]);
            }
        }

        // Update the current user's userType to '4'
        $user = Auth::user();
        $user->userType = '5';

        /** @var \App\Models\User $user **/
        $user->save();
        // Update the user's role

        return redirect(RouteServiceProvider::HOME);

    }
}
