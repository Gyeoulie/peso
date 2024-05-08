<x-modal name="prov-edit-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit Province') }}
        </h2>
        <hr>

        <div class="flex flex-col w-full mt-6 gap-6 ">
            <div class="flex flex-row w-full gap-6">
                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="provPost" :value="__('Province Title')" />
                    <x-text-input wire:model="provPost" id="provPost" value="{{ $provPost }}"
                        class="block mt-1 w-full uppercase" type="text" />
                    <x-input-error :messages="$errors->get('provPost')" class="mt-2" />
                </div>

                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="pcodePost" :value="__('Province Code')" />
                    <x-text-input wire:model="pcodePost" id="pcodePost" value="{{ $pcodePost }}"
                        class="block mt-1 w-full uppercase" type="text" />
                    <x-input-error :messages="$errors->get('pcodePost')" class="mt-2" />
                </div>
            </div>



        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button wire:click.prevent="close" type="button">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button wire:click.prevent='provUpdate' type="submit" class="ms-3">
                {{ __('Save') }}
            </x-primary-button>
        </div>

    </div>
</x-modal>
