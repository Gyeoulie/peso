<x-modal name="edit-eligibility-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit Eligibility') }}
        </h2>
        <hr>
        <div class="flex flex-row gap-6 mt-2 w-full">



            <x-text-input wire:model='eligibilityId' type="hidden" />



            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="eligibilityPost" :value="__('Eligibility Title')" />
                <x-text-input wire:model='eligibilityPost' id="eligibilityPost" class="block mt-1 w-full uppercase"
                    type="text" name="eligibilityPost" />
                <x-input-error :messages="$errors->get('eligibilityPost')" class="mt-2" />
            </div>


            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="ecodePost" :value="__('Eligibility Code')" />
                <x-text-input wire:model='ecodePost' id="ecodePost" class="block mt-1 w-full uppercase" type="text"
                    name="ecodePost" />
                <x-input-error :messages="$errors->get('ecodePost')" class="mt-2" />
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button wire:click.prevent='close' type="button">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button wire:click.prevent='updateEligibility' class="ms-3" type="button" id="eligibilityAdd">
                {{ __('Save') }}
            </x-danger-button>
        </div>
    </div>
</x-modal>
