<div class="container mx-auto py-8">
    <div class="grid grid-cols-4 md:grid-cols-12 gap-4 p-3 md:p-0">


        <div class="col-span-4 sm:col-span-12">

            <h1 class="text-2xl font-bold">Reports / Barangay</h1>

        </div>



        <div class="col-span-2 md:col-span-3">
            <div class="bg-blue-100 shadow rounded-lg p-6 flex flex-col h-full">
                <div class="flex flex-row justify-start">
                    <h1 class="font-thin font-mono text-sm">Selected Barangay:</h1>
                </div>

                <div class="flex flex-row w-full justify-between mb-5 mt-auto gap-5">
                    <div class="flex flex-col w-full">
                        <x-dropdown align="left" width="full">
                            <x-slot name="trigger">
                                <button
                                    class="mt-1 inline-flex h-full items-center text-gray-800 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-md px-1.5 py-2 w-full">
                                    <div class="w-full ml-2 text-left font-extrabold font-mono text-xl ">
                                        {{ $barTitle }}
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
                                <!-- Search input -->
                                <div class="p-2">
                                    <input wire:model.live.prevent='searchBar' type="text" placeholder="Search..."
                                        class="block w-full px-3 py-1.5 mb-2 border border-gray-300 rounded-md focus:outline-none"
                                        @click.stop>
                                </div>

                                <!-- Dropdown content with scrollbar -->
                                <div class="max-h-[300px] bg-white overflow-y-auto">
                                    <!-- Dropdown links -->
                                    @foreach ($barangay as $data)
                                        <x-dropdown-link wire:click.prevent='barSelect({{ $data->barangay_id }})'
                                            class="cursor-pointer block px-4 py-2 hover:bg-gray-100 uppercase">{{ $data->barangay_Name }}</x-dropdown-link>
                                    @endforeach
                                </div>
                            </x-slot>

                        </x-dropdown>
                    </div>

                    <svg class="w-10 h-10 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>




                </div>




            </div>

        </div>

        <div class="col-span-2 md:col-span-3">
            <div class="bg-white shadow rounded-lg p-6 flex flex-col h-full">
                <div class="flex flex-row justify-start">
                    <h1 class="font-thin font-mono text-sm">Jobseekers</h1>
                </div>
                <div class="flex flex-row justify-between mb-5">
                    <h1 class="font-extrabold font-mono text-4xl">{{ $totalJobSeekers }}</h1>

                    <svg class="w-10 h-10 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>

                </div>
                <div class="flex flex-row justify-content">

                    <h1 class="font-thin font-mono text-sm"><span
                            class="bg-green-100 text-green-800 text-md font-medium me-2 px-2.5 py-0.5 rounded">
                            <i class="fa-solid fa-chart-line text-green-300"></i> {{ $recentJobSeekers }}</span>New Job
                        Seekers
                    </h1>
                </div>


            </div>

        </div>

        <div class="col-span-2 md:col-span-3">
            <div class="bg-white shadow rounded-lg p-6 flex flex-col h-full">
                <div class="flex flex-row justify-start">
                    <h1 class="font-thin font-mono text-sm">Employed Users</h1>
                </div>
                <div class="flex flex-row justify-between mb-5">
                    <h1 class="font-extrabold font-mono text-4xl">{{ $totalEmployed }}</h1>

                    <svg class="w-10 h-10 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>


                </div>
                <div class="flex flex-row justify-content">

                    <h1 class="font-thin font-mono text-sm"><span
                            class="bg-yellow-100 text-yellow-800 text-md font-medium me-2 px-2.5 py-0.5 rounded">
                            <i class="fa-solid fa-chart-line text-yellow-300"></i>
                            {{ $totalUnemployed }}</span>Unemployed
                    </h1>
                </div>


            </div>

        </div>

        <div class="col-span-2 md:col-span-3">
            <div class="bg-white shadow rounded-lg p-6 flex flex-col h-full">
                <div class="flex flex-row justify-start">
                    <h1 class="font-thin font-mono text-sm">Active Applications</h1>
                </div>
                <div class="flex flex-row justify-between mb-5">
                    <h1 class="font-extrabold font-mono text-4xl">{{ $totalActiveApplicants }}</h1>

                    <svg class="w-10 h-10 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                    </svg>


                </div>
                <div class="flex flex-row justify-content">

                    <h1 class="font-thin font-mono text-sm"><span
                            class="bg-green-100 text-green-800 text-md font-medium me-2 px-2.5 py-0.5 rounded">
                            <i class="fa-solid fa-chart-line text-green-300"></i>
                            {{ $recentActiveApplicants }}</span>New Applications
                    </h1>
                </div>


            </div>

        </div>



        <div class="col-span-4">
            <div class="bg-white shadow rounded-lg p-6">
                <div class="mb-10">
                    <h1 class="text-2xl font-bold">Most Preferred Job Tags</h1>
                    <hr class="h-px my-2 bg-gray-200 border-0">
                </div>
                <div class="flex h-full items-end">
                    <livewire:livewire-column-chart key="{{ $jobtags_chart->reactiveKey() }}" :column-chart-model="$jobtags_chart" />
                </div>
            </div>
        </div>
        <div class="col-span-4">
            <div class="bg-white shadow rounded-lg p-6">
                <div class="mb-10">
                    <h1 class="text-2xl font-bold">Most Preferred Industries</h1>
                    <hr class="h-px my-2 bg-gray-200 border-0">
                </div>
                <div class="flex h-full items-end">
                    <livewire:livewire-column-chart key="{{ $industries_chart->reactiveKey() }}" :column-chart-model="$industries_chart" />
                </div>
            </div>
        </div>
        <div class="col-span-4">
            <div class="bg-white shadow rounded-lg p-6">

                <div class="flex flex-col sm:flex-row sm:justify-between gap-4">
                    <h1 class="text-2xl font-bold">Hired Applicants</h1>
                    <div class="flex flex-row gap-2 items-center">
                        <x-dropdown align="right" width="30" disableCloseOnClick>
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5">
                                    <div>
                                        Month
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
                                            <input wire:model='selectedMonths' type="checkbox"
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
                        <x-dropdown align="left" width="30">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5">
                                    <div>
                                        {{ $selectedYear }}
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

                                @for ($year = $startYear; $year <= $currentYear; $year++)
                                    <x-dropdown-link wire:click.prevent="changeYear({{ $year }})"
                                        class="cursor-pointer">
                                        {{ $year }}
                                    </x-dropdown-link>
                                @endfor

                            </x-slot>
                        </x-dropdown>


                        <div x-data="{ tooltip: 'Filter' }">
                            <button x-tooltip="tooltip" type="button" wire:click.prevent='changeMonth'
                                class=" border border-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                                </svg>

                            </button>
                        </div>
                    </div>
                </div>
                <div class="mb-10">
                    <hr class="h-px my-2 bg-gray-200 border-0">
                </div>

                <div class="flex h-full items-end">
                    <livewire:livewire-line-chart key="{{ $employment_chart->reactiveKey() }}" :line-chart-model="$employment_chart" />
                </div>
            </div>
        </div>




        <div class="col-span-4 md:col-span-6">
            <div class="bg-white shadow rounded-lg p-6 h-full w-full overflow-auto">
                <div class="mb-5">
                    <h1 class="text-2xl font-bold">{{ $barTitle }} JOBSEEKERS</h1>
                    <hr class="h-px my-2 bg-gray-200 border-0">
                </div>
                <div
                    class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4">

                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>

                        {{-- SEARCH --}}
                        <input wire:model.live.prevent='searchJobseekers' type="text"
                            class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search">
                    </div>

                    <div class="flex flex-row gap-2">
                        <div x-data="{ tooltip: 'Export to Excel' }">
                            <button x-tooltip='tooltip' type="button" wire:click.prevent='exportData'
                                class="flex items-center py-1.5 px-4 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                <span class="mr-2">Export</span>
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>
                            </button>

                        </div>
                        <button type="button" x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'filter-jobseekers-modal')"
                            x-on:focus="$dispatch('open-modal', 'filter-jobseekers-modal')"
                            class="py-1.5 px-5  text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Filter</button>
                    </div>
                </div>
                <div class="overflow-x-auto">

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-2">
                        <thead class="text-xs text-gray-700 uppercase bg-blue-300">
                            <tr>
                                <th scope="col" class="px-6 py-3 w-full">
                                    <span class="text-black font-bold text-md">Applicant Name</span>

                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="text-black font-bold text-md">Employment Status</span>
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    <span class="text-black font-bold text-md ">Active Applications</span>
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    <span class="text-black font-bold text-md ">Registered Trainings</span>
                                </th>
                                <th scope="col" class="px-6 py-3">

                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @if ($barangayJobSeekers->isEmpty())
                                <tr>
                                    <td colspan="5">
                                        <div class="flex flex-col items-center justify-center mt-24 mb-24">
                                            <div class="p-6 bg-gray-100 rounded-full">
                                                <svg class="w-24 h-24 text-black" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
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
                                @foreach ($barangayJobSeekers as $data)
                                    <tr wire:key='applicants-{{ $data->job_id }}'
                                        class="bg-white border-b hover:bg-gray-50">
                                        <th scope="row"
                                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                            <img class="w-10 h-10 rounded-full"
                                                src="{{ asset('storage/' . $data->pimg) }}" alt="img">
                                            <div class="ps-3 text-wrap">
                                                <div class="text-base font-semibold">
                                                    <div class="text-base font-semibold uppercase">
                                                        {{ $data->fname }} {{ $data->mname }}
                                                        {{ $data->lname }}

                                                    </div>

                                                </div>
                                            </div>

                                        </th>

                                        <td class="px-6 py-4">
                                            @if ($data->empstatus == '2')
                                                <span
                                                    class="inline-flex items-center rounded-md bg-yellow-200 px-2 py-1 text-sm font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">UNEMPLOYED</span>
                                            @elseif ($data->empstatus == '1')
                                                <span
                                                    class="inline-flex items-center rounded-md bg-green-200 px-2 py-1 text-sm font-medium text-green-800 ring-1 ring-inset ring-green-600/20">EMPLOYED</span>
                                            @endif
                                        </td>

                                        <td class="px-6 py-4">

                                            <div class="font-normal text-gray-500 text-sm text-center uppercase">
                                                <span class="text-blue-500 font-bold text-md ">
                                                    {{ $data->active_applications_count }}</span>

                                            </div>

                                        </td>
                                        <td class="px-6 py-4">

                                            <div class="font-normal text-gray-500 text-sm text-center uppercase">
                                                <span class="text-blue-500 font-bold text-md ">
                                                    {{ $data->program_reg_count }}</span>


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
                        {{ $barangayJobSeekers->links('vendor.pagination.tailwind') }}
                    </div>
                </div>

            </div>

        </div>
        <div class="col-span-4 md:col-span-6">
            <div class="bg-white shadow rounded-lg p-6 h-full w-full overflow-auto">
                <div class="mb-5">
                    <h1 class="text-2xl font-bold">Most Popular Trainings</h1>
                    <hr class="h-px my-2 bg-gray-200 border-0">
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-2">
                        <thead class="text-xs text-gray-700 uppercase bg-blue-300">
                            <tr>
                                <th scope="col" class="px-6 py-3 w-full">
                                    <span class="text-black font-bold text-md">Training Title</span>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="text-black font-bold text-md">Type</span>
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    <span class="text-black font-bold text-md ">Registered</span>
                                </th>
                                <th scope="col" class="px-6 py-3">

                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @if ($topPrograms->isEmpty())
                                <tr>
                                    <td colspan="4">
                                        <div class="flex flex-col items-center justify-center mt-24 mb-24">
                                            <div class="p-6 bg-gray-100 rounded-full">
                                                <svg class="w-24 h-24 text-black" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-width="2"
                                                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                                </svg>

                                            </div>
                                            <p class="text-xl font-bold text-black text-center mt-2">
                                                Not enough data!
                                            </p>
                                        </div>

                                    </td>
                                </tr>
                            @else
                                @foreach ($topPrograms as $data)
                                    <tr wire:key='program-{{ $data->program_id }}'
                                        class="bg-white border-b hover:bg-gray-50">
                                        <th scope="row"
                                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                            <img class="w-10 h-10 rounded-full"
                                                src="{{ asset('storage/' . $data->program_pubmat) }}" alt="img">
                                            <div class="ps-3 text-wrap">
                                                <div class="text-base font-semibold">
                                                    <div class="text-base font-semibold">{{ $data->program_Title }}
                                                    </div>
                                                    <div class="font-normal text-gray-500 text-sm uppercase">
                                                        {{ $data->program_Host }}
                                                    </div>
                                                </div>
                                            </div>

                                        </th>

                                        <td class="px-6 py-4">
                                            {{ $data->program_Type }}
                                        </td>

                                        <td class="px-6 py-4">

                                            <div class="font-normal text-gray-500 text-sm text-center uppercase">
                                                <span class="text-blue-500 font-bold text-md ">
                                                    {{ $data->registration_count }}</span>

                                            </div>

                                        </td>


                                        <td>
                                            <div x-data="{ tooltip: 'Program Overview' }">
                                                <a wire:navigate
                                                    href="{{ route('admin-registrants-training', ['id' => $data->program_id]) }}"
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

                        <div class="flex flex-col sm:flex-row w-full gap-4 mt-2">
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
                                <label for="gender-female"
                                    class="ms-2 text-sm font-medium text-gray-900">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 mb-4 mt-2">
                        <h1 class="text-md font-semibold mb-2">Sort By Age</h1>
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

                        <div class="flex flex-col sm:flex-row w-full gap-4 mt-2">
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
                                <label for="emp-unemp"
                                    class="ms-2 text-sm font-medium text-gray-900">Unemployed</label>
                            </div>
                        </div>
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
                        <x-primary-button wire:loading.attr="disabled" wire:click.prevent="mountFilter"
                            class="ms-3" type="button">
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
</div>
