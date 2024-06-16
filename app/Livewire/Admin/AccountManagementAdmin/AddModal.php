<?php

namespace App\Livewire\Admin\AccountManagementAdmin;

use App\Models\PESO;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AddModal extends Component
{

    public $emailPost = "";
    public $pwdPost = "";
    public $adminPost = "";

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

        $rules = [
            'emailPost' => ['required', 'string', 'email', Rule::unique('users', 'email')],
            'pwdPost' => ['required', 'string', 'min:8'],
            'adminPost' => ['required'],
        ];

        $messages = [
            'emailPost.required' => 'The email field is required.',
            'emailPost.email' => 'Please enter a valid email address.',
            'emailPost.unique' => 'The email address has already been taken.',
            'pwdPost.required' => 'The password field is required.',
            'pwdPost.min' => 'The password must be at least 8 characters.',
            'adminPost.required' => 'Please select an admin role.',
        ];
        $this->validate($rules, $messages);

        $currentAdmin = Auth::user();

        try {

            DB::beginTransaction();

            // Create the user record
            $newAdmin = User::create([
                'email' => $this->emailPost,
                'password' => Hash::make($this->pwdPost),
                'usertype' => $this->adminPost, // Validate role selection
            ]);

            $newAdmin = PESO::create([
                'user_id' => $newAdmin->id,
                'municipality_id' => $currentAdmin->peso->municipality_id,
            ]);

            DB::commit();

            $this->close();
            toastr()->success('Admin Account Created!');
        } catch (\Exception $e) {

            DB::rollBack();
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
