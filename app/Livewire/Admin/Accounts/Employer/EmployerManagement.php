<?php

namespace App\Livewire\Admin\Accounts\Employer;

use App\Models\Partnerships;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class EmployerManagement extends Component
{

    use WithPagination, WithoutUrlPagination;
    // public $paginate = ;
    public $searhEmployers;
    public function render()
    {

        $user = Auth::user();

        $partnersData = Partnerships::where('peso_id', $user->peso_accounts->peso_id)
            ->where('partnership_Status', 'APPROVED')
            ->whereHas('company', function ($query) {
                $query->where('trade_Name', 'like', '%' . $this->searhEmployers . '%')
                    ->orWhere('business_Name', 'like', '%' . $this->searhEmployers . '%');
            })
            ->paginate(10);

        // $employer = Company::where(function ($query) {
        //     $query->where('business_Name', 'like', '%' . $this->searhEmployers . '%')
        //         ->orWhere('trade_Name', 'like', '%' . $this->searhEmployers . '%');
        // });

        // $employer = $employer->paginate($this->paginate, ['*'], 'employer');

        // dd($employer);

        return view('livewire.admin.accounts.employer.employer-management', compact('partnersData'));
    }
}
