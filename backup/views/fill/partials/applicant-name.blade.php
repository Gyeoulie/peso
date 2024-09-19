<h1 class="text-2xl font-bold">Application Name</h1>
<div class="flex flex-col items-center mt-4">
    <div class="flex flex-col items-center">
        <x-input-label for="image" :value="__('Upload Image')" />
        <div class="w-160 h-160 bg-gray-200 border border-gray-300 rounded-lg overflow-hidden flex items-center justify-center">
            <!-- Display uploaded image here -->
            <img id="uploadedImage" class="uploaded-image"
                src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                alt="Uploaded Image" width="160" height="160" />
        </div>
    </div>
    <div class="mt-4 w-160 flex justify-center">
        <label for="imageUpload"
            class="cursor-pointer px-4 py-2 bg-[#428bca] text-white rounded hover:bg-red-600 transition-colors duration-300 text-center w-full">
            Upload Image
        </label>
        <input type="file" id="imageUpload" name="pimagePost" class="hidden" accept="image/*"
       onchange="previewImage(event)">
    </div>
</div>



<div class="flex flex-row mt-4 w-full">
    <div class="flex flex-col w-full">
        <x-input-label for="fname" :value="__('First Name*')" />
        <x-text-input id="fname" class="block mt-1 w-full" type="text" name="fnamePost" />

    </div>
    <div class="flex flex-col ml-4 w-full">
        <x-input-label for="lname" :value="__('Last Name*')" />
        <x-text-input id="lname" class="block mt-1 w-full" type="text" name="lnamePost"/>
    </div>
</div>
<div class="flex flex-row mt-4">
    <div class="flex flex-col w-full">
        <x-input-label for="mname" :value="__('Middle Name')" />
        <x-text-input id="mname" class="block mt-1 w-full" type="text" name="mnamePost"/>
    </div>
    <div class="flex flex-col ml-4 w-full">
        <x-input-label for="suffix" :value="__('Suffix')" />
        <select id="suffix" name="suffixPost" class="block mt-1 w-full">
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
    </div>
</div>
<div class="flex flex-row mt-4">
    <div class="flex flex-col w-full">
        <x-input-label for="birthdate" :value="__('Birthdate*')" />
        <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="bdayPost"/>        
    </div>
    <div class="flex flex-col ml-4 w-full">
        <x-input-label for="gender" :value="__('Gender*')" />
        <select id="gender" name="genderPost" class="block mt-1 w-full">
            <option value="" disabled selected>Select Gender</option>
            <option value="1">Male</option>
            <option value="2">Female</option>
        </select>
    </div>
</div>
<div class="flex flex-row mt-4 justify-end space-x-4">
    <button type="button"
        class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded "
        onclick="nextSection(2)">
        Next
    </button>
</div>

<script>
function previewImage(event) {
    var fileInput = event.target;
    var uploadedImage = document.getElementById('uploadedImage');
    var imageContainer = document.querySelector('.w-160.h-160');

    // Ensure a file is selected
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            uploadedImage.src = e.target.result;
            imageContainer.style.backgroundImage = 'url(' + e.target.result + ')';
            imageContainer.style.backgroundSize = 'cover';
            imageContainer.style.backgroundPosition = 'center';
        };

        // Read the file as a data URL
        reader.readAsDataURL(fileInput.files[0]);
    }
}

</script>