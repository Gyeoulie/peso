<x-modal name="license-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add License') }}
        </h2>
        <hr>
        <div class="flex flex-row gap-6 mt-2 w-full">

            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="licensePost" :value="__('License Title')" />
                <x-text-input wire:model='licensePost' id="licensePost" class="block mt-1 w-full uppercase" type="text"
                    name="licensePost" />
                <x-input-error :messages="$errors->get('licensePost')" class="mt-2" />
            </div>


            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="lcodePost" :value="__('License Code')" />
                <x-text-input wire:model='lcodePost' id="lcodePost" class="block mt-1 w-full uppercase" type="text"
                    name="lcodePost" />
                <x-input-error :messages="$errors->get('lcodePost')" class="mt-2" />
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button wire:click.prevent='close' type="button">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button wire:click.prevent='addLicense' class="ms-3" type="button" id="eligibilityAdd">
                {{ __('Add License') }}
            </x-primary-button>
        </div>
    </div>
</x-modal>
