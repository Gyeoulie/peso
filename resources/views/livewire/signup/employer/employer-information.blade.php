<div>

    <div class="grid grid-cols-4 sm:grid-cols-12 mt-4 mx-8 p-0 sm:p-6 gap-5">

        <div class="col-span-4 sm:col-span-12">

            <div class="flex flex-col items-center gap-3 text-center">
                <x-application-logo class="w-[150px] h-[150px] text-gray-500" />
                <h1 class="text-3xl sm:text-4xl  font-bold">Complete your Details</h1>
            </div>

        </div>

        <div class="col-span-4 sm:col-start-2 sm:col-end-12" x-data="{
            currentStep: @entangle('currentStep'),
            activeTab: 'bg-blue-400',
            inactiveTab: 'bg-white',
        }">

            <div class="flex flex-col items-center  text-center">
                <h1 class="sm:hidden  text-2xl font-bold mb-2"><span class="text-blue-500">Step
                        {{ $this->currentStep }}</span> / 3</h1>
            </div>

            <div class="flex flex-row h-full w-full">
                <ul class="hidden sm:block border border-gray-200 rounded overflow-hidden shadow-md">
                    <li :class="currentStep === 1 ? activeTab : inactiveTab"
                        class="section-item px-4 py-2 hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                        Employer Details</li>
                    <li :class="currentStep === 2 ? activeTab : inactiveTab"
                        class="section-item px-4 py-2 hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                        Contact Details</li>
                    <li :class="currentStep === 3 ? activeTab : inactiveTab"
                        class="section-item px-4 py-2 hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                        Requirements</li>
                    <li :class="currentStep === 4 ? activeTab : inactiveTab"
                        class="section-item px-4 py-2 hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                        Certification And Authorization</li>
                </ul>
                <div class="w-full px-6 py-6 bg-white shadow-md sm:rounded-r-lg">

                    {{-- APPLICANT NAME --}}
                    <div x-show="currentStep === 1" class="section employerDetails-section  h-full w-full"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-x-full"
                        x-transition:enter-end="opacity-100 translate-x-0">
                        <livewire:signup.employer.partials.company-information />
                    </div>


                    {{-- //PERSONAL INFORMATION --}}
                    <div x-show="currentStep === 2" class="section comapnyContact-section h-full w-full"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-x-full"
                        x-transition:enter-end="opacity-100 translate-x-0" x-cloak>
                        <livewire:signup.employer.partials.contact-information />

                    </div>

                    <div x-show="currentStep === 3" class="section comapnyContact-section h-full w-full"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-x-full"
                        x-transition:enter-end="opacity-100 translate-x-0" x-cloak>
                        <livewire:signup.employer.partials.requirements />

                    </div>

                    {{-- employment status --}}
                    <div x-show="currentStep === 4" class="section employmentStatus-section h-full w-full"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-x-full"
                        x-transition:enter-end="opacity-100 translate-x-0" x-cloak>
                        <livewire:signup.employer.partials.confirmation />
                    </div>



                </div>

            </div>
        </div>
    </div>
</div>
