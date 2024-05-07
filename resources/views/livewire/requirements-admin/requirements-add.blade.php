<div>
    <div class="bg-white shadow rounded-lg p-6">

        <h1 class="text-2xl font-bold mb-4">Add Requirements</h1>
        <div>
            <div class="flex flex-row w-full mt-6 gap-6 ">


                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="reqPost" :value="__('Requirement Type')" />
                    <x-text-input wire:model="reqPost" id="reqPost" class="block mt-1 w-full uppercase" type="text" />
                    <x-input-error :messages="$errors->get('reqPost')" class="mt-2" />
                </div>

                <div class="flex flex-col mt-2 ml-5 w-full">
                    <x-input-label for="trainingComplete" :value="__('Requirement Status')" />
                    <div class="flex flex-row w-full gap-2">
                        <div class="flex flex-row items-center px-4 border border-gray-400 rounded">
                            <input wire:model='statusPost' id="bordered-radio-1" type="radio" value="1"
                                name="bordered-radio"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="bordered-radio-1"
                                class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Active</label>
                        </div>
                        <div class="flex items-center px-4 border border-gray-400 rounded">
                            <input wire:model='statusPost' id="bordered-radio-2" type="radio" value="2"
                                name="bordered-radio"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="bordered-radio-2"
                                class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Disabled</label>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('statusPost')" class="mt-2" />
                </div>

            </div>

            <div class="flex flex-row w-ful mt-6 ">
                <x-primary-button wire:click.prevent="addReq" type="submit" class="ml-auto mr-3">
                    {{ __('Add Requirement') }}
                </x-primary-button>

            </div>

        </div>

    </div>
</div>
