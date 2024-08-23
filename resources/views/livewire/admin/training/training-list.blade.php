<div class="container mx-auto py-8">
    <div class="grid grid-cols-4 sm:grid-cols-12 gap-4 p-3 sm:p-0">

        <div class="col-span-4 sm:col-span-12">
            <h1 class="text-2xl font-bold">Trainings / Training List</h1>
        </div>

        <div class="col-span-4 sm:col-span-12">
            <div class="bg-white shadow rounded-lg p-6  overflow-visible" x-data="{
                openTab: 1,
                activeClasses: 'text-gray-900 bg-gray-400 active',
                inactiveClasses: 'bg-gray-100 hover:text-gray-700 hover:bg-gray-50'
            }">


                <div class="relative p-1 overvlow-visible">
                    <div class="sm:hidden">
                        <label for="tabs" class="sr-only">Select your country</label>
                        <select id="tabs"
                            class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option wire:click.prevent='updateFilter("ALL")'>All</option>
                            <option wire:click.prevent='updateFilter("ACTIVE")'>Active</option>
                            <option wire:click.prevent='updateFilter("OTHERS")'>Others </option>
                        </select>
                    </div>
                    <ul class="hidden text-sm font-medium text-center text-gray-500 rounded-lg shadow sm:flex mb-3">
                        <li class="w-full focus-within:z-10">
                            <button wire:click.prevent='updateFilter("")' @click="openTab = 1"
                                :class="openTab === 1 ? activeClasses : inactiveClasses"
                                class="inline-block w-full p-4 border-r border-gray-200 focus:ring-1 focus:ring-gray-300 focus:outline-none rounded-s-lg"
                                aria-current="page">All </button>
                        </li>
                        <li wire:click.prevent='updateFilter("ACTIVE")' class="w-full focus-within:z-10">
                            <button @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"
                                class="inline-block w-full p-4 border-r border-gray-200 focus:ring-1 focus:ring-gray-300 focus:outline-none">Active
                            </button>
                        </li>
                        <li wire:click.prevent='updateFilter("OTHERS")' class="w-full focus-within:z-10">
                            <button @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses"
                                class="inline-block w-full p-4 border-r border-gray-200 focus:ring-1 focus:ring-gray-300 focus:outline-none rounded-e-lg">Others
                            </button>
                        </li>

                    </ul>


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
                                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-96 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search">
                        </div>

                        <div class="flex flex-row gap-2">
                            <x-dropdown align="left" width="36">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5">
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
                                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5">
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
                                    <th scope="col" class="px-6 py-3 w-1/4">
                                        Program Title
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Program Type
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Program Registrants
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Date Posted
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Registration Deadline
                                    </th>
                                    <th scope="col" class="px-6 py-3">
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
                                        <tr class="bg-white border-b hover:bg-gray-50">
                                            <th scope="row"
                                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                                <img class="w-10 h-10 rounded-full"
                                                    src="{{ asset('storage/' . $data->program_pubmat) }}"
                                                    alt="Jese image">
                                                <div class="ps-3 text-wrap">
                                                    <div class="text-base font-semibold">{{ $data->program_Title }}
                                                    </div>
                                                    <div class="font-normal text-gray-500 text-sm uppercase">
                                                        {{ $data->program_Host }}
                                                    </div>
                                                </div>

                                            </th>
                                            <td class="px-6 py-4">
                                                <div class="text-base font-semibold">
                                                    {{ $data->program_Type }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $data->program_reg }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <div class="text-base font-semibold">
                                                    {{ $data->created_at->format(' g:i A') }}
                                                </div>
                                                <div class="text-base font-semibold">
                                                    {{ $data->created_at->format('F j, Y') }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    <div class="text-base font-semibold">
                                                        {{ $data->program_Deadline->format('F j, Y') }}
                                                    </div>


                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    @if ($data->program_Status === 'ACTIVE')
                                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div>
                                                        ACTIVE
                                                    @elseif ($data->program_Status === 'COMPLETED')
                                                        <div class="h-2.5 w-2.5 rounded-full bg-blue-500 me-2"></div>
                                                        COMPLETED
                                                    @elseif($data->program_Status === 'CANCELED')
                                                        <div class="h-2.5 w-2.5 rounded-full bg-yellow-500 me-2"></div>
                                                        CANCELLED
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex flex-row  gap-5">
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

                                                    <div x-data="{ tooltip: 'View Event Tool' }">
                                                        <a wire:navigate {{-- href="{{ route('admin.jobpost.applicants', ['id' => $data->job_id]) }}" --}} x-tooltip="tooltip"
                                                            type="button"
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
