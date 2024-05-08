<?php

namespace App\Livewire\Admin\AccountManagementAdmin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AddModal extends Component
{

    public $emailPost = "";
    public $pwdPost = "";
    public $adminPost = "";

    public function rules()
    {
        return [
            'emailPost' => ['required', 'string', 'email', Rule::unique('users', 'email')],
            'pwdPost' => ['required', 'string', 'min:8'],
            'adminPost' => ['required'],
        ];
    }

    public function generatePassword()
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
        $this->reset(['emailPost', 'pwdPost', 'adminPost']);
        $this->dispatch('close');

    }

    public function create()
    {

        $validatedData = $this->validate();

        try {
            // Create the user record
            User::create([
                'email' => $this->emailPost,
                'password' => Hash::make($this->pwdPost),
                'usertype' => $this->adminPost, // Validate role selection
            ]);

            $this->close();
            toastr()->success('Admin Account Created!');
        } catch (\Exception $e) {
            $this->close();
            // Show error toastr notification
            toastr()->error('There was an Error');
        }
        $this->dispatch('reload-table');

    }

    public function render()
    {

        return view('livewire.admin.account-management-admin.add-modal');
    }
}
