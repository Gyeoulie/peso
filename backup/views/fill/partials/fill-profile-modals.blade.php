


{{-- TRAINING MODAL
<x-modal name="training-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add Training Record') }}
        </h2>
        <hr>
        <div class="flex flex-col mt-2">

            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="trainingName" :value="__('Training Name')" />
                <x-text-input id="trainingName" class="block mt-1 w-full" type="text" name="trainingName"
                    required />
            </div>
            <div class="flex flex-row mt-2 w-full">
                <div class="flex flex-col w-full">
                    <x-input-label for="trainingStart" :value="__('Started')" />
                    <x-text-input id="trainingStart" class="block mt-1 w-full" type="date"
                        name="trainingStart" required />
                </div>
                <div class="flex flex-col ml-4 w-full">
                    <x-input-label for="trainingEnd" :value="__('Ended')" />
                    <x-text-input id="trainingEnd" class="block mt-1 w-full" type="date"
                        name="trainingEnd" required />
                </div>
            </div>
            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="trainingInsti" :value="__('Training Institution')" />
                <x-text-input id="trainingInsti" class="block mt-1 w-full" type="text"
                    name="trainingInsti" required />
            </div>
            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="trainingCert" :value="__('Certificate Recieved')" />
                <x-text-input id="trainingCert" class="block mt-1 w-full" type="text" name="trainingCert"
                    required />
            </div>
            <div class="mt-2">
                <x-input-label for="trainingComplete" :value="__('Completed')" />
                <div class="flex items-center">
                    <label for="Job Seeker" class="mr-2">
                        <input id="jobseeker" type="radio" name="trainingComplete" value="1" required
                            autocomplete="off">
                        <span class="ml-1">{{ __('Yes') }}</span>
                    </label>
                    <label for="Employer" class="ml-4 mr-2">
                        <input id="employer" type="radio" name="trainingComplete" value="2" required
                            autocomplete="off">
                        <span class="ml-1">{{ __('No') }}</span>
                    </label>
                </div>
            </div>

        </div>
        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Add Training Record') }}
            </x-danger-button>
        </div>
    </div>
</x-modal> --}}


{{-- ELIGIBILITY MODAL --}}



{{-- LICENSE MODAL
<x-modal name="license-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add License') }}
        </h2>
        <hr>
        <div class="flex flex-col mt-2">
            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="license" :value="__('License')" />
                <select id="license" name="license" class="block mt-1 w-full" required>
                    <option value="" disabled selected>Select License</option>
                    <option value="English">English</option>
                    <option value="Filipino">Filipino</option>
                    <option value="Mandarin">Mandarin</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="licenseValidity" :value="__('Date Validity')" />
                <x-text-input id="licenseValidity" class="block mt-1 w-full" type="date"
                    name="licenseValidity" required />
            </div>

        </div>
        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Add Record') }}
            </x-danger-button>
        </div>
    </div>
</x-modal> --}}

{{-- WORK EXPERIENCE MODAL
<x-modal name="workExp-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add Work Experience Record') }}
        </h2>
        <hr>
        <div class="flex flex-col mt-2">
            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="workEmp" :value="__('Employer')" />
                <x-text-input id="workEmp" class="block mt-1 w-full" type="text" name="workEmp"
                    required />
            </div>
            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="workAdd" :value="__('Address')" />
                <x-text-input id="workAdd" class="block mt-1 w-full" type="text" name="workAdd"
                    required />
            </div>

            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="workPos" :value="__('Position')" />
                <select id="workPos" name="workPos" class="block mt-1 w-full" required>
                    <option value="" disabled selected>Select Job Position</option>
                    <option value="English">English</option>
                    <option value="Filipino">Filipino</option>
                    <option value="Mandarin">Mandarin</option>
                    <option value="other">Other</option>
                </select>

            </div>
            <div class="flex flex-row mt-2 w-full">
                <div class="flex flex-col w-full">
                    <x-input-label for="workStart" :value="__('Started')" />
                    <x-text-input id="workStart" class="block mt-1 w-full" type="date" name="workStart"
                        required />
                </div>
                <div class="flex flex-col ml-4 w-full">
                    <x-input-label for="workEnd" :value="__('Ended')" />
                    <x-text-input id="workEnd" class="block mt-1 w-full" type="date" name="workEnd"
                        required />
                </div>
                <div class="flex flex-col w-full ml-4">
                    <x-input-label for="workStatus" :value="__('Status')" />
                    <select id="workStatus" name="workStatus" class="block mt-1 w-full" required>
                        <option value="" disabled selected>Select Work Status</option>
                        <option value="English">English</option>
                        <option value="Filipino">Filipino</option>
                        <option value="Mandarin">Mandarin</option>
                        <option value="other">Other</option>
                    </select>

                </div>
            </div>
        </div>
        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Add Record') }}
            </x-danger-button>
        </div>
    </div>
</x-modal>
 --}}

