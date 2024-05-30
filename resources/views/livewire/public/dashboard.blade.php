<div>
    {{-- <div class="overflow-x-auto">
    <div class="flex flex-row sm:grid sm:grid-cols-5 gap-2 py-8 mx-4 sm:mx-12 ">

        <a href="#"
            class="flex flex-col max-w-72 items-center bg-white border border-gray-200 rounded-lg shadow sm:flex-row sm:max-w-sm hover:bg-gray-100 flex-shrink-0">
            <img class="object-cover w-auto rounded-t-lg h-48 sm:h-auto sm:w-36 sm:rounded-none sm:rounded-s-lg"
                src="{{ asset('assets/img/peso-1.png') }}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-l font-bold tracking-tight text-gray-900 ">Noteworthy technology acquisitions
                    2021
                </h5>
                <p class="mb-3 text-sm font-normal text-gray-700 ">Here are the biggest enterprise technology
                    acquisitions
                    of
                    2021 so far, in reverse chronological order.</p>
            </div>
        </a>

        <a href="#"
            class="flex flex-col max-w-72 items-center bg-white border border-gray-200 rounded-lg shadow sm:flex-row sm:max-w-sm hover:bg-gray-100 flex-shrink-0">
            <img class="object-cover w-auto rounded-t-lg h-48 sm:h-auto sm:w-36 sm:rounded-none sm:rounded-s-lg"
                src="{{ asset('assets/img/peso-1.png') }}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-l font-bold tracking-tight text-gray-900 ">Noteworthy technology acquisitions
                    2021
                </h5>
                <p class="mb-3 text-sm font-normal text-gray-700 ">Here are the biggest enterprise technology
                    acquisitions
                    of
                    2021 so far, in reverse chronological order.</p>
            </div>
        </a>
        <a href="#"
            class="flex flex-col max-w-72 items-center bg-white border border-gray-200 rounded-lg shadow sm:flex-row sm:max-w-sm hover:bg-gray-100 flex-shrink-0">
            <img class="object-cover w-auto rounded-t-lg h-48 sm:h-auto sm:w-36 sm:rounded-none sm:rounded-s-lg"
                src="{{ asset('assets/img/peso-1.png') }}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-l font-bold tracking-tight text-gray-900 ">Noteworthy technology acquisitions
                    2021
                </h5>
                <p class="mb-3 text-sm font-normal text-gray-700 ">Here are the biggest enterprise technology
                    acquisitions
                    of
                    2021 so far, in reverse chronological order.</p>
            </div>
        </a>

        <a href="#"
            class="flex flex-col max-w-72 items-center bg-white border border-gray-200 rounded-lg shadow sm:flex-row sm:max-w-sm hover:bg-gray-100 flex-shrink-0">
            <img class="object-cover w-auto rounded-t-lg h-48 sm:h-auto sm:w-36 sm:rounded-none sm:rounded-s-lg"
                src="{{ asset('assets/img/peso-1.png') }}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-l font-bold tracking-tight text-gray-900 ">Noteworthy technology acquisitions
                    2021
                </h5>
                <p class="mb-3 text-sm font-normal text-gray-700 ">Here are the biggest enterprise technology
                    acquisitions
                    of
                    2021 so far, in reverse chronological order.</p>
            </div>
        </a>

        <a href="#"
            class="flex flex-col max-w-72 items-center bg-white border border-gray-200 rounded-lg shadow sm:flex-row sm:max-w-sm hover:bg-gray-100 flex-shrink-0">
            <img class="object-cover w-auto rounded-t-lg h-48 sm:h-auto sm:w-36 sm:rounded-none sm:rounded-s-lg"
                src="{{ asset('assets/img/peso-1.png') }}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-l font-bold tracking-tight text-gray-900 ">Noteworthy technology acquisitions
                    2021
                </h5>
                <p class="mb-3 text-sm font-normal text-gray-700 ">Here are the biggest enterprise technology
                    acquisitions
                    of
                    2021 so far, in reverse chronological order.</p>
            </div>
        </a>


    </div>


</div> --}}


    <div class="container mx-auto py-8">
        <div class="grid grid-cols-4 sm:grid-cols-12 gap-10 p-3 sm:p-0">

            {{-- MAIN BAR FOR JOB POST --}}
            <div class="col-span-4 sm:col-span-9">
                <div class="bg-white shadow rounded-lg p-6 overflow-auto">
                    <div
                        class="flex p-1 items-center justify-between flex-column flex-wrap sm:flex-row space-y-4 sm:space-y-0 pb-4">

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
                                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search for users">
                        </div>

                        {{-- FILTER BUTTON --}}
                        <div class="mr-3">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5">
                                        <div>Filter</div>

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
                                        max-h-[200px] bg-white
                                    </x-slot>

                                    <x-dropdown-link href="#"
                                        class="block px-4 py-2 hover:bg-gray-100">All</x-dropdown-link>
                                    <hr>
                                    <!-- Authentication -->
                                    <x-dropdown-link href="#"
                                        class="block px-4 py-2 hover:bg-gray-100">Active</x-dropdown-link>

                                    <x-dropdown-link href="#"
                                        class="block px-4 py-2 hover:bg-gray-100">Disabled</x-dropdown-link>

                                    </form>
                                </x-slot>
                            </x-dropdown>

                        </div>



                    </div>
                    <table class="w-full overflow-auto">

                        <tbody>
                            @if ($joblist->isEmpty())
                                <tr>
                                    <td colspan="5">
                                        <div class="flex flex-col items-center justify-center mt-10 mb-10">
                                            <div class="p-6 bg-gray-100 rounded-full">
                                                <svg class="w-24 h-24 text-black" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                                </svg>

                                            </div>
                                            <p class="text-xl font-bold text-black text-center mt-2">
                                                No Job Posting Found!
                                            </p>
                                        </div>

                                    </td>
                                </tr>
                            @else
                                @foreach ($joblist as $data)
                                    <tr wire:key='jobPosting-{{ $data->job_id }}' class="text-center hover:bg-gray-100 ">

                                        <td class="p-2 rounded-lg">

                                            <a href="{{ route('jobpost.show', ['id' => $data->job_id]) }}">
                                                <div class="flex flex-row w-full">
                                                    <div
                                                        class="flex flex-col justify-center items-center h-full  flex-shrink-0">
                                                        <img src="{{ asset('storage/' . $data->company->company_img) }}"
                                                            alt="Default Image"
                                                            class="w-24 h-24 sm:w-48 sm:h-48 bg-gray-300 rounded object-contain">
                                                    </div>
                                                    <div class="flex-col w-full ml-5 space-y-1 sm:space-y-8">
                                                        <div class="flex flex-col">
                                                            <div class="flex flex-col sm:flex-row  text-left">
                                                                <div class="flex flex-col sm:w-3/4">
                                                                    <h1
                                                                        class="text-blue-500 text-2xl sm:text-5xl font-semibold">
                                                                        {{ $data->job_Title }}
                                                                    </h1>
                                                                </div>
                                                                <div class="hidden sm:flex flex-col sm:w-1/4">
                                                                    <h1
                                                                        class="text-black text-xs sm:text-xl text-left sm:text-center font-medium">
                                                                        ₱{{ number_format($data->job_MinWage) }} -
                                                                        ₱{{ number_format($data->job_MaxWage) }}</h1>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="flex flex-col">
                                                            <div class="flex-row sm:w-3/4 text-left">
                                                                <h2 class="text-lg sm:text-2xl font-semibold">
                                                                    {{ $data->company->bussines_Name }}</h2>
                                                            </div>
                                                            <h1
                                                                class="sm:hidden text-black text-sm text-left sm:text-center font-medium">
                                                                ₱{{ number_format($data->job_MinWage) }} -
                                                                ₱{{ number_format($data->job_MaxWage) }}</h1>
                                                        </div>

                                                        <div class="flex flex-col w-full">
                                                            <div class="flex flex-col sm:flex-row">
                                                                <div class="sm:w-1/4 text-left">

                                                                    <h3
                                                                        class="text-xs sm:text-sm text-blue-900 uppercase">
                                                                        <i class="fa-solid fa-location-dot"></i>
                                                                        {{ $data->job_Address }},
                                                                        {{ $data->barangay->barangay_Name }},
                                                                        {{ $data->barangay->municipality->municipality_Name }},
                                                                        {{ $data->barangay->municipality->province->province_Name }}
                                                                    </h3>
                                                                </div>
                                                                <div class="sm:w-1/4 text-left sm:text-center">
                                                                    <h3
                                                                        class="text-xs sm:text-sm text-blue-900 uppercase">
                                                                        <i class="fa-solid fa-graduation-cap"></i>
                                                                        {{ $eduLevels[$data->job_Edu] }}
                                                                    </h3>
                                                                </div>
                                                                <div class="sm:w-1/4 text-left sm:text-center">
                                                                    <h3
                                                                        class="text-xs sm:text-sm uppercase text-blue-900">
                                                                        <i class="fa-solid fa-briefcase uppercase"></i>
                                                                        {{ $data->job_Type == 1 ? 'Full Time' : 'Part Time' }}
                                                                    </h3>
                                                                </div>
                                                                <div class="sm:w-1/4 text-left sm:text-center">
                                                                    <h3
                                                                        class="text-xs sm:text-sm uppercase text-blue-900">
                                                                        <i class="fa-solid fa-calendar"></i>
                                                                        {{ $data->job_Duration->format('F j, Y') }}
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mt-3">
                                        </td>

                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{-- PAGINATION --}}
                    <div>
                        {{ $joblist->links() }}
                    </div>


                </div>
            </div>











            {{-- SIDE BAR --}}
            <div class="col-span-4 sm:col-span-3">
                <div class="bg-white shadow rounded-lg p-6">
                    <div class="p-6 text-gray-900 text-center w-full">
                        <h1 class="font-bold text-2xl">Top Job Openings</h1>

                    </div>
                </div>
            </div>

        </div>

    </div>


</div>

</div>
