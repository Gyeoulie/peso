<x-guest-layout>
    <div class="max-w-lg mx-auto mt-8 p-6 bg-white ">
        <div class="text-center ">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">
                {{ __('Account Disabled') }}
            </h1>
            <p class="text-gray-600 mb-4">
                {{ __('Your account has been disabled. To reactivate your account, please contact your local municipality for further assistance.') }}
            </p>
        </div>

        <div class="flex flex-col items-center">
            <p class="text-sm text-gray-600 mb-4">
                {{ __('For more information or if you need help, you can reach out to your municipality office or visit their website.') }}
            </p>
            <a href="mailto:support@yourdomain.com" class="text-blue-500 hover:underline">
                {{ __('Contact Support') }}
            </a>
        </div>

        <div class="flex justify-center mt-6">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-blue-500 hover:underline">
                    {{ __('Return to Home') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
