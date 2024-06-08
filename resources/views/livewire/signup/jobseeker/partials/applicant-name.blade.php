<div class="flex flex-col w-full h-full">
    <h1 class="text-2xl font-bold">Applicant Name</h1>
    <div class="flex flex-col items-center mt-5">
        <div class="flex flex-col items-center">
            <x-input-label for="image" :value="__('Upload Image')" />
            <div
                class="bg-gray-200 border border-gray-300 rounded-lg overflow-hidden flex items-center justify-center shrink-0 grow-0">
                <!-- Display uploaded image here -->
                @if ($pimage)
                    <img id="uploadedImage" class="flex uploaded-image object-fill w-[200px] h-[200px] shrink-0 grow-0"
                        src="{{ $pimage->temporaryUrl() }}" alt="Uploaded Image" />
                @else
                    <img id="uploadedImage" class="flex uploaded-image object-fill  w-[200px] h-[200px] shrink-0 grow-0"
                        src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                        alt="Uploaded Image" />
                @endif
            </div>
        </div>


        <x-input-error :messages="$errors->get('pimage')" class="mt-2" />
        <div class="mt-4 w-160 flex justify-center">
            <label for="imageUpload"
                class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Upload Image
            </label>
            <input wire:model='pimage' type="file" id="imageUpload" class="hidden" accept="image/*">

        </div>
    </div>



    <div class="flex flex-col sm:flex-row mt-4 gap-4 w-full">
        <div class="flex flex-col w-full">
            <x-input-label for="fname" :value="__('First Name')" />
            <x-text-input wire:model='fname' class="block mt-1 w-full" type="text" />
            <x-input-error :messages="$errors->get('fname')" class="mt-2" />

        </div>
        <div class="flex flex-col  w-full">
            <x-input-label for="lname" :value="__('Last Name')" />
            <x-text-input wire:model='lname' class="block mt-1 w-full" type="text" />
            <x-input-error :messages="$errors->get('lname')" class="mt-2" />
        </div>
    </div>
    <div class="flex flex-col sm:flex-row mt-4 gap-4">
        <div class="flex flex-col w-full">
            <x-input-label for="mname" :value="__('Middle Name')" />
            <x-text-input wire:model='mname' class="block mt-1 w-full" type="text" />
            <x-input-error :messages="$errors->get('mname')" class="mt-2" />
        </div>
        <div class="flex flex-col w-full">
            <x-input-label for="suffix" :value="__('Suffix')" />
            <select wire:model='suffix' class="block mt-1 w-full rounded">
                <option value="" disabled selected>Select Suffix</option>
                <option value="">None</option>
                <option value="Jr.">Jr. (Junior)</option>
                <option value="Sr.">Sr. (Senior)</option>
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
                <option value="V">V</option>
                <option value="VI">VI</option>
                <option value="VII">VII</option>
                <option value="VIII">VIII</option>
                <option value="IX">IX</option>
                <option value="X">X</option>
            </select>
            <x-input-error :messages="$errors->get('suffix')" class="mt-2" />
        </div>
    </div>
    <div class="flex flex-col sm:flex-row mt-4 gap-4">
        <div wire:model='bday' class="flex flex-col w-full">
            <x-input-label for="birthdate" :value="__('Birthdate')" />
            <x-text-input class="block mt-1 w-full" type="date" />
            <x-input-error :messages="$errors->get('bday')" class="mt-2" />
        </div>
        <div class="flex flex-col w-full">
            <x-input-label for="gender" :value="__('Gender')" />
            <select wire:model='gender' class="block mt-1 w-full rounded">
                <option value="" disabled selected>Select Gender</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>
    </div>
    <div class="flex flex-row justify-end space-x-4 mt-4 ">
        <x-blue-button wire:click.prevent='next' type="button">
            Next
        </x-blue-button>
    </div>

</div>
