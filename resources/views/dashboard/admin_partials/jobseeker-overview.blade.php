<div class="container mx-auto py-8">
    <div class="grid grid-cols-4 sm:grid-cols-12 gap-4">
        <div class="col-span-12">
            <h1 class="text-2xl font-bold">User Management \ User Overview</h1>
        </div>

        <div class="col-span-12 mt-5">

            <div class="flex flex-row">

                <div class="flex flex-col">
                    <h1 class="text-xl font-medium">Employee ID: 123456</h1>
                    <h1 class="text-md font-light text-gray-500">April 29, 2024, 5:30 AM</h1>
                </div>

                {{-- DEACTIVATE BUTTON --}}
                <div class="flex flex-col ml-auto mr-0">
                    <button type="button"
                        class="text-red-900 font-bold bg-red-300 hover:bg-red-500 focus:ring-4 focus:ring-red-100 font-medium rounded-lg text-md px-5 py-2.5 me-2 mb-2 focus:outline-none">Deactivate
                        Account</button>
                </div>

            </div>

        </div>

        {{-- PROFILE CONTAINER --}}
        <div class="col-span-4 sm:col-span-4">
            <div class="bg-white shadow rounded-lg p-6">

                <div class="flex flex-col items-center">
                    {{-- IMAGE --}}
                    <img src="https://randomuser.me/api/portraits/men/94.jpg"
                        class="w-32 h-32 bg-gray-300 rounded-md mb-4 shrink-0">
                    </img>

                    <h1 class="text-xl font-bold">John Doe</h1>
                    <p class="text-gray-700">#IDNUMBER</p>
                </div>

                <hr class="my-6 border-t border-gray-300">

                <div class="flex flex-col">

                    <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Details</span>

                    <ul>
                        <div class="flex flex-row">
                            <li class="mb-2 font-bold">Email:</li>
                            <p class="ms-4">johndoe@gmail.com</p>
                        </div>

                        <div class="flex flex-row">
                            <li class="mb-2 font-bold">Status:</li>
                            <p class="ms-4">UNEMPLOYED</p>
                        </div>

                        <div class="flex flex-row">
                            <li class="mb-2 font-bold">Contact:</li>
                            <p class="ms-4">09123456789</p>
                        </div>

                        <div class="flex flex-row">
                            <li class="mb-2 font-bold">Address:</li>
                            <p class="ms-4">SM Baliwag
                                Complex, Doña
                                Remedios Trinidad, Highway, Brgy. Pagala, Baliuag, Bulacan 3006</p>
                        </div>

                    </ul>

                    <div class="mt-6 flex flex-wrap gap-4 justify-center">
                        <a href="#" class="bg-blue-700 hover:bg-blue-800 text-white py-2 px-4 rounded">View
                            NSRP</a>
                        <a href="#" class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded">View
                            Resume</a>
                    </div>

                </div>

            </div>
        </div>

        {{-- CONTAINER FOR TABS --}}
        <div class="col-span-4 sm:col-span-8 row">

            {{-- TAB BUTTON --}}
            <ul class="flex flex-row space-x space-x-4 text-sm font-medium text-gray-500 md:me-4 mb-4 md:mb-0">
                <li>
                    <a href="#"
                        class="inline-flex items-center px-4 py-3 text-white bg-blue-700 rounded-lg active w-full  "
                        aria-current="page">
                        <svg class="w-4 h-4 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                        Profile
                    </a>
                </li>

                <li>
                    <a href="#"
                        class="inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-300 hover:bg-gray-100 w-full">
                        <svg class="w-4 h-4 me-2 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        Dashboard
                    </a>
                </li>
            </ul>

            {{-- 2ND TAB --}}
            <div class="bg-white shadow rounded-lg p-6 mt-4">
                <h1 class="text-2xl font-bold mb-7">Reset Password</h1>
                <div class="bg-yellow-100 shadow rounded-lg p-6 mt-4 mb-5">
                    <p class="text-yellow-700 font-semibold">Admin side password reset</p>
                    <p class="text-yellow-700 font-normal">New password will be sent thru the user's email</p>
                </div>

                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 focus:outline-none">Reset
                    Password</button>
            </div>



            {{-- APPLICATION HISTORY CONTAINER --}}
            <div class="bg-white shadow rounded-lg p-6 mt-4">
                <h1 class="text-2xl font-bold mb-7">Application History</h1>

                <div class="relative overflow-x-auto">
                    <div
                        class="flex items-center justify-end flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 mr-1">

                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative">
                            <div
                                class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            
                            {{-- SEARCH --}}
                            <input type="text" id="table-search-users"
                                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search for Applications">
                        </div>
                    </div>

                    {{-- HISTORY TABLE --}}
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Job Posting ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Company
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Job Position
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">

                                    <div class="ps-3 text-wrap">
                                        <div class="text-base font-semibold">SSS ID</div>

                                    </div>

                                </th>
                                <td class="px-6 py-4">
                                    <div class="text-base font-semibold">National University</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-base font-semibold">Information Technology Professor</div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Rejected
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-base">June 9, 2024</div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#" class="font-medium text-blue-600 hover:underline "><i
                                            class="fa-solid fa-eye"></i></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                {{-- PAGINATION --}}
                <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4"
                    aria-label="Table navigation">
                    <span
                        class="text-sm font-normal text-gray-500 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing
                        <span class="font-semibold text-gray-900">1-10</span> of <span
                            class="font-semibold text-gray-900">1000</span></span>
                    <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                        <li>
                            <a href="#"
                                class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 ">Previous</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">1</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">2</a>
                        </li>
                        <li>
                            <a href="#" aria-current="page"
                                class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700">3</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">4</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">5</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 ">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
