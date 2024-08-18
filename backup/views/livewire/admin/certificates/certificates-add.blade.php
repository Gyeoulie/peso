<div>
    <div class="bg-white shadow rounded-lg p-6">

        <h1 class="text-2xl font-bold mb-4">Add Certificate</h1>
        <div>
            <div class="flex flex-row w-full mt-6 gap-6 ">


                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="certName" :value="__('Certificate Title')" />

                    {{-- INPUT FIELD --}}
                    <x-text-input class="block mt-1 w-full uppercase" type="text" wire:model="certName" />

                    {{-- ERROR VALIDATION TEXT  --}}
                    <x-input-error :messages="$errors->get('certName')" class="mt-2" />
                </div>

                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="certCode" :value="__('Certificate Code')" />

                    {{-- INPUT FIELD --}}
                    <x-text-input class="block mt-1 w-full uppercase" type="text" wire:model="certCode" />

                    {{-- ERROR VALIDATION TEXT  --}}
                    <x-input-error :messages="$errors->get('certCode')" class="mt-2" />
                </div>

            </div>

            <div class="flex flex-row w-ful mt-6 ">
                <x-primary-button type="submit" class="ml-auto mr-3" wire:click.prevent="addCert">
                    {{ __('Add Certificate') }}
                </x-primary-button>

            </div>

        </div>

    </div>
</div>
