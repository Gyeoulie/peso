<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col w-full">
                    <div class="flex flex-row w-full">
                        <div class="flex flex-row">
                            <div class="p-6 text-xl font-medium text-gray-900">
                                Welcome, <span class="text-black font-bold">
                                    {{ auth()->user()->company->bussines_Name }}!</span>
                            </div>
                        </div>
                        <div class="flex flex-col ml-auto mr-2 justify-center">
                            <a href="{{ route('jobpost.apply') }}">
                                <x-primary-button type="button" class="w-[150px] mr-2 justify-center">

                                    Post Job

                                </x-primary-button>
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="table-container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                <div class="sm:hidden">
                    <label for="tabs" class="sr-only">Select your country</label>
                    <select id="tabs"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option>All</option>
                        <option>Pending</option>
                        <option>Approved</option>
                        <option>Others</option>
                    </select>
                </div>
                <ul class="hidden text-sm font-medium text-center text-gray-500 rounded-lg shadow sm:flex">
                    <li class="w-full focus-within:z-10">
                        <a href="#"
                            class="inline-block w-full p-4 text-gray-900 bg-gray-400 border border-gray-200 rounded-s-lg focus:ring-4 focus:ring-blue-300 active focus:outline-none"
                            aria-current="page">All</a>
                    </li>
                    <li class="w-full focus-within:z-10">
                        <a href="#"
                            class="inline-block w-full p-4 bg-white border border-gray-200  hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none ">Approved</a>
                    </li>
                    <li class="w-full focus-within:z-10">
                        <a href="#"
                            class="inline-block w-full p-4 bg-white border border-gray-200  hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none ">Pending</a>
                    </li>
                    <li class="w-full focus-within:z-10">
                        <a href="#"
                            class="inline-block w-full p-4 bg-white border border-gray-200  hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none">Others</a>
                    </li>

                </ul>


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div
                        class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white px-4 pt-4">
                        <div>
                            <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                                class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 "
                                type="button">
                                <span class="sr-only">Action button</span>
                                Action
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownAction"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                                <ul class="py-1 text-sm text-gray-700 " aria-labelledby="dropdownActionButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Reward</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Promote</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Activate account</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Delete User</a>
                                </div>
                            </div>
                        </div>
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative">
                            <div
                                class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input wire:model.live.prevent='search' type="text" id="table-search-users"
                                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search for users">
                        </div>
                    </div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 lg:table-fixed">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3 md:w-96">
                                    Job Title
                                </th>
                                <th scope="col" class="px-6 py-3 md:w-96">
                                    Candidates
                                </th>
                                <th scope="col" class="px-6 py-3 w-md">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 w-md">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3 w-md">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($applicants->isEmpty())
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
                                                No Job Posting Found
                                            </p>
                                        </div>

                                    </td>
                                </tr>
                            @else
                                @foreach ($applicants as $data)
                                    <tr class="bg-white border-b ">
                                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 ">
                                            <div class="ps-3">
                                                <div class="text-base font-semibold">{{ $data->job_Title }}</div>
                                                <div class="font-normal text-gray-500 text-sm">
                                                    {{ $data->job_Address }},
                                                    {{ $data->barangay->barangay_Name }},
                                                    {{ $data->barangay->municipality->municipality_Name }},
                                                    {{ $data->barangay->municipality->province->province_Name }}</div>
                                            </div>
                                        </th>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-row gap-1">
                                                <div class="w-[85px] bg-gray-300 rounded-lg p-1 text">
                                                    <div class="text-base font-semibold">{{ $data->approved_count }}
                                                    </div>
                                                    <div class="text-base text-sm font-semibold">Approved</div>
                                                </div>
                                                <div class="w-[85px] bg-yellow-300 rounded-lg p-1">
                                                    <div class="text-base font-semibold">{{ $data->pending_count }}
                                                    </div>
                                                    <div class="text-base font-semibold">Pending</div>
                                                </div>
                                                <div class="w-[85px] bg-green-300 rounded-lg p-1">
                                                    <div class="text-base font-semibold">{{ $data->hired_count }}</div>
                                                    <div class="text-base font-semibold">Hired</div>
                                                </div>
                                            </div>
                                        </td>


                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                @if ($data->job_Status == 'ACTIVE')
                                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2 uppercase">
                                                    </div> ACTIVE
                                                @elseif ($data->job_Status == 'PENDING')
                                                    <div class="h-2.5 w-2.5 rounded-full bg-yellow-500 me-2 uppercase">
                                                    </div> PENDING
                                                @else
                                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2 uppercase">
                                                    </div>
                                                    {{ $data->job_Status }}
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="font-normal text-gray-500 text-sm">
                                                {{ $data->created_at->format('F j, Y') }}

                                            </div>

                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('jobpost.show', ['id' => $data->job_id]) }}"
                                                class="font-medium text-blue-600  hover:underline">View
                                                Post</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{-- navbar --}}
                    <div></div>
                </div>







            </div>
        </div>
    </div>
</div>
