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
    public function updatedsearchUsers()
    {
        $this->resetPage(); // Reset pagination for eligibility search
    }

    public function updateUserFilter($filter)
    {
        $this->userFilter = $filter;
        $this->resetPage(); // Reset pagination for eligibility search
    }

    public function render()
    {

        $user = Auth::user();

        $jobseekers = Employee::whereHas('barangay', function ($query) use ($user) {
            $query->where('municipality_id', $user->peso_accounts->peso->municipality_id);
        })->where(function ($query) {
            $query->where('fname', 'like', '%' . $this->searchUsers . '%')
                ->orWhere('mname', 'like', '%' . $this->searchUsers . '%')
                ->orWhere('lname', 'like', '%' . $this->searchUsers . '%');
        });

        if ($this->userFilter != 'ALL') {
            $jobseekers = $jobseekers->where('empstatus', $this->userFilter);
        }

        $jobseeker = $jobseekers->paginate($this->paginate);

        return view('livewire.admin.accounts.jobseeker.jobseeker-management', compact('jobseeker'));
    }
}
