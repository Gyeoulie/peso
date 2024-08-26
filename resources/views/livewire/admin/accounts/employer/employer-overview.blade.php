<div class="container mx-auto py-8">
    <div class="grid grid-cols-4 sm:grid-cols-12 gap-4 p-3 sm:p-0">

        {{-- TITLE --}}
        <div class="col-span-4 sm:col-span-12">
            <h1 class="text-2xl font-bold">Employer Management \ Employer Overview</h1>
        </div>

        <div class="col-span-4 sm:col-span-12 mt-5">

            <div class="flex flex-row">

                <div class="flex flex-col">
                    <h1 class="text-xl font-medium">Employer ID: {{ $employer->company_id }}</h1>
                    <h1 class="text-md font-light text-gray-500">{{ $employer->created_at->format('F j, Y, g:i A') }}
                    </h1>
                </div>

                {{-- DEACTIVATE BUTTON --}}
                <div class="flex flex-col ml-auto mr-0">
                    <button type="button"
                        class="text-red-900 font-bold bg-red-300 hover:bg-red-500 focus:ring-4 focus:ring-red-100 font-medium rounded-lg text-md px-5 py-2.5 me-2 mb-2 focus:outline-none">Deactivate
                        Account</button>
                </div>

            </div>

        </div>

        {{-- PROFILE CONTAINER --}}
        <div class="col-span-4 sm:col-span-4">
            <div class="bg-white shadow rounded-lg p-6">

                <div class="flex flex-col items-center">
                    {{-- IMAGE --}}
                    <img src="{{ asset('storage/' . $employer->company_img) }}"
                        class="w-32 h-32 bg-gray-300 rounded-md mb-4 shrink-0 grow-0 object-cover">

                    </img>

                    <h1 class="text-xl font-bold uppercase"> {{ $employer->business_Name }}
                    </h1>
                    <p class="text-gray-700">#{{ $employer->company_id }}</p>
                </div>

                <hr class="my-6 border-t border-gray-300">

                <div class="flex flex-col">

                    <span class="text-gray-700 uppercase font-black tracking-wider mb-2 text-xl">Contact Details</span>

                    <ul>
                        <div class="flex flex-row">
                            <li class="mb-2 font-bold">Contact Person:</li>
                            <p class="ms-4">{{ $employer->contact_Person }}</p>
                        </div>
                        <div class="flex flex-row">
                            <li class="mb-2 font-bold">Position:</li>
                            <p class="ms-4">{{ $employer->contact_Person_position }}</p>
                        </div>

                        <div class="flex flex-row">
                            <li class="mb-2 font-bold">Phone Number:</li>
                            <p class="ms-4">{{ $employer->company_Pnum }}</p>
                        </div>

                        @if ($employer->company_Tnum)
                            <div class="flex flex-row">
                                <li class="mb-2 font-bold">Telephone Number:</li>
                                <p class="ms-4">{{ $employer->company_Tnum }}</p>
                            </div>
                        @endif

                        <div class="flex flex-row">
                            <li class="mb-2 font-bold">Email:</li>
                            <p class="ms-4">{{ $employer->company_Email }}</p>
                        </div>

                        @if ($employer->company_Fnum)
                            <div class="flex flex-row">
                                <li class="mb-2 font-bold">Fax:</li>
                                <p class="ms-4">{{ $employer->company_Fnum }}</p>
                            </div>
                        @endif

                        <div class="flex flex-row">
                            <li class="mb-2 font-bold">Address:</li>
                            <p class="ms-4 uppercase"> {{ $employer->company_Address }},
                                {{ $employer->barangay->barangay_Name }},
                                {{ $employer->barangay->municipality->municipality_Name }},
                                {{ $employer->barangay->municipality->province->province_Name }}</p>
                        </div>

                    </ul>


                    {{-- BUTTON --}}
                    <div class="mt-6 flex flex-wrap gap-4 justify-center">
                        <a href="#" class="bg-blue-700 hover:bg-blue-800 text-white py-2 px-4 rounded">View
                            NSRP</a>
                    </div>

                </div>

            </div>
        </div>

        {{-- CONTAINER FOR TABS --}}
        <div class="col-span-4 sm:col-span-8 row" x-data="{
            selectedTab: 1,
            activeTab: 'text-white  bg-blue-700 active',
            inactiveTab: 'hover:text-white-300 bg-gray-300 hover:bg-gray-400',
            activeIcon: 'text-white',
            inactiveIcon: 'text-gray-500'
        }">

            {{-- TAB BUTTON --}}
            <ul class="flex flex-row space-x space-x-4 text-sm font-medium text-gray-500 md:me-4 mb-4 md:mb-0">
                <li>
                    <button @click="selectedTab = 1" :class="selectedTab === 1 ? activeTab : inactiveTab"
                        class="inline-flex items-center px-4 py-3 rounded-lg w-full" aria-current="page">
                        <svg :class="selectedTab === 1 ? activeIcon : inactiveIcon" class="w-4 h-4 me-2"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                        Overview
                    </button>
                </li>

                <li>
                    <button @click="selectedTab = 2" :class="selectedTab === 2 ? activeTab : inactiveTab"
                        class="inline-flex items-center px-4 py-3 rounded-lg w-full">
                        <svg :class="selectedTab === 2 ? activeIcon : inactiveIcon" class="w-4 h-4 me-2"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M12 1.5a5.25 5.25 0 0 0-5.25 5.25v3a3 3 0 0 0-3 3v6.75a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3v-6.75a3 3 0 0 0-3-3v-3c0-2.9-2.35-5.25-5.25-5.25Zm3.75 8.25v-3a3.75 3.75 0 1 0-7.5 0v3h7.5Z"
                                clip-rule="evenodd" />
                        </svg>

                        Security
                    </button>
                </li>
            </ul>

            {{-- 2ND TAB --}}
            <div x-show="selectedTab === 1" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-cloak>


                <div class="bg-white shadow rounded-lg p-6 mt-4">
                    <h1 class="text-2xl font-bold ">Preference</h1>
                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">

                    <p>Hello</p>
                </div>

                {{-- APPLICATION HISTORY CONTAINER --}}
                <div class="col-span-4 sm:col-span-6" x-data="{
                    openTab: 1,
                    activeTab: 'text-blue-600 bg-gray-100  rounded-t-lg active',
                    inactiveTab: ' rounded-t-lg hover:text-gray-600 hover:bg-gray-50',
                }">
                    <div class="bg-white shadow rounded-lg p-6 mt-4">

                        <ul
                            class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200">
                            <li class="me-2">
                                <button @click="openTab = 1" :class="openTab === 1 ? activeTab : inactiveTab"
                                    aria-current="page" class="inline-block p-4">Job Posting</button>
                            </li>
                        </ul>
                        <div class="flex flex-col" x-show="openTab === 1"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                            x-cloak>
                            <div class="relative p-1 mt-4">
                                <div
                                    class="flex items-center justify-start flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 mr-1">

                                    <label for="table-search" class="sr-only">Search</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                            </svg>
                                        </div>

                                        {{-- SEARCH --}}
                                        <input wire:model.live.prevent='searchJobs' type="text"
                                            id="table-search-users"
                                            class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Search for Jobs">
                                    </div>
                                </div>

                                {{-- JOBPOST TABLE --}}
                                <div class="overflow-x-auto ">
                                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Job Position
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Number of Applicants
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Status
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Application Deadline
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($joblist->isEmpty())
                                                <tr>
                                                    <td colspan="5">
                                                        <div
                                                            class="flex flex-col items-center justify-center mt-24 mb-24">
                                                            <div class="p-6 bg-gray-100 rounded-full">
                                                                <svg class="w-24 h-24 text-black" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-width="2"
                                                                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                                                </svg>

                                                            </div>
                                                            <p class="text-xl font-bold text-black text-center mt-2">
                                                                No Records Found!
                                                            </p>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @else
                                                @foreach ($joblist as $data)
                                                    <tr class="bg-white border-b hover:bg-gray-50">
                                                        <th scope="row"
                                                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">

                                                            <div class="ps-3 text-wrap">
                                                                <div class="text-base font-semibold">
                                                                    {{ $data->job_Title }}
                                                                </div>

                                                            </div>

                                                        </th>
                                                        <td class="px-6 py-4">
                                                            <div class="text-base font-semibold">
                                                                {{ $data->applicants_count }}</div>
                                                        </td>

                                                        <td class="px-6 py-4">
                                                            @if ($data->job_Status == 'PENDING')
                                                                <span
                                                                    class="inlineflex items-center rounded-md bg-yellow-200 px-2 py-1 text-sm font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">PENDING</span>
                                                            @elseif ($data->job_Status == 'ACTIVE')
                                                                <span
                                                                    class="inline-flex items-center rounded-md bg-green-200 px-2 py-1 text-sm font-medium text-green-800 ring-1 ring-inset ring-green-600/20">ACTIVE</span>
                                                            @elseif ($data->job_Status == 'COMPLETED')
                                                                <span
                                                                    class="inline-flex items-center rounded-md bg-blue-200 px-2 py-1 text-sm font-medium text-blue-800 ring-1 ring-inset ring-blue-600/20">COMPLETED</span>
                                                            @elseif ($data->job_Status == 'REJECTED')
                                                                <span
                                                                    class="inline-flex items-center rounded-md bg-red-200 px-2 py-1 text-sm font-medium text-red-800 ring-1 ring-inset ring-red-600/20 uppercase">REJECTED</span>
                                                            @endif

                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <div class="text-base">
                                                                {{ $data->job_Duration->format('F m, Y') }}
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 text-center">
                                                            <div class="flex flex-row  gap-5">
                                                                <div x-data="{ tooltip: 'Job Posting Overview' }">
                                                                    <a wire:navigate
                                                                        href="{{ route('admin.jobpost', ['id' => $data->job_id]) }}"
                                                                        x-tooltip="tooltip" type="button"
                                                                        class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                                                        <svg class="h-5 w-5"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 24 24" fill="currentColor">
                                                                            <path
                                                                                d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                                            <path fill-rule="evenodd"
                                                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                                                clip-rule="evenodd" />
                                                                        </svg>
                                                                    </a>
                                                                </div>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="mt-4">
                                {{ $joblist->links('vendor.livewire.tailwind') }}
                            </div>
                        </div>

                    </div>
                </div>



            </div>
            <div x-show="selectedTab === 2" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-cloak>

                <div class="bg-white shadow rounded-lg p-6 mt-4">

                    <h1 class="text-2xl font-bold ">Details</h1>
                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">

                    <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 mt-4 w-full">
                        <div class="flex flex-col w-full">
                            <x-input-label for="bname" :value="__('Business Name')" />
                            <x-text-input wire:model="businessName" class="block mt-1 w-full" type="text" />
                            <x-input-error :messages="$errors->get('businessName')" class="mt-2" />

                        </div>
                        <div class="flex flex-col w-full">
                            <x-input-label for="tname" :value="__('Trade Name')" />
                            <x-text-input wire:model="tradeName" class="block mt-1 w-full" type="text" />
                            <x-input-error :messages="$errors->get('tradeName')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 mt-4 w-full">
                        <div class="flex flex-col w-full">
                            <x-input-label for="tin" :value="__('TIN')" />
                            <x-text-input wire:model="TIN" class="block mt-1 w-full" type="text" />
                            <x-input-error :messages="$errors->get('TIN')" class="mt-2" />
                        </div>

                        <div class="flex flex-col w-full">
                            <x-input-label for="loctype" :value="__('Location Type')" />
                            <select wire:model="locType" class="block mt-1 w-full rounded-md">
                                <option value="" disabled selected>Select Location Type</option>
                                <option value="1">Main</option>
                                <option value="2">Branch</option>
                            </select>
                            <x-input-error :messages="$errors->get('locType')" class="mt-2" />
                        </div>

                        <div class="flex flex-col w-full">
                            <x-input-label for="workforce" :value="__('Total Work Force')" />
                            <select wire:model="workforce" class="block mt-1 w-full rounded-md">
                                <option value="" disabled selected>Select Total Work Force</option>
                                <option value="1">1 - 9 (Micro)</option>
                                <option value="2">10 - 99 (Small)</option>
                                <option value="3">100 - 199 (Medium)</option>
                                <option value="4">200 and Over (Large)</option>

                            </select>
                            <x-input-error :messages="$errors->get('workforce')" class="mt-2" />

                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 mt-4 w-full">
                        <div class="flex flex-col w-full">
                            <x-input-label for="emptype" :value="__('Employment Type')" />
                            <x-text-input wire:model="empType" class="block mt-1 w-full" type="text" />
                            <x-input-error :messages="$errors->get('empType')" class="mt-2" />
                        </div>

                        <div class="flex flex-col w-full">
                            <x-input-label for="empdesc" :value="__('Employment Description')" />
                            <x-text-input wire:model="empDesc" class="block mt-1 w-full" type="text" />
                            <x-input-error :messages="$errors->get('empDesc')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex w-full justify-end mt-4">
                        <x-blue-button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-modal')">Save Profile</x-blue-button>
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg p-6 mt-4">
                    <h1 class="text-2xl font-bold ">Reset Password</h1>
                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">

                    <div class="bg-yellow-100 shadow rounded-lg p-6 mt-4 mb-5">
                        <p class="text-yellow-700 font-semibold">Admin side password reset</p>
                        <p class="text-yellow-700 font-normal">New password will be sent thru the user's email</p>
                    </div>

                    <x-blue-button>Reset
                        Password</x-blue-button>
                </div>

            </div>






        </div>
    </div>



    <x-modal name="confirm-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Action Confirmation') }}
            </h2>
            <hr>
            <div class="flex flex-col my-4">
                <div class="flex flex-col mt-4 mb-4 w-full justify-center items-center px-4">
                    <span class="text-xl font-semibold">Are you sure you want to update this company's
                        profile?</span>

                </div>
            </div>
            <div class="mt-6 flex justify-between">
                <x-secondary-button x-on:click="$dispatch('close-modal', 'confirm-modal')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button wire:loading.attr="disabled" wire:target='saveDetails'
                    wire:click.prevent="saveDetails" class="ms-3" type="button">
                    {{ __('Confirm') }}
                    <div wire:loading.delay.long wire:target="saveDetails" role="status">
                        <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin fill-blue-600 ml-4"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentFill" />
                        </svg>
                        <span class="sr-only">Loading...</span>
                    </div>
                </x-danger-button>
            </div>
        </div>
    </x-modal>
</div>
