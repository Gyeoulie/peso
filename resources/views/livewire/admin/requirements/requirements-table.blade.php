<div class="bg-white shadow rounded-lg p-6">

    {{-- TITLE --}}
    <div class="flex items-center mb-2">
        <h1 class="text-xl font-bold">Requirement List</h1>
    </div>

    <div class="relative overflow-x-auto">

        <div class="flex p-1 items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4">

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
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search">
            </div>
            {{-- ADD BUTTON --}}
            <div class="mr-3">


                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5">
                            <div>{{ $filter == 1 ? 'Active' : ($filter == 2 ? 'Disabled' : 'All') }}</div>

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

                        <x-dropdown-link href="#" wire:click="updateFilter('')"
                            class="block px-4 py-2 hover:bg-gray-100">All</x-dropdown-link>
                        <hr>
                        <!-- Authentication -->
                        <x-dropdown-link href="#" wire:click="updateFilter('1')"
                            class="block px-4 py-2 hover:bg-gray-100">Active</x-dropdown-link>

                        <x-dropdown-link href="#" wire:click="updateFilter('2')"
                            class="block px-4 py-2 hover:bg-gray-100">Disabled</x-dropdown-link>

                        </form>
                    </x-slot>
                </x-dropdown>

            </div>



        </div>

        {{-- REQUIREMENT TABLE --}}
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                <tr>
                    <th scope="col" class="px-6 py-3 w-1/4">
                        Requirement Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date Created
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date Updated
                    </th>
                    <th scope="col" class="px-6 py-3">

                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($requirements->isEmpty())
                    <tr>
                        <td colspan="5">
                            <div class="flex flex-col items-center justify-center mt-24 mb-24">
                                <div class="p-6 bg-gray-100 rounded-full">
                                    <svg class="w-24 h-24 text-black" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
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
                    @foreach ($requirements as $data)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="text-gray-900 whitespace-nowrap">

                                <div class="ps-3 uppercase">
                                    <div class="text-base font-semibold">{{ $data->requirement_Title }}</div>
                                </div>

                            </th>
                            <td class="px-6 py-4">
                                <div class="flex items-center uppercase">
                                    @if ($data->requirement_Status == 1)
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> ACTIVE
                                    @else
                                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> DISABLED
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-base font-light uppercase">{{ $data->created_at->format('h:i A') }}
                                </div>
                                <div class="text-base font-medium uppercase">{{ $data->created_at->format('F d Y') }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-base font-light uppercase">{{ $data->updated_at->format('h:i A') }}
                                </div>
                                <div class="text-base font-medium uppercase">{{ $data->updated_at->format('F d Y') }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-row items-center justify-center gap-6">
                                    <button wire:click.prevent='editReq({{ $data->requirement_id }})' type="button">
                                        <svg class="w-6 h-6 text-blue-600" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">

                                            <path fill-rule="evenodd"
                                                d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                                                clip-rule="evenodd" />
                                            <path fill-rule="evenodd"
                                                d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>

                                    <svg class="w-6 h-6 text-gray-800 text-red-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                    </svg>
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
        {{ $requirements->links('vendor.livewire.tailwind') }}
    </div>

</div>
