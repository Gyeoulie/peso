<?php

namespace App\Livewire\Admin\AccountManagementAdmin;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class AccountTable extends Component
{

    use WithPagination;

    public $search;
    public $filterProv = "";

    public function editUser($userId)
    {
        // Emit an event to call the editUser function in the other component
        $this->dispatch('editUser', $userId);
    }

    #[On('reload-table')]
    public function render()
    {

        // $query = User::whereIn('usertype', [8, 9, 10])
        //     ->select('id', 'email', 'usertype', 'created_at', 'updated_at')
        //     ->where(function ($query) {
        //         $query->where('email', 'like', '%' . $this->search . '%')
        //             ->orWhere('usertype', 'like', '%' . $this->search . '%');
        //     });

        // if ($this->userType) {
        //     $query->where('usertype', $this->userType);
        // }

        // $adminAccounts = $query->paginate(5);

        $adminAccounts = User::whereIn('usertype', [8, 9, 10])
            ->select('id', 'email', 'usertype', 'created_at', 'updated_at')
            ->where(function ($query) {
                $query->where('email', 'like', '%' . $this->search . '%')
                    ->orWhere('usertype', 'like', '%' . $this->search . '%');
            })
            ->paginate(5);

        return view('livewire.admin.account-management-admin.account-table', compact('adminAccounts'));
    }
}
