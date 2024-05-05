<?php

namespace App\Livewire\AccountManagementAdmin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class Editmodal extends Component
{

    protected $listeners = ['editUser'];
    public $emailPost = "";
    public $pwdPost = "";
    public $adminPost = "";
    public $idPost = "";

    public function rules()
    {
        return [
            'emailPost' => [
                'required',
                'string',
                'email',
                Rule::unique('users', 'email')->ignore($this->idPost),
            ],
            'pwdPost' => ['string', 'min:8', 'nullable'],
            'adminPost' => ['required'],
        ];
    }

    #[On('editUser')]
    public function editUser($userId)
    {

        $user = User::find($userId);
        if ($user) {
            $this->idPost = $user->id;
            $this->emailPost = $user->email;
            $this->adminPost = $user->usertype;

        }

        $this->dispatch('open-modal', 'edit-admin-modal');
    }

    public function resetPassword()
    {
        // Define the password criteria
        $length = 12;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_=+';

        // Generate a random password
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Set the generated password to the pwdPost property
        $this->pwdPost = $password;

        //dd($password);
    }

    public function close()
    {
        $this->reset(['emailPost', 'pwdPost', 'adminPost', 'idPost']);
        $this->dispatch('close');

    }

    public function update()
    {

        $validatedData = $this->validate();
        try {
            // Find the user record
            $user = User::find($this->idPost);
            if ($user) {
                // Update the user record
                $userData = [
                    'email' => $validatedData['emailPost'],
                    'usertype' => $validatedData['adminPost'], // Validate role selection
                ];

                // Update the password if provided
                if (!empty($validatedData['pwdPost'])) {
                    $userData['password'] = Hash::make($validatedData['pwdPost']);
                }

                $user->update($userData);

                $this->close();
                toastr()->success('Admin Account Updated!');
            } else {
                toastr()->error('User not found.');
            }
        } catch (\Exception $e) {
            $this->close();
            // Show error toastr notification
            toastr()->error('There was an error updating the admin account.');
        }

        $this->dispatch('reload-table');
    }

    public function render()
    {
        return view('livewire.account-management-admin.editmodal');
    }
}
