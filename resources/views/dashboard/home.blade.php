<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="overflow-x-auto">
        <div class="flex flex-row md:grid md:grid-cols-5 gap-2 py-8 mx-4 sm:mx-12 ">

            <a href="#"
                class="flex flex-col max-w-72 items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-sm hover:bg-gray-100 flex-shrink-0">
                <img class="object-cover w-auto rounded-t-lg h-48 md:h-auto md:w-36 md:rounded-none md:rounded-s-lg"
                    src="{{ asset('assets/img/peso-1.png') }}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-l font-bold tracking-tight text-gray-900 ">Noteworthy technology acquisitions
                        2021
                    </h5>
                    <p class="mb-3 text-sm font-normal text-gray-700 ">Here are the biggest enterprise technology
                        acquisitions
                        of
                        2021 so far, in reverse chronological order.</p>
                </div>
            </a>

            <a href="#"
                class="flex flex-col max-w-72 items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-sm hover:bg-gray-100 flex-shrink-0">
                <img class="object-cover w-auto rounded-t-lg h-48 md:h-auto md:w-36 md:rounded-none md:rounded-s-lg"
                    src="{{ asset('assets/img/peso-1.png') }}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-l font-bold tracking-tight text-gray-900 ">Noteworthy technology acquisitions
                        2021
                    </h5>
                    <p class="mb-3 text-sm font-normal text-gray-700 ">Here are the biggest enterprise technology
                        acquisitions
                        of
                        2021 so far, in reverse chronological order.</p>
                </div>
            </a>
            <a href="#"
                class="flex flex-col max-w-72 items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-sm hover:bg-gray-100 flex-shrink-0">
                <img class="object-cover w-auto rounded-t-lg h-48 md:h-auto md:w-36 md:rounded-none md:rounded-s-lg"
                    src="{{ asset('assets/img/peso-1.png') }}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-l font-bold tracking-tight text-gray-900 ">Noteworthy technology acquisitions
                        2021
                    </h5>
                    <p class="mb-3 text-sm font-normal text-gray-700 ">Here are the biggest enterprise technology
                        acquisitions
                        of
                        2021 so far, in reverse chronological order.</p>
                </div>
            </a>

            <a href="#"
                class="flex flex-col max-w-72 items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-sm hover:bg-gray-100 flex-shrink-0">
                <img class="object-cover w-auto rounded-t-lg h-48 md:h-auto md:w-36 md:rounded-none md:rounded-s-lg"
                    src="{{ asset('assets/img/peso-1.png') }}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-l font-bold tracking-tight text-gray-900 ">Noteworthy technology acquisitions
                        2021
                    </h5>
                    <p class="mb-3 text-sm font-normal text-gray-700 ">Here are the biggest enterprise technology
                        acquisitions
                        of
                        2021 so far, in reverse chronological order.</p>
                </div>
            </a>

            <a href="#"
                class="flex flex-col max-w-72 items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-sm hover:bg-gray-100 flex-shrink-0">
                <img class="object-cover w-auto rounded-t-lg h-48 md:h-auto md:w-36 md:rounded-none md:rounded-s-lg"
                    src="{{ asset('assets/img/peso-1.png') }}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-l font-bold tracking-tight text-gray-900 ">Noteworthy technology acquisitions
                        2021
                    </h5>
                    <p class="mb-3 text-sm font-normal text-gray-700 ">Here are the biggest enterprise technology
                        acquisitions
                        of
                        2021 so far, in reverse chronological order.</p>
                </div>
            </a>


        </div>


    </div>


    <div class="flex flex-col space-y-10 md:space-y-0 md:flex-row justify-center">


        {{-- MAIN BAR FOR JOB POST --}}
        <div
            class="container max-w-7xl px-3 sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm rounded-lg md:basis-3/4">
            <div class="flex flex-col">

                <div class="flex-row w-full my-5 ">
                    <form class="max-w-md">
                        <label for="default-search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="roundn" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search Mockups, Logos..." required />
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ">Search</button>
                        </div>
                    </form>

                </div>
            </div>
            <table class="w-full ">

                <tbody>
                    <tr class="text-center hover:bg-gray-100">
                        <td class="p-2 rounded-lg">
                            <div class="flex flex-row w-full">
                                <div class="flex flex-col justify-center items-center h-full  flex-shrink-0">
                                    <img src="{{asset('assets/img/peso-1.png')}}" alt="Default Image" class="w-48 h-48 bg-gray-300 rounded object-contain">
                                </div>
                                <div class="flex-col w-full ml-5 space-y-1 md:space-y-8">
                                    <div class="flex flex-col">
                                        <div class="flex flex-col md:flex-row  text-left">
                                            <div class="flex flex-col md:w-3/4">
                                                <h1 class="text-blue-500 text-xl font-semibold">IT Professor</h1>
                                            </div>
                                            <div class="flex flex-col md:w-1/4">
                                                <h1 class="text-black text-xl text-left md:text-center font-medium">
                                                    ₱50,000</h1>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="flex flex-col">
                                        <div class="flex-row w-3/4 text-left">
                                            <h2 class="text-xl font-bold">National University Baliwag</h2>
                                        </div>
                                    </div>

                                    <div class="flex flex-col w-full">
                                        <div class="flex flex-col md:flex-row">
                                            <div class="md:w-1/4 text-left">

                                                <h3 class="text-sm"> <i class="fa-solid fa-location-dot"></i> SM Baliwag
                                                    Complex, Doña
                                                    Remedios Trinidad, Highway, Brgy. Pagala, Baliuag, Bulacan 3006</h3>
                                            </div>
                                            <div class="md:w-1/4 text-left md:text-center">
                                                <h3 class="text-sm"> <i class="fa-solid fa-graduation-cap"></i> Master's
                                                    Graduate</h3>
                                            </div>
                                            <div class="md:w-1/4 text-left md:text-center">
                                                <h3 class="text-sm"> <i class="fa-solid fa-briefcase"></i> Full Time
                                                </h3>
                                            </div>
                                            <div class="md:w-1/4 text-left md:text-center">
                                                <h3 class="text-sm"> <i class="fa-solid fa-calendar"></i> March 30, 2024
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mt-3">
                        </td>
                    </tr>
                    <tr class="text-center hover:bg-gray-100">
                        <td class="p-2 rounded-lg">
                            <div class="flex flex-row w-full">
                                <div class="flex flex-col justify-center items-center h-full  flex-shrink-0">
                                    <img src="{{asset('assets/img/peso-1.png')}}" alt="Default Image" class="w-48 h-48 bg-gray-300 rounded object-contain">
                                </div>
                                <div class="flex-col w-full ml-5 space-y-1 md:space-y-8">
                                    <div class="flex flex-col">
                                        <div class="flex flex-col md:flex-row  text-left">
                                            <div class="flex flex-col md:w-3/4">
                                                <h1 class="text-blue-500 text-xl font-semibold">IT Professor</h1>
                                            </div>
                                            <div class="flex flex-col md:w-1/4">
                                                <h1 class="text-black text-xl text-left md:text-center font-medium">
                                                    ₱50,000</h1>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="flex flex-col">
                                        <div class="flex-row w-3/4 text-left">
                                            <h2 class="text-xl font-bold">National University Baliwag</h2>
                                        </div>
                                    </div>

                                    <div class="flex flex-col w-full">
                                        <div class="flex flex-col md:flex-row">
                                            <div class="md:w-1/4 text-left">

                                                <h3 class="text-sm"> <i class="fa-solid fa-location-dot"></i> SM Baliwag
                                                    Complex, Doña
                                                    Remedios Trinidad, Highway, Brgy. Pagala, Baliuag, Bulacan 3006</h3>
                                            </div>
                                            <div class="md:w-1/4 text-left md:text-center">
                                                <h3 class="text-sm"> <i class="fa-solid fa-graduation-cap"></i> Master's
                                                    Graduate</h3>
                                            </div>
                                            <div class="md:w-1/4 text-left md:text-center">
                                                <h3 class="text-sm"> <i class="fa-solid fa-briefcase"></i> Full Time
                                                </h3>
                                            </div>
                                            <div class="md:w-1/4 text-left md:text-center">
                                                <h3 class="text-sm"> <i class="fa-solid fa-calendar"></i> March 30, 2024
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mt-3">
                        </td>
                    </tr>
                    <tr class="text-center hover:bg-gray-100">
                        <td class="p-2 rounded-lg">
                            <div class="flex flex-row w-full">
                                <div class="flex flex-col justify-center items-center h-full  flex-shrink-0">
                                    <img src="{{asset('assets/img/peso-1.png')}}" alt="Default Image" class="w-48 h-48 bg-gray-300 rounded object-contain">
                                </div>
                                <div class="flex-col w-full ml-5 space-y-1 md:space-y-8">
                                    <div class="flex flex-col">
                                        <div class="flex flex-col md:flex-row  text-left">
                                            <div class="flex flex-col md:w-3/4">
                                                <h1 class="text-blue-500 text-xl font-semibold">IT Professor</h1>
                                            </div>
                                            <div class="flex flex-col md:w-1/4">
                                                <h1 class="text-black text-xl text-left md:text-center font-medium">
                                                    ₱50,000</h1>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="flex flex-col">
                                        <div class="flex-row w-3/4 text-left">
                                            <h2 class="text-xl font-bold">National University Baliwag</h2>
                                        </div>
                                    </div>

                                    <div class="flex flex-col w-full">
                                        <div class="flex flex-col md:flex-row">
                                            <div class="md:w-1/4 text-left">

                                                <h3 class="text-sm"> <i class="fa-solid fa-location-dot"></i> SM Baliwag
                                                    Complex, Doña
                                                    Remedios Trinidad, Highway, Brgy. Pagala, Baliuag, Bulacan 3006</h3>
                                            </div>
                                            <div class="md:w-1/4 text-left md:text-center">
                                                <h3 class="text-sm"> <i class="fa-solid fa-graduation-cap"></i> Master's
                                                    Graduate</h3>
                                            </div>
                                            <div class="md:w-1/4 text-left md:text-center">
                                                <h3 class="text-sm"> <i class="fa-solid fa-briefcase"></i> Full Time
                                                </h3>
                                            </div>
                                            <div class="md:w-1/4 text-left md:text-center">
                                                <h3 class="text-sm"> <i class="fa-solid fa-calendar"></i> March 30, 2024
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mt-3">
                        </td>
                    </tr>
                    <tr class="text-center hover:bg-gray-100">
                        <td class="p-2 rounded-lg">
                            <div class="flex flex-row w-full">
                                <div class="flex flex-col justify-center items-center h-full  flex-shrink-0">
                                    <img src="{{asset('assets/img/peso-1.png')}}" alt="Default Image" class="w-48 h-48 bg-gray-300 rounded object-contain">
                                </div>
                                <div class="flex-col w-full ml-5 space-y-1 md:space-y-8">
                                    <div class="flex flex-col">
                                        <div class="flex flex-col md:flex-row  text-left">
                                            <div class="flex flex-col md:w-3/4">
                                                <h1 class="text-blue-500 text-xl font-semibold">IT Professor</h1>
                                            </div>
                                            <div class="flex flex-col md:w-1/4">
                                                <h1 class="text-black text-xl text-left md:text-center font-medium">
                                                    ₱50,000</h1>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="flex flex-col">
                                        <div class="flex-row w-3/4 text-left">
                                            <h2 class="text-xl font-bold">National University Baliwag</h2>
                                        </div>
                                    </div>

                                    <div class="flex flex-col w-full">
                                        <div class="flex flex-col md:flex-row">
                                            <div class="md:w-1/4 text-left">

                                                <h3 class="text-sm"> <i class="fa-solid fa-location-dot"></i> SM Baliwag
                                                    Complex, Doña
                                                    Remedios Trinidad, Highway, Brgy. Pagala, Baliuag, Bulacan 3006</h3>
                                            </div>
                                            <div class="md:w-1/4 text-left md:text-center">
                                                <h3 class="text-sm"> <i class="fa-solid fa-graduation-cap"></i> Master's
                                                    Graduate</h3>
                                            </div>
                                            <div class="md:w-1/4 text-left md:text-center">
                                                <h3 class="text-sm"> <i class="fa-solid fa-briefcase"></i> Full Time
                                                </h3>
                                            </div>
                                            <div class="md:w-1/4 text-left md:text-center">
                                                <h3 class="text-sm"> <i class="fa-solid fa-calendar"></i> March 30, 2024
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mt-3">
                        </td>
                    </tr>
                    <tr class="text-center hover:bg-gray-100">
                        <td class="p-2 rounded-lg">
                            <div class="flex flex-row w-full">
                                <div class="flex flex-col justify-center items-center h-full  flex-shrink-0">
                                    <img src="{{asset('assets/img/peso-1.png')}}" alt="Default Image" class="w-48 h-48 bg-gray-300 rounded object-contain">
                                </div>
                                <div class="flex-col w-full ml-5 space-y-1 md:space-y-8">
                                    <div class="flex flex-col">
                                        <div class="flex flex-col md:flex-row  text-left">
                                            <div class="flex flex-col md:w-3/4">
                                                <h1 class="text-blue-500 text-xl font-semibold">IT Professor</h1>
                                            </div>
                                            <div class="flex flex-col md:w-1/4">
                                                <h1 class="text-black text-xl text-left md:text-center font-medium">
                                                    ₱50,000</h1>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="flex flex-col">
                                        <div class="flex-row w-3/4 text-left">
                                            <h2 class="text-xl font-bold">National University Baliwag</h2>
                                        </div>
                                    </div>

                                    <div class="flex flex-col w-full">
                                        <div class="flex flex-col md:flex-row">
                                            <div class="md:w-1/4 text-left">

                                                <h3 class="text-sm"> <i class="fa-solid fa-location-dot"></i> SM Baliwag
                                                    Complex, Doña
                                                    Remedios Trinidad, Highway, Brgy. Pagala, Baliuag, Bulacan 3006</h3>
                                            </div>
                                            <div class="md:w-1/4 text-left md:text-center">
                                                <h3 class="text-sm"> <i class="fa-solid fa-graduation-cap"></i> Master's
                                                    Graduate</h3>
                                            </div>
                                            <div class="md:w-1/4 text-left md:text-center">
                                                <h3 class="text-sm"> <i class="fa-solid fa-briefcase"></i> Full Time
                                                </h3>
                                            </div>
                                            <div class="md:w-1/4 text-left md:text-center">
                                                <h3 class="text-sm"> <i class="fa-solid fa-calendar"></i> March 30, 2024
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mt-3">
                        </td>
                    </tr>


                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="flex justify-center -space-x-px text-sm mt-10 mb-5">
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">Previous</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page"
                            class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700">3</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">4</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">5</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">Next</a>
                    </li>
                </ul>
            </nav>



        </div>











        {{-- SIDE BAR --}}
        <div
            class="container h-auto max-w-sm mx-auto md:mx-10 sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg md:basis-1/4">

            <div class="p-6 text-gray-900 text-center w-full">
              <h1 class="font-bold text-2xl">Top Paying Jobs</h1>
              
            </div>
        </div>


    </div>

    </div>









    {{-- 
    <div class="flex justify-content mx-24">

        <div class="container max-w-8xl sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-row">
                        <div class="flex flex-col items-center">
                            <img src="{{ asset('path_to_default_image.jpg') }}" alt="Default Image"
                                class="w-48 h-48 bg-gray-300 rounded mb-4 shrink-0">
                        </div>
                        <div class="flex flex-col ml-5">
                            <div class="flex flex-row">
                                <h1 class="text-blue-500 text-xl">Job Type</h1>
                            </div>
                            <div class="flex flex-row">
                                <h2>Company Name</h2>
                            </div>
                            <div class="flex flex-row items-center space-x-20">
                                <div class="w-1/4">
                                    <h2>Company Long Address, Can be Address</h2>
                                </div>
                                <div class="w-1/4">
                                    <h2>College</h2>
                                </div>
                                <div class="w-1/4">
                                    <h2>Part Time</h2>
                                </div>
                                <div class="w-1/4">
                                    <h2>Posted On Sometime</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{ __("You're logged in!") }}
                    aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa
                    aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa
                    aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa
                    aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa
                    aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa
                    aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa
                    aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa
                    aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa
                    aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa
                    aa aa aa
                </div>
            </div>
        </div>


        <div class="container max-w-sm mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa
                    aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa
                    aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa
                    aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa
                    aa aa aa aa aa aa aa aa
                </div>
            </div>
        </div>

    </div> --}}







</x-app-layout>
