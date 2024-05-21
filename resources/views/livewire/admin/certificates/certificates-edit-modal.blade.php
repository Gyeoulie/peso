<x-modal name="edit-certificates-admin-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center ">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit Certificate') }}
        </h2>

        <hr>

        <div class="flex flex-row items-center gap-6 mt-4">

            {{-- INPUT FIELD HIDDEN FOR ID --}}
            <x-text-input type="hidden" />

            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="certNameInput" :value="__('Certificate Title')" />

                {{-- INPUT FIELD --}}
                <x-text-input class="block mt-1 w-full uppercase" type="text" wire:model="certNameInput" />

                {{-- ERROR VALIDATION TEXT  --}}
                <x-input-error :messages="$errors->get('certNameInput')" class="mt-2" />
            </div>

            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="certNameInput" :value="__('Certificate Code')" />

                {{-- INPUT FIELD --}}
                <x-text-input class="block mt-1 w-full uppercase" type="text" wire:model="certCodeInput"/>

                {{-- ERROR VALIDATION TEXT  --}}
                <x-input-error :messages="$errors->get('certCodeInput')" class="mt-2" />
            </div>

        </div>
        <div class="mt-6 flex justify-end">

            {{-- ADD A CLOSE DISPATCH AND RESET VALUES --}}
            <x-secondary-button type="button" wire:click.prevent='close'>
                {{ __('Cancel') }}
            </x-secondary-button>

            {{-- SAVE BUTTON --}}
            <x-primary-button class="ms-3" type="button" wire:click.prevent='updateCert'>
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </div>
</x-modal>
