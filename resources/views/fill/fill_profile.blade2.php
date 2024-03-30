<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'PESO') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans text-gray-900 antialiased bg-gray-100">

    <div class="flex flex-col justify-center items-center">

        <a href="/">
            <x-application-logo style="width: 150px; height: 150px;" class="fill-current text-gray-500" />
        </a>

        <h1 class="text-3xl p-6">Complete your Details</h1>
    </div>

    <div class="flex flex-row justify-center">
        <ul class="border border-gray-200 rounded overflow-hidden shadow-md">
            <li
                class="px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                Applicant Name</li>
            <li
                class="px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                Personal Information</li>
            <li
                class="px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                Employment Status</li>
            <li
                class="px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                Job Preferences</li>
            <li
                class="px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                Language/Dialects</li>
            <li
                class="px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                Educational Background</li>
            <li
                class="px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                Certification/Training</li>
            <li
                class="px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                Eligibility/License</li>
            <li
                class="px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                Work Experience</li>
            <li
                class="px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                Other Skills</li>
            <li
                class="px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                Confirmation</li>
        </ul>
        <div class="w-full max-w-4xl px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form id="registrationForm" method="POST" action="{{ route('register') }}">
                @csrf

                {{-- APPLICANT NAME --}}
                <div class="email-section section" style="display: block" id="section-1">
                    <div class="flex flex-row w-full">
                        <div class="flex flex-col w-full">
                            <x-input-label for="fname" :value="__('First Name')" />
                            <x-text-input id="fname" class="block mt-1 w-full" type="text" name="fname"
                                :value="old('fname')" required />
                            <x-input-error :messages="$errors->get('fname')" class="mt-2" />

                        </div>
                        <div class="flex flex-col ml-4 w-full">
                            <x-input-label for="lname" :value="__('Last Name')" />
                            <x-text-input id="lname" class="block mt-1 w-full" type="text" name="lname"
                                :value="old('lname')" required />
                            <x-input-error :messages="$errors->get('lname')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex flex-row mt-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="mname" :value="__('Middle Name')" />
                            <x-text-input id="mname" class="block mt-1 w-full" type="text" name="mname"
                                :value="old('mname')" required />
                            <x-input-error :messages="$errors->get('mname')" class="mt-2" />
                        </div>
                        <div class="flex flex-col ml-4 w-full">
                            <x-input-label for="suffix" :value="__('Suffix')" />
                            <select id="suffix" name="suffix" class="block mt-1 w-full" required>
                                <option value="" disabled selected>Select Suffix</option>
                                <option value="mr">None</option>
                                <option value="mrs">Jr. (Junior)</option>
                                <option value="ms">Sr. (Senior)</option>
                                <option value="mrs">I</option>
                                <option value="mrs">II</option>
                                <option value="mrs">III</option>
                                <option value="mrs">IV</option>
                                <option value="mrs">V</option>
                                <option value="mrs">VI</option>
                                <option value="mrs">VII</option>
                                <option value="mrs">VIII</option>
                                <option value="mrs">IX</option>
                                <option value="mrs">X</option>
                            </select>
                            <x-input-error :messages="$errors->get('suffix')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex flex-row mt-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="birthdate" :value="__('Birthdate')" />
                            <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate"
                                :value="old('birthdate')" required />
                            <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                        </div>
                        <div class="flex flex-col ml-4 w-full">
                            <x-input-label for="gender" :value="__('Gender')" />
                            <select id="gender" name="gender" class="block mt-1 w-full" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex flex-col items-center mt-4">
                        <div class="flex flex-col items-center">
                            <x-input-label for="image" :value="__('Upload Image')" />
                            <div
                                class="w-160 h-160 bg-gray-200 border border-gray-300 rounded-lg overflow-hidden flex items-center justify-center">
                                <!-- Display uploaded image here -->
                                <img id="uploadedImage" class="object-contain max-w-160 max-h-160"
                                    src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                                    alt="Uploaded Image" width="160" height="160" />
                            </div>
                        </div>
                        <div class="mt-4 w-160 flex justify-center">
                            <label for="imageUpload"
                                class="cursor-pointer px-4 py-2 bg-[#428bca] text-white rounded hover:bg-red-600 transition-colors duration-300 text-center w-full">
                                Upload Image
                            </label>
                            <input type="file" id="imageUpload" name="image" class="hidden" accept="image/*"
                                onchange="previewImage(event)">
                        </div>
                    </div>
                    <div class="flex flex-row justify-end space-x-4">
                        <button
                            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded "
                            onclick="nextSection(2)">
                            Next
                        </button>
                    </div>
                </div>


                {{-- PERSONAL INFORMATION --}}
                <div class="pinfo-section section" style="display: none;" id="section-2">
                    <p class="text-xl">Personal Information</p>
                    <div class="flex flex-row w-full">
                        <div class="flex flex-col w-full">
                            <x-input-label for="presentAddress" :value="__('Present Address')" />
                            <x-text-input id="presentAddress" class="block mt-1 w-full" type="text"
                                name="hnum" required />
                            <x-input-error :messages="$errors->get('fname')" class="mt-2" />
                        </div>
                        <div class="flex flex-col ml-4 w-full">
                            <x-input-label for="barangay" :value="__('Barangay')" />
                            <x-text-input id="barangay" class="block mt-1 w-full" type="text" name="barangay"
                                required />
                            <x-input-error :messages="$errors->get('lname')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex flex-row mt-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="city" :value="__('City')" />
                            <select id="city" name="city" class="block mt-1 w-full" required>
                                <option value="" disabled selected>Select City</option>
                                <option value="mr">None</option>
                                <option value="mrs">Jr. (Junior)</option>
                                <option value="ms">Sr. (Senior)</option>
                                <option value="mrs">I</option>
                                <option value="mrs">II</option>
                                <option value="mrs">III</option>
                                <option value="mrs">IV</option>
                                <option value="mrs">V</option>
                            </select>
                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>
                        <div class="flex flex-col ml-4 w-full">
                            <x-input-label for="province" :value="__('Province')" />
                            <select id="province" name="province" class="block mt-1 w-full" required>
                                <option value="" disabled selected>Select Province</option>
                                <option value="mr">None</option>
                                <option value="mrs">Jr. (Junior)</option>
                                <option value="ms">Sr. (Senior)</option>
                                <option value="mrs">I</option>
                                <option value="mrs">II</option>
                                <option value="mrs">III</option>
                                <option value="mrs">IV</option>
                                <option value="mrs">V</option>
                            </select>
                            <x-input-error :messages="$errors->get('province')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex flex-row mt-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="civilstatus" :value="__('Civil Status')" />
                            <select id="civilstatus" name="civilstatus" class="block mt-1 w-full" required>
                                <option value="" disabled selected>Select Civil Status</option>
                                <option value="mr">None</option>
                                <option value="mrs">Jr. (Junior)</option>
                                <option value="ms">Sr. (Senior)</option>
                                <option value="mrs">I</option>
                                <option value="mrs">II</option>
                                <option value="mrs">III</option>
                                <option value="mrs">IV</option>
                                <option value="mrs">V</option>
                            </select>
                            <x-input-error :messages="$errors->get('civilstatus')" class="mt-2" />
                        </div>
                        <div class="flex flex-col ml-4 w-full">
                            <x-input-label for="religion" :value="__('Religion')" />
                            <select id="religion" name="religion" class="block mt-1 w-full" required>
                                <option value="" disabled selected>Select Religion</option>
                                <option value="mr">None</option>
                                <option value="mrs">Jr. (Junior)</option>
                                <option value="ms">Sr. (Senior)</option>
                                <option value="mrs">I</option>
                                <option value="mrs">II</option>
                                <option value="mrs">III</option>
                                <option value="mrs">IV</option>
                                <option value="mrs">V</option>
                            </select>
                            <x-input-error :messages="$errors->get('religion')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex flex-row mt-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="tinnum" :value="__('Present Address')" />
                            <x-text-input id="tinnum" class="block mt-1 w-full" type="text" name="tinnum"
                                required />
                            <x-input-error :messages="$errors->get('fname')" class="mt-2" />
                        </div>
                        <div class="flex flex-col ml-4 w-full">
                            <x-input-label for="barangay" :value="__('Barangay')" />
                            <x-text-input id="barangay" class="block mt-1 w-full" type="text" name="barangay"
                                required />
                            <x-input-error :messages="$errors->get('lname')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex flex-row mt-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="pnum" :value="__('Cellphone No.')" />
                            <x-text-input id="pnum" class="block mt-1 w-full" type="tel" name="pnum"
                                required />
                            <x-input-error :messages="$errors->get('pnum')" class="mt-2" />
                        </div>
                        <div class="flex flex-col ml-4 w-full">
                            <x-input-label for="tin" :value="__('TIN')" />
                            <x-text-input id="tin" class="block mt-1 w-full" type="text" name="tin"
                                required />
                            <x-input-error :messages="$errors->get('lname')" class="mt-2" />
                        </div>
                        <div class="flex flex-col ml-4 w-full">
                            <x-input-label for="height" :value="__('Height')" />
                            <x-text-input id="height" class="block mt-1 w-full" type="text" name="height"
                                required />
                            <x-input-error :messages="$errors->get('lname')" class="mt-2" />
                        </div>
                    </div>


                    <div class="flex flex-row mt-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="disability" :value="__('Disability')" />
                            <div class="flex flex-row space-x-4">
                                <div
                                    class="mb-[0.125rem] block min-h-[1.5rem] sm:min-h-auto sm:mb-[0.5rem] md:min-h-auto md:mb-[0.125rem] pl-[1.5rem]">
                                    <input
                                        class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent"
                                        type="checkbox" value="" id="checkboxDefault1" />
                                    <label class="inline-block pl-[0.15rem] hover:cursor-pointer"
                                        for="checkboxDefault1">
                                        Visual
                                    </label>
                                </div>

                                <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                                    <input
                                        class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                        type="checkbox" value="" id="checkboxDefault2" />
                                    <label class="inline-block pl-[0.15rem] hover:cursor-pointer"
                                        for="checkboxDefault2">
                                        Hearing
                                    </label>
                                </div>

                                <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                                    <input
                                        class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                        type="checkbox" value="" id="checkboxDefault3" />
                                    <label class="inline-block pl-[0.15rem] hover:cursor-pointer"
                                        for="checkboxDefault3">
                                        Speech
                                    </label>
                                </div>

                                <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                                    <input
                                        class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                        type="checkbox" value="" id="checkboxDefault4" />
                                    <label class="inline-block pl-[0.15rem] hover:cursor-pointer"
                                        for="checkboxDefault4">
                                        Physical
                                    </label>
                                </div>

                                <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                                    <input
                                        class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                        type="checkbox" value="" id="checkboxDefault5" />
                                    <label class="inline-block pl-[0.15rem] hover:cursor-pointer"
                                        for="checkboxDefault5">
                                        Mental
                                    </label>
                                </div>

                                <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                                    <input
                                        class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                        type="checkbox" value="" id="checkboxDefault6" />
                                    <label class="inline-block pl-[0.15rem] hover:cursor-pointer"
                                        for="checkboxDefault6">
                                        Others
                                    </label>
                                </div>


                            </div>
                            <x-input-error :messages="$errors->get('disability')" class="mt-2" />
                        </div>
                        <div class="flex flex-col ml-4 w-full opacity-50">
                            <x-input-label for="barangay" :value="__('Others')" />
                            <x-text-input id="barangay" class="block mt-1 w-full" type="text" name="barangay"
                                required disabled />
                            <x-input-error :messages="$errors->get('barangay')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex flex-row justify-end space-x-4">
                        <button
                            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"
                            onclick="nextSection(1)">
                            Previous
                        </button>

                        <button
                            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"
                            onclick="nextSection(3)">
                            Next
                        </button>
                    </div>


                </div>

                {{-- employment status --}}
                <div class="jobpref-section section" style="display: none;" id="section-3">
                    <div class="flex flex-row mt-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="disability" :value="__('Disability')" />
                            <select id="disability" name="disability" class="block mt-1 w-full" required>
                                <option value="" disabled selected>Select Disability</option>
                                <option value="mr">None</option>
                                <option value="mrs">Jr. (Junior)</option>
                                <option value="ms">Sr. (Senior)</option>
                                <option value="mrs">I</option>
                                <option value="mrs">II</option>
                                <option value="mrs">III</option>
                                <option value="mrs">IV</option>
                                <option value="mrs">V</option>
                            </select>
                            <x-input-error :messages="$errors->get('disability')" class="mt-2" />
                        </div>
                        <div class="flex flex-col ml-4 w-full">
                            <x-input-label for="disability" :value="__('Disability')" />
                            <select id="disability" name="disability" class="block mt-1 w-full" required>
                                <option value="" disabled selected>Select Disability</option>
                                <option value="mr">None</option>
                                <option value="mrs">Jr. (Junior)</option>
                                <option value="ms">Sr. (Senior)</option>
                                <option value="mrs">I</option>
                                <option value="mrs">II</option>
                                <option value="mrs">III</option>
                                <option value="mrs">IV</option>
                                <option value="mrs">V</option>
                            </select>
                            <x-input-error :messages="$errors->get('disability')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex flex-wrap mt-4 justify-center items-center w-full">
                        <div class="flex flex-col w-full justify-center items-center">
                            <x-input-label for="tinnum" :value="__('HOW LONG HAVE YOU BEEN LOOKING FOR WORK?')" />
                            <x-text-input id="tinnum" class="block mt-1" style="width: 50%" type="text"
                                name="tinnum" required />
                            <x-input-error :messages="$errors->get('fname')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex flex-row justify-end space-x-4">
                        <button
                            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"
                            onclick="nextSection(2)">
                            Previous
                        </button>

                        <button
                            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded "
                            onclick="nextSection(4)">
                            Next
                        </button>
                    </div>
                </div>


                {{-- JOB PREFERENCES --}}
                <div class="empstatus-section section" style="display: none;" id="section-4">
                    <div class="flex flex-row mt-4">
                        <div class="mt-4 w-160 flex justify-center">
                            <label for="imageUpload"
                                class="cursor-pointer px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition-colors duration-300 text-center w-full">
                                Upload Image
                            </label>
                            <input type="file" id="imageUpload" name="image" class="hidden" accept="image/*"
                                onchange="previewImage(event)">
                        </div>
                    </div>
                    <div class="flex flex-row justify-end space-x-4">
                        <button
                            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"
                            onclick="nextSection(3)">
                            Previous
                        </button>

                        <button
                            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded "
                            onclick="nextSection(5)">
                            Next
                        </button>
                    </div>
                </div>



                {{-- Language/Dialects --}}
                <div class="language-section section" style="display: ;" id="section-5">
                    <h1 class="text-2xl bold">LANGUAGE</h1>
                    <div class="flex flex-col mt-4 ">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-3/4 mx-auto" style="display:">
                            <table id="languageTable"
                                class="w-full text-sm text-center rtl:text-center text-gray-500 ">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                    <tr>
                                        <th scope="col" class="border px-6 py-3">
                                            Language
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Read
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Write
                                        </th>
                                        <th scope="col" class="border px-6 py-3  ">
                                            Speak
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Understand
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b hover:bg-gray-50 content-center">
                                        <th class="border px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            English
                                        </th>
                                        <td scope="row" class="border px-6 py-4">
                                            <div class="flex items-center justify-center">
                                                <input id="checkbox-table-1" type="checkbox"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                                <label for="checkbox-table-1" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="border px-6 py-4">
                                            <div class="flex items-center justify-center">
                                                <input id="checkbox-table-1" type="checkbox"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                                <label for="checkbox-table-1" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="border px-6 py-4">
                                            <div class="flex items-center justify-center">
                                                <input id="checkbox-table-1" type="checkbox"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                                <label for="checkbox-table-1" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="border px-6 py-4">
                                            <div class="flex items-center justify-center">
                                                <input id="checkbox-table-1" type="checkbox"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                                <label for="checkbox-table-1" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="border px-6 py-4">
                                            <a href="#"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="flex flex-row mt-4 ">
                            <button type="button" data-hs-overlay="#language-modal"
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                ADD LANGUAGE
                            </button>
                            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'test-modal')"
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                ADD LANGUAGE
                            </button>
                        </div>
                        <div class="flex flex-row justify-end space-x-4">
                            <button
                                class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"onclick="nextSection(4))">
                                Previous
                            </button>

                            <button
                                class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded "onclick="nextSection(6)">
                                Next
                            </button>
                        </div>
                    </div>
                </div>



                {{-- School/Education --}}
                <div class="education-section Previous" style="display: none;" id="section-6">

                    <h1 class="text-2xl bold">Educational Background</h1>

                    <div class="flex flex-col mt-4 ">
                        <div id="educationTable"class="relative overflow-x-auto shadow-md sm:rounded-lg  mx-auto"
                            style="display:">
                            <table class="w-full text-sm text-center rtl:text-center text-gray-500 ">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                    <tr>
                                        <th scope="col" class="border px-6 py-3">
                                            School
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Level
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Course
                                        </th>
                                        <th scope="col" class="border px-6 py-3  ">
                                            Started
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Ended
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Edit
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b hover:bg-gray-50 content-center">
                                        <th scope="row" class="border px-6 py-4 font-medium text-gray-900 ">
                                            National University Baliwag
                                        </th>
                                        <td class="border w-4 p-4">
                                            1st Year College
                                        </td>
                                        <td class="border px-6 py-4">
                                            BSIT
                                        </td>
                                        <td class="border px-6 py-4">
                                            01/03/2020
                                        </td>
                                        <td class="border px-6 py-4">
                                            01/03/2020
                                        </td>
                                        <td class="border px-6 py-4">
                                            <a href="#"
                                                class="font-medium text-blue-600 hover:underline">Edit</a>
                                        </td>
                                        <td class="border px-6 py-4">
                                            <a href="#"
                                                class="font-medium text-blue-600 hover:underline">Delete</a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="flex flex-row mt-4 ">
                            <button type="button" data-hs-overlay="#education-modal"
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                ADD EDUCATION
                            </button>
                        </div>
                        <div class="flex flex-row justify-end space-x-4">
                            <button
                                class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"
                                onclick="nextSection(5)">
                                Previous
                            </button>

                            <button
                                class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"
                                onclick="nextSection(7)">
                                Next
                            </button>
                        </div>
                    </div>

                </div>

                {{-- certification --}}
                <div class="certification-section section" style="display: none;" id="section-7">
                    <h1 class="text-2xl bold">Eligibility and License</h1>
                    <div class="flex flex-col mt-4 ">

                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg  mx-auto" style="display:">
                            <table class="w-full text-sm text-center rtl:text-center text-gray-500 ">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                    <tr>
                                        <th scope="col" class="border px-6 py-3">
                                            Certification
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Issued By
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Date
                                        </th>
                                        <th scope="col" class="border px-6 py-3  ">
                                            Rating
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Edit
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b hover:bg-gray-50 content-center">
                                        <th scope="row" class="border px-6 py-4 font-medium text-gray-900 ">
                                            Skills Training
                                        </th>
                                        <td class="border w-4 p-4">
                                            National University Baliwag
                                        </td>
                                        <td class="border px-6 py-4">
                                            01/03/2020
                                        </td>
                                        <td class="border px-6 py-4">
                                            100
                                        </td>
                                        <td class="border px-6 py-4">
                                            <a href="#"
                                                class="font-medium text-blue-600 hover:underline">Edit</a>
                                        </td>
                                        <td class="border px-6 py-4">
                                            <a href="#"
                                                class="font-medium text-blue-600 hover:underline">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="flex flex-row mt-4 ">
                            <button
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                ADD CERTIFICATION
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-col mt-4 ">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg " style="display:">
                            <table class="w-full text-sm text-center rtl:text-center text-gray-500 ">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                    <tr>
                                        <th scope="col" class="border px-6 py-3">
                                            Training
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Date Started
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Date Ended
                                        </th>
                                        <th scope="col" class="border px-6 py-3  ">
                                            Training Institution
                                        </th>
                                        <th scope="col" class="border px-6 py-3  ">
                                            Certifcate
                                        </th>
                                        <th scope="col" class="border px-6 py-3  ">
                                            Completed
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Edit
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b hover:bg-gray-50 content-center">
                                        <th scope="row" class="border px-6 py-4 font-medium text-gray-900 ">
                                            Skills Training
                                        </th>
                                        <td class="border w-4 p-4">
                                            01/01/2020
                                        </td>
                                        <td class="border px-6 py-4">
                                            01/01/2020
                                        </td>
                                        <td class="border px-6 py-4">
                                            TESDA
                                        </td>
                                        <td class="border px-6 py-4">
                                            Skills Certificate
                                        </td>
                                        <td class="border px-6 py-4">
                                            <div class="flex items-center justify-center">
                                                <input id="checkbox-table-1" type="checkbox" disabled
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                                <label for="checkbox-table-1" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="border px-6 py-4">
                                            <a href="#"
                                                class="font-medium text-blue-600 hover:underline">Edit</a>
                                        </td>
                                        <td class="border px-6 py-4">
                                            <a href="#"
                                                class="font-medium text-blue-600 hover:underline">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="flex flex-row mt-4 ">
                            <button type="button" data-hs-overlay="#training-modal"
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                ADD TRAINING
                            </button>
                        </div>
                        <div class="flex flex-row justify-end space-x-4">
                            <button
                                class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"
                                onclick="nextSection(6)">
                                Previous
                            </button>

                            <button
                                class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded "
                                onclick="nextSection(8)">
                                Next
                            </button>
                        </div>
                    </div>

                </div>

                {{-- ELIGIBILITY/LICENSE --}}
                <div class="certification-section section" style="display: none;" id="section-8">
                    <h1 class="text-2xl bold">Certifications And Trainings</h1>

                    <div class="flex flex-col mt-4 ">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg  mx-auto" style="display:">
                            <table class="w-full text-sm text-center rtl:text-center text-gray-500 ">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                    <tr>
                                        <th scope="col" class="border px-6 py-3">
                                            Eligibility
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Date Taken
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Edit
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b hover:bg-gray-50 content-center">
                                        <th scope="row" class="border px-6 py-4 font-medium text-gray-900 ">
                                            Nationanl University
                                        </th>
                                        <td class="border w-4 p-4">
                                            01/01/2020
                                        </td>
                                        <td class="border px-6 py-4">
                                            <a href="#"
                                                class="font-medium text-blue-600 hover:underline">Edit</a>
                                        </td>
                                        <td class="border px-6 py-4">
                                            <a href="#"
                                                class="font-medium text-blue-600 hover:underline">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="flex flex-row mt-4 ">
                            <button type="button" data-hs-overlay="#eligibility-modal"
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                ADD ELIGIBILITY
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-col mt-4 ">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg  mx-auto" style="display:">
                            <table class="w-full text-sm text-center rtl:text-center text-gray-500 ">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                    <tr>
                                        <th scope="col" class="border px-6 py-3">
                                            Eligibility
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Date Taken
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Edit
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b hover:bg-gray-50 content-center">
                                        <th scope="row" class="border px-6 py-4 font-medium text-gray-900 ">
                                            Nationanl University
                                        </th>
                                        <td class="border w-4 p-4">
                                            01/01/2020
                                        </td>
                                        <td class="border px-6 py-4">
                                            <a href="#"
                                                class="font-medium text-blue-600 hover:underline">Edit</a>
                                        </td>
                                        <td class="border px-6 py-4">
                                            <a href="#"
                                                class="font-medium text-blue-600 hover:underline">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="flex flex-row mt-4 ">
                            <button type="button" data-hs-overlay="#license-modal"
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                ADD LICENSE
                            </button>
                        </div>
                        <div class="flex flex-row justify-end space-x-4">
                            <button
                                class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"
                                onclick="nextSection(7)">
                                Previous
                            </button>

                            <button
                                class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded "
                                onclick="nextSection(9)">
                                Next
                            </button>
                        </div>
                    </div>

                </div>


                {{-- WORK EXPERIENCE --}}
                <div class="workexp-section section" style="display: none;" id="section-9">
                    <h1 class="text-2xl bold">WORK EXPERIENCE</h1>

                    <div class="flex flex-col mt-4 ">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg  mx-auto" style="display:">
                            <table class="w-full text-sm text-center rtl:text-center text-gray-500 ">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                    <tr>
                                        <th scope="col" class="border px-6 py-3">
                                            Employer
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Address
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Position
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Start Date
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            End Date
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Status
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Edit
                                        </th>
                                        <th scope="col" class="border px-6 py-3 ">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b hover:bg-gray-50 content-center">
                                        <th scope="row" class="border px-6 py-4 font-medium text-gray-900 ">
                                            Nationanl University
                                        </th>
                                        <td class="border w-4 p-4">
                                            Baliwag, Bulacan
                                        </td>
                                        <td class="border w-4 p-4">
                                            Professor
                                        </td>
                                        <td class="border w-4 p-4">
                                            01/01/2020
                                        </td>
                                        <td class="w-4 p-4">
                                            01/01/2020
                                        </td>
                                        <td class="border w-4 p-4">
                                            Part-time
                                        </td>
                                        <td class="border px-6 py-4">
                                            <a href="#"
                                                class="font-medium text-blue-600 hover:underline">Edit</a>
                                        </td>
                                        <td class="border px-6 py-4">
                                            <a href="#"
                                                class="font-medium text-blue-600 hover:underline">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="flex flex-row mt-4 ">
                            <button type="button" data-hs-overlay="#work-modal"
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                ADD WORK EXPERIENCE
                            </button>
                        </div>
                        <div class="flex flex-row justify-end space-x-4">
                            <button
                                class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"
                                onclick="nextSection(8)">
                                Previous
                            </button>

                            <button
                                class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded "
                                onclick="nextSection(10)">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Modal toggle -->
            {{-- <button data-modal-target="samplemodal" data-modal-toggle="samplemodal" data-modal-show="samplemodal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Toggle modal
                </button> --}}







        </div>

    </div>




    <div id="language-modal"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--overlay-backdrop:static]"
        data-hs-overlay-keyboard="false">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                <div class="flex justify-between items-center py-3 px-4 border-b">
                    <h3 class="font-bold text-gray-800">
                        Add Language
                    </h3>
                    <button type="button"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#language-modal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <div class="flex flex-col w-full">
                        <x-input-label for="sellanguage" :value="__('Add Language')" />
                        <select id="sellanguage" name="sellanguage" class="block mt-1 w-full"
                            onchange="toggleOtherLanguageVisibility()" required>
                            <option value="" disabled selected>Select Language</option>
                            <option value="English">English</option>
                            <option value="Filipino">Filipino</option>
                            <option value="Mandarin">Mandarin</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div id="otherlanguage" class="mt-5" style="visibility: hidden;">
                        <x-input-label for="otherlanguage" :value="__('Other')" />
                        <x-text-input id="language" class="block mt-1 w-full" type="text" name="Other" />
                    </div>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#language-modal">
                        Close
                    </button>
                    <button type="button" id="addLanguage"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Add
                    </button>
                </div>
            </div>
        </div>
    </div>


    {{-- school --}}
    <div id="education-modal"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--overlay-backdrop:static]"
        data-hs-overlay-keyboard="false">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                <div class="flex justify-between items-center py-3 px-4 border-b">
                    <h3 class="font-bold text-gray-800">
                        Add Education
                    </h3>
                    <button type="button"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#education-modal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <div class="flex flex-col">

                        <div class="flex flex-col w-full">
                            <x-input-label for="school" :value="__('School')" />
                            <x-text-input id="eduschool" class="block mt-1 w-full" type="text" name="fname"
                                required />
                        </div>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col w-full">
                                <x-input-label for="level" :value="__('Level')" />
                                <select id="edulevel" name="level" class="block mt-1 w-full" required>
                                    <option value="" disabled selected>Select Language</option>
                                    <option value="English">English</option>
                                    <option value="Filipino">Filipino</option>
                                    <option value="Mandarin">Mandarin</option>
                                    <option value="other">Other</option>
                                </select>

                            </div>
                            <div class="flex flex-col ml-4 w-full">
                                <x-input-label for="course" :value="__('Course')" />
                                <x-text-input id="educourse" class="block mt-1 w-full" type="text" name="course"
                                    required />
                            </div>
                        </div>


                        <div class="flex flex-row w-full">
                            <div class="flex flex-col w-full">
                                <x-input-label for="started" :value="__('Started')" />
                                <x-text-input id="edustart" class="block mt-1 w-full" type="date" name="started"
                                    required />
                            </div>
                            <div class="flex flex-col ml-4 w-full">
                                <x-input-label for="ended" :value="__('Ended')" />
                                <x-text-input id="eduend" class="block mt-1 w-full" type="date" name="ended"
                                    required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#education-modal">
                        Close
                    </button>
                    <button type="button" id="eduAdd"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Add
                    </button>
                </div>
            </div>
        </div>
    </div>





    {{-- training --}}
    <div id="training-modal"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--overlay-backdrop:static]"
        data-hs-overlay-keyboard="false">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                <div class="flex justify-between items-center py-3 px-4 border-b">
                    <h3 class="font-bold text-gray-800">
                        Add Training Record
                    </h3>
                    <button type="button"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#training-modal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <div class="flex flex-col">

                        <div class="flex flex-col w-full">
                            <x-input-label for="training" :value="__('Training Name')" />
                            <x-text-input id="training" class="block mt-1 w-full" type="text" name="training"
                                required />
                        </div>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col w-full">
                                <x-input-label for="started" :value="__('Started')" />
                                <x-text-input id="started" class="block mt-1 w-full" type="date" name="started"
                                    required />
                            </div>
                            <div class="flex flex-col ml-4 w-full">
                                <x-input-label for="ended" :value="__('Ended')" />
                                <x-text-input id="ended" class="block mt-1 w-full" type="date" name="ended"
                                    required />
                            </div>
                        </div>
                        <div class="flex flex-col w-full">
                            <x-input-label for="traininst" :value="__('Training Institution')" />
                            <x-text-input id="traininst" class="block mt-1 w-full" type="text" name="traininst"
                                required />
                        </div>
                        <div class="flex flex-col w-full">
                            <x-input-label for="cerrec" :value="__('Certificate Recieved')" />
                            <x-text-input id="cerrec" class="block mt-1 w-full" type="text" name="cerrec"
                                required />
                        </div>
                        <div class="mt-2">
                            <x-input-label for="role" :value="__('Completed')" />
                            <div class="flex items-center">
                                <label for="Job Seeker" class="mr-2">
                                    <input id="jobseeker" type="radio" name="role" value="2" required
                                        autocomplete="off">
                                    <span class="ml-1">{{ __('Yes') }}</span>
                                </label>
                                <label for="Employer" class="ml-4 mr-2">
                                    <input id="employer" type="radio" name="role" value="3" required
                                        autocomplete="off">
                                    <span class="ml-1">{{ __('No') }}</span>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#training-modal">
                        Close
                    </button>
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>







    {{-- ELGIBILITY --}}
    <div id="eligibility-modal"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--overlay-backdrop:static]"
        data-hs-overlay-keyboard="false">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                <div class="flex justify-between items-center py-3 px-4 border-b">
                    <h3 class="font-bold text-gray-800">
                        Add Eligibility Record
                    </h3>
                    <button type="button"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#eligibility-modal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <div class="flex flex-col">

                        <div class="flex flex-col w-full">
                            <x-input-label for="eligibility" :value="__('Eligibility')" />
                            <select id="eligibility" name="eligibility" class="block mt-1 w-full" required>
                                <option value="" disabled selected>Select Eligibility</option>
                                <option value="English">English</option>
                                <option value="Filipino">Filipino</option>
                                <option value="Mandarin">Mandarin</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="flex flex-col w-full">
                            <x-input-label for="datetaken" :value="__('Date Taken')" />
                            <x-text-input id="datetaken" class="block mt-1 w-full" type="date" name="datetaken"
                                required />
                        </div>


                    </div>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#eligibility-modal">
                        Close
                    </button>
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Understood
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- LICENSE --}}
    <div id="license-modal"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--overlay-backdrop:static]"
        data-hs-overlay-keyboard="false">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                <div class="flex justify-between items-center py-3 px-4 border-b">
                    <h3 class="font-bold text-gray-800">
                        Add License Record (PRC)
                    </h3>
                    <button type="button"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#license-modal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <div class="flex flex-col">

                        <div class="flex flex-col w-full">
                            <x-input-label for="license" :value="__('License')" />
                            <select id="license" name="license" class="block mt-1 w-full" required>
                                <option value="" disabled selected>Select Eligibility</option>
                                <option value="English">English</option>
                                <option value="Filipino">Filipino</option>
                                <option value="Mandarin">Mandarin</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="flex flex-col w-full">
                            <x-input-label for="datevalidity" :value="__('Date Validity')" />
                            <x-text-input id="datevalidity" class="block mt-1 w-full" type="date"
                                name="datevalidity" required />
                        </div>


                    </div>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#license-modal">
                        Close
                    </button>
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Understood
                    </button>
                </div>
            </div>
        </div>
    </div>




    {{-- work --}}
    <div id="work-modal"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--overlay-backdrop:static]"
        data-hs-overlay-keyboard="false">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                <div class="flex justify-between items-center py-3 px-4 border-b">
                    <h3 class="font-bold text-gray-800">
                        Add Education
                    </h3>
                    <button type="button"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#work-modal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <div class="flex flex-col">

                        <div class="flex flex-col w-full">
                            <x-input-label for="emp" :value="__('Employer')" />
                            <x-text-input id="emp" class="block mt-1 w-full" type="text" name="emp"
                                required />
                        </div>
                        <div class="flex flex-col w-full">
                            <x-input-label for="addwork" :value="__('Address')" />
                            <x-text-input id="addwork" class="block mt-1 w-full" type="text" name="addwork"
                                required />
                        </div>

                        <div class="flex flex-col w-full">
                            <x-input-label for="position" :value="__('Position')" />
                            <select id="position" name="position" class="block mt-1 w-full" required>
                                <option value="" disabled selected>Select Language</option>
                                <option value="English">English</option>
                                <option value="Filipino">Filipino</option>
                                <option value="Mandarin">Mandarin</option>
                                <option value="other">Other</option>
                            </select>

                        </div>
                        <div class="flex flex-row w-full">
                            <div class="flex flex-col w-full">
                                <x-input-label for="started" :value="__('Started')" />
                                <x-text-input id="started" class="block mt-1 w-full" type="date"
                                    name="started" required />
                            </div>
                            <div class="flex flex-col ml-4 w-full">
                                <x-input-label for="ended" :value="__('Ended')" />
                                <x-text-input id="ended" class="block mt-1 w-full" type="date"
                                    name="ended" required />
                            </div>
                            <div class="flex flex-col w-full ml-4">
                                <x-input-label for="workstatus" :value="__('Status')" />
                                <select id="workstatus" name="workstatus" class="block mt-1 w-full" required>
                                    <option value="" disabled selected>Select Language</option>
                                    <option value="English">English</option>
                                    <option value="Filipino">Filipino</option>
                                    <option value="Mandarin">Mandarin</option>
                                    <option value="other">Other</option>
                                </select>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#work-modal">
                        Close
                    </button>
                    <button type="button" onclick="addLanguageRow()"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Understood
                    </button>
                </div>
            </div>
        </div>
    </div>








    {{-- dont delete --}}
    </div>



    <x-modal name="test-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add Employee Record') }}
        </h2>
        <hr>

            <div class="flex flex-col">

                <div class="flex flex-col w-full">
                    <x-input-label for="emp" :value="__('Employer')" />
                    <x-text-input id="emp" class="block mt-1 w-full" type="text" name="emp"
                        required />
                </div>
                <div class="flex flex-col w-full">
                    <x-input-label for="addwork" :value="__('Address')" />
                    <x-text-input id="addwork" class="block mt-1 w-full" type="text" name="addwork"
                        required />
                </div>

                <div class="flex flex-col w-full">
                    <x-input-label for="position" :value="__('Position')" />
                    <select id="position" name="position" class="block mt-1 w-full" required>
                        <option value="" disabled selected>Select Language</option>
                        <option value="English">English</option>
                        <option value="Filipino">Filipino</option>
                        <option value="Mandarin">Mandarin</option>
                        <option value="other">Other</option>
                    </select>

                </div>
                <div class="flex flex-row w-full">
                    <div class="flex flex-col w-full">
                        <x-input-label for="started" :value="__('Started')" />
                        <x-text-input id="started" class="block mt-1 w-full" type="date" name="started"
                            required />
                    </div>
                    <div class="flex flex-col ml-4 w-full">
                        <x-input-label for="ended" :value="__('Ended')" />
                        <x-text-input id="ended" class="block mt-1 w-full" type="date" name="ended"
                            required />
                    </div>
                    <div class="flex flex-col w-full ml-4">
                        <x-input-label for="workstatus" :value="__('Status')" />
                        <select id="workstatus" name="workstatus" class="block mt-1 w-full" required>
                            <option value="" disabled selected>Select Language</option>
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
                {{ __('Save') }}
            </x-danger-button>
        </div>
    </div>

    </x-modal>



