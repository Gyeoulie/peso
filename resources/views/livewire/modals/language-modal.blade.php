<x-modal name="language-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add Language/Dialect Record') }}
        </h2>
        <hr>
        <div class="flex flex-col mt-2" x-data="{ otherLanguage: false }">

            <div class="flex flex-col  mt-2 w-full">
                <x-input-label for="langSelect" :value="__('Add Language')" />
                <select wire:model='selectedLanguage' name="langSelect" class="block mt-1 w-full rounded"
                    x-on:change="otherLanguage = $event.target.value === 'other'">
                    <option value="" disabled selected>Select Language</option>
                    <option value="English">English</option>
                    <option value="Filipino">Filipino</option>
                    <option value="Mandarin">Mandarin</option>
                    <option value="other">Other</option>
                </select>
                <x-input-error :messages="$errors->get('selectedLanguage')" class="mt-2" />
            </div>
            <div x-show="otherLanguage" x-cloak class="mt-2">
                <x-input-label for="langOther" :value="__('Other Language')" />
                <x-text-input wire:model='otherLanguage' class="block mt-1 w-full" type="text" name="langOther" />
                <x-input-error :messages="$errors->get('otherLanguage')" class="mt-2" />
            </div>
        </div>
        <div class="mt-8 flex justify-end">
            <x-secondary-button wire:loading.attr="disabled" wire:click.prevent='close'>
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button wire:click.prevent='addLanguage' class="ms-3" type="button">
                {{ __('Add Language Record') }}
            </x-primary-button>
        </div>
    </div>
</x-modal>
