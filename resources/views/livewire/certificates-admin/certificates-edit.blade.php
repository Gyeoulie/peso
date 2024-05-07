<x-modal name="edit-requirement-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center ">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit Certificate') }}
        </h2>

        <hr>

        <div class="flex flex-row items-center gap-6 mt-4">

            {{-- INPUT FIELD HIDDEN FOR ID --}}
            <x-text-input type="hidden" />

            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="reqPost" :value="__('Certificate Title')" />

                {{-- INPUT FIELD --}}
                <x-text-input class="block mt-1 w-full uppercase" type="text" />

                {{-- ERROR VALIDATION TEXT  --}}
                <x-input-error :messages="$errors->get('reqPost')" class="mt-2" />
            </div>

            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="reqPost" :value="__('Certificate Code')" />

                {{-- INPUT FIELD --}}
                <x-text-input class="block mt-1 w-full uppercase" type="text" />

                {{-- ERROR VALIDATION TEXT  --}}
                <x-input-error :messages="$errors->get('reqPost')" class="mt-2" />
            </div>

        </div>
        <div class="mt-6 flex justify-end">

            {{-- ADD A CLOSE DISPATCH AND RESET VALUES --}}
            <x-secondary-button type="button">
                {{ __('Cancel') }}
            </x-secondary-button>

            {{-- SAVE BUTTON --}}
            <x-primary-button class="ms-3" type="button">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </div>
</x-modal>
