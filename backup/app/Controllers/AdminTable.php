<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\Certificate_Type;
use App\Models\Eligibility_Type;
use App\Models\Job_Industry;
use App\Models\Job_Positions;
use App\Models\License_Type;
use App\Models\Municipality;
use App\Models\PESO;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;

class AdminTable extends Controller
{

    public function index()
    {
        $data = [
            'provinces' => Province::all(),
            'municipalities' => Municipality::all(),
            'barangays' => Barangay::all(),
        ];

        return view('admin.tables', ['data' => $data]);

    }

    public function addPeso(Request $request)
    {

        // Validate the form inputs
        $request->validate([
            'addPESOMun' => 'required',
            'addPESOEmail' => 'required|email|unique:users,email', // Make sure email is unique
            'addPwd' => 'required',
        ]);

        try {
            // Create a new user with the provided email and password
            $user = new User();
            $user->email = $request->input('addPESOEmail');
            $user->password = bcrypt($request->input('addPwd')); // Hash the password
            $user->usertype = '8';
            $user->save();

            // Create a new PESO entry
            $peso = new PESO();
            $peso->user_id = $user->id; // Assign the user_id
            $peso->municipality_id = $request->input('addPESOMun'); // Assign the municipality_id
            $peso->save();

            return redirect()->back()->with('success', 'PESO account added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add PESO account. Please try again.');
        }
    }

    //

    public function addData(Request $request)
    {

        //       dd($request);
        // Validate the incoming request data
        $request->validate([
            'addType' => 'required',
            'addTitle' => 'required',
            'addCode' => 'required',
        ]);

        // Get the selected data type from the form
        $dataType = $request->input('addType');

        // Perform different actions based on the selected data type
        try {
            $dataType = $request->input('addType');

            // Perform different actions based on the selected data type
            switch ($dataType) {
                case 1:
                    // Handle Eligibility data
                    $eligibility = new Eligibility_Type();
                    $eligibility->eligibility_Name = $request->input('addTitle');
                    $eligibility->eligibility_Code = $request->input('addCode');
                    $eligibility->save();
                    break;
                case 2:
                    // Handle License data
                    $license = new License_Type();
                    $license->license_name = $request->input('addTitle');
                    $license->license_code = $request->input('addCode');
                    $license->save();
                    break;
                case 3:
                    // Handle Certification data
                    $certification = new Certificate_Type();
                    $certification->cert_Name = $request->input('addTitle');
                    $certification->cert_Code = $request->input('addCode');
                    $certification->save();
                    break;
                case 4:
                    // Handle Industry data
                    $industry = new Job_Industry();
                    $industry->industry_Title = $request->input('addTitle');
                    $industry->industry_Code = $request->input('addCode');
                    $industry->save();
                    break;
                case 5:
                    // Handle Job Positions data
                    $jobPosition = new Job_Positions();
                    $jobPosition->position_Title = $request->input('addTitle');
                    $jobPosition->position_Code = $request->input('addCode');
                    $jobPosition->save();
                    break;
                default:
                    // Handle default case
                    break;
            }

            // Redirect back or to a specific route after processing the data
            return redirect()->back()->with('success', 'Data added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add data. Please try again.');
        }
    }
}
