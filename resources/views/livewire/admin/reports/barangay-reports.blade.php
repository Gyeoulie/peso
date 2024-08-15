<div class="container mx-auto py-8">
    <div class="grid grid-cols-4 md:grid-cols-12 gap-4 p-3 md:p-0">


        <div class="col-span-4 sm:col-span-12">
            <a href="{{ route('view.resume', ['id' => 1]) }}" target="_blank" rel="noopener noreferrer">
                <h1 class="text-2xl font-bold">Reports / Barangay</h1>
            </a>
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
                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
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
                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                </div>
                <div class="flex h-full items-end">
                    <livewire:livewire-column-chart key="{{ $industries_chart->reactiveKey() }}" :column-chart-model="$industries_chart" />
                </div>
            </div>
        </div>
        <div class="col-span-4">
            <div class="bg-white shadow rounded-lg p-6">
                <div class="mb-10">
                    <h1 class="text-2xl font-bold">Hired Applicants by Month</h1>
                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                </div>
                <div class="flex h-full items-end">
                    <livewire:livewire-line-chart key="{{ $lineChartModel->reactiveKey() }}" :line-chart-model="$lineChartModel" />
                </div>
            </div>
        </div>




        <div class="col-span-4 md:col-span-6">
            <div class="bg-white shadow rounded-lg p-6 h-full w-full overflow-auto">
                <div class="mb-5">
                    <h1 class="text-2xl font-bold">{{ $barTitle }} JOBSEEKERS</h1>
                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                </div>
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
                            <th scope="col" class="px-6 py-3">

                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobseekers as $data)
                            <tr wire:key='applicants-{{ $data->job_id }}' class="bg-white border-b hover:bg-gray-50">
                                <th scope="row"
                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                    <img class="w-10 h-10 rounded-full" src="{{ asset('storage/' . $data->pimg) }}"
                                        alt="img">
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
                                            {{ $data->active_applications }}</span>


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

                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $jobseekers->links('vendor.pagination.tailwind') }}
                </div>

            </div>

        </div>







    </div>
</div>
