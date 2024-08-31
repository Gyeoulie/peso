<?php

namespace App\Livewire\Admin\Accounts\Peso;

use App\Helpers\AuditFormatter;
use App\Mail\AdminResetPasswordNotification;
use App\Models\PESO;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Component;
use OwenIt\Auditing\Models\Audit;

#[Layout('layouts.admin')]
class PesoOverview extends Component
{
    public $id;

    public $fname, $mname, $lname, $phone, $role = '';

    public $agreeBox = false;

    public function mountFields($pesoAdmin)
    {
        $this->fname = $pesoAdmin->peso_Fname;
        $this->mname = $pesoAdmin->peso_Mname;
        $this->lname = $pesoAdmin->peso_Lname;
        $this->phone = $pesoAdmin->peso_Pnumber;
        $this->role = $pesoAdmin->user->usertype;

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
        return $password;

    }

    public function resetPassword()
    {
        $rules = [
            'agreeBox' => 'required|boolean',
        ];
        $messages = [
            'agreeBox.required' => 'Please check before you continue.',
        ];
        $this->validate($rules, $messages);

        $pesoData = PESO::findOrFail($this->id);

        $this->agreeBox = false;
        if ($pesoData->user) {
            DB::beginTransaction();

            try {
                // Generate a new password
                $newPassword = $this->generatePassword();

                // Update the user's password (assuming 'password' is the column name)
                $pesoData->user->password = Hash::make($newPassword);
                $pesoData->user->save();

                DB::commit();

                $name = $pesoData->peso_Fname . ' ' . $pesoData->peso_Lname;
                Mail::to($pesoData->user->email)->queue(new AdminResetPasswordNotification($name, $newPassword));
                toastr()->success('Password has been reset successfully!');

            } catch (\Exception $e) {
                DB::rollBack();
                toastr()->error('There was an error resetting the password.');
            }
        } else {
            toastr()->error('User not found.');
        }
        $this->dispatch('close-modal', 'reset-password-modal');
    }

    public function saveDetails()
    {
        $rules = [
            'fname' => 'required|string|min:2|max:255',
            'mname' => 'nullable|string|min:2|max:255',
            'lname' => 'required|string|min:2|max:255',
            'phone' => [
                'required',
                'regex:/^09\d{9}$/', // Starts with '09' followed by 9 digits
            ],
            'role' => 'required',
        ];
        $messages = [
            'fname.required' => 'First name is required.',
            'fname.string' => 'First name must be a string.',
            'fname.min' => 'First name must be at least 2 characters.',
            'fname.max' => 'First name cannot exceed 255 characters.',
            'mname.string' => 'Middle name must be a string.',
            'mname.min' => 'Middle name must be at least 2 characters.',
            'mname.max' => 'Middle name cannot exceed 255 characters.',
            'lname.required' => 'Last name is required.',
            'lname.string' => 'Last name must be a string.',
            'lname.min' => 'Last name must be at least 2 characters.',
            'lname.max' => 'Last name cannot exceed 255 characters.',
            'phone.required' => 'Phone number is required.',
            'phone.regex' => 'Phone number must start with 09 and be 11 digits long.',
            'role.required' => 'Role is required.',
        ];

        $this->validate($rules, $messages);

        $pesoData = PESO::findOrFail($this->id);

        DB::beginTransaction();
        $saved = false;

        try {
            $pesoData->peso_Fname = $this->fname;
            $pesoData->peso_Mname = $this->mname;
            $pesoData->peso_Lname = $this->lname;
            $pesoData->peso_Pnumber = $this->phone;

            // Update related user model
            if ($pesoData->user) { // Ensure user relationship is loaded
                $user = $pesoData->user; // Get the related user model
                $user->usertype = $this->role; // Update the usertype

                if ($user->isDirty()) {

                    $user->save(); // Save the changes to the user model
                    $saved = true;
                }
            }
            if ($pesoData->isDirty()) {
                $pesoData->save();
                $saved = true;

            }

            // Check if any attributes have changed
            if ($saved === true) {

                DB::commit();
                toastr()->success('PESO Account has been updated!');
            } else {
                DB::rollBack();
                toastr()->info('No changes detected.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('There was an error updating the PESO account.');
        }

        $this->dispatch('close-modal', 'confirm-modal');
    }

    public function render()
    {

        $user = PESO::findOrFail($this->id);

        if ($user) {
            $this->mountFields($user);
        }

        $audits = Audit::where('user_id', $user->user_id)
            ->latest()
            ->paginate(5);

        $formattedAudits = $audits->map(function ($audit) {
            return AuditFormatter::format($audit);
        });

        return view('livewire.admin.accounts.peso.peso-overview', compact('user', 'audits', 'formattedAudits'));
    }
}
