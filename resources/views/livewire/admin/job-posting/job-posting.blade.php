<div class="container mx-auto py-8">
    <div class="grid grid-cols-4 sm:grid-cols-12 gap-4 p-3 sm:p-0">

        <div class="col-span-4 sm:col-span-12">
            <h1 class="text-2xl font-bold">Job Posting</h1>
        </div>

        <div class="col-span-4 sm:col-span-12">
            <div wire:poll class="bg-white shadow rounded-lg p-6" x-data="{
                openTab: 1,
                activeClasses: 'text-gray-900 bg-gray-400 active',
                inactiveClasses: 'bg-gray-100 hover:text-gray-700 hover:bg-gray-50'
            }">


                <div class="relative overflow-x-auto p-1">
                    <div class="sm:hidden">
                        <label for="tabs" class="sr-only">Select your country</label>
                        <select id="tabs"
                            class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option wire:click.prevent='updateFilter("")'>All ({{ $allCount }})</option>
                            <option wire:click.prevent='updateFilter("PENDING")'>Pending ({{ $pendingCount }})</option>
                            <option wire:click.prevent='updateFilter("ACTIVE")'>Approved ({{ $activeCount }})</option>
                            <option wire:click.prevent='updateFilter("CLOSED")'>Approved ({{ $closedCount }})</option>
                            <option wire:click.prevent='updateFilter("COMPLETED")'>Approved ({{ $completedCount }})
                            </option>
                            <option wire:click.prevent='updateFilter("OTHERS")'>Others ({{ $othersCount }})</option>
                        </select>
                    </div>
                    <ul class="hidden text-sm font-medium text-center text-gray-500 rounded-lg shadow sm:flex mb-3">
                        <li class="w-full focus-within:z-10">
                            <button wire:click.prevent='updateFilter("")' @click="openTab = 1"
                                :class="openTab === 1 ? activeClasses : inactiveClasses"
                                class="inline-block w-full p-4 border-r border-gray-200 focus:ring-1 focus:ring-gray-300 focus:outline-none rounded-s-lg"
                                aria-current="page">All ({{ $allCount }})</button>
                        </li>
                        <li wire:click.prevent='updateFilter("PENDING")' class="w-full focus-within:z-10">
                            <button @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"
                                class="inline-block w-full p-4 border-r border-gray-200 focus:ring-1 focus:ring-gray-300 focus:outline-none">Pending
                                ({{ $pendingCount }})</button>
                        </li>
                        <li wire:click.prevent='updateFilter("ACTIVE")' class="w-full focus-within:z-10">
                            <button @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses"
                                class="inline-block w-full p-4 border-r border-gray-200 focus:ring-1 focus:ring-gray-300 focus:outline-none">Active
                                ({{ $activeCount }})</button>
                        </li>
                        <li wire:click.prevent='updateFilter("CLOSED")' class="w-full focus-within:z-10">
                            <button @click="openTab = 4" :class="openTab === 4 ? activeClasses : inactiveClasses"
                                class="inline-block w-full p-4 border-r border-gray-200 focus:ring-1 focus:ring-gray-300 focus:outline-none">Closed
                                ({{ $closedCount }})</button>
                        </li>
                        <li wire:click.prevent='updateFilter("COMPLETED")' class="w-full focus-within:z-10">
                            <button @click="openTab = 5" :class="openTab === 5 ? activeClasses : inactiveClasses"
                                class="inline-block w-full p-4 border-r border-gray-200 focus:ring-1 focus:ring-gray-300 focus:outline-none">Completed
                                ({{ $completedCount }})</button>
                        </li>
                        <li wire:click.prevent='updateFilter("OTHERS")' class="w-full focus-within:z-10">
                            <button @click="openTab = 6" :class="openTab === 6 ? activeClasses : inactiveClasses"
                                class="inline-block w-full p-4 border-r border-gray-200 focus:ring-1 focus:ring-gray-300 focus:outline-none rounded-e-lg">Others
                                ({{ $othersCount }})</button>
                        </li>

                    </ul>
                    <div id="tooltip-top" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Tooltip on top
                        <div class="tooltip-arrow" data-popper-arrow></div>
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
                            <input wire:model.live.prevent='search' type="text" id="table-search-users"
                                class="block p-1.5 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-96 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search">
                        </div>
                        <div x-data="{ tooltip: 'Export to Excel' }">
                            <button x-tooltip='tooltip' type="button" wire:click.prevent='exportData'
                                class="flex items-center py-2 px-4 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                <span class="mr-2">Export</span>
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>
                            </button>

                        </div>
                    </div>

                    {{-- TABLE --}}
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                            <tr>
                                <th scope="col" class="px-6 py-3 w-1/4">
                                    Company
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Job Offering
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Employment Type
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Slots Available
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    @if ($filter == 'ACTIVE')
                                        Total Applicants
                                    @else
                                        Status
                                    @endif
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date Posted
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($jobpost->isEmpty())
                                <tr>
                                    <td colspan="7">
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
                                @foreach ($jobpost as $data)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <th scope="row"
                                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                            <img class="w-10 h-10 rounded-full"
                                                src="{{ asset('storage/' . $data->company->company_img) }}"
                                                alt="Jese image">
                                            <div class="ps-3 text-wrap">
                                                <div class="text-base font-semibold">
                                                    {{ $data->company->business_Name }}
                                                </div>
                                                <div class="font-normal text-gray-500 text-sm uppercase">
                                                    {{ $data->company->company_Address }}
                                                    {{ $data->company->barangay->barangay_Name }},
                                                    {{ $data->company->barangay->municipality->municipality_Name }},
                                                    {{ $data->company->barangay->municipality->province->province_Name }}
                                                </div>
                                            </div>

                                        </th>
                                        <td class="px-6 py-4">
                                            <div class="text-base font-semibold">{{ $data->job_Title }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $data->job_Title == 1 ? 'PART TIME' : 'FULL TIME' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{-- {{ $data->job_Slots }} --}}

                                            {{ $data->slotsLeft }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">


                                                @if ($filter == 'ACTIVE')
                                                    {{ $data->job_applicants_count }}
                                                @else
                                                    @if ($data->job_Status == 'ACTIVE')
                                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div>
                                                        ACTIVE
                                                    @elseif ($data->job_Status == 'PENDING')
                                                        <div class="h-2.5 w-2.5 rounded-full bg-yellow-500 me-2"></div>
                                                        {{ $data->job_Status }}
                                                    @elseif ($data->job_Status == 'CLOSED')
                                                        <div class="h-2.5 w-2.5 rounded-full bg-cyan-500 me-2"></div>
                                                        {{ $data->job_Status }}
                                                    @elseif ($data->job_Status == 'COMPLETED')
                                                        <div class="h-2.5 w-2.5 rounded-full bg-blue-500 me-2"></div>
                                                        {{ $data->job_Status }}
                                                    @else
                                                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div>
                                                        {{ $data->job_Status }}
                                                    @endif
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-base font-semibold">
                                                {{ $data->created_at->format(' g:i A') }}
                                            </div>
                                            <div class="text-base font-semibold">
                                                {{ $data->created_at->format('F j, Y') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-row  gap-5">
                                                <div x-data="{ tooltip: 'View Job Post Information' }">
                                                    <a wire:navigate
                                                        href="{{ route('admin.jobpost', ['id' => $data->job_id]) }}"
                                                        x-tooltip="tooltip" type="button"
                                                        class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24" fill="currentColor">
                                                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </a>
                                                </div>

                                                @if ($filter == 'ACTIVE')
                                                    <div x-data="{ tooltip: 'View Applicants' }">
                                                        <a wire:navigate
                                                            href="{{ route('admin.jobpost.applicants', ['id' => $data->job_id]) }}"
                                                            x-tooltip="tooltip" type="button"
                                                            class="text-cyan-700 border border-cyan-700 hover:bg-cyan-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                                            <svg class="w-5 h-5 " aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                @endif

                                            </div>
                                        </td>


                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                {{-- PAGINATION --}}
                <div class="mt-4">
                    {{ $jobpost->links('vendor.livewire.tailwind') }}
                </div>

            </div>



        </div>

    </div>
</div>
