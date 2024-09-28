<div class="container mx-auto py-8">
    <div class="grid grid-cols-4 sm:grid-cols-12 gap-4 p-3 sm:p-0">

        <div class="col-span-4 sm:col-span-12">
            <h1 class="text-2xl font-bold">Trainings / Training List</h1>
        </div>

        <div class="col-span-4 sm:col-span-12">
            <div class="bg-white shadow rounded-lg p-6 overflow-visible" x-data="{
                openTab: @entangle('filter').defer || '', // Default value to 'ALL'
                activeClasses: 'text-gray-900 bg-gray-400 active',
                inactiveClasses: 'bg-gray-100 hover:text-gray-700 hover:bg-gray-50',
                changeFilter(value) {
                    this.openTab = value;
                    this.$wire.call('updateFilter', value); // Update Livewire filter property
                },
                init() {
                    this.$watch('openTab', value => {
                        this.changeFilter(value); // Ensure Livewire is updated when openTab changes
                    });
                }
            }" x-init="init()">

                <div class="relative p-1 overflow-visible">
                    <!-- Mobile Dropdown -->
                    <div class="sm:hidden">
                        <label for="tabs" class="sr-only">Select Filter</label>
                        <select id="tabs"
                            class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            x-model="openTab" @change="changeFilter($event.target.value)">
                            <option value="">All</option>
                            <option value="ACTIVE">Active</option>
                            <option value="OTHERS">Others</option>
                        </select>
                    </div>

                    <!-- Desktop Tabs -->
                    <ul class="hidden text-sm font-medium text-center text-gray-500 rounded-lg shadow sm:flex mb-3">
                        <li class="w-full focus-within:z-10">
                            <button @click="changeFilter('')"
                                :class="openTab === '' ? activeClasses : inactiveClasses"
                                class="inline-block w-full p-4 border-r border-gray-200 focus:ring-1 focus:ring-gray-300 focus:outline-none rounded-s-lg"
                                aria-current="page">All</button>
                        </li>
                        <li class="w-full focus-within:z-10">
                            <button @click="changeFilter('ACTIVE')"
                                :class="openTab === 'ACTIVE' ? activeClasses : inactiveClasses"
                                class="inline-block w-full p-4 border-r border-gray-200 focus:ring-1 focus:ring-gray-300 focus:outline-none">Active</button>
                        </li>
                        <li class="w-full focus-within:z-10">
                            <button @click="changeFilter('OTHERS')"
                                :class="openTab === 'OTHERS' ? activeClasses : inactiveClasses"
                                class="inline-block w-full p-4 border-r border-gray-200 focus:ring-1 focus:ring-gray-300 focus:outline-none rounded-e-lg">Others</button>
                        </li>
                    </ul>


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

                            {{-- SEARCH --}}
                            <input wire:model.live='search' type="search" id="table-search-users"
                                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full sm:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search">
                        </div>

                        <div class="flex flex-wrap mr-3 gap-2">
                            <div x-data="{ tooltip: 'Export to Excel' }">
                                <button x-tooltip='tooltip' type="button" wire:click.prevent='exportData'
                                    class="flex items-center py-1.5 px-4 text-xs sm:text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                    <span class="mr-2">Export</span>
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                </button>

                            </div>

                            <x-dropdown align="left" width="36">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-xs sm:text-sm px-3 py-1.5">
                                        <div>
                                            {{ $sortType ?: 'Sort By Type' }}
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

                                    <x-dropdown-link wire:click.prevent="updateSort('', 1)" class="cursor-pointer">
                                        All
                                    </x-dropdown-link>
                                    <x-dropdown-link wire:click.prevent="updateSort('PESO Hosted', 1)"
                                        class="cursor-pointer">
                                        PESO Hosted
                                    </x-dropdown-link>
                                    <x-dropdown-link wire:click.prevent="updateSort('TESDA Scholarship', 1)"
                                        class="cursor-pointer">
                                        TESDA Scholarship
                                    </x-dropdown-link>

                                </x-slot>
                            </x-dropdown>

                            <x-dropdown align="left" width="36">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-xs sm:text-sm px-3 py-1.5">
                                        <div>
                                            @if (empty($sortDate))
                                                Sort By Date
                                            @elseif($sortDate === 'ASC')
                                                Newest
                                            @elseif($sortDate === 'DESC')
                                                Oldest
                                            @endif
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

                                    <x-dropdown-link wire:click.prevent="updateSort('ASC', 2)" class="cursor-pointer">
                                        Newest
                                    </x-dropdown-link>
                                    <x-dropdown-link wire:click.prevent="updateSort('DESC', 2)" class="cursor-pointer">
                                        Oldest
                                    </x-dropdown-link>

                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>

                    <div class="class flex overflow-x-auto">
                        {{-- TABLE --}}
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                                <tr>
                                    <th scope="col" class="px-6 py-3 ">
                                        Program Title
                                    </th>
                                    <th scope="col" class="px-6 py-3 hidden sm:table-cell">
                                        Program Type
                                    </th>
                                    <th scope="col" class="px-6 py-3 hidden sm:table-cell">
                                        Program Registrants
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center hidden sm:table-cell">
                                        Date Posted
                                    </th>
                                    <th scope="col" class="px-6 py-3 hidden sm:table-cell">
                                        Registration Deadline
                                    </th>
                                    <th scope="col" class="px-6 py-3 hidden sm:table-cell">
                                        Program Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($programList->isEmpty())
                                    <tr>
                                        <td colspan="7">
                                            <div class="flex flex-col items-center justify-center mt-24 mb-24">
                                                <div class="p-6 bg-gray-100 rounded-full">
                                                    <svg class="w-24 h-24 text-black" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
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
                                    @foreach ($programList as $data)
                                        <tr wire:key='prog-{{ $data->program_id }}'
                                            class="bg-white border-b hover:bg-gray-50">
                                            <th scope="row"
                                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                                <img class="w-10 h-10 rounded-full object-cover"
                                                    src="{{ file_exists(public_path('storage/' . $data->program_pubmat)) ? asset('storage/' . $data->program_pubmat) : asset('assets/img/PESO-Logo.png') }}"
                                                    alt="pubmat-{{ $data->program_id }}">
                                                <div class="ps-3 text-wrap">
                                                    <div class="text-base font-semibold">{{ $data->program_Title }}
                                                    </div>
                                                    <div
                                                        class="font-normal text-gray-500 text-sm uppercase hidden sm:block">
                                                        {{ $data->program_Host }}
                                                    </div>

                                                    <!-- Extra information for mobile screens -->
                                                    <div class="sm:hidden text-gray-500 text-sm">
                                                        {{ $data->program_Host }}
                                                    </div>
                                                    <div class="sm:hidden text-gray-500 text-sm">
                                                        Registrants: <span class="text-black font-bold">{{ $data->program_reg_count }}</span>
                                                    </div>
                                                    <div class="sm:hidden text-gray-500 text-sm">
                                                        Deadline: <span class="text-black font-bold">
                                                            {{ $data->program_Deadline->format('F j, Y') }}</span>
                                                    </div>
                                                    <div class="sm:hidden text-gray-500 text-sm">
                                                        <div class="flex items-center">
                                                            <div
                                                                class="h-2.5 w-2.5 rounded-full {{ $data->program_Status === 'ACTIVE' ? 'bg-green-500' : ($data->program_Status === 'CLOSED' ? 'bg-cyan-500' : ($data->program_Status === 'COMPLETED' ? 'bg-blue-500' : 'bg-red-500')) }} me-2">
                                                            </div>
                                                            {{ $data->program_Status }}
                                                        </div>
                                                    </div>

                                                </div>
                                            </th>
                                            <td class="px-6 py-4 hidden sm:table-cell">
                                                <div class="text-base font-semibold">{{ $data->program_Type }}</div>
                                            </td>
                                            <td class="px-6 py-4 hidden sm:table-cell">{{ $data->program_reg_count }}
                                            </td>
                                            <td class="px-6 py-4 text-center hidden sm:table-cell">
                                                <div class="text-base font-semibold">
                                                    {{ $data->created_at->format('g:i A') }}</div>
                                                <div class="text-base font-semibold">
                                                    {{ $data->created_at->format('F j, Y') }}</div>
                                            </td>
                                            <td class="px-6 py-4 hidden sm:table-cell">
                                                <div class="text-base font-semibold">
                                                    {{ $data->program_Deadline->format('F j, Y') }}</div>
                                            </td>
                                            <td class="px-6 py-4 hidden sm:table-cell">
                                                <div class="flex items-center">
                                                    <div
                                                        class="h-2.5 w-2.5 rounded-full {{ $data->program_Status === 'ACTIVE' ? 'bg-green-500' : ($data->program_Status === 'CLOSED' ? 'bg-cyan-500' : ($data->program_Status === 'COMPLETED' ? 'bg-blue-500' : 'bg-red-500')) }} me-2">
                                                    </div>
                                                    {{ $data->program_Status }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex flex-row gap-5">
                                                    <div x-data="{ tooltip: 'View Program Information' }">
                                                        <a wire:navigate
                                                            href="{{ route('admin-view-training', ['id' => $data->program_id]) }}"
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
                                                    <div x-data="{ tooltip: 'View Registrants' }">
                                                        <a wire:navigate
                                                            href="{{ route('admin-registrants-training', ['id' => $data->program_id]) }}"
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
                    {{ $programList->links('vendor.livewire.tailwind') }}

                </div>

            </div>



        </div>

    </div>

</div>
