<div wire:poll>
    <div class="flex flex-col md:flex-row w-full h-full gap-4 container mx-auto p-4 md:p-0 md:py-8">

        <div class="flex flex-col md:w-1/4 h-full md:sticky top-5">
            <div class="bg-white shadow-xl rounded-lg p-6">
                <div class="flex flex-col items-center">
                    <img src="{{ $employer->company_img ? asset('storage/' . $employer->company_img) : asset('https://randomuser.me/api/portraits/men/94.jpg') }}"
                        alt="User Image" class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0 object-cover shadow-xl">
                    </img>
                    <h1 class="text-xl font-bold">{{ $employer->business_Name }}</h1>



                    <p class="text-gray-700">{{ $employer->trade_Name }}</p>

                </div>
                <hr class="my-6 border-t border-gray-300">
                <div class="flex flex-col w-full px-5 mt-5">

                    <ul>
                        <li class="mb-4">
                            <div class="flex flex-row gap-4 w-full">
                                <div class="flex flex-col">

                                    <svg class="w-7 h-7 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
                                    </svg>


                                </div>
                                <div class="flex flex-col gap-1">
                                    <div class="text-lg font-bold text-black">
                                        Company Type

                                    </div>
                                    <div class="text-md font-medium">

                                        {{ $employer->company_Type == 1 ? 'Main' : ($employer->company_Type == 2 ? 'Branch' : '') }}

                                    </div>


                                </div>
                            </div>
                        </li>

                        <li class="mb-4">
                            <div class="flex flex-row gap-4 w-full">
                                <div class="flex flex-col">
                                    <svg class="w-7 h-7 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                    </svg>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <div class="text-lg font-bold text-black">
                                        Employer Type
                                    </div>
                                    <div class="text-md font-medium">
                                        {{ $employer->employer_Type == 1 ? 'Public' : ($employer->employer_Type == 2 ? 'Private' : '') }}
                                    </div>


                                </div>
                            </div>
                        </li>

                        <li class="mb-4">
                            <div class="flex flex-row gap-4 w-full">
                                <div class="flex flex-col">
                                    <svg class="w-7 h-7 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                    </svg>

                                </div>
                                <div class="flex flex-col gap-1">
                                    <div class="text-lg font-bold text-black">
                                        Workforce
                                    </div>
                                    <div class="text-md font-medium">
                                        {{ $employer->company_Total_workforce == 1
                                            ? '1 - 9 (Micro)'
                                            : ($employer->company_Total_workforce == 2
                                                ? '10 - 99 (Small)'
                                                : ($employer->company_Total_workforce == 3
                                                    ? '100 - 199 (Medium)'
                                                    : ($employer->company_Total_workforce == 4
                                                        ? '200 and Over (Large)'
                                                        : ''))) }}

                                    </div>


                                </div>
                            </div>
                        </li>

                        <li class="mb-4">
                            <div class="flex flex-row gap-4 w-full">
                                <div class="flex flex-col">
                                    <svg class="w-7 h-7 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                    </svg>


                                </div>
                                <div class="flex flex-col gap-1">
                                    <div class="text-lg font-bold text-black">
                                        Company Address
                                    </div>
                                    <div class="text-md font-medium">
                                        {{ $employer->barangay->barangay_Name }},
                                        {{ $employer->barangay->municipality->municipality_Name }},
                                        {{ $employer->barangay->municipality->province->province_Name }}
                                    </div>


                                </div>
                            </div>
                        </li>



                    </ul>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:w-3/4" x-data="{
            profileTab: 'profileOverview',
        }">

            <div x-show="profileTab === 'profileOverview'" class="flex flex-col space-y-5"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100">

                <div class="container">
                    <div class="bg-white shadow-lg rounded-lg p-6 text-wrap">
                        <div class="flex flex-row w-full items-center justify-between">
                            <h2 class="text-xl font-bold">Company Description</h2>



                            <div
                                class="flex items-center rounded-full hover:bg-gray-300 transition-transform p-1 cursor-pointer">
                                <svg wire:click.prevent="open" class="w-8 h-8" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </div>


                        </div>

                        <p class="text-gray-700 text-wrap break-words">
                            {{ !empty($employer->company_Desc) ? $employer->company_Desc : 'Empty Company Description' }}

                        </p>

                    </div>
                </div>




                <div class="container">
                    <div class="bg-white shadow rounded-lg p-6">

                        <div class="flex flex-row justify-between w-full mb-4">
                            <h2 class="text-xl font-bold">Job Postings</h2>


                            <div
                                class="flex items-center rounded-full hover:bg-gray-300 transition-transform p-1 cursor-pointer">
                                <a wire:navigate href="{{ route('edit.details.emp') }}">
                                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </a>
                            </div>

                        </div>
                        @if ($employer->job_posting->isEmpty())

                            <div class="flex flex-col justify-center items-center mt-20 mb-20">
                                <div class="flex  bg-gray-100 rounded-full p-1">

                                    <svg class="w-24 h-24 text-black" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                                    </svg>

                                </div>

                                <div class="text-center text-black text-xl font-semibold mt-5">
                                    No job posting found.
                                </div>
                            </div>
                        @else
                            @foreach ($employer->job_posting as $jobPosts)
                                <a href="{{ route('jobpost.show', ['id' => $jobPosts->job_id]) }}">
                                    <div wire:key='{{ $jobPosts->job_id }}' class="container p-3">

                                        <div class="flex flex-row h-full items-center">

                                            <div class="flex flex-col">
                                                <svg class="w-10 h-10 sm:w-20 sm:h-20 text-gray-800 "
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M10 2a3 3 0 0 0-3 3v1H5a3 3 0 0 0-3 3v2.382l1.447.723.005.003.027.013.12.056c.108.05.272.123.486.212.429.177 1.056.416 1.834.655C7.481 13.524 9.63 14 12 14c2.372 0 4.52-.475 6.08-.956.78-.24 1.406-.478 1.835-.655a14.028 14.028 0 0 0 .606-.268l.027-.013.005-.002L22 11.381V9a3 3 0 0 0-3-3h-2V5a3 3 0 0 0-3-3h-4Zm5 4V5a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v1h6Zm6.447 7.894.553-.276V19a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3v-5.382l.553.276.002.002.004.002.013.006.041.02.151.07c.13.06.318.144.557.242.478.198 1.163.46 2.01.72C7.019 15.476 9.37 16 12 16c2.628 0 4.98-.525 6.67-1.044a22.95 22.95 0 0 0 2.01-.72 15.994 15.994 0 0 0 .707-.312l.041-.02.013-.006.004-.002.001-.001-.431-.866.432.865ZM12 10a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H12Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>

                                            <div class="flex flex-col ml-4 w-full">
                                                <span class="text-2xl text-blue-500 font-bold">
                                                    {{ $jobPosts->job_Title }}
                                                </span>
                                                <span class="text-lg text-black font-semibold">
                                                    {{ $jobPosts->barangay->municipality->municipality_Name }},
                                                    {{ $jobPosts->barangay->municipality->province->province_Name }}
                                                </span>
                                                <div class="flex flex-row w-full gap-5">
                                                    <span class="text-md text-black font-semibold">
                                                        {{ $jobPosts->job_Type == 1 ? 'Full Time' : ($jobPosts->job_Type == 2 ? 'Part Time' : '') }}
                                                    </span>
                                                    <span class="text-md text-black font-semibold">
                                                        ₱{{ number_format($jobPosts->job_MinWage, 2) }} -
                                                        ₱{{ number_format($jobPosts->job_MaxWage, 2) }}
                                                    </span>



                                                </div>

                                                <span class="text-sm text-gray-700 font-medium">Posted at:
                                                    {{ $jobPosts->created_at->format('F j, Y') }}</span>

                                            </div>

                                        </div>

                                    </div>
                                </a>
                                <hr class="h-0.5 my-2 mx-10 bg-blue-200 border-0">
                            @endforeach

                        @endif




                    </div>

                </div>



            </div>






        </div>

    </div>



    {{--    --}}


    <x-modal name="aboutme-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
            <h2 class="text-xl font-bold text-gray-900">
                {{ __('Edit Company Description') }}
            </h2>
            <hr>
            <div class="flex flex-col mt-2">
                <div class="flex flex-col mt-2 w-full">
                    {{-- <x-input-label :value="__('Company Description')" /> --}}
                    <textarea wire:model='description' id="message" rows="10" required
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 resize-none overflow-y-auto"
                        placeholder="Write something about yourself here..." maxlength="600"></textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

            </div>



            <div class="mt-6 flex justify-end">
                <x-secondary-button wire:click.prevent="close" type="button">
                    {{ __('Cancel') }}
                </x-secondary-button>


                <x-primary-button wire:loading.attr="disabled" class="ms-3" type="button">
                    <div wire:click.prevent="save">


                        {{ __('Save') }}

                        <div wire:loading.delay.long wire:target='save' role="status">

                            <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin fill-blue-600 ml-4"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>
                            <span class="sr-only">Loading...</span>

                        </div>
                    </div>

                </x-primary-button>

            </div>
    </x-modal>

</div>
