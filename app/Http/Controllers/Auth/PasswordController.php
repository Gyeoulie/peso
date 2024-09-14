<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => [
                'required',
                'confirmed',
                'min:8', // Minimum length (adjust as needed)
                'regex:/[a-z]/', // At least one lowercase letter
                'regex:/[A-Z]/', // At least one uppercase letter
                'regex:/[0-9]/', // At least one number
                'regex:/[@$!%*?&]/', // At least one special character
            ],
        ], [
            'current_password.required' => 'The current password is required.',
            'current_password.current_password' => 'The current password is incorrect.',

            'password.required' => 'A new password is required.',
            'password.confirmed' => 'The new password confirmation does not match.',
            'password.min' => 'The password must be at least :min characters long.',
            'password.regex' => [
                'lowercase' => 'The password must include at least one lowercase letter.',
                'uppercase' => 'The password must include at least one uppercase letter.',
                'number' => 'The password must include at least one number.',
                'special' => 'The password must include at least one special character.',
            ],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }

}
