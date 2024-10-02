<div x-data="{
    openTab: 1,
    activeTab: 'text-blue-600 bg-gray-100  rounded-t-lg active',
    inactiveTab: ' rounded-t-lg hover:text-gray-600 hover:bg-gray-50',
}">
    <div class="mb-4">
        <h1 class="text-2xl font-bold"></h1>
        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200">
            <li class="me-2">
                <button @click="openTab = 1" :class="openTab === 1 ? activeTab : inactiveTab" aria-current="page"
                    class="inline-block p-4">Job Seekers</button>
            </li>
            <li class="me-2">
                <button @click="openTab = 2" :class="openTab === 2 ? activeTab : inactiveTab" aria-current="page"
                    class="inline-block p-4">Employers</button>
            </li>
        </ul>
    </div>
    <div x-show="openTab === 1" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-cloak>
        <div class="flex flex-col sm:flex-row p-1 sm:justify-between gap-2 space-y-4 sm:space-y-0 pb-4">

            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>

                {{-- SEARCH --}}
                <input wire:model.live='searchJobseekers' type="search"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full sm:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search">
            </div>

            <div class="flex flex-wrap mr-3 gap-2">
                <div x-data="{ tooltip: 'Export to Excel' }">
                    <button x-tooltip='tooltip' type="button" wire:click.prevent="exportData('jobseekers')"
                        class="flex items-center py-1.5 px-4 text-xs sm:text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                        <span class="mr-2">Export</span>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                    </button>

                </div>
                <button type="button" x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'filter-jobseekers-modal')"
                    class="py-1.5 px-5 text-xs sm:text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Filter</button>
            </div>
        </div>
        <div class="overflow-x-auto">


            <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-2">
                <thead class="text-xs text-gray-700 uppercase bg-blue-300">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-full">
                            <span class="text-black font-bold text-md">Applicant Name</span>
                        </th>
                        <th scope="col" class="hidden sm:table-cell px-6 py-3">
                            <span class="text-black font-bold text-md">Employment Status</span>
                        </th>
                        <th scope="col" class="hidden sm:table-cell px-6 py-3 text-center">
                            <span class="text-black font-bold text-md">Active Applications</span>
                        </th>
                        <th scope="col" class="hidden sm:table-cell px-6 py-3 text-center">
                            <span class="text-black font-bold text-md">Registered Trainings</span>
                        </th>

                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($jobseekers->isEmpty())
                        <tr>
                            <td colspan="5">
                                <div class="flex flex-col items-center justify-center mt-24 mb-24">
                                    <div class="p-6 bg-gray-100 rounded-full">
                                        <svg class="w-24 h-24 text-black" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <p class="text-xl font-bold text-black text-center mt-2">No Records Found!</p>
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach ($jobseekers as $data)
                            <tr wire:key='applicants-{{ $data->job_id }}' class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                    <img class="w-10 h-10 rounded-full object-cover"
                                        src="{{ asset('storage/' . $data->pimg) }}" alt="img">
                                    <div class="ps-3 text-wrap">
                                        <div class="text-base font-semibold uppercase">
                                            {{ $data->fname }} {{ $data->mname }} {{ $data->lname }}
                                        </div>


                                        <div class="text-sm text-gray-500 sm:hidden">
                                            <span>Active Apps: <span
                                                    class="text-black font-bold">{{ $data->job_applications }}</span></span>
                                        </div>
                                        <div class="text-sm text-gray-500 sm:hidden">
                                            <span>Trainings: <span
                                                    class="text-black font-bold">{{ $data->program_reg_count }}</span></span>
                                        </div>
                                        <div class="text-sm text-gray-500 sm:hidden">
                                            <span>
                                                @if ($data->empstatus == '2')
                                                    <span
                                                        class="inline-flex items-center rounded-md bg-yellow-200 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">UNEMPLOYED</span>
                                                @elseif ($data->empstatus == '1')
                                                    <span
                                                        class="inline-flex items-center rounded-md bg-green-200 px-2 py-1 text-xs font-medium text-green-800 ring-1 ring-inset ring-green-600/20">EMPLOYED</span>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </th>

                                <td class="hidden sm:table-cell px-6 py-4">
                                    @if ($data->empstatus == '2')
                                        <span
                                            class="inline-flex items-center rounded-md bg-yellow-200 px-2 py-1 text-sm font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">UNEMPLOYED</span>
                                    @elseif ($data->empstatus == '1')
                                        <span
                                            class="inline-flex items-center rounded-md bg-green-200 px-2 py-1 text-sm font-medium text-green-800 ring-1 ring-inset ring-green-600/20">EMPLOYED</span>
                                    @endif
                                </td>

                                <td class="hidden sm:table-cell px-6 py-4 text-center">
                                    <div class="font-normal text-gray-500 text-sm uppercase">
                                        <span
                                            class="text-blue-500 font-bold text-md">{{ $data->job_applications }}</span>
                                    </div>
                                </td>

                                <td class="hidden sm:table-cell px-6 py-4 text-center">
                                    <div class="font-normal text-gray-500 text-sm uppercase">
                                        <span
                                            class="text-blue-500 font-bold text-md">{{ $data->program_reg_count }}</span>
                                    </div>
                                </td>

                                <td>
                                    <div x-data="{ tooltip: 'Jobseeker Overview' }">
                                        <a wire:navigate
                                            href="{{ route('admin-users-jobseeker-overview', ['id' => $data->employee_id]) }}"
                                            x-tooltip="tooltip" type="button"
                                            class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg"
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
                    @endif
                </tbody>
            </table>

            <div class="mt-4">
                {{ $jobseekers->links('vendor.livewire.tailwind') }}
            </div>
        </div>
    </div>

    <div x-show="openTab === 2" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-cloak>
        <div class="flex flex-col sm:flex-row p-1 sm:justify-between gap-2 space-y-4 sm:space-y-0 pb-4">

            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>

                {{-- SEARCH --}}
                <input wire:model.live='searchCompany' type="search"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full sm:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search">
            </div>

            <div class="flex flex-wrap mr-3 gap-2">
                <div x-data="{ tooltip: 'Export to Excel' }">
                    <button x-tooltip='tooltip' type="button" wire:click.prevent="exportData('employers')"
                        class="flex items-center py-1.5 px-4 text-xs sm:text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                        <span class="mr-2">Export</span>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                    </button>

                </div>
                <button type="button" x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'filter-employers-modal')"
                    class="py-1.5 px-5 text-xs sm:text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Filter</button>
            </div>
        </div>
        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-2">
                <thead class="text-xs text-gray-700 uppercase bg-blue-300">
                    <tr>
                        <th scope="col" class="px-6 py-3 ">
                            <span class="text-black font-bold text-md">Company Name</span>
                        </th>
                        <th scope="col" class="px-6 py-3 hidden sm:table-cell">
                            <span class="text-black font-bold text-md">Job Postings</span>
                        </th>
                        <th scope="col" class="px-6 py-3 hidden sm:table-cell">
                            <span class="text-black font-bold text-md">Hired Applicants</span>
                        </th>
                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($employers->isEmpty())
                        <tr>
                            <td colspan="5">
                                <div class="flex flex-col items-center justify-center mt-24 mb-24">
                                    <div class="p-6 bg-gray-100 rounded-full">
                                        <svg class="w-24 h-24 text-black" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
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
                        @foreach ($employers as $data)
                            <tr wire:key='applicants-{{ $data->company_id }}'
                                class="bg-white border-b hover:bg-gray-50">
                                <th scope="row"
                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                    <img class="w-10 h-10 rounded-full object-cover"
                                        src="{{ asset('storage/' . $data->company_img) }}" alt="img">
                                    <div class="ps-3 text-wrap">
                                        <div class="text-base font-semibold">
                                            <div class="text-base font-semibold uppercase">
                                                {{ $data->business_Name }}
                                            </div>
                                            <div class="text-base font-medium">
                                                {{ $data->contact_Person }}
                                            </div>
                                            <div class="text-sm text-gray-500 sm:hidden">
                                                Job Posting: {{ $data->total_job_postings }}
                                            </div>
                                            <div class="text-sm text-gray-500 sm:hidden">
                                                Hired: {{ $data->hired_applicants }}
                                            </div>
                                        </div>
                                    </div>
                                </th>

                                <td class="px-6 py-4 hidden sm:table-cell">
                                    <div class="font-normal text-gray-500 text-sm text-center uppercase">
                                        <span class="text-blue-500 font-bold text-md ">
                                            {{ $data->total_job_postings }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 hidden sm:table-cell">
                                    <div class="font-normal text-gray-500 text-sm text-center uppercase">
                                        <span class="text-blue-500 font-bold text-md ">
                                            {{ $data->hired_applicants }}</span>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div x-data="{ tooltip: 'Employer Overview' }">
                                        <a wire:navigate
                                            href="{{ route('admin-users-employer-overview', ['id' => $data->company_id]) }}"
                                            x-tooltip="tooltip" type="button"
                                            class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg"
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
                    @endif
                </tbody>
            </table>

            <div class="mt-4">
                {{ $employers->links('vendor.livewire.tailwind') }}
            </div>
        </div>
    </div>




    <x-modal name="filter-jobseekers-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Filter Job Seekers') }}
            </h2>
            <hr>
            <div class="flex flex-col w-full">
                <div class="flex-col mt-4">
                    <h1 class="text-md font-semibold">Sort By Gender</h1>

                    <div class="flex flex-col md:flex-row w-full gap-4 mt-2">
                        <div class="flex items-center">
                            <input wire:model='mountGender' id="gender-all" type="radio" value=""
                                name="gender" checked
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="gender-all" class="ms-2 text-sm font-medium text-gray-900">None</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountGender' id="gender-male" type="radio" value="1"
                                name="gender"
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="gender-male" class="ms-2 text-sm font-medium text-gray-900">Male</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountGender' id="gender-female" type="radio" value="2"
                                name="gender"
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="gender-female" class="ms-2 text-sm font-medium text-gray-900">Female</label>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mt-4">
                    <h1 class="text-md font-semibold">Sort By Age</h1>
                    <div class="flex flex-wrap gap-4">
                        <div class="flex items-center">
                            <input wire:model='mountAge' id="checkbox-18s" type="checkbox" value="18-19"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="checkbox-18s" class="ms-2 text-sm font-medium text-gray-900">18-19</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountAge' id="checkbox-20s" type="checkbox" value="20-29"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="checkbox-20s" class="ms-2 text-sm font-medium text-gray-900">20-29</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountAge' id="checkbox-30s" type="checkbox" value="30-39"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="checkbox-30s" class="ms-2 text-sm font-medium text-gray-900">30-39</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountAge' id="checkbox-40s" type="checkbox" value="40-49"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="checkbox-40s" class="ms-2 text-sm font-medium text-gray-900">40-49</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountAge' id="checkbox-50s" type="checkbox" value="50-59"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="checkbox-50s" class="ms-2 text-sm font-medium text-gray-900">50-59</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountAge' id="checkbox-60s" type="checkbox" value="60-69"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="checkbox-60s" class="ms-2 text-sm font-medium text-gray-900">60-69</label>
                        </div>
                    </div>
                </div>

                <div class="flex-col mt-4">
                    <h1 class="text-md font-semibold">Sort By Employment Status</h1>

                    <div class="flex flex-col md:flex-row w-full gap-4 mt-2">
                        <div class="flex items-center">
                            <input wire:model='mountEmpStatus' id="emp-none" type="radio" value=""
                                name="empStatus" checked
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="emp-none" class="ms-2 text-sm font-medium text-gray-900">All</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountEmpStatus' id="emp-emp" type="radio" value="1"
                                name="empStatus"
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="emp-emp" class="ms-2 text-sm font-medium text-gray-900">Employed</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountEmpStatus' id="emp-unemp" type="radio" value="2"
                                name="empStatus"
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="emp-unemp" class="ms-2 text-sm font-medium text-gray-900">Unemployed</label>
                        </div>
                    </div>
                </div>

                {{-- <div class="flex-col mt-4">
                    <h1 class="text-md font-semibold">Sort By Applications</h1>

                    <div class="flex flex-col md:flex-row w-full gap-4 mt-2">
                        <div class="flex items-center">
                            <input wire:model='mountJobseekerfilter' id="job-all" type="radio" value=""
                                name="JobseekerFilter" checked
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="job-all" class="ms-2 text-sm font-medium text-gray-900">All</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountJobseekerfilter' id="job-with" type="radio"
                                value="with_applications" name="JobseekerFilter"
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="job-with" class="ms-2 text-sm font-medium text-gray-900">With
                                Applications</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountJobseekerfilter' id="job-without" type="radio"
                                value="without_applications" name="JobseekerFilter"
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="job-without" class="ms-2 text-sm font-medium text-gray-900">Without
                                Applications</label>
                        </div>
                    </div>
                </div> --}}



                <div class="flex-col mt-4">
                    <h1 class="text-md font-semibold">Sort By Civil Status</h1>

                    <div class="flex flex-col md:flex-row w-full gap-4 mt-2">
                        <div class="flex items-center">
                            <input wire:model='mountCivilStatus' id="civil-all" type="radio" value=""
                                name="civilStatus" checked
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="civil-all" class="ms-2 text-sm font-medium text-gray-900">All</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountCivilStatus' id="civil-single" type="radio" value="1"
                                name="civilStatus" checked
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="civil-single" class="ms-2 text-sm font-medium text-gray-900">Single</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountCivilStatus' id="civil-married" type="radio" value="2"
                                name="civilStatus"
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="civil-married" class="ms-2 text-sm font-medium text-gray-900">Married</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountCivilStatus' id="civil-widowed" type="radio" value="3"
                                name="civilStatus"
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="civil-widowed" class="ms-2 text-sm font-medium text-gray-900">Widowed</label>
                        </div>
                    </div>
                </div>
                <div class="flex-col mt-4">
                    <h1 class="text-md font-semibold">Sort By OFW Record</h1>

                    <div class="flex flex-col md:flex-row w-full gap-4 mt-2">
                        <div class="flex items-center">
                            <input wire:model='mountOFWFilter' id="ofw-all" type="radio" value=""
                                name="ofwFilter" checked
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="ofw-all" class="ms-2 text-sm font-medium text-gray-900">All</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountOFWFilter' id="ofw-yes" type="radio" value="1"
                                name="ofwFilter"
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="ofw-yes" class="ms-2 text-sm font-medium text-gray-900">OFW</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountOFWFilter' id="ofw-no" type="radio" value="2"
                                name="ofwFilter"
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="ofw-no" class="ms-2 text-sm font-medium text-gray-900">Not OFW</label>
                        </div>
                    </div>
                </div>

                <div class="flex-col mt-4">
                    <h1 class="text-md font-semibold">Sort By 4Ps Record</h1>

                    <div class="flex flex-col md:flex-row w-full gap-4 mt-2">
                        <div class="flex items-center">
                            <input wire:model='mountFourPFilter' id="4ps-all" type="radio" value=""
                                name="4psFilter" checked
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="4ps-all" class="ms-2 text-sm font-medium text-gray-900">All</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountFourPFilter' id="4ps-yes" type="radio" value="1"
                                name="4psFilter"
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="4ps-yes" class="ms-2 text-sm font-medium text-gray-900">4Ps Member</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountFourPFilter' id="4ps-no" type="radio" value="2"
                                name="4psFilter"
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="4ps-no" class="ms-2 text-sm font-medium text-gray-900">Not 4Ps
                                Member</label>
                        </div>
                    </div>
                </div>
                @if ($crossJob == true)
                    <div class="flex-col mt-4">
                        <h1 class="text-md font-semibold">Sort By Residency</h1>

                        <div class="flex flex-col md:flex-row w-full gap-4 mt-2">
                            <div class="flex items-center">
                                <input wire:model='mountMunicipalityFilter' id="mun-all" type="radio"
                                    value="" name="munFilter" checked
                                    class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                <label for="mun-all" class="ms-2 text-sm font-medium text-gray-900">All</label>
                            </div>
                            <div class="flex items-center">
                                <input wire:model='mountMunicipalityFilter' id="mun-in" type="radio"
                                    value="1" name="munFilter"
                                    class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                <label for="mun-in" class="ms-2 text-sm font-medium text-gray-900">Resident</label>
                            </div>
                            <div class="flex items-center">
                                <input wire:model='mountMunicipalityFilter' id="mun-out" type="radio"
                                    value="2" name="munFilter"
                                    class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                <label for="mun-out" class="ms-2 text-sm font-medium text-gray-900">Not
                                    Resident</label>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="flex flex-col mt-4">
                    <h1 class="text-md font-semibold">Sort By Date</h1>
                    <div class="flex flex-row w-full gap-4 mt-2">
                        <!-- Dropdown for Year -->
                        <div class="flex flex-col w-full">
                            <select wire:model="mountSelectedYear" class="block mt-1  rounded-md">
                                <option value="" disabled selected>Select Year</option>
                                @for ($year = $startYear; $year <= $currentYear; $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                            <x-input-error :messages="$errors->get('year')" class="mt-2" />
                        </div>
                        <div class="flex flex-col w-full">
                            <x-dropdown align="left" width="full" disableCloseOnClick>
                                <x-slot name="trigger">
                                    <button
                                        class="mt-1 inline-flex h-full items-center text-gray-800 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-md px-1.5 py-2 w-full">
                                        <div class="w-full ml-2 text-left">
                                            Months
                                        </div>

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
                                    <x-slot name="contentClasses">
                                        max-h-[300px] bg-white
                                    </x-slot>
                                    <div class="max-h-[300px] bg-white overflow-y-auto">
                                        @foreach (range(1, 12) as $month)
                                            <div class="flex items-center p-2">
                                                <input wire:model='mountSelectedMonths' type="checkbox"
                                                    id="checkbox-{{ $month }}" value="{{ $month }}"
                                                    class="h-4 w-4 text-blue-600 border-gray-300 rounded" />
                                                <label for="checkbox-{{ $month }}"
                                                    class="ml-2 text-sm font-medium text-gray-700 cursor-pointer">
                                                    {{ date('F', mktime(0, 0, 0, $month, 1)) }}
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>


                                </x-slot>
                            </x-dropdown>
                        </div>

                    </div>
                </div>
                <div class="flex-col mt-4">
                    <h1 class="text-md font-semibold">Sort By Educational Attainment</h1>

                    <select wire:model="mountEducationAttainment" class="block mt-1 w-full rounded-md">
                        <option value="" selected>None</option>
                        <option value="Elementary Graduate">Elementary Graduate</option>
                        <option value="High School Level">High School Level</option>
                        <option value="High School Graduate">High School Graduate</option>
                        <option value="College Level">College Level</option>
                        <option value="College Graduate">College Graduate</option>
                    </select>
                </div>





            </div>
            <div class="mt-6 flex justify-between">
                <x-secondary-button x-on:click="$dispatch('close-modal', 'filter-jobseekers-modal')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <div>
                    <x-danger-button wire:click.prevent="resetFilter">
                        {{ __('Reset') }}
                    </x-danger-button>
                    <x-primary-button wire:loading.attr="disabled" wire:click.prevent="mountFilter" class="ms-3"
                        type="button">
                        {{ __('Confirm') }}
                        <div wire:loading.delay.long wire:target="mountFilter" role="status">
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
                    </x-primary-button>
                </div>

            </div>
        </div>
    </x-modal>

    <x-modal name="filter-employers-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Filter Employers') }}
            </h2>
            <hr>
            <div class="flex flex-col w-full">
                <div class="flex-col mt-4">
                    <h1 class="text-md font-semibold">Sort by Company Location</h1>

                    <div class="flex flex-col md:flex-row w-full gap-4 mt-2">
                        <div class="flex items-center">
                            <input wire:model='mountCompanyMun' id="empmun-all" type="radio" value=""
                                name="munFil" checked
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="empmun-all" class="ms-2 text-sm font-medium text-gray-900">All</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountCompanyMun' id="empmun-in" type="radio"
                                value="within_municipality" name="munFil"
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="empmun-in" class="ms-2 text-sm font-medium text-gray-900">Within
                                Municipality</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountCompanyMun' id="empmun-out" type="radio"
                                value="outside_municipality" name="munFil"
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="empmun-out" class="ms-2 text-sm font-medium text-gray-900">Outside
                                Municipality</label>
                        </div>
                    </div>
                </div>


                <div class="flex flex-col mt-4">
                    <h1 class="text-md font-semibold">Sort By Date</h1>
                    <div class="flex flex-row w-full gap-4 mt-2">
                        <!-- Dropdown for Year -->
                        <div class="flex flex-col w-full">
                            <select wire:model="mountMunYear" class="block mt-1  rounded-md">
                                <option value="" disabled selected>Select Year</option>
                                @for ($year = $startYear; $year <= $currentYear; $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                            <x-input-error :messages="$errors->get('year')" class="mt-2" />
                        </div>
                        <div class="flex flex-col w-full">
                            <x-dropdown align="left" width="full" disableCloseOnClick>
                                <x-slot name="trigger">
                                    <button
                                        class="mt-1 inline-flex h-full items-center text-gray-800 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-md px-1.5 py-2 w-full">
                                        <div class="w-full ml-2 text-left">
                                            Months
                                        </div>

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
                                    <x-slot name="contentClasses">
                                        max-h-[300px] bg-white
                                    </x-slot>
                                    <div class="max-h-[300px] bg-white overflow-y-auto">
                                        @foreach (range(1, 12) as $month)
                                            <div class="flex items-center p-2">
                                                <input wire:model='mountMunMonths' type="checkbox"
                                                    id="checkboxMun-{{ $month }}" value="{{ $month }}"
                                                    class="h-4 w-4 text-blue-600 border-gray-300 rounded" />
                                                <label for="checkboxMun-{{ $month }}"
                                                    class="ml-2 text-sm font-medium text-gray-700 cursor-pointer">
                                                    {{ date('F', mktime(0, 0, 0, $month, 1)) }}
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>


                                </x-slot>
                            </x-dropdown>
                        </div>

                    </div>
                </div>

            </div>
            <div class="mt-6 flex justify-between">
                <x-secondary-button x-on:click="$dispatch('close-modal', 'filter-employers-modal')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <div>
                    <x-danger-button wire:click.prevent="resetMunFilter">
                        {{ __('Reset') }}
                    </x-danger-button>
                    <x-primary-button wire:loading.attr="disabled" wire:click.prevent="mountMunFilter" class="ms-3"
                        type="button">
                        {{ __('Confirm') }}
                        <div wire:loading.delay.long wire:target="mountFilter" role="status">
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
                    </x-primary-button>
                </div>

            </div>
        </div>
    </x-modal>
</div>
