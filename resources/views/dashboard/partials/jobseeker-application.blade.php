<div class="grid grid-cols-4 sm:grid-cols-12 mt-4 mx-8 p-0 sm:p-6 gap-5">
    <div class="col-span-4 sm:col-span-5">

        <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>

                {{-- SEARCH --}}
                <input type="text" id="table-search-users"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search for applications">
            </div>
            <div>

                {{-- DROP DOWN BUTTON --}}
                <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                    class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5"
                    type="button">
                    <span class="sr-only">Action button</span>
                    Filter
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                    <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownActionButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Reward</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Promote</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Activate
                                account</a>
                        </li>
                    </ul>
                    <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Delete
                            User</a>
                    </div>
                </div>
            </div>
        </div>
        <table class="">
            <tbody class="">

                <tr>
                    <a href="#">
                        <div class="bg-white shadow rounded-lg p-6 flex flex-col mb-4 hover:scale-105 transition-transform">

                            <div class="flex flex-row">
                                <div class="flex flex-col">
                                    <img src="https://randomuser.me/api/portraits/men/94.jpg"
                                        class="w-30 h-30 bg-gray-300 rounded-lg shrink-0">
                                    </img>
                                </div>
                                <div class="flex flex-col ml-4 w-full">
                                    <h1 class="text-3xl font-bold underline">IT Professor</h1>
                                    <h1 class="text-l text-gray-600">National University Baliwag</h1>
                                    <div class="flex flex-row">
                                        <span
                                            class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded me-2 border border-gray-500 ">
                                            <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                            </svg>
                                            3 days ago
                                        </span>
                                    </div>

                                </div>
                                <div class="flex flex-row ml-auto mr-0 mb-auto mt-0">
                                    <span
                                        class="bg-yellow-300 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded ">Pending</span>
                                </div>
                            </div>

                            <div class="flex flex-col w-full mt-4">
                                <div class="flex flex-col md:flex-row">
                                    <div class="md:w-1/4 text-left">

                                        <h3 class="text-sm"> <i class="fa-solid fa-location-dot"></i> SM
                                            Baliwag
                                            Complex, Doña</h3>
                                    </div>
                                    <div class="md:w-1/4 text-left md:text-center">
                                        <h3 class="text-sm"> <i class="fa-solid fa-graduation-cap"></i>
                                            Master's
                                            Graduate</h3>
                                    </div>
                                    <div class="md:w-1/4 text-left md:text-center">
                                        <h3 class="text-sm"> <i class="fa-solid fa-briefcase"></i> Full Time
                                        </h3>
                                    </div>
                                    <div class="md:w-1/4 text-left md:text-center">
                                        <h3 class="text-sm"> <i class="fa-solid fa-calendar"></i> March 30,
                                            2024
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </tr>

                <tr>
                    <a href="#">
                        <div class="bg-white shadow rounded-lg p-6 flex flex-col mb-4 hover:scale-105 transition-transform">

                            <div class="flex flex-row">
                                <div class="flex flex-col">
                                    <img src="https://randomuser.me/api/portraits/men/94.jpg"
                                        class="w-30 h-30 bg-gray-300 rounded-lg shrink-0">
                                    </img>
                                </div>
                                <div class="flex flex-col ml-4 w-full">
                                    <h1 class="text-3xl font-bold underline">IT Professor</h1>
                                    <h1 class="text-l text-gray-600">National University Baliwag</h1>
                                    <div class="flex flex-row">
                                        <span
                                            class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded me-2 border border-gray-500 ">
                                            <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                            </svg>
                                            3 days ago
                                        </span>
                                    </div>

                                </div>
                                <div class="flex flex-row ml-auto mr-0 mb-auto mt-0">
                                    <span
                                        class="bg-yellow-300 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded ">Pending</span>
                                </div>
                            </div>

                            <div class="flex flex-col w-full mt-4">
                                <div class="flex flex-col md:flex-row">
                                    <div class="md:w-1/4 text-left">

                                        <h3 class="text-sm"> <i class="fa-solid fa-location-dot"></i> SM
                                            Baliwag
                                            Complex, Doña</h3>
                                    </div>
                                    <div class="md:w-1/4 text-left md:text-center">
                                        <h3 class="text-sm"> <i class="fa-solid fa-graduation-cap"></i>
                                            Master's
                                            Graduate</h3>
                                    </div>
                                    <div class="md:w-1/4 text-left md:text-center">
                                        <h3 class="text-sm"> <i class="fa-solid fa-briefcase"></i> Full Time
                                        </h3>
                                    </div>
                                    <div class="md:w-1/4 text-left md:text-center">
                                        <h3 class="text-sm"> <i class="fa-solid fa-calendar"></i> March 30,
                                            2024
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </tr>

                <tr>
                    <a href="#">
                        <div class="bg-white shadow rounded-lg p-6 flex flex-col mb-4 hover:scale-105 transition-transform">

                            <div class="flex flex-row">
                                <div class="flex flex-col">
                                    <img src="https://randomuser.me/api/portraits/men/94.jpg"
                                        class="w-30 h-30 bg-gray-300 rounded-lg shrink-0">
                                    </img>
                                </div>
                                <div class="flex flex-col ml-4 w-full">
                                    <h1 class="text-3xl font-bold underline">IT Professor</h1>
                                    <h1 class="text-l text-gray-600">National University Baliwag</h1>
                                    <div class="flex flex-row">
                                        <span
                                            class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded me-2 border border-gray-500 ">
                                            <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                            </svg>
                                            3 days ago
                                        </span>
                                    </div>

                                </div>
                                <div class="flex flex-row ml-auto mr-0 mb-auto mt-0">
                                    <span
                                        class="bg-yellow-300 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded ">Pending</span>
                                </div>
                            </div>

                            <div class="flex flex-col w-full mt-4">
                                <div class="flex flex-col md:flex-row">
                                    <div class="md:w-1/4 text-left">

                                        <h3 class="text-sm"> <i class="fa-solid fa-location-dot"></i> SM
                                            Baliwag
                                            Complex, Doña</h3>
                                    </div>
                                    <div class="md:w-1/4 text-left md:text-center">
                                        <h3 class="text-sm"> <i class="fa-solid fa-graduation-cap"></i>
                                            Master's
                                            Graduate</h3>
                                    </div>
                                    <div class="md:w-1/4 text-left md:text-center">
                                        <h3 class="text-sm"> <i class="fa-solid fa-briefcase"></i> Full Time
                                        </h3>
                                    </div>
                                    <div class="md:w-1/4 text-left md:text-center">
                                        <h3 class="text-sm"> <i class="fa-solid fa-calendar"></i> March 30,
                                            2024
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </tr>

                <tr>
                    <a href="#">
                        <div class="bg-white shadow rounded-lg p-6 flex flex-col mb-4 hover:scale-105 transition-transform">

                            <div class="flex flex-row">
                                <div class="flex flex-col">
                                    <img src="https://randomuser.me/api/portraits/men/94.jpg"
                                        class="w-30 h-30 bg-gray-300 rounded-lg shrink-0">
                                    </img>
                                </div>
                                <div class="flex flex-col ml-4 w-full">
                                    <h1 class="text-3xl font-bold underline">IT Professor</h1>
                                    <h1 class="text-l text-gray-600">National University Baliwag</h1>
                                    <div class="flex flex-row">
                                        <span
                                            class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded me-2 border border-gray-500 ">
                                            <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                            </svg>
                                            3 days ago
                                        </span>
                                    </div>

                                </div>
                                <div class="flex flex-row ml-auto mr-0 mb-auto mt-0">
                                    <span
                                        class="bg-yellow-300 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded ">Pending</span>
                                </div>
                            </div>

                            <div class="flex flex-col w-full mt-4">
                                <div class="flex flex-col md:flex-row">
                                    <div class="md:w-1/4 text-left">

                                        <h3 class="text-sm"> <i class="fa-solid fa-location-dot"></i> SM
                                            Baliwag
                                            Complex, Doña</h3>
                                    </div>
                                    <div class="md:w-1/4 text-left md:text-center">
                                        <h3 class="text-sm"> <i class="fa-solid fa-graduation-cap"></i>
                                            Master's
                                            Graduate</h3>
                                    </div>
                                    <div class="md:w-1/4 text-left md:text-center">
                                        <h3 class="text-sm"> <i class="fa-solid fa-briefcase"></i> Full Time
                                        </h3>
                                    </div>
                                    <div class="md:w-1/4 text-left md:text-center">
                                        <h3 class="text-sm"> <i class="fa-solid fa-calendar"></i> March 30,
                                            2024
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </tr>

                <tr>
                    <a href="#">
                        <div class="bg-white shadow rounded-lg p-6 flex flex-col mb-4 hover:scale-105 transition-transform">

                            <div class="flex flex-row">
                                <div class="flex flex-col">
                                    <img src="https://randomuser.me/api/portraits/men/94.jpg"
                                        class="w-30 h-30 bg-gray-300 rounded-lg shrink-0">
                                    </img>
                                </div>
                                <div class="flex flex-col ml-4 w-full">
                                    <h1 class="text-3xl font-bold underline">IT Professor</h1>
                                    <h1 class="text-l text-gray-600">National University Baliwag</h1>
                                    <div class="flex flex-row">
                                        <span
                                            class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded me-2 border border-gray-500 ">
                                            <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                            </svg>
                                            3 days ago
                                        </span>
                                    </div>

                                </div>
                                <div class="flex flex-row ml-auto mr-0 mb-auto mt-0">
                                    <span
                                        class="bg-yellow-300 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded ">Pending</span>
                                </div>
                            </div>

                            <div class="flex flex-col w-full mt-4">
                                <div class="flex flex-col md:flex-row">
                                    <div class="md:w-1/4 text-left">

                                        <h3 class="text-sm"> <i class="fa-solid fa-location-dot"></i> SM
                                            Baliwag
                                            Complex, Doña</h3>
                                    </div>
                                    <div class="md:w-1/4 text-left md:text-center">
                                        <h3 class="text-sm"> <i class="fa-solid fa-graduation-cap"></i>
                                            Master's
                                            Graduate</h3>
                                    </div>
                                    <div class="md:w-1/4 text-left md:text-center">
                                        <h3 class="text-sm"> <i class="fa-solid fa-briefcase"></i> Full Time
                                        </h3>
                                    </div>
                                    <div class="md:w-1/4 text-left md:text-center">
                                        <h3 class="text-sm"> <i class="fa-solid fa-calendar"></i> March 30,
                                            2024
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </tr>

            </tbody>
        </table>
    </div>

    <div class="col-span-4 sm:col-span-7">
        <div class="bg-white shadow rounded-lg p-6 flex flex-col">
            <div class="flex flex-row">
                <div class="flex flex-col">
                    <img src="https://randomuser.me/api/portraits/men/94.jpg"
                        class="w-30 h-30 bg-gray-300 rounded-lg shrink-0">
                    </img>
                </div>
                <div class="flex flex-col ml-4 w-full">
                    <h1 class="text-7xl font-bold underline">IT Professor</h1>
                    <h1 class="text-l text-gray-600">National University Baliwag</h1>

                </div>
                <div class="flex flex-row ml-auto mr-0 mb-auto mt-0">
                    <span
                        class="bg-yellow-300 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded ">Pending</span>
                </div>
            </div>
            <hr class="mt-4">
            <div class="flex flex-col mt-4">

                <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">APPLICATION DETAIL</span>

                <ul>


                    <div class="flex flex-row">
                        <li class="mb-2 font-bold">Resume:</li>
                        <p class="ms-4">AUTO-GENERATED</p>
                    </div>

                    <div class="flex flex-row">
                        <li class="mb-2 font-bold">Date Applied:</li>
                        <p class="ms-4">09123456789</p>
                    </div>


                    <div class="flex flex-row">
                        <li class="mb-2 font-bold">Address:</li>
                        <p class="ms-4">SM Baliwag
                            Complex, Doña
                            Remedios Trinidad, Highway, Brgy. Pagala, Baliuag, Bulacan 3006</p>
                    </div>

                </ul>


                {{-- BUTTON --}}
                <div class="mt-6 flex flex-wrap gap-4 justify-center">
                    <a href="#" class="bg-blue-700 hover:bg-blue-800 text-white py-2 px-4 rounded">View
                        Job Posting</a>
                    <a href="#" class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded">View
                        Resume</a>
                </div>

            </div>



        </div>
    </div>
</div>
