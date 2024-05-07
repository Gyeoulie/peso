<x-modal name="edit-position-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center ">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit Job Position') }}
        </h2>

        <hr>

        <div class="flex flex-row gap-6 mt-2">

            <x-text-input wire:model='positionId' type="hidden" />

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
            <x-secondary-button wire:click.prevent='close' type="button">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button wire:click.prevent='updatePosition' class="ms-3" type="button" id="eligibilityAdd">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </div>
</x-modal>
