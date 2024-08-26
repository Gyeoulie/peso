<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16" x-data="{
    openTab: 1,
    activeTab: 'text-blue-600 border-b-2 border-blue-600  active',
    inactiveTab: 'text-gray-500 hover:text-gray-600 ',
}">

    <div class="border-b mb-5 flex justify-between text-sm">
        <div class="flex flex-row gap-6">
            <button x-on:click="openTab = 1" :class="openTab === 1 ? activeTab : inactiveTab"
                class="flex items-center pb-2 pr-2">
                <svg class="h-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                </svg>

                <span class="font-semibold inline-block">Trainings List</span>
            </button>
            <button x-on:click="openTab = 2" :class="openTab === 2 ? activeTab : inactiveTab"
                class="flex items-center pb-2 pr-2 ">
                <svg class="h-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                </svg>

                <span class="font-semibold inline-block">My Trainings</span>
            </button>
        </div>

    </div>
    <div
        class="flex flex-col sm:flex-row p-1 sm:items-center sm:justify-between flex-column flex-wrap sm:flex-row gap-2 space-y-4 sm:space-y-0 pb-4">

        <label for="table-search" class="sr-only">Search</label>

        <div class="relative w-full sm:w-auto">

            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            {{-- SEARCH --}}
            <input wire:model.live.prevent='search' type="text" id="table-search-users"
                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full sm:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Search for job posting">
        </div>

        {{-- FILTER BUTTON --}}
        <div class="flex flex-row mr-3 gap-3">



            <x-dropdown align="left" width="36">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5">
                        <div>
                            Sort by Date
                        </div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
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


                </x-slot>
            </x-dropdown>


        </div>


    </div>

    <div class="grid grid-cols-4 sm:grid-cols-12 gap-10" x-show="openTab === 1"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100" x-cloak>

        <!-- CARD 1 -->

        @foreach ($programList as $data)
            <a href="{{ route('training.show', ['id' => $data->program_id]) }}"
                class="block col-span-4 rounded-lg overflow-hidden shadow-xl sm:hover:scale-105 sm:transition-transform">
                <div>
                    <div class="relative">
                        <img class="w-full" src="{{ asset('storage/' . $data->program_pubmat) }}"
                            alt="prog-{{ $data->program_id }}">
                        <div
                            class="text-xs absolute top-0 right-0 bg-indigo-600 px-4 py-2 text-white mt-3 mr-3 transition duration-500 ease-in-out">
                            {{ $data->program_Type }}
                        </div>
                    </div>
                    <div class="px-6 py-4 mb-auto">
                        <span
                            class="font-bold text-2xl text-blue-500 inline-block hover:text-blue-800 transition duration-500 ease-in-out mb-2">
                            {{ $data->program_Title }}
                        </span>
                        <p class="text-gray-500 text-sm">
                            {!! \Illuminate\Support\Str::limit(strip_tags($data->program_Description), 150, '...') !!}
                        </p>
                    </div>
                    <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">
                        <span class="py-1 text-xs font-regular text-gray-900 flex flex-row items-center">
                            <svg height="13px" width="13px" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                xml:space="preserve">
                                <g>
                                    <g>
                                        <path
                                            d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <span class="ml-1">{{ $data->created_at->format('F j, Y g:i A') }}</span>
                        </span>
                        <span class="py-1 text-xs font-regular text-gray-900 flex flex-row items-center">
                            <svg class="h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                </path>
                            </svg>
                            <span class="ml-1">PESO {{ $data->municipality->municipality_Name }}</span>
                        </span>
                    </div>
                </div>
            </a>
        @endforeach




    </div>
    <div class="flex" x-show="openTab === 2" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-cloak>

        <div>
            <div class="table-container overflow-visible">
                <div class="max-w-7xl mx-auto overflow-visible">
                    <div class="bg-white overflow-hidden sm:rounded-lg p-2 overflow-visible">
                        <div class="relative">
                            <div
                                class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-2 md:space-y-0 pb-4 bg-white md:px-4 md:pt-4 overflow-visible ">

                                <label for="table-search" class="sr-only">Search</label>
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input wire:model.live.prevent='search' type="text" id="table-search-users"
                                        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Search for job posting">
                                </div>

                                {{-- SORT --}}
                                <x-dropdown align="left" width="36">
                                    <x-slot name="trigger">
                                        <button
                                            class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5">
                                            <div>
                                                {{-- {{ $sortDate === 'ASC' ? 'Newest' : ($sortDate == 'DESC' ? 'Oldest' : 'Sort by Date') }} --}}
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
                                            max-w-[300px] bg-white
                                        </x-slot>

                                        <x-dropdown-link class="cursor-pointer"
                                            wire:click.prevent="updateSort('ASC')">
                                            Newest
                                        </x-dropdown-link>

                                        <!-- Authentication -->
                                        <x-dropdown-link class="cursor-pointer"
                                            wire:click.prevent="updateSort('DESC')">
                                            Oldest
                                        </x-dropdown-link>
                                    </x-slot>
                                </x-dropdown>

                                <div class="overflow-x-auto ">
                                    <table
                                        class="w-full text-sm text-left rtl:text-right text-gray-500 lg:table-fixed">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 md:w-96">
                                                    Even Title
                                                </th>
                                                <th scope="col" class="px-6 py-3 md:w-96">
                                                    Registered Date
                                                </th>
                                                <th scope="col" class="px-6 py-3 w-md">
                                                    Status
                                                </th>
                                                <th scope="col" class="px-6 py-3 w-md">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($programHistory->isEmpty())
                                                <tr>
                                                    <td colspan="4">
                                                        <div
                                                            class="flex flex-col items-center justify-center mt-24 mb-24">
                                                            <div class="p-6 bg-gray-100 rounded-full">
                                                                <svg class="w-24 h-24 text-black" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none"
                                                                    viewBox="0 0 24 24">
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
                                                @foreach ($programHistory as $data)
                                                    <tr wire:key='progReg-{{ $data->progra_reg_id }}'
                                                        class="bg-white border-b ">
                                                        <th scope="row"
                                                            class="flex items-center px-6 py-4 text-gray-900 ">
                                                            <div class="ps-3">
                                                                <div class="text-base font-semibold">
                                                                    {{ $data->programs->program_Title }}
                                                                </div>
                                                                <div class="font-normal text-gray-500 text-sm">
                                                                    {{ $data->programs->program_Location }}
                                                                </div>
                                                            </div>
                                                        </th>

                                                        <td class="px-6 py-4">
                                                            <div class="font-normal text-gray-500 text-sm">
                                                                {{ $data->created_at->format('F j, Y') }}
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <div class="flex items-center">
                                                                @if ($data->program_reg_Status == 'REGISTERED')
                                                                    <div
                                                                        class="h-2.5 w-2.5 rounded-full bg-green-500 me-2 uppercase">
                                                                    </div> REGISTERED
                                                                @elseif ($data->program_reg_Status == 'COMPLETED')
                                                                    <div
                                                                        class="h-2.5 w-2.5 rounded-full bg-yellow-500 me-2 uppercase">
                                                                    </div> COMPLETED
                                                                @else
                                                                    <div
                                                                        class="h-2.5 w-2.5 rounded-full bg-red-500 me-2 uppercase">
                                                                    </div>
                                                                    {{ $data->program_reg_Status }}
                                                                @endif
                                                            </div>
                                                        </td>



                                                        <td class="px-6 py-4">
                                                            <div class="flex flex-row  gap-5">
                                                                <div x-data="{ tooltip: 'View Training' }">
                                                                    <a wire:navigate
                                                                        href="{{ route('training.show', ['id' => $data->programs->program_id]) }}"
                                                                        x-tooltip="tooltip" type="button"
                                                                        class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                                                        <svg class="h-5 w-5"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 24 24" fill="currentColor">
                                                                            <path
                                                                                d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                                            <path fill-rule="evenodd"
                                                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                                                clip-rule="evenodd" />
                                                                        </svg>
                                                                    </a>
                                                                </div>


                                                                <div x-data="{ tooltip: 'View Ticket' }">
                                                                    <button x-tooltip="tooltip" type="button"
                                                                        class="text-cyan-700 border border-cyan-700 hover:bg-cyan-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                                                        <svg class="w-5 h-5 "
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke-width="1.5" stroke="currentColor">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                                                        </svg>

                                                                    </button>
                                                                </div>


                                                            </div>
                                                        </td>


                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                {{-- navbar --}}
                                <div class="mt-2 p-4">
                                    {{ $programHistory->links('vendor.livewire.tailwind') }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>






    </div>

</div>
