<x-modal name="mun-edit-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit Municipality') }}
        </h2>
        <hr>

        <div class="flex flex-col w-full mt-6 gap-6 ">
            <div class="flex flex-row w-full gap-6">
                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="munPost" :value="__('Municipality Title')" />
                    <x-text-input wire:model="munPost" id="munPost" value="{{ $munPost }}"
                        class="block mt-1 w-full uppercase" type="text" />
                    <x-input-error :messages="$errors->get('munPost')" class="mt-2" />
                </div>

                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="mcodePost" :value="__('Municipality Code')" />
                    <x-text-input wire:model="mcodePost" id="mcodePost" value="{{ $mcodePost }}"
                        class="block mt-1 w-full uppercase" type="text" />
                    <x-input-error :messages="$errors->get('mcodePost')" class="mt-2" />
                </div>
            </div>


            <div class="flex flex-col">
                {{-- HIDDEN --}}
                <x-text-input wire:model="provHidden" id="provHidden" value="{{ $provHidden }}" type="hidden" />



                <x-input-label for="provSelect" class="mb-2" :value="__('Province')" />
                <x-dropdown align="left" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex  items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 w-[150px]">
                            <div class="w-full text-center uppercase">{{ $provSelect }}</div>
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
                        <!-- Search input -->
                        <div class="p-2">
                            <input wire:model.live.prevent='search' type="text" wire:model="search"
                                placeholder="Search..."
                                class="block w-full px-3 py-1.5 mb-2 border border-gray-300 rounded-md focus:outline-none"
                                @click.stop>
                        </div>

                        <!-- Dropdown content with scrollbar -->
                        <div class="max-h-[150px] bg-white overflow-y-auto no-scrollbar">
                            <!-- Dropdown links -->
                            @foreach ($provinces as $data)
                                <x-dropdown-link href="#" wire:click="updateMunSelect('{{ $data->province_id }}')"
                                    class="block px-4 py-2 hover:bg-gray-100 uppercase">
                                    {{ $data->province_Name }}</x-dropdown-link>
                            @endforeach
                        </div>
                    </x-slot>

                </x-dropdown>
            </div>

        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button wire:click.prevent="close" type="button">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button wire:click.prevent='munUpdate' type="submit" class="ms-3" id="eligibilityAdd">
                {{ __('Save') }}
            </x-primary-button>
        </div>

    </div>
</x-modal>
