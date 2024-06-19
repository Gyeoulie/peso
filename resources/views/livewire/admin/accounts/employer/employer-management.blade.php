<div class="container mx-auto py-8">
    <div class="grid grid-cols-4 sm:grid-cols-12 gap-4 p-3 sm:p-0">

        <div class="col-span-12">
            <h1 class="text-2xl font-bold">Role Management / Employer Management</h1>
        </div>

        <div class="col-span-4 sm:col-span-12">
            <div class="bg-white shadow rounded-lg p-6">
                <h1 class="text-3xl text-center font-bold">Employers / Companies
                </h1>

                <div class="relative overflow-x-auto p-1 mt-4">

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
                            <input wire:model.live.prevent='searhEmployers' type="text" id="table-search-users"
                                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-96 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search">
                        </div>

                    </div>

                    {{-- TABLE --}}
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                            <tr>
                                <th scope="col" class="px-6 py-3 ">
                                    Business Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Company Type
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Employment Type
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Joined Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @if ($employer->isEmpty())
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
                                @foreach ($employer as $data)
                                    <tr wire:key='company-{{ $data->company_id }}'
                                        class="bg-white border-b hover:bg-gray-50">
                                        <th scope="row"
                                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                            <img class="w-10 h-10 rounded-full"
                                                src="{{ asset('storage/' . $data->company_img) }}" alt="img">
                                            <div class="ps-3 text-wrap">
                                                <div class="text-base font-semibold">
                                                    <div class="text-base font-semibold uppercase">
                                                        {{ $data->business_Name }}

                                                    </div>

                                                </div>
                                                <div class="font-normal text-gray-500 text-sm uppercase">
                                                    {{ $data->company_Address }},
                                                    {{ $data->barangay->barangay_Name }},
                                                    {{ $data->barangay->municipality->municipality_Name }}
                                                </div>
                                            </div>

                                        </th>
                                        <td class="px-6 py-4">

                                            <div class="font-normal text-gray-500 text-sm">
                                                {{ $data->company_Type == 1 ? 'MAIN' : 'BRANCH' }}

                                            </div>

                                        </td>
                                        <td class="px-6 py-4">

                                            <div class="font-normal text-gray-500 text-sm">
                                                {{ $data->employer_Type == 1 ? 'PUBLIC' : 'PRVIATE' }}

                                            </div>

                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $data->created_at->format('F j, Y') }}
                                        </td>


                                        <td class="px-6 py-4">
                                            <div class="flex flex-row  gap-5">
                                                <div x-data="{ tooltip: 'Employer Overview' }">
                                                    <a wire:navigate href="#" x-tooltip="tooltip" type="button"
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


                                        </td>


                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                {{-- PAGINATION --}}
                <div class="mt-4">
                    {{ $employer->links('vendor.livewire.tailwind') }}
                </div>
            </div>



        </div>

    </div>
</div>
