<x-guest-layout>
    <div class="max-w-lg mx-auto mt-8 p-6 bg-white shadow-lg rounded-lg">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">
                {{ __('Verify Your Email Address') }}
            </h1>
            <p class="text-gray-600">
                {{ __('Thank you for signing up! To get started, please verify your email address by clicking the link we just sent you. If you didn\'t receive the email, you can request a new one.') }}
            </p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="bg-green-100 border border-green-200 text-green-700 rounded-md p-4 mb-4">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="flex justify-between mt-6">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <x-primary-button class="w-full">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="ml-4 text-sm text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
