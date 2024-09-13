<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>



                @if (Auth::check())
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                        @if (auth()->user()->usertype == 2)
                            <x-nav-link :href="route('fill_profile')" :active="request()->routeIs('fill_profile')">
                                {{ __('Complete Details') }}
                            </x-nav-link>
                        @elseif(auth()->user()->usertype == 3)
                            <x-nav-link :href="route('fill_employer')" :active="request()->routeIs('fill_employer')">
                                {{ __('Complete Details') }}
                            </x-nav-link>
                        @endif
                        @if (auth()->user()->usertype > 3)
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            <x-nav-link :href="route('trainings')" :active="request()->routeIs('trainings')">
                                {{ __('Trainings') }}
                            </x-nav-link>
                        @endif
                        @if (auth()->user()->usertype == 4)
                            <x-nav-link :href="route('jobseeker.profile', ['id' => auth()->user()->employee->employee_id])" :active="request()->routeIs('jobseeker.profile')">
                                {{ __('Profile') }}
                            </x-nav-link>
                        @endif
                        @if (auth()->user()->usertype == 6)
                            <x-nav-link :href="route('employer.profile', ['id' => auth()->user()->company->company_id])" :active="request()->routeIs('employer.profile')">
                                {{ __('Profile') }}
                            </x-nav-link>
                        @endif
                        @if (auth()->user()->usertype >= 6 && auth()->user()->usertype < 8)
                            <x-nav-link :href="route('employer.dashboard')" :active="request()->routeIs('employer.dashboard')">
                                {{ __('Job Postings') }}
                            </x-nav-link>
                        @endif
                        @if (auth()->user()->usertype >= 6 && auth()->user()->usertype < 8)
                            <x-nav-link :href="route('jobpost.applicants')" :active="request()->routeIs('jobpost.applicants')">
                                {{ __('Job Applicants') }}
                            </x-nav-link>
                        @endif
                        @if (auth()->user()->usertype >= 4 && auth()->user()->usertype < 5)
                            <x-nav-link :href="route('jobseeker.application')" :active="request()->routeIs('jobseeker.application')">
                                {{ __('My Applications') }}
                                <livewire:components.applications-notif />
                            </x-nav-link>
                        @endif


                        @if (auth()->user()->usertype >= 8 && auth()->user()->usertype < 11)
                            <x-nav-link :href="route('admin')" :active="Route::is('admin*')">
                                {{ __('Admin Tools') }}
                            </x-nav-link>
                        @endif
                        @if (auth()->user()->usertype == 11)
                            <x-nav-link :href="route('super-dashboard')" :active="Route::is('admin*', 'super*')">
                                {{ __('Admin Tools') }}
                            </x-nav-link>
                        @endif
                    </div>
                @else
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('trainings')" :active="request()->routeIs('trainings')">
                            {{ __('Training') }}
                        </x-nav-link>
                    </div>
                @endif
            </div>

            @if (Auth::check() && auth()->user()->usertype > 3)
                @if (auth()->user()->usertype != 5)
                    <div class="hidden sm:flex mr-1 ml-auto  w-40 lg:w-96">


                        <livewire:components.profile-search />


                    </div>
                @endif

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
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Settings') }}

                            </x-dropdown-link>
                            @if (auth()->user()->usertype >= 5 && auth()->user()->usertype < 8)
                                <x-dropdown-link :href="route('edit.details.emp')">
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
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-nav-link>
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
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
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('trainings')" :active="request()->routeIs('trainings')">
                    {{ __('Trainings') }}
                </x-responsive-nav-link>
                @if (auth()->user()->usertype == 4)
                    <x-responsive-nav-link :href="route('jobseeker.profile', ['id' => auth()->user()->employee->employee_id])" :active="request()->routeIs('jobseeker.profile')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                @endif
                @if (auth()->user()->usertype >= 5 && auth()->user()->usertype < 8)
                    <x-responsive-nav-link :href="route('employer.dashboard')" :active="request()->routeIs('employer.dashboard')">
                        {{ __('Job Postings') }}
                    </x-responsive-nav-link>
                @endif
                @if (auth()->user()->usertype >= 5 && auth()->user()->usertype < 8)
                    <x-responsive-nav-link :href="route('jobpost.applicants')" :active="request()->routeIs('jobpost.applicants')">
                        {{ __('Job Applicants') }}

                    </x-responsive-nav-link>
                @endif
                @if (auth()->user()->usertype >= 4 && auth()->user()->usertype < 5)
                    <x-responsive-nav-link :href="route('jobseeker.application')" :active="request()->routeIs('jobseeker.application')">
                        {{ __('My Applications') }}

                    </x-responsive-nav-link>
                @endif
                @if (auth()->user()->usertype != 5)
                    <div class="flex px-4 ">



                        <livewire:components.profile-search />

                    </div>
                @endif

                @if (auth()->user()->usertype >= 8)
                    <hr class="mx-4 mt-2">



                    <div x-data="{
                        dropdowns: {
                            roleManagement: ['admin-users-peso', 'admin-users-jobseeker', 'admin-users-employer', 'admin-users-jobseeker-overview', 'admin-users-employer-overview'].includes(@js(request()->route()->getName())),
                            trainings: ['admin-training', 'admin-create-training', 'admin-view-training'].includes(@js(request()->route()->getName())),
                            reports: ['admin-reports-barangay', 'admin-reports-municipality', 'super-municipality', 'super-province'].includes(@js(request()->route()->getName())),
                            dataManagement: ['admin-certificate', 'admin-eligibility', 'admin-location', 'admin-industry'].includes(@js(request()->route()->getName())),
                            maintenance: ['admin-audits', 'admin-peso', 'admin-backups'].includes(@js(request()->route()->getName())),
                        },
                        activeItem: 'ml-6 block p-2 w-full border-l-4 border-indigo-400 text-start text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out',
                        inactiveItem: 'ml-6 block p-2 w-full border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out',
                        currentRoute: @js(request()->route()->getName()), // Pass current route name from Laravel to Alpine.js
                    }">
                        @if (auth()->user()->usertype >= 8 && auth()->user()->usertype < 11)
                            <x-responsive-nav-link :href="route('admin')" :active="request()->routeIs('admin')">
                                {{ __('Admin Dashboard') }}
                            </x-responsive-nav-link>
                        @endif
                        @if (auth()->user()->usertype == 11)
                            <x-responsive-nav-link :href="route('super-dashboard')" :active="request()->routeIs('super-dashboard')">
                                {{ __('Admin Dashboard') }}
                            </x-responsive-nav-link>
                        @endif
                        @if (Auth::check() && Auth::user()->usertype != 11)
                            <x-responsive-nav-link :href="route('admin-joblist')" :active="request()->routeIs(
                                'admin-joblist',
                                'admin.jobpost',
                                'admin.jobpost.applicants',
                                'admin.jobpost.applicants.overview',
                            )">
                                {{ __('Job Posting') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link :href="route('admin-partnership')" :active="request()->routeIs('admin-partnership', 'admin-partnership-details')">
                                {{ __('Partnerships') }}
                            </x-responsive-nav-link>
                            <!-- Role Management Dropdown -->

                            <div>
                                <div x-on:click="dropdowns.roleManagement = !dropdowns.roleManagement"
                                    class="flex flex-row items-center justify-between w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">
                                    Role Management
                                    <svg class="w-3 h-3 me-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </div>
                                <div x-show="dropdowns.roleManagement" x-cloak>
                                    <a :class="currentRoute === 'admin-users-jobseeker' ||
                                        currentRoute === 'admin-users-jobseeker-overview' ? activeItem : inactiveItem"
                                        href="{{ route('admin-users-jobseeker') }}">
                                        Jobseekers Management
                                    </a>
                                    <a :class="currentRoute === 'admin-users-employer' ||
                                        currentRoute === 'admin-users-employer-overview' ? activeItem : inactiveItem"
                                        href="{{ route('admin-users-employer') }}">
                                        Employers Management
                                    </a>
                                    <a :class="currentRoute === 'admin-users-peso' ? activeItem : inactiveItem"
                                        href="{{ route('admin-users-peso') }}">
                                        PESO Accounts
                                    </a>
                                </div>
                            </div>
                        @endif
                        @if (Auth::check() && Auth::user()->usertype == 11)
                            <div>
                                <div x-on:click="dropdowns.dataManagement = !dropdowns.dataManagement"
                                    class="flex flex-row items-center justify-between w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">
                                    Data Management
                                    <svg class="w-3 h-3 me-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </div>
                                <div x-show="dropdowns.dataManagement" x-cloak>
                                    <a :class="currentRoute === 'admin-certificate' ? activeItem : inactiveItem"
                                        href="{{ route('admin-certificate') }}">
                                        Certificates
                                    </a>
                                    <a :class="currentRoute === 'admin-eligibility' ? activeItem : inactiveItem"
                                        href="{{ route('admin-eligibility') }}">
                                        Eligibility and License
                                    </a>
                                    <a :class="currentRoute === 'admin-location' ? activeItem : inactiveItem"
                                        wire:navigate href="{{ route('admin-location') }}">
                                        Locations
                                    </a>
                                    <a :class="currentRoute === 'admin-industry' ? activeItem : inactiveItem"
                                        wire:navigate href="{{ route('admin-industry') }}">
                                        Positions and Industry
                                    </a>
                                </div>
                            </div>
                            <x-responsive-nav-link :href="route('admin-req')" :active="request()->routeIs('admin-req')">
                                {{ __('Requirements') }}
                            </x-responsive-nav-link>
                        @endif
                        @if (Auth::check() && Auth::user()->usertype != 11)
                            <x-responsive-nav-link :href="route('admin-announcement')" :active="request()->routeIs('admin-announcement')">
                                {{ __('Announcements') }}
                            </x-responsive-nav-link>


                            <!-- Trainings Dropdown -->
                            <div>
                                <div x-on:click="dropdowns.trainings = !dropdowns.trainings"
                                    class="flex flex-row items-center justify-between w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">
                                    Trainings
                                    <svg class="w-3 h-3 me-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </div>
                                <div x-show="dropdowns.trainings" x-cloak>
                                    <a :class="currentRoute === 'admin-training' || currentRoute === 'admin-view-training' ||
                                        currentRoute === 'admin-registrants-training' ? activeItem : inactiveItem"
                                        href="{{ route('admin-training') }}">
                                        Training List
                                    </a>
                                    <a :class="currentRoute === 'admin-create-training' ? activeItem : inactiveItem"
                                        href="{{ route('admin-create-training') }}">
                                        Create Trainings
                                    </a>
                                </div>
                            </div>
                        @endif

                        <!-- Reports Dropdown -->
                        <div>
                            <div x-on:click="dropdowns.reports = !dropdowns.reports"
                                class="flex flex-row items-center justify-between w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">
                                Reports
                                <svg class="w-3 h-3 me-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </div>
                            <div x-show="dropdowns.reports" x-cloak>
                                @if (Auth::check() && Auth::user()->usertype != 11)
                                    <a :class="currentRoute === 'admin-reports-barangay' ? activeItem : inactiveItem"
                                        href="{{ route('admin-reports-barangay') }}">
                                        Barangay
                                    </a>
                                    <a :class="currentRoute === 'admin-reports-municipality' ? activeItem : inactiveItem"
                                        href="{{ route('admin-reports-municipality') }}">
                                        Municipality
                                    </a>
                                @endif
                                @if (Auth::check() && Auth::user()->usertype == 11)
                                    <a :class="currentRoute === 'super-municipality' ? activeItem : inactiveItem"
                                        href="{{ route('super-municipality') }}">
                                        Municipality
                                    </a>
                                    <a :class="currentRoute === 'super-province' ? activeItem : inactiveItem"
                                        href="{{ route('super-province') }}">
                                        Province
                                    </a>
                                @endif
                            </div>
                        </div>
                        @if (Auth::check() && Auth::user()->usertype == 11)
                            <div>
                                <div x-on:click="dropdowns.maintenance = !dropdowns.maintenance"
                                    class="flex flex-row items-center justify-between w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">
                                    Maintenance
                                    <svg class="w-3 h-3 me-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </div>
                                <div x-show="dropdowns.maintenance" x-cloak>
                                    <a :class="currentRoute === 'admin-peso' ? activeItem : inactiveItem"
                                        wire:navigate href="{{ route('admin-peso') }}">
                                        PESO Branch
                                    </a>
                                    <a :class="currentRoute === 'admin-audits' ? activeItem : inactiveItem"
                                        wire:navigate href="{{ route('admin-audits') }}">
                                        Audit Logs
                                    </a>
                                    <a :class="currentRoute === 'admin-backups' ? activeItem : inactiveItem"
                                        wire:navigate href="{{ route('admin-backups') }}">
                                        Backups
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>

                @endif




            </div>


            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">

                    @if (auth()->user()->usertype >= 5 && auth()->user()->usertype < 8)
                        <x-responsive-nav-link :href="route('edit.details.emp')">
                            {{ __('Company Details') }}
                        </x-responsive-nav-link>
                    @endif

                    <x-responsive-nav-link :href="route('profile.edit')">
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
