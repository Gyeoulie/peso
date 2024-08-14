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
                    <p class="text-gray-700">#IDNUMBER</p>
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

                        <div class="flex flex-row">
                            <li class="mb-2 font-bold">Telephone Number:</li>
                            <p class="ms-4">{{ $employer->company_Tnum }}</p>
                        </div>

                        <div class="flex flex-row">
                            <li class="mb-2 font-bold">Email:</li>
                            <p class="ms-4">{{ $employer->company_Email }}</p>
                        </div>

                        <div class="flex flex-row">
                            <li class="mb-2 font-bold">Fax:</li>
                            <p class="ms-4">{{ $employer->company_Fnum }}</p>
                        </div>


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
                        Profile
                    </button>
                </li>

                <li>
                    <button @click="selectedTab = 2" :class="selectedTab === 2 ? activeTab : inactiveTab"
                        class="inline-flex items-center px-4 py-3 rounded-lg w-full">
                        <svg :class="selectedTab === 2 ? activeIcon : inactiveIcon" class="w-4 h-4 me-2"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        Dashboard
                    </button>
                </li>
            </ul>

            {{-- 2ND TAB --}}
            <div class="bg-white shadow rounded-lg p-6 mt-4">
                <h1 class="text-2xl font-bold mb-7">Reset Password</h1>
                <div class="bg-yellow-100 shadow rounded-lg p-6 mt-4 mb-5">
                    <p class="text-yellow-700 font-semibold">Admin side password reset</p>
                    <p class="text-yellow-700 font-normal">New password will be sent thru the user's email</p>
                </div>

                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 focus:outline-none">Reset
                    Password</button>
            </div>



            {{-- JOB POSTINGS --}}
            <div class="col-span-4 sm:col-span-6" x-data="{
                openTab: 1,
                activeTab: 'text-blue-600 bg-gray-100  rounded-t-lg active',
                inactiveTab: ' rounded-t-lg hover:text-gray-600 hover:bg-gray-50',
            }">
                <div class="bg-white shadow rounded-lg p-6 mt-4">

                    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200">
                        <li class="me-2">
                            <button @click="openTab = 1" :class="openTab === 1 ? activeTab : inactiveTab"
                                aria-current="page" class="inline-block p-4">Job Posting History</button>
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
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>

                                    {{-- SEARCH --}}
                                    <input wire:model.live.prevent='searchJobs' type="text" id="table-search-users"
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
                                                    <div class="text-base">{{ $data->job_Duration->format('F m, Y') }}
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
                                                                    <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                            </a>
                                                        </div>

                                                </td>
                                            </tr>
                                        @endforeach
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
    </div>
</div>
