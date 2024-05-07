<x-modal name="edit-industry-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center ">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit Job Position') }}
        </h2>

        <hr>

        <div class="flex flex-row gap-6 mt-2">

            <x-text-input wire:model='industryId' type="hidden" />

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
            <x-secondary-button wire:click.prevent='close' type="button">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button wire:click.prevent='updateIndustry' class="ms-3" type="button" id="eligibilityAdd">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </div>
</x-modal>
