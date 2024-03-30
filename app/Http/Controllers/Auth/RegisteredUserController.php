<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:2,3'], // Validate role selection
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->role, // Validate role selection
        ]);

        event(new Registered($user));

        Auth::login($user);

        // dd($user->usertype);

        return $this->redirectBasedOnRole($user->usertype);
    }

    /**
     * Redirect based on user role.
     */
    private function redirectBasedOnRole(int $usertype): RedirectResponse
    {
        switch ($usertype) {
            case 2:
                return redirect()->route('fill_profile');
            case 3:
                return redirect()->route('fill_employer');
            default:
                return redirect(RouteServiceProvider::HOME);
        }
    }
}
