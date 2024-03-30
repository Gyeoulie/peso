<x-guest-layout style="max-width: 50vw;"
    class="w-full max-w-4xl mt-8 px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
    <form id="registrationForm" method="POST" action="{{ route('register') }}">
        @csrf

        {{-- APPLICANT NAME --}}
        <div class="email-section" style="display: ;" id="emailSection">
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
                        class="cursor-pointer px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition-colors duration-300 text-center w-full">
                        Upload Image
                    </label>
                    <input type="file" id="imageUpload" name="image" class="hidden" accept="image/*"
                        onchange="previewImage(event)">
                </div>
            </div>
        </div>


        {{-- PERSONAL INFORMATION --}}
        <div class="pinfo-section" style="display: ;" id="pinfoSection">
            <p class="text-xl">Personal Information</p>
            <div class="flex flex-row w-full">
                <div class="flex flex-col w-full">
                    <x-input-label for="presentAddress" :value="__('Present Address')" />
                    <x-text-input id="presentAddress" class="block mt-1 w-full" type="text" name="hnum"
                        required />
                    <x-input-error :messages="$errors->get('fname')" class="mt-2" />
                </div>
                <div class="flex flex-col ml-4 w-full">
                    <x-input-label for="barangay" :value="__('Barangay')" />
                    <x-text-input id="barangay" class="block mt-1 w-full" type="text" name="barangay" required />
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
                    <x-text-input id="tinnum" class="block mt-1 w-full" type="text" name="tinnum" required />
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
                    <x-text-input id="pnum" class="block mt-1 w-full" type="tel" name="pnum" required />
                    <x-input-error :messages="$errors->get('pnum')" class="mt-2" />
                </div>
                <div class="flex flex-col ml-4 w-full">
                    <x-input-label for="tin" :value="__('TIN')" />
                    <x-text-input id="tin" class="block mt-1 w-full" type="text" name="tin" required />
                    <x-input-error :messages="$errors->get('lname')" class="mt-2" />
                </div>
                <div class="flex flex-col ml-4 w-full">
                    <x-input-label for="height" :value="__('Height')" />
                    <x-text-input id="height" class="block mt-1 w-full" type="text" name="height" required />
                    <x-input-error :messages="$errors->get('lname')" class="mt-2" />
                </div>
            </div>


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
                <div class="flex flex-col ml-4 w-full opacity-50">
                    <x-input-label for="barangay" :value="__('Barangay')" />
                    <x-text-input id="barangay" class="block mt-1 w-full" type="text" name="barangay" required
                        disabled />
                    <x-input-error :messages="$errors->get('barangay')" class="mt-2" />
                </div>
            </div>


        </div>
{{-- employment status --}}
        <div class="empstatus-section" style="display: ;" id="empstatusSection">
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
        </div>

        {{-- JOB PREFERENCES --}}
        <div class="empstatus-section" style="display: none;" id="empstatusSection">
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
                    <x-text-input id="tinnum" class="block mt-1" style="width: 50%" type="text" name="tinnum" required />
                    <x-input-error :messages="$errors->get('fname')" class="mt-2" />
                </div>
            </div>            
        </div>


        

    </form>

      <!-- Modal toggle -->
<button data-modal-target="samplemodal" data-modal-toggle="samplemodal"  data-modal-show="samplemodal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Toggle modal
  </button>



  
  
  

</x-guest-layout>
<!-- Main modal -->
<div id="samplemodal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Terms of Service
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal toggle -->





<script>


    
    function previewImage(event) {
        const reader = new FileReader();
        const image = document.getElementById('uploadedImage');

        reader.onload = function() {
            image.src = reader.result;
        }

        reader.readAsDataURL(event.target.files[0]);
    }
</script>
