<div>

    <div class="grid grid-cols-4 sm:grid-cols-12 mt-4 mx-8 p-0 sm:p-6 gap-5">

        <div class="col-span-4 sm:col-start-6">



            <div class="flex flex-col">
                <x-application-logo style="width: 150px; height: 150px;" class=" text-gray-500" />

                <h1 class="text-3xl">Complete your Details</h1>
            </div>

        </div>
        <div class="col-span-4 sm:col-start-2 sm:col-end-12">
            <div class="flex flex-row">
                <ul class="hidden sm:block border border-gray-200 rounded overflow-hidden shadow-md">
                    <li
                        class="section-item px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out highlighted-section">
                        Employer Details</li>
                    <li
                        class="section-item px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                        Contact Details</li>
                    <li
                        class="section-item px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                        Certification And Authorization</li>
                </ul>
                <div class="w-full px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-r-lg">

                    {{-- APPLICANT NAME --}}
                    <div class="section employerDetails-section">
                        <livewire:signup.employer.partials.company-information />
                    </div>


                    {{-- //PERSONAL INFORMATION --}}
                    <div class="section comapnyContact-section">
                        <livewire:signup.employer.partials.contact-information />

                    </div>

                    {{-- employment status --}}
                    <div class="section employmentStatus-section">
                        <livewire:signup.employer.partials.confirmation />
                    </div>



                </div>

            </div>
        </div>
    </div>
</div>
