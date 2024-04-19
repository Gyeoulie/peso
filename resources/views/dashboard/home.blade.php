<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    {{-- @include('dashboard.partials.job-dash') --}}
    {{-- @include('dashboard.partials.employer-dash') --}}





    <div class="bg-gray-100">
        <div class="container mx-auto py-8">
            <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">

                <div class="col-span-4 sm:col-span-3">
                    <div class="bg-white shadow rounded-lg p-6">
                        <div class="flex flex-col items-center">
                            <img src="https://randomuser.me/api/portraits/men/94.jpg"
                                class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">

                            </img>
                            <h1 class="text-xl font-bold">John Doe</h1>
                            <p class="text-gray-700">Software Developer</p>
                            <div class="mt-6 flex flex-wrap gap-4 justify-center">
                                <a href="#"
                                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Contact</a>
                                <a href="#"
                                    class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded">Resume</a>
                            </div>
                        </div>
                        <hr class="my-6 border-t border-gray-300">
                        <div class="flex flex-col">
                            <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Skills</span>
                            <ul>
                                <li class="mb-2">JavaScript</li>
                                <li class="mb-2">React</li>
                                <li class="mb-2">Node.js</li>
                                <li class="mb-2">HTML/CSS</li>
                                <li class="mb-2">Tailwind Css</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-span-4 sm:col-span-9 space-y-5">
                    <div class="col-span-4 sm:col-span-9">
                        <div class="bg-white shadow rounded-lg p-6">
                            <h2 class="text-xl font-bold mb-4">About Me</h2>
                            <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                                finibus
                                est
                                vitae tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus non velit
                                egestas
                                suscipit. Nunc finibus vel ante id euismod. Vestibulum ante ipsum primis in faucibus
                                orci
                                luctus
                                et ultrices posuere cubilia Curae; Aliquam erat volutpat. Nulla vulputate pharetra
                                tellus,
                                in
                                luctus risus rhoncus id.
                            </p>
                        </div>
                    </div>


                    <div class="col-span-4 sm:col-span-9 ">
                        <div class="bg-white shadow rounded-lg p-6">


                            <div class="border-b border-gray-200">
                                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 ">
                                    <li class="me-2">
                                        <a href="#"
                                            class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300  group">
                                            <svg class="w-4 h-4 me-2 text-gray-400 group-hover:text-gray-500"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                            </svg>Profile
                                        </a>
                                    </li>
                                    <li class="me-2">
                                        <a href="#"
                                            class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active  group"
                                            aria-current="page">
                                            <svg class="w-4 h-4 me-2 text-blue-600 " aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 18 18">
                                                <path
                                                    d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                                            </svg>Dashboard
                                        </a>
                                    </li>
                                    <li class="me-2">
                                        <a href="#"
                                            class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 group">
                                            <svg class="w-4 h-4 me-2 text-gray-400 group-hover:text-gray-500 "
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M5 11.424V1a1 1 0 1 0-2 0v10.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.228 3.228 0 0 0 0-6.152ZM19.25 14.5A3.243 3.243 0 0 0 17 11.424V1a1 1 0 0 0-2 0v10.424a3.227 3.227 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.243 3.243 0 0 0 2.25-3.076Zm-6-9A3.243 3.243 0 0 0 11 2.424V1a1 1 0 0 0-2 0v1.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0V8.576A3.243 3.243 0 0 0 13.25 5.5Z" />
                                            </svg>Settings
                                        </a>
                                    </li>
                                    <li class="me-2">
                                        <a href="#"
                                            class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300  group">
                                            <svg class="w-4 h-4 me-2 text-gray-400 group-hover:text-gray-500 "
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 18 20">
                                                <path
                                                    d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                                            </svg>Contacts
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed ">Disabled</a>
                                    </li>
                                </ul>
                            </div>




                            <h2 class="text-xl font-bold mt-6 mb-4">Work Experience</h2>





                            <div id="animation-carousel" class="relative w-full" data-carousel="static">
                                <!-- Carousel wrapper -->
                                <div class="relative h-24 overflow-hidden rounded-lg md:h-24">
                                    <!-- Item 1 -->

                                    <div class="hidden  duration-200 ease-linear container bg-red-200 p-2 rounded-lg w-full h-48" 
                                        data-carousel-item>
                                        <div class="mb-6">
                                            <div class="flex flex- justify-between flex-wrap gap-2 ">
                                                <span class="text-gray-700 font-bold">Web Developer</span>
                                                <p>
                                                    <span class="text-gray-700 mr-2">at ABC Company</span>
                                                    <span class="text-gray-700">2017 - 2019</span>
                                                </p>
                                            </div>
                                            <p class="mt-2">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus est
                                                vitae
                                                tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus
                                                non
                                                velit
                                                egestas
                                                suscipit.
                                            </p>
                                        </div>
                                    </div>



                                    <!-- Item 2 -->
                                    <div class="hidden duration-200 ease-linear" data-carousel-item>
                                        <img src="/docs/images/carousel/carousel-2.svg"
                                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                            alt="...">
                                    </div>
                                    <!-- Item 3 -->
                                    <div class="hidden duration-200 ease-linear" data-carousel-item>
                                        <img src="/docs/images/carousel/carousel-3.svg"
                                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                            alt="...">
                                    </div>
                                    <!-- Item 4 -->
                                    <div class="hidden duration-200 ease-linear" data-carousel-item>
                                        <img src="/docs/images/carousel/carousel-4.svg"
                                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                            alt="...">
                                    </div>
                                    <!-- Item 5 -->
                                    <div class="hidden duration-200 ease-linear" data-carousel-item>
                                        <img src="/docs/images/carousel/carousel-5.svg"
                                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                            alt="...">
                                    </div>
                                </div>
                                <!-- Slider controls -->
                                <button type="button"
                                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-prev>
                                    <span
                                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                                        </svg>
                                        <span class="sr-only">Previous</span>
                                    </span>
                                </button>
                                <button type="button"
                                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-next>
                                    <span
                                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                        <span class="sr-only">Next</span>
                                    </span>
                                </button>
                            </div>




                            <div class="grid grid-cols-2 gap-4">
                                <div class="container bg-red-200 p-2 rounded-lg">
                                    <div class="mb-6">
                                        <div class="flex flex- justify-between flex-wrap gap-2 w-full">
                                            <span class="text-gray-700 font-bold">Web Developer</span>
                                            <p>
                                                <span class="text-gray-700 mr-2">at ABC Company</span>
                                                <span class="text-gray-700">2017 - 2019</span>
                                            </p>
                                        </div>
                                        <p class="mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus est
                                            vitae
                                            tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus
                                            non
                                            velit
                                            egestas
                                            suscipit.
                                        </p>
                                    </div>
                                </div>
                                <div class="container bg-red-200 p-2 rounded-lg">
                                    <div class="mb-6">
                                        <div class="flex flex- justify-between flex-wrap gap-2 w-full">
                                            <span class="text-gray-700 font-bold">Web Developer</span>
                                            <p>
                                                <span class="text-gray-700 mr-2">at ABC Company</span>
                                                <span class="text-gray-700">2017 - 2019</span>
                                            </p>
                                        </div>
                                        <p class="mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus est
                                            vitae
                                            tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus
                                            non
                                            velit
                                            egestas
                                            suscipit.
                                        </p>
                                    </div>
                                </div>

                                <div class="container bg-red-200 p-2 rounded-lg">
                                    <div class="mb-6">
                                        <div class="flex flex- justify-between flex-wrap gap-2 w-full">
                                            <span class="text-gray-700 font-bold">Web Developer</span>
                                            <p>
                                                <span class="text-gray-700 mr-2">at ABC Company</span>
                                                <span class="text-gray-700">2017 - 2019</span>
                                            </p>
                                        </div>
                                        <p class="mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus est
                                            vitae
                                            tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus
                                            non
                                            velit
                                            egestas
                                            suscipit.
                                        </p>
                                    </div>
                                </div>
                                <div class="container bg-red-200 p-2 rounded-lg">
                                    <div class="mb-6">
                                        <div class="flex flex- justify-between flex-wrap gap-2 w-full">
                                            <span class="text-gray-700 font-bold">Web Developer</span>
                                            <p>
                                                <span class="text-gray-700 mr-2">at ABC Company</span>
                                                <span class="text-gray-700">2017 - 2019</span>
                                            </p>
                                        </div>
                                        <p class="mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus est
                                            vitae
                                            tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus
                                            non
                                            velit
                                            egestas
                                            suscipit.
                                        </p>
                                    </div>
                                </div>

                                <div class="container bg-red-200 p-2 rounded-lg">
                                    <div class="mb-6">
                                        <div class="flex flex- justify-between flex-wrap gap-2 w-full">
                                            <span class="text-gray-700 font-bold">Web Developer</span>
                                            <p>
                                                <span class="text-gray-700 mr-2">at ABC Company</span>
                                                <span class="text-gray-700">2017 - 2019</span>
                                            </p>
                                        </div>
                                        <p class="mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus est
                                            vitae
                                            tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus
                                            non
                                            velit
                                            egestas
                                            suscipit.
                                        </p>
                                    </div>
                                </div>

                                <div class="container bg-red-200 p-2 rounded-lg">
                                    <div class="mb-6">
                                        <div class="flex flex- justify-between flex-wrap gap-2 w-full">
                                            <span class="text-gray-700 font-bold">Web Developer</span>
                                            <p>
                                                <span class="text-gray-700 mr-2">at ABC Company</span>
                                                <span class="text-gray-700">2017 - 2019</span>
                                            </p>
                                        </div>
                                        <p class="mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus est
                                            vitae
                                            tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus
                                            non
                                            velit
                                            egestas
                                            suscipit.
                                        </p>
                                    </div>
                                </div>

                                <div class="container bg-red-200 p-2 rounded-lg">
                                    <div class="mb-6">
                                        <div class="flex flex- justify-between flex-wrap gap-2 w-full">
                                            <span class="text-gray-700 font-bold">Web Developer</span>
                                            <p>
                                                <span class="text-gray-700 mr-2">at ABC Company</span>
                                                <span class="text-gray-700">2017 - 2019</span>
                                            </p>
                                        </div>
                                        <p class="mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus est
                                            vitae
                                            tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus
                                            non
                                            velit
                                            egestas
                                            suscipit.
                                        </p>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>





    {{--    --}}

</x-app-layout>
