<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Mail\DisableAccountNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $validatedData = $request->validated();

        // Validate that the new email is different from the current email
        $request->validate([
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
                function ($attribute, $value, $fail) use ($user) {
                    if ($value === $user->email) {
                        $fail('The new email address must be different from the current email address.');
                    }
                },
            ],
        ], [
            'email.different' => 'The new email address must be different from the current email address.',
        ]);

        // Check if any changes were made
        $changes = false;
        foreach ($validatedData as $key => $value) {
            if ($user->{$key} !== $value) {
                $changes = true;
                break;
            }
        }

        if ($changes) {
            // Update the user's profile
            $user->fill($validatedData);

            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
            }

            $user->save();
            $user->sendEmailVerificationNotification();

            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        }

        // If no changes, redirect with a different message
        return Redirect::route('profile.edit')->with('status', 'no-changes');
    }
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Set user status, description, and disabled_at timestamp
        $user->userstatus = 2; // Assuming userstatus is a field on the User model
        $user->description = 'Self Disable'; // Set the description
        $user->disabled_at = now(); // Set the disabled_at timestamp
        $user->save(); // Save the changes
        Mail::to($user->email)->queue(new DisableAccountNotification());

        Auth::logout();

        // $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
