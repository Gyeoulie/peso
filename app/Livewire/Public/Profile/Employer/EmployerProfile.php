<?php

namespace App\Livewire\Public\Profile\Employer;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class EmployerProfile extends Component
{
    public $id;
    public $description;

    public function rules()
    {
        return [
            'description' => ['required', 'string', 'min:50', 'max:1000'],

        ];
    }

    public function open()
    {
        $getDesc = Company::where('company_id', $this->id)->first();

        if ($getDesc) {
            $this->description = $getDesc->company_Desc;
        }

        $this->dispatch('open-modal', 'aboutme-modal');
    }
    public function close()
    {
        $this->reset('description');
        $this->dispatch('close-modal', 'aboutme-modal');
    }

    public function save()
    {
        $this->validate();
        try {
            Company::where('company_id', $this->id)->update([
                'company_Desc' => $this->description,
            ]);

            toastr()->success('Company Record has been Updated!');
            $this->close();
        } catch (\Exception $e) {
            toastr()->error('There was an Error');
        }
    }

    public function render()
    {
        // dd($this->id);

        $employer = Company::with([
            'user',
            'barangay',
            'job_posting' => function ($query) {
                $query->where('job_Status', 'ACTIVE')
                    ->orderBy('job_Status', 'desc');
            },
        ])->find($this->id);

        $isOwner = false;

        $user = Auth::user();

        if ($user->usertype == 5) {
            if ($user->company->company_id == $this->id) {
                $isOwner = true;
            }
        }

        return view('livewire.public.profile.employer.employer-profile', compact('employer', 'isOwner'));
    }
}
