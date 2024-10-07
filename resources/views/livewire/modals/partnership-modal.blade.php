<x-modal wire:poll name="partnership-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Choose a PESO Municipality') }}
        </h2>
        <hr>

        <div class="relative mt-4">
            <div
                class="flex flex-col lg:flex-row p-1 lg:justify-between gap-2 space-y-4 lg:space-y-0 pb-4 overflow-visible">

                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>

                    {{-- LICENSE SEARCH --}}
                    <input wire:model.live='search' type="search" id="table-search-users"
                        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full lg:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Search">
                </div>

                {{-- WEB BUTTON --}}
            </div>

            {{-- LICENSE MODAL --}}
            <div class="overflow-x-auto ">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 text-center">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                        <tr>
                            <th scope="col" class="px-6 py-3 w-1/4">

                            </th>
                            <th scope="col" class="px-6 py-3 uppercase">
                                PESO
                            </th>
                            <th scope="col" class="px-6 py-3 uppercase">
                                Province
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($PESO->isEmpty())
                            <tr>
                                <td colspan="3">
                                    <div class="flex flex-col items-center justify-center mt-20 mb-20">
                                        <div class="p-6 bg-gray-100 rounded-full">
                                            <svg class="w-24 h-24 text-black" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
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
                            @foreach ($PESO as $data)
                                <tr wire:key='PESO-{{ $data->peso_id }}' class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 text-center">

                                        <button wire:loading.attr="disabled"
                                            wire:click.prevent='pesoSelect({{ $data->peso_id }})'
                                            class="text-blue-500 hover:underline">Select</button>

                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-base uppercase">
                                            PESO {{ $data->municipality->municipality_Name }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-base uppercase">
                                            {{ $data->municipality->province->province_Name }}</div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        {{-- PAGINATION --}}
        <div>
            {{ $PESO->links('vendor.livewire.tailwind', data: ['scrollTo' => false]) }}
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button type="button" x-data=""
                x-on:click="$dispatch('close-modal', 'partnership-modal')">
                {{ __('Cancel') }}
            </x-secondary-button>

        </div>
    </div>


</x-modal>
