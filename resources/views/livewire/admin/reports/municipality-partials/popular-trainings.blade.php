<div class="w-full p-6 overflow-auto bg-white rounded-lg shadow">
    <div class="mb-4">
        <div class="flex flex-col justify-between w-full gap-2 md:flex-row">

            <h1 class="text-2xl font-bold">Most Popular Trainings</h1>
            <div class="flex flex-row gap-2">
                <div x-data="{ tooltip: 'Export to Excel' }">
                    <button x-tooltip='tooltip' type="button" wire:click.prevent="exportData()"
                        class="flex items-center py-1.5 px-4 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                        <span class="mr-2">Export</span>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                    </button>

                </div>
                <button type="button" x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'filter-trainings-modal')"
                    class=" hover:bg-gray-100 text-gray-500 hover:text-blue-700 focus:z-10 bg-white inline-flex max-h-fit items-center border border-gray-300 focus:outline-none focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5">
                    <span class="flex flex-row items-center gap-2"> Filter
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                        </svg>
                    </span>
                </button>
            </div>
        </div>
        <hr class="h-px my-2 bg-gray-200 border-0">
    </div>

    <div class="overflow-x-auto">
        <table class="w-full mt-2 text-sm text-left text-gray-500 rtl:text-right">
            <thead class="text-xs text-gray-700 uppercase bg-blue-300">
                <tr>
                    <th scope="col" class="w-full px-6 py-3">
                        <span class="font-bold text-black text-md">Training Title</span>
                    </th>
                    <th scope="col" class="hidden px-6 py-3 lg:table-cell">
                        <span class="font-bold text-black text-md">Type</span>
                    </th>
                    <th scope="col" class="hidden px-6 py-3 text-center lg:table-cell">
                        <span class="font-bold text-black text-md">Registered</span>
                    </th>
                    @if (request()->routeIs('admin-reports-municipality'))
                        <th scope="col" class="px-6 py-3"></th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @if ($topPrograms->isEmpty())
                    <tr>
                        <td colspan="4">
                            <div class="flex flex-col items-center justify-center mt-24 mb-24">
                                <div class="p-6 bg-gray-100 rounded-full">
                                    <svg class="w-24 h-24 text-black" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                            d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <p class="mt-2 text-xl font-bold text-center text-black">
                                    Not enough data!
                                </p>
                            </div>
                        </td>
                    </tr>
                @else
                    @foreach ($topPrograms as $data)
                        <tr wire:key='program-{{ $data->program_id }}' class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                <img class="w-10 h-10 rounded-full"
                                    src="{{ asset('storage/' . $data->program_pubmat) }}" alt="img">
                                <div class="ps-3 text-wrap">
                                    <div class="text-base font-semibold">
                                        <div class="text-base font-semibold">{{ $data->program_Title }}</div>
                                        <div class="text-sm font-normal text-gray-500 uppercase">
                                            {{ $data->program_Host }}
                                        </div>
                                    </div>
                                    <div class="text-sm text-gray-500 lg:hidden">
                                        {{ $data->program_Type }}
                                    </div>
                                    <div class="text-sm text-gray-500 lg:hidden">
                                        Registrants: <span
                                            class="font-bold text-black">{{ $data->registration_count }}</span>
                                    </div>

                                </div>
                            </th>

                            <td class="hidden px-6 py-4 lg:table-cell">
                                {{ $data->program_Type }}
                            </td>

                            <td class="hidden px-6 py-4 lg:table-cell">
                                <div class="text-sm font-normal text-center text-gray-500 uppercase">
                                    <span class="font-bold text-blue-500 text-md">
                                        {{ $data->registration_count }}</span>
                                </div>
                            </td>
                            @if (request()->routeIs('admin-reports-municipality'))
                                <td class="px-6 py-4">
                                    <div x-data="{ tooltip: 'Program Overview' }">
                                        <a wire:navigate
                                            href="{{ route('admin-registrants-training', ['id' => $data->program_id]) }}"
                                            x-tooltip="tooltip" type="button"
                                            class="inline-flex items-center p-1 text-sm font-medium text-center text-blue-700 border border-blue-700 rounded-lg hover:bg-blue-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-blue-300">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                <path fill-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>




    <x-modal name="filter-trainings-modal" focusable>
        <div class="items-center w-full max-w-4xl px-6 py-6">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Filter Trainings') }}
            </h2>
            <hr>
            <div class="flex flex-col mt-4">
                <h1 class="font-semibold text-md">Sort By Date</h1>
                <div class="flex flex-row w-full gap-4 mt-2">
                    <!-- Dropdown for Year -->
                    <div class="flex flex-col w-full">
                        <select wire:model="mountSelectedYear" class="block mt-1 rounded-md">
                            <option value="" disabled selected>Select Year</option>
                            @for ($year = $startYear; $year <= $currentYear; $year++)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                        <x-input-error :messages="$errors->get('year')" class="mt-2" />
                    </div>
                    <div class="flex flex-col w-full">
                        <x-dropdown align="left" width="full" disableCloseOnClick>
                            <x-slot name="trigger">
                                <button
                                    class="mt-1 inline-flex h-full items-center text-gray-800 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-md px-1.5 py-2 w-full">
                                    <div class="w-full ml-2 text-left">
                                        Months
                                    </div>

                                    <div class="ms-1">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
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
                                <div class="max-h-[300px] bg-white overflow-y-auto">
                                    @foreach (range(1, 12) as $month)
                                        <div class="flex items-center p-2">
                                            <input wire:model='mountSelectedMonths' type="checkbox"
                                                id="checkboxTopTrain-{{ $month }}"
                                                value="{{ $month }}"
                                                class="w-4 h-4 text-blue-600 border-gray-300 rounded" />
                                            <label for="checkboxTopTrain-{{ $month }}"
                                                class="ml-2 text-sm font-medium text-gray-700 cursor-pointer">
                                                {{ date('F', mktime(0, 0, 0, $month, 1)) }}
                                            </label>
                                        </div>
                                    @endforeach

                                </div>


                            </x-slot>
                        </x-dropdown>
                    </div>

                </div>
            </div>


            <div class="flex justify-between mt-6">
                <x-secondary-button x-on:click="$dispatch('close-modal', 'filter-trainings-modal')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <div>
                    <x-danger-button wire:click.prevent="resetFilter">
                        {{ __('Reset') }}
                    </x-danger-button>
                    <x-primary-button wire:loading.attr="disabled" wire:click.prevent="mountFilter" class="ms-3"
                        type="button">
                        {{ __('Confirm') }}
                        <div wire:loading.delay.long wire:target="mountFilter" role="status">
                            <svg aria-hidden="true" class="w-4 h-4 ml-4 text-gray-200 animate-spin fill-blue-600"
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
