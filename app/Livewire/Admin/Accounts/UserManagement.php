<?php

namespace App\Livewire\Admin\Accounts;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class UserManagement extends Component
{
    use WithPagination;
    public $paginate = 7;
    public $searchUsers;

    public $userFilter = 'ALL';

    public function updateUserFilter($filter)
    {
        $this->userFilter = $filter;
    }

    public function render()
    {

        $user = Auth::user();

        $jobseeker = Employee::with('barangay.municipality.province')
            ->whereHas('barangay', function ($query) use ($user) {
                $query->where('municipality_id', '=', $user->peso->municipality_id);
            })
            ->where(function ($query) {
                $query->where('fname', 'like', '%' . $this->searchUsers . '%')
                    ->orWhere('mname', 'like', '%' . $this->searchUsers . '%')
                    ->orWhere('lname', 'like', '%' . $this->searchUsers . '%');
            });

        if ($this->userFilter != 'ALL') {
            $jobseeker = $jobseeker->where('empstatus', $this->userFilter);
        }

        $jobseeker = $jobseeker->paginate($this->paginate, ['*'], 'jobseekers');

        return view('livewire.admin.accounts.user-management', compact('jobseeker'));
    }
}
