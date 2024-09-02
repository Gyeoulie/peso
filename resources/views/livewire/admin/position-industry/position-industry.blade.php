<div class="container mx-auto py-8">

    {{-- CONTIANER --}}
    <div class="grid grid-cols-4 sm:grid-cols-12 gap-4 p-3 sm:p-0">

        {{-- TITLE --}}
        <div class="col-span-4 sm:col-span-12">
            <h1 class="text-2xl font-bold ">Data Management / Position - Industry</h1>
        </div>

        {{-- JOB POSITION CONTAINER --}}
        <div class="col-span-4 sm:col-span-6">
            <div class="bg-white shadow rounded-lg p-6">
                <div class="flex flex-row mb-4">
                    {{-- TITLE --}}
                    <div class="flex items-center">
                        <h1 class="text-xl font-bold ">Job Position List</h1>
                    </div>


                    {{-- PHONE BUTTON (SMALL SCREEN) --}}
                    <div class="mr-0 ml-auto sm:hidden">
                        <x-primary-button wire:click.prevent="open('jobposition')" type="button"
                            class="bg-blue-400 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900">Add
                            Job Position</x-primary-button>
                    </div>
                </div>

                <div class="relative overflow-x-auto ">

                    <div
                        class="p-1 flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 ">

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
                            <input type="text" wire:model.live.prevent='searchPosition'
                                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search for job position">
                        </div>

                        {{-- ADD BUTTON --}}
                        <div class="hidden sm:inline-flex">
                            <x-primary-button type="button"
                                class="bg-blue-400 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900"
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'jobposition-modal')">Add
                                Job Position</x-primary-button>
                        </div>

                    </div>

                    {{-- POSITION TABLE --}}
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                                <tr>
                                    <th scope="col" class="px-6 py-3 w-1/3">
                                        Job Code
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-full">
                                        Position Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-1/3">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($jobpositions->isEmpty())
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
                                                    No Records Found!
                                                </p>
                                            </div>

                                        </td>
                                    </tr>
                                @else
                                    @foreach ($jobpositions as $data)
                                        <tr class="bg-white border-b hover:bg-gray-50">
                                            <td class="px-6 py-4">
                                                <div class="text-gray-500 font-medium text-lg uppercase">
                                                    {{ $data->position_Code }}
                                                </div>
                                            </td>

                                            <td class="px-6 py-4">
                                                <div class="text-black font-bold text-lg uppercase">
                                                    {{ $data->position_Title }}
                                                </div>
                                            </td>

                                            <td class="px-6 py-4">
                                                <div class="flex flex-row items-center justify-center gap-6">
                                                    <div x-data="{ tooltip: 'Edit Job Position' }">
                                                        <button
                                                            wire:click.prevent="editPosition('{{ $data->position_id }}')"
                                                            x-tooltip="tooltip" type="button"
                                                            class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div x-data="{ tooltip: 'Delete Job Position' }">
                                                        <button x-tooltip="tooltip" type="button"
                                                            class="text-red-700 border border-red-700 hover:bg-red-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
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
                    <div class="mt-4">
                        {{ $jobpositions->links('vendor.livewire.tailwind') }}
                    </div>
                </div>

            </div>
        </div>



        {{-- INDUSTRY CONTAINER --}}
        <div class="col-span-4 sm:col-span-6">
            <div class="bg-white shadow rounded-lg p-6">

                {{-- TITLE --}}
                <div class="flex flex-row mb-4">
                    {{-- TITLE --}}
                    <div class="flex items-center">
                        <h1 class="text-xl font-bold ">Industry List</h1>
                    </div>


                    {{-- PHONE BUTTON (SMALL SCREEN) --}}
                    <div class="mr-0 ml-auto sm:hidden">
                        <x-primary-button type="button"
                            class="bg-blue-400 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900"
                            x-data="" x-on:click.prevent="$dispatch('open-modal', 'industry-modal')">Add
                            Job Position</x-primary-button>
                    </div>
                </div>

                <div class="relative overflow-x-auto ">

                    <div
                        class="p-1 flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 ">

                        <label for="table-search" class="sr-only">Search</label>


                        <div class="relative">
                            <div
                                class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            {{-- SEARCH --}}
                            <input type="text" wire:model.live.prevent='searchIndustry'
                                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search for industry">
                        </div>

                        {{-- ADD BUTTON --}}
                        <div class="hidden sm:inline-flex">
                            <x-primary-button type="button"
                                class="bg-blue-400 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900"
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'industry-modal')">Add
                                Industry</x-primary-button>
                        </div>

                    </div>

                    {{-- POSITION TABLE --}}
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                                <tr>
                                    <th scope="col" class="px-6 py-3 w-1/3">
                                        Industry Code
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-full">
                                        Industry Title
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-1/3">

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
                                    @foreach ($industry as $data)
                                        <tr class="bg-white border-b hover:bg-gray-50">
                                            <td class="px-6 py-4">
                                                <div class="text-gray-500 font-medium text-lg uppercase">
                                                    {{ $data->industry_Code }}
                                                </div>
                                            </td>

                                            <td class="px-6 py-4">
                                                <div class="text-black font-bold text-lg uppercase">
                                                    {{ $data->industry_Title }}
                                                </div>
                                            </td>

                                            <td class="px-6 py-4">
                                                <div class="flex flex-row items-center justify-center gap-6">
                                                    <div x-data="{ tooltip: 'Edit Industry' }">
                                                        <button
                                                            wire:click.prevent="editIndustry('{{ $data->industry_id }}')"
                                                            x-tooltip="tooltip" type="button"
                                                            class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div x-data="{ tooltip: 'Delete Industry' }">
                                                        <button x-tooltip="tooltip" type="button"
                                                            class="text-red-700 border border-red-700 hover:bg-red-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
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
                    {{-- PAGINATION --}}
                    <div class="mt-4">
                        {{ $industry->links('vendor.livewire.tailwind') }}
                    </div>

                </div>

            </div>
        </div>


    </div>


    {{-- JOB POSITION MODAL --}}
    <x-modal name="jobposition-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Add Job Position') }}
            </h2>

            <hr>

            <div class="flex flex-row gap-6 mt-2">

                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="positionPost" :value="__('Job Position Title')" />
                    <x-text-input wire:model='positionPost' id="positionPost" class="block mt-1 w-full uppercase"
                        type="text" />
                    <x-input-error :messages="$errors->get('positionPost')" class="mt-2" />
                </div>

                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="pcodePost" :value="__('Job Position Code')" />
                    <x-text-input wire:model='pcodePost' id="pcodePost" class="block mt-1 w-full uppercase"
                        type="text" />
                    <x-input-error :messages="$errors->get('pcodePost')" class="mt-2" />
                </div>


            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button wire:click.prevent="close('jobposition')" type="button">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button wire:click.prevent='savePosition' class="ms-3" type="button"
                    id="eligibilityAdd">
                    {{ __('Save Position') }}
                </x-primary-button>
            </div>
        </div>
    </x-modal>


    {{-- INDUSTRY MODAL --}}
    <x-modal name="industry-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Add Industry') }}
            </h2>

            <hr>

            <div class="flex flex-row gap-6 mt-2">

                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="industryPost" :value="__('Industry Title')" />
                    <x-text-input wire:model='industryPost' id="industryPost" class="block mt-1 w-full uppercase"
                        type="text" />
                    <x-input-error :messages="$errors->get('industryPost')" class="mt-2" />
                </div>

                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="icodePost" :value="__('Industry Code')" />
                    <x-text-input wire:model='icodePost' id="icodePost" class="block mt-1 w-full uppercase"
                        type="text" />
                    <x-input-error :messages="$errors->get('icodePost')" class="mt-2" />
                </div>


            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button wire:click.prevent="close('industry')" type="button">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button wire:click.prevent='saveIndustry' class="ms-3" type="button">
                    {{ __('Save Position') }}
                </x-primary-button>
            </div>
        </div>
    </x-modal>

</div>
