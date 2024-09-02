<?php

namespace App\Livewire\Admin\Accounts\Employer;

use App\Models\Company;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class EmployerManagement extends Component
{

    use WithPagination;
    public $paginate = 7;
    public $searhEmployers;
    public function render()
    {

        $employer = Company::where(function ($query) {
            $query->where('business_Name', 'like', '%' . $this->searhEmployers . '%')
                ->orWhere('trade_Name', 'like', '%' . $this->searhEmployers . '%');
        });

        $employer = $employer->paginate($this->paginate, ['*'], 'employer');

        // dd($employer);

        return view('livewire.admin.accounts.employer.employer-management', compact('employer'));
    }
}
