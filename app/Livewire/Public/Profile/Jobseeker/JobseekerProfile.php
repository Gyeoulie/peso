<?php

namespace App\Livewire\Public\Profile\Jobseeker;

use App\Models\Employee;
use App\Models\Work_Exp;
use App\Models\Job_Preference;
use App\Models\Job_Positions;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class JobseekerProfile extends Component
{

    public $id;

    public function render()
    {

        $jobseeker = Employee::find($this->id); 

        
        // $preference = Job_Preference::where('employee_id', $this->id)->get();



        // $preference = Job_Preference::with(['Job_Positions'])
        //     ->where('employee_id', $this->id)
        //     ->pluck('position_id');


        //     $employee = Employee::with(['jobs', 'department'])->find($this->id);


        return view('livewire.public.profile.jobseeker.jobseeker-profile', compact('jobseeker'));
    }
}
