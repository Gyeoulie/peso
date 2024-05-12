<div class="bg-white shadow rounded-lg p-6" x-data="{
    openTab: 1,
    activeClasses: 'text-gray-900 bg-gray-400 active',
    inactiveClasses: 'bg-gray-100 hover:text-gray-700 hover:bg-gray-50'
}">


    <div class="relative overflow-x-auto ">
        <div class="sm:hidden">
            <label for="tabs" class="sr-only">Select your country</label>
            <select id="tabs"
                class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option>All</option>
                <option>Pending</option>
                <option>Approved</option>
                <option>Others</option>
            </select>
        </div>
        <ul class="hidden text-sm font-medium text-center text-gray-500 rounded-lg shadow sm:flex mb-3">
            <li class="w-full focus-within:z-10">
                <button wire:click.prevent='updateFilter("")' @click="openTab = 1"
                    :class="openTab === 1 ? activeClasses : inactiveClasses"
                    class="inline-block w-full p-4 border-r border-gray-200 focus:ring-1 focus:ring-gray-300 focus:outline-none rounded-s-lg"
                    aria-current="page">All</button>
            </li>
            <li wire:click.prevent='updateFilter("PENDING")' class="w-full focus-within:z-10">
                <button @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"
                    class="inline-block w-full p-4 border-r border-gray-200 focus:ring-1 focus:ring-gray-300 focus:outline-none">Pending</button>
            </li>
            <li wire:click.prevent='updateFilter("ACTIVE")' class="w-full focus-within:z-10">
                <button @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses"
                    class="inline-block w-full p-4 border-r border-gray-200 focus:ring-1 focus:ring-gray-300 focus:outline-none">Active</button>
            </li>
            <li wire:click.prevent='updateFilter("OTHERS")' class="w-full focus-within:z-10">
                <button @click="openTab = 4" :class="openTab === 4 ? activeClasses : inactiveClasses"
                    class="inline-block w-full p-4 border-r border-gray-200 focus:ring-1 focus:ring-gray-300 focus:outline-none rounded-e-lg">Others</button>
            </li>

        </ul>
        <div id="tooltip-top" role="tooltip"
            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Tooltip on top
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

        <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4">

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
                <input wire:model.live.prevent='search' type="text" id="table-search-users"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-96 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search">
            </div>
            {{-- <div>

              
                <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                    class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5"
                    type="button">
                    <span class="sr-only">Action button</span>
                    Action
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
        
                <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                    <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownActionButton">
                        <li>
                            <a href="" class="block px-4 py-2 hover:bg-gray-100">Reward</a>
                        </li>
                        <li>
                            <a href="" class="block px-4 py-2 hover:bg-gray-100">Promote</a>
                        </li>
                        <li>
                            <a href="" class="block px-4 py-2 hover:bg-gray-100">Activate
                                account</a>
                        </li>
                    </ul>
                    <div class="py-1">
                        <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Delete
                            User</a>
                    </div>
                </div>
            </div> --}}
        </div>

        {{-- TABLE --}}
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
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
                        Slots
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
                            <div class="flex flex-col justify-center items-center mt-20 mb-20">
                                <div class="flex  bg-gray-100 rounded-full p-1">
                                    <svg class="w-16 h-16 text-black" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-3.5-3.5m0 0a7 7 0 1 1-9-10.5 7 7 0 0 1 9 10.5z" />
                                    </svg>
                                </div>

                                <div class="text-center text-black text-xl font-semibold mt-2">
                                    No Job Posting Found
                                </div>
                            </div>


                        </td>
                    </tr>
                @else
                    @foreach ($jobpost as $data)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                <img class="w-10 h-10 rounded-full"
                                    src="{{ asset('storage/' . $data->company->company_img) }}" alt="Jese image">
                                <div class="ps-3 text-wrap">
                                    <div class="text-base font-semibold">{{ $data->company->bussines_Name }}</div>
                                    <div class="font-normal text-gray-500 text-sm">{{ $data->company->company_Address }}
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
                                {{ $data->job_Slots }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">


                                    @if ($filter == 'ACTIVE')
                                        {{ $data->job_applicants_count }}
                                    @else
                                        @if ($data->job_Status == 'ACTIVE')
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> ACTIVE
                                        @elseif ($data->job_Status == 'PENDING')
                                            <div class="h-2.5 w-2.5 rounded-full bg-yellow-500 me-2"></div>
                                            {{ $data->job_Status }}
                                        @else
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div>
                                            {{ $data->job_Status }}
                                        @endif
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-base font-semibold">{{ $data->created_at->format(' g:i A') }}
                                </div>
                                <div class="text-base font-semibold">{{ $data->created_at->format('F j, Y') }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-row  gap-5">
                                    <a href="{{ route('admin.jobpost', ['id' => $data->job_id]) }}"
                                        class="font-medium text-blue-600" title="View Job Posting Info"><svg
                                            class="w-6 h-6 text-blue-600 " aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>

                                    </a>
                                    @if ($filter == 'ACTIVE')
                                        <a href="{{ route('admin.jobpost.applicants', ['id' => $data->job_id]) }}"
                                            class="font-medium text-blue-600 " title="View Applicants">
                                            <svg class="w-6 h-6 text-blue-600" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </a>
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
    <div>

    </div>

</div>
