<div>
    <div>
        <!-- Livewire Component -->
        <div x-data="employmentStatusHandler()" @change-status.window="updateEmpDesc">
            <h1 class="text-2xl font-bold">Employment Status</h1>
            <div class="flex flex-row mt-4">
                <div class="flex flex-col w-full">
                    <x-input-label for="empStatus" :value="__('Employment Status')" />
                    <select wire:model='empStatus' x-model="empStatus" @change="updateEmpDesc"
                        class="block mt-1 w-full rounded">
                        <option value="" disabled selected>Select Employment Status</option>
                        <option value="1">Employed</option>
                        <option value="2">Unemployed</option>
                    </select>
                    <x-input-error :messages="$errors->get('empStatus')" class="mt-2" />
                    </h1>
                </div>
                <div class="flex flex-col ml-4 w-full">
                    <x-input-label for="empDesc" :value="__('Description')" />
                    <select wire:model='empDescription' x-model="empDesc" class="block mt-1 w-full rounded">
                        <option value="" disabled selected>Select Description</option>
                        <template x-for="desc in empDescriptions" :key="desc.value">
                            <option :value="desc.value" x-text="desc.text"></option>
                        </template>
                    </select>
                    <x-input-error :messages="$errors->get('empDescription')" class="mt-2" />
                    </h1>
                </div>
            </div>

            <div class="mt-20 flex flex-row justify-end space-x-4">
                <x-secondary-button type="button">
                    Previous
                </x-secondary-button>

                <x-blue-button wire:click.prevent='next' type="button">
                    Next
                </x-blue-button>
            </div>
        </div>
    </div>

    <script>
        function employmentStatusHandler() {
            return {
                empStatus: '',
                empDesc: '',
                empDescriptions: [],

                updateEmpDesc() {
                    this.empDesc = ''; // Reset the empDesc value
                    this.empDescriptions = [];
                    if (this.empStatus === '1') { // '1' corresponds to 'employed'
                        this.empDescriptions = [{
                                text: 'Wage employed',
                                value: 1
                            },
                            {
                                text: 'Self-employed',
                                value: 2
                            },
                            {
                                text: 'Others',
                                value: 3
                            }
                        ];
                    } else if (this.empStatus === '2') { // '2' corresponds to 'unemployed'
                        this.empDescriptions = [{
                                text: 'New entrant/fresh graduate',
                                value: 4
                            },
                            {
                                text: 'Finished contract',
                                value: 5
                            },
                            {
                                text: 'Resigned',
                                value: 6
                            },
                            {
                                text: 'Retired',
                                value: 7
                            },
                            {
                                text: 'Terminated/Laid off due to calamity',
                                value: 8
                            },
                            {
                                text: 'Terminated/Laid off (local)',
                                value: 9
                            },
                            {
                                text: 'Terminated/Laid off (abroad)',
                                value: 10
                            },
                            {
                                text: 'Others',
                                value: 3
                            }
                        ];
                    }
                }
            }
        }
    </script>


</div>