</body>

</html>
<script>
    function toggleOtherLanguageVisibility() {
        var selectElement = document.getElementById("sellanguage");
        var otherLanguageDiv = document.getElementById("otherlanguage");

        // Check if the selected value is "other"
        if (selectElement.value === "other") {
            otherLanguageDiv.style.visibility = "visible"; // Show the other language input fields
        } else {
            otherLanguageDiv.style.visibility = "hidden"; // Hide the other language input fields
        }
    }

    // Function to show the modal
    function showModal() {
        const modal = document.getElementById('crud-modal');
        if (modal) {
            modal.classList.remove('hidden');
        } else {
            console.error('Modal element not found');
        }
    }

    // Function to hide the modal
    function hideModal() {
        const modal = document.getElementById('crud-modal');
        if (modal) {
            modal.classList.add('hidden');
        } else {
            console.error('Modal element not found');
        }
    }

    // Add event listeners to modal toggle buttons
    function nextSection(sectionnum) {
        // Hide all sections
        var allSections = document.querySelectorAll('[id^="section-"]');
        for (var i = 0; i < allSections.length; i++) {
            allSections[i].style.display = 'none';
        }

        // Show the specified section
        var sectionToShow = document.getElementById('section-' + sectionnum);
        if (sectionToShow) {
            sectionToShow.style.display = 'block'; // or 'flex', 'grid', etc. depending on your layout
        }
    }


    // education counter ------------------------------------------------------------
    var educounter = 1; // Assuming there's already one row present in the table
    jQuery('#eduAdd').click(function() {
        // Get the input values
        var eduschool = $('#eduschool').val();
        var edulevel = $('#edulevel').val();
        var educourse = $('#educourse').val();
        var edustart = $('#edustart').val();
        var eduend = $('#eduend').val();

        // Append a new row to the table body
        $('#educationTable tbody').append(
            '<tr class="bg-white border-b hover:bg-gray-50 content-center">' +
            '<th scope="row" class="border px-6 py-4 font-medium text-gray-900">' +
            eduschool +
            '<input type="hidden" name="eduSchool[' + educounter + ']" value="' + eduschool + '">' +
            '</th>' +
            '<td class="border px-6 py-4">' +
            edulevel +
            '<input type="hidden" name="eduLevel[' + educounter + ']" value="' + edulevel + '">' +
            '</td>' +
            '<td class="border px-6 py-4">' +
            educourse +
            '<input type="hidden" name="eduCourse[' + educounter + ']" value="' + educourse + '">' +
            '</td>' +
            '<td class="border px-6 py-4">' +
            edustart +
            '<input type="hidden" name="eduStart[' + educounter + ']" value="' + edustart + '">' +
            '</td>' +
            '<td class="border px-6 py-4">' +
            eduend +
            '<input type="hidden" name="eduEnd[' + educounter + ']" value="' + eduend + '">' +
            '</td>' +
            '<td class="border px-6 py-4">' +
            '<a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>' +
            '</td>' +
            '<td class="border px-6 py-4">' +
            '<a href="#" class="font-medium text-blue-600 hover:underline">Delete</a>' +
            '</td>' +
            '</tr>'
        );
        educounter++;
    });



    // language conter--------------------------------------------------------------------
    var langcounter = 0; // Assuming there's already one row present in the table
    jQuery('#addLanguage').click(function() {
        // Get the selected language
        var selectedLanguage = $('#sellanguage').val();

        // Get the visibility of the other language input
        var otherLanguageVisibility = $('#otherlanguage').css('visibility');

        // Determine the language to add based on whether it's 'other' or a specific language
        var languageToAdd = selectedLanguage;
        if (selectedLanguage === 'other' && otherLanguageVisibility === 'visible') {
            languageToAdd = $('#language').val();
        }
        console.log(languageToAdd)
        // Append a new row to the table body
        $('#languageTable tbody').append(
            '<tr class="bg-white border-b hover:bg-gray-50 content-center">' +
            '<th class="border px-6 py-4 font-medium text-gray-900 whitespace-nowrap">' +
            languageToAdd +
            '</th>' +
            '<td scope="row" class="border px-6 py-4">' +
            '<div class="flex items-center justify-center">' +
            '<input id="checkbox-table-' + langcounter + '-read" type="checkbox" name="read[' +
            langcounter + ']" ' +
            'class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">' +
            '<label for="checkbox-table-' + langcounter + '-read" class="sr-only">checkbox</label>' +
            '</div>' +
            '</td>' +
            '<td class="border px-6 py-4">' +
            '<div class="flex items-center justify-center">' +
            '<input id="checkbox-table-' + langcounter + '-write" type="checkbox" name="write[' +
            langcounter + ']" ' +
            'class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">' +
            '<label for="checkbox-table-' + langcounter + '-write" class="sr-only">checkbox</label>' +
            '</div>' +
            '</td>' +
            '<td class="border px-6 py-4">' +
            '<div class="flex items-center justify-center">' +
            '<input id="checkbox-table-' + langcounter + '-speak" type="checkbox" name="speak[' +
            langcounter + ']" ' +
            'class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">' +
            '<label for="checkbox-table-' + langcounter + '-speak" class="sr-only">checkbox</label>' +
            '</div>' +
            '</td>' +
            '<td class="border px-6 py-4">' +
            '<div class="flex items-center justify-center">' +
            '<input id="checkbox-table-' + langcounter + '-understand" type="checkbox" name="understand[' +
            langcounter + ']" ' +
            'class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">' +
            '<label for="checkbox-table-' + langcounter + '-understand" class="sr-only">checkbox</label>' +
            '</div>' +
            '</td>' +
            '</tr>'
        );
        langcounter++;
    });
</script>
