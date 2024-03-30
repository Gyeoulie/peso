<x-app-layout>

    <body>
        <div class="bg-gray-100">
            <div class="container mx-auto py-8">
                <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
                    <div class="col-span-4 sm:col-span-3">
                        <div class="bg-white shadow rounded-lg p-6">
                            <div class="flex flex-col items-center">
                                @if ($data['employee']->pimg)
                                    <img src="{{ asset('storage/' . $data['employee']->pimg) }}" alt="Profile Image"
                                        class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">
                                @else
                                    <!-- Default image if user doesn't have a profile image -->
                                    <img src="{{ asset('path_to_default_image.jpg') }}" alt="Default Image"
                                        class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">
                                @endif


                                </img>
                                <h1 class="text-xl font-bold">{{ $data['employee']->fname }}
                                    {{ $data['employee']->lname }}</h1>
                                <p class="text-gray-700">Software Developer</p>
                                <div class="mt-6 flex flex-wrap gap-4 justify-center">
                                    <a href="#"
                                        class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Contact</a>
                                    {{-- <a href="#"
                                        class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded">Resume</a> --}}
                                </div>
                            </div>
                            <hr class="my-6 border-t border-gray-300">
                            @if ($data['licenses']->isNotEmpty())
                                <div class="flex flex-col mb-2">

                                    <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">License</span>
                                    <ul>

                                        @foreach ($data['licenses'] as $license)
                                            <li class="mb-2">{{ $license->License_Type->license_name }}</li>
                                        @endforeach

                                    </ul>

                                </div>
                            @endif
                            @if ($data['eligibilities']->isNotEmpty())
                                <div class="flex flex-col mb-2">

                                    <span
                                        class="text-gray-700 uppercase font-bold tracking-wider mb-2">Eligibility</span>
                                    <ul>

                                        @foreach ($data['eligibilities'] as $eligibilities)
                                            <li class="mb-2">{{ $eligibilities->eligibilityType->license_Name }}</li>
                                        @endforeach

                                    </ul>

                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="col-span-4 sm:col-span-9">
                        <div class="bg-white shadow rounded-lg p-6">
                            <h2 class="text-xl font-bold mb-4">About Me</h2>

                            @if (!empty($data['employee']->empDesc))
                                <p class="text-gray-700 text-left">{{ $data['employee']->empDesc }}</p>
                            @else
                                <p class="text-gray-100">Create your company description!</p>
                            @endif

                            <button type="button" class="text-blue-600" onclick="openDescModal()">
                                Edit
                            </button>

                            {{-- <h3 class="font-semibold text-center mt-3 -mb-2">
                               Profile Information
                            </h3> --}}
                            {{-- <div class="flex justify-center items-center gap-6 my-6">
                                <a class="text-gray-700 hover:text-orange-600" aria-label="Visit TrendyMinds LinkedIn"
                                    href="" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-6">
                                        <path fill="currentColor"
                                            d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z">
                                        </path>
                                    </svg>
                                </a>
                                <a class="text-gray-700 hover:text-orange-600" aria-label="Visit TrendyMinds YouTube"
                                    href="" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="h-6">
                                        <path fill="currentColor"
                                            d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z">
                                        </path>
                                    </svg>
                                </a>
                                <a class="text-gray-700 hover:text-orange-600" aria-label="Visit TrendyMinds Facebook"
                                    href="" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="h-6">
                                        <path fill="currentColor"
                                            d="m279.14 288 14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                                        </path>
                                    </svg>
                                </a>
                                <a class="text-gray-700 hover:text-orange-600" aria-label="Visit TrendyMinds Instagram"
                                    href="" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-6">
                                        <path fill="currentColor"
                                            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                                        </path>
                                    </svg>
                                </a>
                                <a class="text-gray-700 hover:text-orange-600" aria-label="Visit TrendyMinds Twitter"
                                    href="" target="_blank">
                                    <svg class="h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor"
                                            d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                        </path>
                                    </svg>
                                </a>
                            </div> --}}

                            <div class="flex flex-row">
                                @if ($data['workExperiences']->isNotEmpty())
                                    <div class="flex flex-col mr-2 w-1/2">
                                        <h2 class="text-xl font-bold mt-6 mb-4">Work Experience</h2>
                                        @foreach ($data['workExperiences'] as $workExp)
                                            <div class="mb-6">
                                                <div class="flex justify-between flex-col">
                                                    <span
                                                        class="text-gray-700 font-bold">{{ $workExp->position->position_Title }}</span>
                                                    <p>
                                                        <span class="text-gray-700 font-semibold mr-2">at
                                                            {{ $workExp->work_Name }}</span>
                                                        <span class="text-gray-700">
                                                            {{ \Carbon\Carbon::parse($workExp->work_Start)->format('Y') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($workExp->work_End)->format('Y') }}
                                                    </p>
                                                </div>
                                                {{-- <p class="mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus est
                                            vitae
                                            tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus non
                                            velit
                                            egestas
                                            suscipit.
                                        </p> --}}
                                            </div>
                                        @endforeach

                                    </div>
                                @endif
                                @if ($data['educations']->isNotEmpty())
                                    <div class="flex flex-col mr-2 w-1/2">
                                        <h2 class="text-xl font-bold mt-6 mb-4">Educational Background</h2>
                                        @foreach ($data['educations'] as $edu)
                                            <div class="mb-6">
                                                <div class="flex justify-between flex-col">
                                                    <span class="text-gray-700 font-bold">{{ $edu->edu_School }}</span>
                                                    <p>
                                                        <span class="text-gray-700">studied</span>
                                                        <span class="text-gray-700 font-semibold mr-2">
                                                            {{ $edu->edu_Course ? $edu->edu_Course : $data['eduLevels'][$edu->edu_Level] ?? '' }}</span>
                                                        <span class="text-gray-700">
                                                            <span class="text-gray-700">
                                                                {{ \Carbon\Carbon::parse($edu->edu_Started)->format('Y') }}
                                                                -
                                                                {{ \Carbon\Carbon::parse($edu->edu_Ended)->format('Y') }}
                                                    </p>
                                                </div>
                                                {{-- <p class="mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus est
                                            vitae
                                            tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus non
                                            velit
                                            egestas
                                            suscipit.
                                        </p> --}}
                                            </div>
                                        @endforeach

                                    </div>
                                @endif
                                @if ($data['trainings']->isNotEmpty())
                                    <div class="flex flex-col mr-2 w-1/2">
                                        <h2 class="text-xl font-bold mt-6 mb-4">Trainings Attended</h2>
                                        @foreach ($data['trainings'] as $trainings)
                                            <div class="mb-6">
                                                <div class="flex justify-between flex-col">
                                                    <span
                                                        class="text-gray-700 font-bold">{{ $trainings->training_Name }}</span>
                                                    @if ($trainings->training_Status == 1)
                                                        <p>
                                                            <span class="text-gray-700 font-semibold mr-2">
                                                                {{ $trainings->training_Cert }}</span>

                                                        </p>
                                                    @endif
                                                    <p>
                                                        <span class="text-gray-700">at</span>
                                                        <span
                                                            class="text-gray-700 font-semibold mr-2">{{ $trainings->training_From }}</span>
                                                        <span class="text-gray-700">
                                                            {{ \Carbon\Carbon::parse($trainings->training_Start)->format('Y') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($trainings->training_End)->format('Y') }}
                                                    </p>
                                                </div>
                                                {{-- <p class="mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus est
                                            vitae
                                            tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus non
                                            velit
                                            egestas
                                            suscipit.
                                        </p> --}}
                                            </div>
                                        @endforeach

                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-modal name="empDesc-modal" focusable>
            <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Edit Description') }}
                </h2>
                <hr>
                <form method="POST" action="{{ route('updateDescEmp') }}">
                    @csrf
                    <div class="flex flex-col mt-2">

                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Company
                            Description</label>
                        <textarea id="descModal" maxlength="400" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Write your description here..." name="descPost" required>{{ $data['employee']->empDesc }}</textarea>


                    </div>
                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-danger-button class="ms-3" type="submit">
                            {{ __('Save') }}
                        </x-danger-button>

                    </div>
                </form>
            </div>
        </x-modal>


        @if (session('success'))
            <x-modal name="success-modal" focusable>
                <div class="p-6 bg-white border rounded-lg shadow-xl">
                    <h2 class="text-lg font-semibold text-gray-900">{{ session('success') }}</h2>
                </div>
            </x-modal>
        @endif

        @if (session('error'))
            <x-modal name="success-modal" focusable>
                <div class="p-6 bg-white border rounded-lg shadow-xl">
                    <h2 class="text-lg font-semibold text-gray-900">{{ session('error') }}</h2>
                </div>
            </x-modal>
        @endif

        @if (session('success'))
            <script>
                window.onload = function() {
                    window.dispatchEvent(new CustomEvent('open-modal', {
                        detail: 'success-modal'
                    }));
                };
            </script>
        @elseif (session('error'))
            <script>
                window.onload = function() {
                    window.dispatchEvent(new CustomEvent('open-modal', {
                        detail: 'error-modal'
                    }));
                };
            </script>
        @endif





</x-app-layout>







<script>
    function openDescModal() {
        window.dispatchEvent(new CustomEvent('open-modal', {
            detail: 'empDesc-modal' // Assuming $name holds the modal name
        }));
    }
</script>
