<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>



                @if (Auth::check())
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                        @if (auth()->user()->usertype == 2)
                            <x-nav-link wire:navigate :href="route('fill_profile')" :active="request()->routeIs('fill_profile')">
                                {{ __('Complete Details') }}
                            </x-nav-link>
                        @elseif(auth()->user()->usertype == 3)
                            <x-nav-link wire:navigate :href="route('fill_employer')" :active="request()->routeIs('fill_employer')">
                                {{ __('Complete Details') }}
                            </x-nav-link>
                        @endif
                        @if (auth()->user()->usertype > 3)
                            <x-nav-link wire:navigate :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            <x-nav-link wire:navigate :href="route('trainings')" :active="request()->routeIs('trainings')">
                                {{ __('Trainings') }}
                            </x-nav-link>
                        @endif
                        @if (auth()->user()->usertype == 4)
                            <x-nav-link wire:navigate :href="route('jobseeker.profile', ['id' => auth()->user()->employee->employee_id])" :active="request()->routeIs('jobseeker.profile')">
                                {{ __('Profile') }}
                            </x-nav-link>
                        @endif
                        @if (auth()->user()->usertype == 6)
                            <x-nav-link wire:navigate :href="route('employer.profile', ['id' => auth()->user()->company->company_id])" :active="request()->routeIs('employer.profile')">
                                {{ __('Profile') }}
                            </x-nav-link>
                        @endif
                        @if (auth()->user()->usertype >= 6 && auth()->user()->usertype < 8)
                            <x-nav-link wire:navigate :href="route('employer.dashboard')" :active="request()->routeIs('employer.dashboard')">
                                {{ __('Job Postings') }}
                            </x-nav-link>
                        @endif
                        @if (auth()->user()->usertype >= 6 && auth()->user()->usertype < 8)
                            <x-nav-link wire:navigate :href="route('jobpost.applicants')" :active="request()->routeIs('jobpost.applicants')">
                                {{ __('Job Applicants') }}
                            </x-nav-link>
                        @endif
                        @if (auth()->user()->usertype >= 4 && auth()->user()->usertype < 5)
                            <x-nav-link wire:navigate :href="route('jobseeker.application')" :active="request()->routeIs('jobseeker.application')">
                                {{ __('My Applications') }}
                                <livewire:components.applications-notif />
                            </x-nav-link>
                        @endif


                        @if (auth()->user()->usertype >= 8)
                            <x-nav-link wire:navigate :href="route('admin')" :active="Route::is('admin*')">
                                {{ __('Admin Tools') }}
                            </x-nav-link>
                        @endif
                    </div>
                @else
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link wire:navigate :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link wire:navigate :href="route('trainings')" :active="request()->routeIs('trainings')">
                            {{ __('Training') }}
                        </x-nav-link>
                    </div>
                @endif
            </div>

            @if (Auth::check() && auth()->user()->usertype > 3)
                <div class="hidden sm:flex mr-1 ml-auto  w-40 lg:w-96">


                    <livewire:components.profile-search />


                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link wire:navigate :href="route('profile.edit')">
                                {{ __('Settings') }}

                            </x-dropdown-link>
                            @if (auth()->user()->usertype >= 5 && auth()->user()->usertype < 8)
                                <x-dropdown-link wire:navigate :href="route('edit.details.emp')">
                                    {{ __('Company Details') }}
                                </x-dropdown-link>
                            @endif

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @endif
            @if (Auth::check() && auth()->user()->usertype <= 3)
                <!-- Settings Dropdown -->
                <div class="flex flex-row gap-6 items-center justify-end">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-nav-link>
                    </form>
                </div>
            @endif

            @if (!Auth::check())
                <!-- Settings Dropdown -->
                <div class="flex flex-row gap-6 justify-end">
                    <x-nav-link wire:navigate :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-nav-link>
                    <x-nav-link wire:navigate :href="route('register')" :active="request()->routeIs('register')">
                        {{ __('Register') }}
                    </x-nav-link>
                </div>
            @endif
        </div>
    </div>
    @if (Auth::check())
        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden relative">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link wire:navigate :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                @if (auth()->user()->usertype == 4)
                    <x-responsive-nav-link wire:navigate :href="route('jobseeker.profile', ['id' => auth()->user()->employee->employee_id])" :active="request()->routeIs('jobseeker.profile')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                @endif
                @if (auth()->user()->usertype >= 5 && auth()->user()->usertype < 8)
                    <x-responsive-nav-link wire:navigate :href="route('employer.dashboard')" :active="request()->routeIs('employer.dashboard')">
                        {{ __('Job Postings') }}
                    </x-responsive-nav-link>
                @endif
                @if (auth()->user()->usertype >= 5 && auth()->user()->usertype < 8)
                    <x-responsive-nav-link wire:navigate :href="route('jobpost.applicants')" :active="request()->routeIs('jobpost.applicants')">
                        {{ __('Job Applicants') }}

                    </x-responsive-nav-link>
                @endif
                @if (auth()->user()->usertype >= 4 && auth()->user()->usertype < 5)
                    <x-responsive-nav-link wire:navigate :href="route('jobseeker.application')" :active="request()->routeIs('jobseeker.application')">
                        {{ __('My Applications') }}
                        <span
                            class="inline-flex relative bg-red-500 p-0.5 leading-none w-3.5 h-3.5 bg-red-500 border-2 border-white rounded-full"></span>
                    </x-responsive-nav-link>
                @endif
                @if (auth()->user()->usertype >= 8)
                    <x-responsive-nav-link wire:navigate :href="route('admin')" :active="request()->routeIs('admin')">
                        {{ __('Admin Tools') }}
                    </x-responsive-nav-link>
                @endif
                <div class="flex px-4 ">



                    <livewire:components.profile-search />

                </div>

            </div>


            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">

                    @if (auth()->user()->usertype >= 5 && auth()->user()->usertype < 8)
                        <x-responsive-nav-link wire:navigate :href="route('edit.details.emp')">
                            {{ __('Company Details') }}
                        </x-responsive-nav-link>
                    @endif

                    <x-responsive-nav-link wire:navigate :href="route('profile.edit')">
                        {{ __('Settings') }}
                    </x-responsive-nav-link>



                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    @endif
</nav>
