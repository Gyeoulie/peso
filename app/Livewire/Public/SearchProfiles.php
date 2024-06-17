<?php

namespace App\Livewire\Public;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class SearchProfiles extends Component
{

    use WithPagination;

    #[Url()]
    public $q;

    // public function searchProfile()
    // {
    //     $this->q = $this->q;
    // }

    // public function mount($search)
    // {
    //     $this->search = $search;
    // }

    public function render()
    {

        $search = $this->q; // The search term

        // Fetch employees with related user data
        $employeeQuery = DB::table('employee')
            ->leftJoin('barangay', 'employee.barangay_id', '=', 'barangay.barangay_id')
            ->leftJoin('municipality', 'barangay.municipality_id', '=', 'municipality.municipality_id')
            ->leftJoin('users', 'employee.user_id', '=', 'users.id')
            ->select(
                DB::raw("'employee' as type"),
                'employee.employee_id as id',
                'employee.empStatus as empStatus',
                'employee.pimg as pimage',
                DB::raw("CONCAT_WS(' ', employee.fname, employee.mname, employee.lname) as name"),
                DB::raw("'' as trade_name"),
                DB::raw("'' as company_Type"),
                DB::raw("'' as employer_Type"),
                'barangay.barangay_Name as barangay_name',
                'municipality.municipality_Name as municipality_name',
                DB::raw("(
                    (employee.fname LIKE '%$search%') +
                    (employee.mname LIKE '%$search%') +
                    (employee.lname LIKE '%$search%')
                ) as relevance_score")
            )
            ->where('users.usertype', '=', '4')
            ->where(function ($query) use ($search) {
                $query->where('employee.fname', 'like', '%' . $search . '%')
                    ->orWhere('employee.mname', 'like', '%' . $search . '%')
                    ->orWhere('employee.lname', 'like', '%' . $search . '%');
            });

        // Select companies and standardize the columns
        $companyQuery = DB::table('company')
            ->leftJoin('barangay', 'company.barangay_id', '=', 'barangay.barangay_id')
            ->leftJoin('municipality', 'barangay.municipality_id', '=', 'municipality.municipality_id')
            ->leftJoin('users', 'company.user_id', '=', 'users.id')
            ->select(
                DB::raw("'company' as type"),
                'company.company_Id as id',
                DB::raw("'' as empStatus"),
                'company.company_img as pimage',
                'company.business_Name as name',
                'company.trade_Name as trade_name',
                'company.company_Type as company_Type',
                'company.employer_Type as employer_Type',
                'barangay.barangay_Name as barangay_name',
                'municipality.municipality_Name as municipality_name',
                DB::raw("(
                    (company.business_Name LIKE '%$search%') +
                    (company.trade_Name LIKE '%$search%')
                ) as relevance_score")
            )
            ->where('users.usertype', '=', '5')
            ->where(function ($query) use ($search) {
                $query->where('company.business_Name', 'like', '%' . $search . '%')
                    ->orWhere('company.trade_Name', 'like', '%' . $search . '%');
            });

        // Combine both queries and order by relevance_score
        $results = $employeeQuery->union($companyQuery)
            ->orderByDesc('relevance_score')
            ->orderBy('name')
            ->paginate(10);

        // dd($results);

        return view('livewire.public.search-profiles', compact('results'));
    }
}
