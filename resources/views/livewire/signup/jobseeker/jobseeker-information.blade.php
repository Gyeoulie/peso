<div>
    <div class="grid grid-cols-4 sm:grid-cols-12 mt-4 mx-8 p-0 sm:p-6 gap-5">

        <div class="col-span-4 sm:col-start-6">



            <div class="flex flex-col">
                <x-application-logo style="width: 150px; height: 150px;" class=" text-gray-500" />

                <h1 class="text-3xl">Complete your Details</h1>
            </div>

        </div>


        <div class="col-span-4 sm:col-start-2 sm:col-end-12 ">
            <div class="flex flex-row">
                <ul class="border border-gray-200 rounded-l overflow-hidden shadow-md">
                    <li
                        class="section-item px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out highlighted-section">
                        Applicant Name</li>
                    <li
                        class="section-item px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                        Personal Information</li>
                    <li
                        class="section-item px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                        Employment Status</li>
                    <li
                        class="section-item px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                        Job Preferences</li>
                    <li
                        class="section-item px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                        Language/Dialects</li>
                    <li
                        class="section-item px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                        Educational Background</li>
                    <li
                        class="section-item px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                        Certification/Training</li>
                    <li
                        class="section-item px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                        Eligibility/License</li>
                    <li
                        class="section-item px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                        Work Experience</li>
                    <li
                        class="section-item px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                        Other Skills</li>
                    <li
                        class="section-item px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                        Certification And Authorization</li>
                </ul>
                <div class="w-full px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-r-lg">
                    {{-- <form id="registrationForm" method="POST" action="{{ route('postInfo') }}"
                        enctype="multipart/form-data">
                        @csrf --}}


                    {{-- APPLICANT NAME --}}
                    <div class="applicant-name-section">
                        @livewire('signup.jobseeker.partials.applicant-name')

                    </div>

                    {{-- personal information --}}
                    <div class="personal-information-section">
                        @livewire('signup.jobseeker.partials.personal-information')

                    </div>

                    {{-- employment status --}}
                    <div class="employment-status-section">
                        @livewire('signup.jobseeker.partials.employment-status')

                    </div>

                    {{-- JOB PREFERENCES --}}
                    <div class="job-preference-section">
                        @livewire('signup.jobseeker.partials.job-preference')
                    </div>

                    {{-- LANGUAGE/DIALECTS --}}
                    <div class="language-section">
                        @livewire('signup.jobseeker.partials.language')
                    </div>

                    {{-- EDUCATIONAL BACKGROUND --}}
                    <div class="education-section">
                        @livewire('signup.jobseeker.partials.education')
                    </div>

                    {{-- CERTIFICATION AND TRAININGS --}}
                    <div class="certiciation-training-section">
                        @livewire('signup.jobseeker.partials.certification-training')
                    </div>

                    {{-- ELIGIBILITY/LICENSE --}}
                    <div class="eligibility-license-section">
                        @livewire('signup.jobseeker.partials.eligibility-license')
                    </div>

                    {{-- WORK EXPERIENCE --}}
                    <div class="work-experience-section">
                        @livewire('signup.jobseeker.partials.work-experience')
                    </div>

                    {{-- OTHER SKILLS --}}
                    <div class="other-skills-section">
                        @livewire('signup.jobseeker.partials.other-skills')
                    </div>







                    {{-- </form> --}}
                </div>

            </div>
        </div>
        {{-- dont delete --}}
    </div>
</div>
