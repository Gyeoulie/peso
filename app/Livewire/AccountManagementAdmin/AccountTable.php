<?php

namespace App\Livewire\AccountManagementAdmin;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class AccountTable extends Component
{

    use WithPagination;

    public $search;

    public function editUser($userId)
    {
        // Emit an event to call the editUser function in the other component
        $this->dispatch('editUser', $userId);
    }

    #[On('reload-table')]
    public function render()
    {

        $adminAccounts = User::whereIn('usertype', [8, 9, 10])
            ->select('id', 'email', 'usertype', 'created_at', 'updated_at')
            ->where(function ($query) {
                $query->where('email', 'like', '%' . $this->search . '%')
                    ->orWhere('usertype', 'like', '%' . $this->search . '%');
            })
            ->paginate(5);
        return view('livewire.account-management-admin.account-table', compact('adminAccounts'));
    }
}
