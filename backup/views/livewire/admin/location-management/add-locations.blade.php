<div class="col-span-4 sm:col-span-6" x-data="{
    openTab: 1,
    activeClasses: 'text-gray-900 bg-gray-100 active',
    inactiveClasses: 'bg-white hover:text-gray-700 hover:bg-gray-50'
}">
    <div class="bg-white shadow rounded-lg p-6">

        <h1 class="text-2xl font-bold mb-4">Add Locations</h1>



        <div class="sm:hidden">
            <label for="tabs" class="sr-only">Select your country</label>
            <select id="tabs"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option>Barangay</option>
                <option>Municipality</option>
                <option>Province</option>
            </select>
        </div>
        <ul class="hidden text-sm font-medium text-center text-gray-500 rounded-lg shadow-lg sm:flex ">
            <li class="w-full focus-within:z-10">
                <a href="#" @click="openTab = 1" :class="openTab === 1 ? activeClasses : inactiveClasses"
                    class="inline-block w-full p-4 border-r border-gray-200 focus:ring-1 focus:ring-gray-300 focus:outline-none rounded-s-lg">Barangay</a>
            </li>
            <li class="w-full focus-within:z-10">
                <a href="#" @click="openTab = 2" :class="openTab === 2 ? activeClasses : inactiveClasses"
                    class="inline-block w-full p-4  border-r border-gray-200 focus:ring-1 focus:ring-gray-300 focus:outline-none ">Municipality</a>
            </li>
            <li class="w-full focus-within:z-10">
                <a href="#" @click="openTab = 3" :class="openTab === 3 ? activeClasses : inactiveClasses"
                    class="inline-block w-full p-4 border-r border-gray-200 focus:ring-1 focus:ring-gray-300 focus:outline-none rounded-e-lg">Province</a>
            </li>

        </ul>

        <div x-show="openTab === 1" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">

            <div class="flex flex-row w-full mt-6 gap-6 ">


                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="barPost" :value="__('Barangay Title')" />
                    <x-text-input wire:model="barPost" id="barPost" class="block mt-1 w-full uppercase"
                        type="text" />
                    <x-input-error :messages="$errors->get('barPost')" class="mt-2" />
                </div>

                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="bcodePost" :value="__('Barangay Code')" />
                    <x-text-input wire:model="bcodePost" id="bcodePost" class="block mt-1 w-full uppercase"
                        type="text" />
                    <x-input-error :messages="$errors->get('bcodePost')" class="mt-2" />
                </div>


                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="municipalitySelect" :value="__('Municipality')" />
                    <x-text-input wire:model="munSelect" id="municipalitySelect" class="block mt-1 w-full uppercase"
                        type="text" placeholder="Select Municipality" x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'municipality-modal')"
                        x-on:focus="$dispatch('open-modal', 'municipality-modal')" readonly />
                    <x-input-error :messages="$errors->get('munSelect')" class="mt-2" />
                    <x-text-input wire:model="munHidden" id="municipalitySelect" type="hidden" readonly />

                </div>
            </div>

            <div class="flex flex-row w-ful mt-6 ">
                <x-primary-button wire:click.prevent="addBar" type="submit" class="ml-auto mr-3">
                    {{ __('Add Barangay') }}
                </x-primary-button>

            </div>

        </div>

        <div x-show="openTab === 2" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-cloak>
            <div class="flex flex-col w-full ">
                <div class="flex flex-row w-full mt-6 gap-6 ">

                    <div class="flex flex-col mt-2 w-full">
                        <x-input-label for="munPost" :value="__('Municipality Title')" />
                        <x-text-input wire:model="munPost" id="munPost" class="block mt-1 w-full uppercase"
                            type="text" name="munPost" />
                        <x-input-error :messages="$errors->get('munPost')" class="mt-2" />
                    </div>

                    <div class="flex flex-col mt-2 w-full">
                        <x-input-label for="mcodePost" :value="__('Municipality Code')" />
                        <x-text-input wire:model="mcodePost" id="mcodePost" class="block mt-1 w-full uppercase"
                            type="text" name="mcodePost" />
                        <x-input-error :messages="$errors->get('mcodePost')" class="mt-2" />
                    </div>


                    <div class="flex flex-col mt-2 w-full">
                        <x-input-label for="provSelect" :value="__('Province')" />
                        <x-text-input wire:model="provSelect" id="provSelect" class="block mt-1 w-full uppercase"
                            type="text" name="provSelect" placeholder="Select Province" x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'province-modal')"
                            x-on:focus="$dispatch('open-modal', 'province-modal')" readonly />
                        <x-input-error :messages="$errors->get('provSelect')" class="mt-2" />
                        <x-text-input wire:model="provHidden" type="hidden" readonly />
                    </div>
                </div>

                <div class="flex flex-row w-ful mt-6 ">
                    <x-primary-button wire:click.prevent="addMun" type="submit" class="ml-auto mr-3">
                        {{ __('Add Municipality') }}
                    </x-primary-button>
                </div>
            </div>
        </div>

        <div x-show="openTab === 3" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-cloak>
            <div class="flex flex-col w-full">
                <div class="flex flex-row w-full mt-6 gap-6 ">

                    <div class="flex flex-col mt-2 w-1/2">
                        <x-input-label for="provPost" :value="__('Province Title')" />
                        <x-text-input wire:model="provPost" id="provPost" class="block mt-1 w-full uppercase"
                            type="text" name="provPost" />
                        <x-input-error :messages="$errors->get('provPost')" class="mt-2" />
                    </div>
                    <div class="flex flex-col mt-2 w-1/2">
                        <x-input-label for="pcodePost" :value="__('Province Code')" />
                        <x-text-input wire:model="pcodePost" id="pcodePost" class="block mt-1 w-full uppercase"
                            type="text" name="pcodePost" />
                        <x-input-error :messages="$errors->get('pcodePost')" class="mt-2" />
                    </div>
                </div>



                <div class="flex flex-row w-ful mt-6 ">
                    <x-primary-button wire:click.prevent="addProv" type="submit" class="ml-auto mr-3">
                        {{ __('Add Province') }}
                    </x-primary-button>
                </div>

            </div>
        </div>





    </div>
</div>
