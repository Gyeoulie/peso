<?php

namespace App\Livewire\Admin\Accounts\Jobseeker;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class JobseekerManagement extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $paginate = 10;
    public $searchUsers;

    public $userFilter = 'ALL';

    public function updateUserFilter($filter)
    {
        $this->userFilter = $filter;
    }

    public function render()
    {

        $user = Auth::user();

        $jobseeker = Employee::where(function ($query) {
            $query->where('fname', 'like', '%' . $this->searchUsers . '%')
                ->orWhere('mname', 'like', '%' . $this->searchUsers . '%')
                ->orWhere('lname', 'like', '%' . $this->searchUsers . '%');
        });

        if ($this->userFilter != 'ALL') {
            $jobseeker = $jobseeker->where('empstatus', $this->userFilter);
        }

        $jobseeker = $jobseeker->paginate($this->paginate);

        return view('livewire.admin.accounts.jobseeker.jobseeker-management', compact('jobseeker'));
    }
}
