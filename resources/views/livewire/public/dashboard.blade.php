<div class="w-full">

    @if (Auth::check() && Auth::user()->usertype == 5)
        <div class="bg-yellow-100 shadow rounded-lg p-6 my-6 mx-12">
            <div class="flex flex-row items-center justify-between">
                <p class="text-yellow-700 font-bold text-xl">You don't have access to job post application. Must have an
                    active partnership to be able to post.</p>
                <svg class="w-9 h-9 sm:w-9 sm:h-9 text-yellow-700 me-2.5" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 0 1-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 0 1-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 0 1-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584ZM12 18a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                        clip-rule="evenodd" />
                </svg>

            </div>
        </div>
    @else
        <div class="flex flex-row justify-between mx-auto sm:mx-12 py-2 mt-4">
            <div>
                @if (Auth::check() && Auth::user()->usertype == 4)
                    <h1 class="text-lg sm:text-2xl font-semibold">Recommended Trainings</h1>
                @else
                    <h1 class="text-lg sm:text-2xl font-semibold">Available Trainings</h1>
                @endif
            </div>
            <div class="flex items-end">
                <a wire:navigate href="{{ route('trainings') }}"
                    class="text-sm sm:text-md
                font-semibold hover:text-blue-400">View more</a>
            </div>

        </div>
        <hr class="h-1 mx-auto sm:mx-12  bg-gray-200 border-0">

        @if ($programList->isEmpty())
            <div class="flex w-full justify-center  mx-4">
                <div class="flex flex-col items-center justify-center mt-4 mb-4">
                    <div class="p-6 bg-white rounded-full my-2 transition-transform transform hover:scale-110">
                        <svg class="w-36 h-36 text-black" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 0 1 0 3.46" />
                        </svg>


                    </div>
                    <p class="text-xl font-bold text-black text-center mt-2">
                        No New Program!
                    </p>
                </div>
            </div>
        @else
            <div class="overflow-x-auto no-scrollbar">
                <div class="flex flex-nowrap gap-6 py-4 mx-4 sm:mx-12">

                    @foreach ($programList as $data)
                        <a wire:navigate href="{{ route('training.show', ['id' => $data->program_id]) }}"
                            class="shrink-0 flex flex-col sm:flex-row w-full sm:max-w-xl sm:max-h-72 bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                            <img class="w-full sm:w-60 object-cover h-48 sm:h-full"
                                src="{{ $data->program_pubmat && file_exists(public_path('storage/' . $data->program_pubmat)) ? asset('storage/' . $data->program_pubmat) : asset('assets/img/PESO-Logo.png') }}"
                                alt="prog-{{ $data->program_id }}">


                            <div class="flex flex-col justify-between p-4 sm:p-4 flex-1">
                                <h5 class="text-xl sm:text-2xl font-bold tracking-tight text-blue-500 leading-snug">
                                    {{ $data->program_Title }}
                                </h5>
                                <hr class="mb-2">

                                <div class="flex items-center mb-2 text-sm font-medium text-gray-900">
                                    <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <p class="truncate ...">{{ $data->created_at->format('F j, Y g:i A') }}</p>
                                </div>

                                <p class="mb-4 text-sm font-normal text-gray-700 leading-relaxed flex-grow">
                                    {!! Str::limit(strip_tags($data->program_Description), 90, '...') !!}
                                </p>

                                <p class="text-sm font-medium text-gray-900">
                                    PESO {{ $data->peso->municipality->municipality_Name }}
                                </p>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        @endif
    @endif

    <div wire:poll.10s class="flex mx-auto sm:mx-12 py-2 ">
        <div class="grid grid-cols-4 sm:grid-cols-12 gap-10 p-3 sm:p-0 w-full">

            {{-- MAIN BAR FOR JOB POST --}}
            <div class="col-span-4 sm:col-span-9">
                <div class="bg-white shadow rounded-lg p-6 overflow-visible">
                    <div class="flex flex-col sm:flex-row p-1 sm:justify-between gap-2 space-y-4 sm:space-y-0 pb-4">

                        <label for="table-search" class="sr-only">Search</label>

                        <div class="relative w-full sm:w-auto">

                            <div
                                class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            {{-- SEARCH --}}
                            <input wire:model.live='search' type="search" id="table-search-users"
                                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full sm:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search for job posting">
                        </div>

                        {{-- FILTER BUTTON --}}
                        <div class="flex flex-wrap mr-3 gap-2">
                            <button type="button" x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'industry-filter-modal')"
                                class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5">Industry
                                Filter</button>
                            <button type="button" x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'job-tag-filter-modal')"
                                class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5">Job
                                Tags Filter</button>

                            @if (Auth::check() && auth()->user()->usertype != 5)
                                <x-dropdown align="left" width="36">
                                    <x-slot name="trigger">
                                        <button
                                            class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5">
                                            <div>
                                                {{ $filter }}
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

                                        @if (auth()->user()->usertype == 4)
                                            <x-dropdown-link wire:click.prevent="updateFilter('Recommended')"
                                                class="cursor-pointer">
                                                Recommended
                                            </x-dropdown-link>
                                        @endif

                                        @if (auth()->user()->usertype == 4 || (auth()->user()->usertype >= 8 && auth()->user()->usertype < 11))
                                            <x-dropdown-link wire:click.prevent="updateFilter('My Municipality')"
                                                class="cursor-pointer">
                                                My Municipality
                                            </x-dropdown-link>
                                        @endif
                                        <x-dropdown-link wire:click.prevent="updateFilter('All')"
                                            class="cursor-pointer">
                                            All
                                        </x-dropdown-link>


                                    </x-slot>
                                </x-dropdown>
                            @endif

                            <x-dropdown align="left" width="36">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5">
                                        <div>
                                            {{ $sort }}
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

                                    <x-dropdown-link wire:click.prevent="updateSort('Newest')" class="cursor-pointer">
                                        Newest
                                    </x-dropdown-link>
                                    <x-dropdown-link wire:click.prevent="updateSort('Oldest')" class="cursor-pointer">
                                        Oldest
                                    </x-dropdown-link>
                                    {{-- @if ($filter != 'Recommended')
                                        <x-dropdown-link wire:click.prevent="updateSort('Random')"
                                            class="cursor-pointer">
                                            Random
                                        </x-dropdown-link>
                                    @endif --}}


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
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-width="2"
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
                                    <tr wire:key='jobPosting-{{ $data->job_id }}'
                                        class="text-center hover:bg-gray-100 ">

                                        <td class="p-2 rounded-lg">

                                            <a wire:navigate
                                                href="{{ route('jobpost.show', ['id' => $data->job_id]) }}">
                                                <div class="flex flex-row w-full">
                                                    <div
                                                        class="flex flex-col justify-center items-center h-full  flex-shrink-0">
                                                        <img src="{{ file_exists(public_path('storage/' . $data->company->company_img)) ? asset('storage/' . $data->company->company_img) : asset('assets/img/PESO-Logo.png') }}"
                                                            alt="company-{{ $data->job_id }}"
                                                            class="w-24 h-24 sm:w-48 sm:h-48 bg-gray-300 rounded object-contain">
                                                    </div>
                                                    <div class="flex-col w-full ml-5 space-y-1 sm:space-y-8">
                                                        <div class="flex flex-col">
                                                            <div class="flex flex-col sm:flex-row  text-left">
                                                                <div class="flex flex-col sm:w-3/4">
                                                                    <h1
                                                                        class="text-blue-500 text-2xl sm:text-5xl font-semibold uppercase">
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
                                                                    {{ $data->company->business_Name }}</h2>
                                                            </div>
                                                            <h1
                                                                class="sm:hidden text-black text-sm text-left sm:text-center font-medium">
                                                                ₱{{ number_format($data->job_MinWage) }} -
                                                                ₱{{ number_format($data->job_MaxWage) }}</h1>
                                                        </div>

                                                        <div class="flex flex-col w-full">
                                                            <div class="flex flex-col sm:flex-row">
                                                                <div class="sm:w-1/5 text-left">

                                                                    <h3
                                                                        class="text-xs sm:text-sm text-blue-900 uppercase">
                                                                        <i class="fa-solid fa-location-dot"></i>
                                                                        {{ $data->job_Address }},
                                                                        {{ $data->barangay->barangay_Name }},
                                                                        {{ $data->barangay->municipality->municipality_Name }},
                                                                        {{ $data->barangay->municipality->province->province_Name }}
                                                                    </h3>
                                                                </div>
                                                                <div class="sm:w-1/5 text-left sm:text-center">
                                                                    <h3
                                                                        class="text-xs sm:text-sm text-blue-900 uppercase">
                                                                        <i class="fa-solid fa-graduation-cap"></i>
                                                                        {{ $eduLevels[$data->job_Edu] }}
                                                                    </h3>
                                                                </div>
                                                                <div class="sm:w-1/5 text-left sm:text-center">
                                                                    <h3
                                                                        class="text-xs sm:text-sm uppercase text-blue-900">
                                                                        <i class="fa-solid fa-briefcase uppercase"></i>
                                                                        {{ $data->job_Type == 1 ? 'Full Time' : 'Part Time' }}
                                                                    </h3>
                                                                </div>
                                                                <div class="sm:w-1/5 text-left sm:text-center">
                                                                    <h3
                                                                        class="text-xs sm:text-sm uppercase text-blue-900">
                                                                        <i class="fa-solid fa-calendar"></i>
                                                                        {{ $data->job_Duration->format('F j, Y') }}
                                                                    </h3>
                                                                </div>
                                                                <div class="sm:w-1/5 text-left sm:text-center">
                                                                    <h3
                                                                        class="text-xs sm:text-sm uppercase text-blue-900">
                                                                        <i class="fa-solid fa-building-ngo"></i>
                                                                        PESO
                                                                        {{ $data->peso->municipality->municipality_Name }}
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="h-px bg-gray-200 border-0 mt-3">
                                        </td>

                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{-- PAGINATION --}}
                    <div>
                        {{ $joblist->links('vendor.livewire.tailwind') }}
                    </div>


                </div>
            </div>



            {{-- SIDE BAR --}}
            @if (Auth::check() && (auth()->user()->usertype == 5 || auth()->user()->usertype == 6))
                <div class="col-span-4 sm:col-span-3">
                    <div class="bg-white shadow rounded-lg p-4">
                        <div class="p-3 text-gray-900 text-center w-full">
                            <h1 class="font-bold text-2xl">Notifications</h1>
                            <div class="overflow-y-auto max-h-[300px] sm:max-h-[900px]"> <!-- Set max height here -->
                                @if (empty($formattedNotifications))
                                    <div class="flex flex-col items-center justify-center  mt-12 mb-12">
                                        <div class="p-6 bg-gray-100 rounded-full">
                                            <svg class="w-24 h-24 text-black" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                                            </svg>

                                        </div>
                                        <p class="text-xl font-bold text-black text-center mt-2">
                                            No Notification Found!
                                        </p>
                                    </div>
                                @else
                                    <ul class="space-y-3 mt-5">
                                        @foreach ($formattedNotifications as $notification)
                                            <li>
                                                <div class="flex items-start space-x-4">
                                                    <span class="flex-shrink-0">
                                                        @if ($notification['type'] === 'partnership')
                                                            @if ($notification['status'] === 'APPROVED')
                                                                <div
                                                                    class="text-green-700 border border-green-700 bg-green-100 focus:outline-none font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                                                    <svg class="h-5 w-5"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                    </svg>

                                                                </div>
                                                            @elseif ($notification['status'] === 'CANCELLED' || $notification['status'] === 'REJECTED')
                                                                <div
                                                                    class="text-red-700 border border-red-700 bg-red-100 focus:outline-none font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                                                    <svg class="h-5 w-5"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                    </svg>


                                                                </div>
                                                            @endif
                                                        @else
                                                            <div
                                                                class="text-{{ $notification['type'] === 'applicant' ? 'blue' : 'green' }}-700 border border-{{ $notification['type'] === 'applicant' ? 'blue' : 'green' }}-700 bg-{{ $notification['type'] === 'applicant' ? 'blue' : 'green' }}-100 focus:outline-none font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                                                <svg class="h-5 w-5"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="{{ $notification['type'] === 'applicant' ? 'M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75' : 'M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z' }}" />
                                                                </svg>
                                                            </div>
                                                        @endif

                                                    </span>
                                                    <div class="flex flex-col">
                                                        <span class="flex-1">
                                                            <div class="text-left text-md font-medium">
                                                                {{ $notification['message'] }}
                                                            </div>
                                                        </span>
                                                        <span
                                                            class="text-left text-xs text-grey-400">{{ \Carbon\Carbon::parse($notification['responded_at'])->format('F j, Y g:i A') }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach

                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            @else
                <div class="col-span-4 sm:col-span-3">
                    <div class="flex flex-col gap-4">

                        <div class="bg-white shadow-md shadow-md rounded-md p-4">
                            <h1 class="font-bold text-2xl text-center mb-4">TOP JOB TAGS</h1>
                            <ul>
                                @foreach ($topJobTags as $index => $jobTag)
                                    <li class="flex items-center justify-between py-2 border-b border-gray-300">
                                        <div class="flex items-center">
                                            <span class="text-lg font-semibold mr-4">{{ $index + 1 }}</span>
                                            <span
                                                wire:click.prevent="mountTopJobTags('{{ $jobTag->position_Title }}')"
                                                class="text-gray-800 hover:text-blue-500 cursor-pointer font-semibold  break-all"
                                                style="max-width: 200px;">
                                                {{ $jobTag->position_Title }}
                                            </span>
                                        </div>
                                        <span
                                            class="text-green-500 font-semibold ml-4">{{ $jobTag->active_job_posting_count }}
                                            Active Jobs</span>
                                    </li>
                                @endforeach
                            </ul>

                            <h1 class="font-bold text-2xl text-center mt-4 mb-4">TOP JOB INDUSTRY</h1>
                            <ul>
                                @foreach ($topJobIndustries as $index => $jobTag)
                                    <li class="flex items-center justify-between py-2 border-b border-gray-300">
                                        <div class="flex items-center">
                                            <span class="text-lg font-semibold mr-4">{{ $index + 1 }}</span>
                                            <span
                                                wire:click.prevent="mountTopJobTags('{{ $jobTag->industry_Title }}')"
                                                class="text-gray-800 hover:text-blue-500 cursor-pointer font-semibold break-all"
                                                style="max-width: 200px;">
                                                {{ $jobTag->industry_Title }}
                                            </span>
                                        </div>
                                        <span
                                            class="text-green-500 font-semibold ml-4">{{ $jobTag->active_job_posting_count }}
                                            Active Jobs</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>




                        <div class="text-gray-900 text-center w-full">
                            <h1 class="font-bold text-2xl">ANNOUNCEMENTS</h1>
                            <div class = "flex flex-col items-center justify-center mt-4">
                                @if ($announcements->isEmpty())
                                    <div class="flex flex-col items-center justify-center mt-12 mb-12">
                                        <div
                                            class="p-6 bg-white rounded-full my-12 transition-transform transform hover:scale-110">
                                            <svg class="w-36 h-36 text-black" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 0 1 0 3.46" />
                                            </svg>


                                        </div>
                                        <p class="text-xl font-bold text-black text-center mt-2">
                                            No New Announcements!
                                        </p>
                                    </div>
                                @else
                                    <div
                                        class="mt-2 flex flex-row sm:flex-col  gap-4 overflow-x-auto sm:overflow-visible no-scrollbar">
                                        @foreach ($announcements as $data)
                                            <a wire:navigate
                                                href="{{ route('announcement.show', ['id' => $data->announcement_id]) }}"
                                                class="flex-shrink-0 w-full sm:w-full">
                                                <div
                                                    class="relative flex flex-col w-full max-w-sm h-96 overflow-hidden rounded-lg bg-white text-gray-700 shadow-md transition-transform transform hover:scale-105 hover:shadow-lg">
                                                    <div class="relative w-full h-56 overflow-hidden rounded-t-lg">
                                                        <img src="{{ file_exists(public_path('storage/' . $data->announcement_pubmat)) ? asset('storage/' . $data->announcement_pubmat) : asset('assets/img/PESO-Logo.png') }}"
                                                            alt="announcement-{{ $data->announcement_id }}"
                                                            class="object-cover w-full h-full rounded-t-lg transition-transform duration-300 ease-in-out hover:scale-110" />


                                                    </div>
                                                    <div class="flex flex-col p-4  flex-grow">
                                                        <h4
                                                            class="text-lg font-semibold text-blue-gray-900 transition-colors duration-300 ease-in-out hover:text-blue-700 mb-2">
                                                            {{ Str::limit(strip_tags($data->announcement_Title), 80, '...') }}
                                                        </h4>
                                                        <div
                                                            class="flex items-end justify-between text-xs font-normal text-gray-600 mt-auto">
                                                            <p class="truncate">PESO
                                                                {{ $data->peso->municipality->municipality_Name }}</p>
                                                            <p class="truncate">
                                                                {{ $data->created_at->format('F j, Y') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


            @endif


        </div>

    </div>

    <div id="sticky-banner" tabindex="-1"
        class="fixed bottom-0 start-0 z-50 flex justify-between w-full p-4 sm:p-8 border-b border-gray-200 bg-blue-500">
        <div class="flex items-center mx-auto">
            <p class="flex items-center text-sm sm:text-xl text-justify text-white font-bold">

                </span>
                <span class="font-bold uppercase">Please note: The system is currently in a testing phase. Postings are
                    for testing purposes only and do not reflect actual opportunities.</span>
            </p>
        </div>
        <div class="flex items-center ml-4">
            <button data-dismiss-target="#sticky-banner" type="button"
                class="flex-shrink-0 inline-flex justify-center w-7 h-7 items-center text-black hover:bg-gray-100 hover:text-gray-900 rounded-lg text-sm p-1.5">
                <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close banner</span>
            </button>
        </div>
    </div>

    <x-modal name="industry-filter-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Filter Industry') }}
            </h2>
            <hr>

            <div class="relative mt-4">
                <div class="flex flex-col sm:flex-row p-1 sm:justify-between gap-2 space-y-4 sm:space-y-0 pb-4">

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

                        {{-- LICENSE SEARCH --}}
                        <input wire:model.live='searchIndustry' type="search"
                            class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full sm:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search industry">
                    </div>

                    {{-- WEB BUTTON --}}
                </div>

                {{-- LICENSE MODAL --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 text-center">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                            <tr>
                                <th scope="col" class="px-6 py-3 w-1/4">

                                </th>
                                <th scope="col" class="px-6 py-3 uppercase">
                                    Job Industry
                                </th>
                                <th scope="col" class="px-6 py-3 uppercase">
                                    Code
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($industry->isEmpty())
                                <tr>
                                    <td colspan="3">
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
                                                No Record Found!
                                            </p>
                                        </div>

                                    </td>
                                </tr>
                            @else
                                @foreach ($industry as $data)
                                    <tr wire:key='industry-{{ $data->industry_id }}'
                                        class="bg-white border-b hover:bg-gray-50">
                                        <td class="px-6 py-4 text-center">

                                            <label class="relative flex items-center p-3 rounded-full cursor-pointer"
                                                for="agreeBox">
                                                <input wire:model="mountIndustryFilter" type="checkbox"
                                                    id="industry-{{ $data->industry_id }}"
                                                    value="{{ $data->industry_id }}"
                                                    class="h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all checked:border-blue-900 checked:bg-blue-600" />
                                                <span
                                                    class="absolute text-white top-2/4 left-2/4 transform -translate-x-2/4 -translate-y-2/4 opacity-0 peer-checked:opacity-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                                        viewBox="0 0 20 20" fill="currentColor" stroke="currentColor"
                                                        stroke-width="1">
                                                        <path fill-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                            </label>

                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="font-semibold text-base uppercase">{{ $data->industry_Title }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="font-semibold text-base uppercase">{{ $data->industry_Code }}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>


            {{-- PAGINATION --}}
            <div class="mt-4">
                {{ $industry->links('vendor.livewire.tailwind') }}
            </div>


            <div class="mt-6 flex justify-between">
                <x-secondary-button type="button" x-data=""
                    x-on:click="$dispatch('close-modal', 'industry-filter-modal')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <div>
                    <x-danger-button wire:click.prevent="resetIndustry">
                        {{ __('Reset') }}
                    </x-danger-button>
                    <x-primary-button wire:loading.attr="disabled" wire:click.prevent="mountIndustry" class="ms-3"
                        type="button">
                        {{ __('Confirm') }}
                        <div wire:loading.delay.long wire:target="mountIndustry" role="status">
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

    <x-modal name="job-tag-filter-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Filter Job Tags') }}
            </h2>
            <hr>

            <div class="relative mt-4">
                <div class="flex flex-col sm:flex-row p-1 sm:justify-between gap-2 space-y-4 sm:space-y-0 pb-4">
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

                        <input type="search" wire:model.live='searchTags'
                            class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full sm:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search Job Position">
                    </div>


                </div>
                <div class="overflow-x-auto ">

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 text-center">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                            <tr>
                                <th scope="col" class="px-6 py-3 w-1/4">

                                </th>
                                <th scope="col" class="px-6 py-3 uppercase">
                                    Job Position
                                </th>
                                <th scope="col" class="px-6 py-3 uppercase">
                                    Code
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($jobposition->isEmpty())
                                <tr>
                                    <td colspan="3">
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
                                                No Record Found!
                                            </p>
                                        </div>

                                    </td>
                                </tr>
                            @else
                                @foreach ($jobposition as $data)
                                    <tr wire:key='position-{{ $data->position_id }}'
                                        class="bg-white border-b hover:bg-gray-50 cursor-pointer"
                                        onclick="document.getElementById('jobTags-{{ $data->position_id }}').click();">
                                        <!-- Adding onclick event to the row -->
                                        <td class="px-6 py-4 text-center">
                                            <label class="relative flex items-center p-3 rounded-full cursor-pointer"
                                                for="job-{{ $data->position_id }}">
                                                <input wire:model="mountJobTagsFilter" type="checkbox"
                                                    id="job-{{ $data->position_id }}"
                                                    value="{{ $data->position_id }}"
                                                    class="h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all checked:border-blue-900 checked:bg-blue-600" />
                                                <span
                                                    class="absolute text-white top-2/4 left-2/4 transform -translate-x-2/4 -translate-y-2/4 opacity-0 peer-checked:opacity-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                                        viewBox="0 0 20 20" fill="currentColor" stroke="currentColor"
                                                        stroke-width="1">
                                                        <path fill-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                            </label>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="font-semibold text-base uppercase">
                                                {{ $data->position_Title }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="font-semibold text-base uppercase">{{ $data->position_Code }}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- PAGINATION --}}
            <div class="mt-4">
                {{ $jobposition->links('vendor.livewire.tailwind') }}
            </div>

            <div class="mt-6 flex justify-between">
                <x-secondary-button type="button" x-data=""
                    x-on:click="$dispatch('close-modal', 'job-tag-filter-modal')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <div>
                    <x-danger-button wire:click.prevent="resetJobTags">
                        {{ __('Reset') }}
                    </x-danger-button>
                    <x-primary-button wire:loading.attr="disabled" wire:click.prevent="mountJobTags" class="ms-3"
                        type="button">
                        {{ __('Confirm') }}
                        <div wire:loading.delay.long wire:target="mountJobTags" role="status">
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
