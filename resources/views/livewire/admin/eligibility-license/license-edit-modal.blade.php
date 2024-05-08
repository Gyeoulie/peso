<x-modal name="edit-license-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit Eligibility') }}
        </h2>
        <hr>
        <div class="flex flex-row gap-6 mt-2 w-full">



            <x-text-input wire:model='licenseId' type="hidden" />


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

            <x-danger-button wire:click.prevent='updateLicense' class="ms-3" type="button" id="eligibilityAdd">
                {{ __('Save') }}
            </x-danger-button>
        </div>
    </div>
</x-modal>
