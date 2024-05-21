<x-modal name="admin-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Create an Admin Account') }}
        </h2>
        <hr>
        <form wire:submit="create">
            <div class="flex flex-col mt-2">
                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input wire:model="emailPost" id="email" class="block mt-1 w-full" type="text"
                        name="emailPost" />
                    <x-input-error :messages="$errors->get('emailPost')" class="mt-2" />
                </div>



                <div class="flex flex-col mt-4 w-full">
                    <x-input-label for="password" :value="__('Password')" />
                    <div class="flex flex-row items-center">
                        <x-text-input wire:model="pwdPost" id="password" class="block mt-1 w-2/3" type="password"
                            name="pwdPost" value="{{ $pwdPost }}" />
                        <div class="flex flex-col items-center ml-4">

                            <x-secondary-button wire:click.prevent="generatePassword" type="button" class="bg-red-400">
                                {{ __('Generate Password') }}
                            </x-secondary-button>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('pwdPost')" class="mt-2" />
                </div>

                <div class="flex flex-col w-full mt-4">
                    <x-input-label for="gender" :value="__('Select Admin Type')" />
                    <select id="admin" wire:model="adminPost" name="adminPost"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option value="" disabled>Select Type</option>
                        <option value="9">PESO Official 1</option>
                        <option value="8">PESO Official 2</option>
                    </select>
                    <x-input-error :messages="$errors->get('adminPost')" class="mt-2" />
                </div>


            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button wire:click.prevent="close" type="button">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button type="submit" class="ms-3" id="eligibilityAdd">
                    {{ __('Create Account') }}
                </x-danger-button>
            </div>
        </form>
    </div>

</x-modal>
