<div class="flex flex-col w-full h-full gap-4">
    <h1 class="text-2xl font-bold">Contact Information</h1>
    <div class="flex flex-col sm:w-2/3 gap-4 w-full mt-5">
        <div class="flex flex-col w-full">
            <x-input-label for="presentAddress" :value="__('Contact Person')" />
            <x-text-input wire:model='name' class="block mt-1" type="text" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />

        </div>
        <div class="flex flex-col w-full">
            <x-input-label for="position" :value="__('Position')" />
            <x-text-input wire:model='position' iclass="block mt-1" type="text" />
            <x-input-error :messages="$errors->get('position')" class="mt-2" />

        </div>
        <div class="flex flex-col sm:flex-row w-full gap-4">
            <div class="flex flex-col w-full">
                <x-input-label for="email" :value="__('Email Address')" />
                <x-text-input wire:model='email' class="block mt-1" type="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

            </div>
            <div class="flex flex-col w-full">
                <x-input-label for="tel" :value="__('Telephone No.')" />
                <x-text-input wire:model='tel' class="block mt-1" type="tel" />
                <x-input-error :messages="$errors->get('tel')" class="mt-2" />

            </div>
        </div>
        <div class="flex flex-col sm:flex-row w-full gap-4">
            <div class="flex flex-col w-full">
                <x-input-label for="phone" :value="__('Mobile No.')" />
                <x-text-input wire:model='phone' class="block mt-1" type="tel" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />

            </div>
            <div class="flex flex-col w-full">
                <x-input-label for="fax" :value="__('Fax No.')" />
                <x-text-input wire:model='fax' class="block mt-1" type="tel" />
                <x-input-error :messages="$errors->get('fax')" class="mt-2" />

            </div>
        </div>



    </div>

    <div class="flex flex-row justify-between space-x-4 mt-4 sm:mt-auto sm:mb-4">
        <x-secondary-button wire:click='prev' type="button">
            Previous
        </x-secondary-button>

        <x-blue-button wire:click='next' type="button">
            Next
        </x-blue-button>
    </div>



</div>
