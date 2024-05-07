<x-modal name="edit-requirement-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center ">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit Requirement') }}
        </h2>

        <hr>

        <div class="flex flex-row items-center gap-6 mt-4">

            <x-text-input wire:model='positionId' type="hidden" />

            <div class="flex flex-col w-full">
                <x-input-label for="reqPost" :value="__('Requirement Type')" />
                <x-text-input wire:model='reqPost' id="reqPost" class="block mt-1 w-full uppercase" type="text" />
                <x-input-error :messages="$errors->get('reqPost')" class="mt-2" />
            </div>

            <div class="flex flex-col ml-5 w-full">
                <x-input-label for="trainingComplete" :value="__('Requirement Status')" />
                <div class="flex flex-row h-10 w-full gap-2 mt-1.5">
                    <div class="flex flex-row  items-center px-4 border border-gray-400 rounded">
                        <input wire:model='statusPost' id="bordered-radio-3" type="radio" value="1"
                            name="bordered-radio"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                        <label for="bordered-radio-3"
                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Active</label>
                    </div>
                    <div class="flex items-center px-4 border border-gray-400 rounded">
                        <input wire:model='statusPost' id="bordered-radio-4" type="radio" value="2"
                            name="bordered-radio"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                        <label for="bordered-radio-4"
                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Disabled</label>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('statusPost')" class="mt-2" />
            </div>


        </div>
        <div class="mt-6 flex justify-end">
            <x-secondary-button wire:click.prevent='close' type="button">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button wire:click.prevent='updateReq' class="ms-3" type="button" id="eligibilityAdd">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </div>
</x-modal>
