<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="overflow-x-auto">
        <div class="grid grid-flow-col gap-4 py-8 mx-12">
            <a href="#"
                class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                    src="/docs/images/blog/image-4.jpg" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Noteworthy technology acquisitions
                        2021
                    </h5>
                    <p class="mb-3 font-normal text-gray-700 ">Here are the biggest enterprise technology acquisitions
                        of
                        2021 so far, in reverse chronological order.</p>
                </div>
            </a>
        </div>
    </div>


    <div class="flex flex-col md:flex-row justify-between mx-4 md:mx-24">


        {{-- MAIN BAR FOR JOB POST --}}
        <div class="container max-w-6xl sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="p-6 text-gray-900">
                <div class="flex flex-row">
                    <div class="">
                        <img src="{{ asset('assets/img/peso-1.png') }}" alt="Default Image"
                            class="w-48 h-48 bg-gray-300 rounded mb-4 shrink-0">
                    </div>
                    <div class="flex flex-col ml-5">
                        <div class="flex flex-row">
                            <h1 class="text-blue-500 text-xl">Job Type</h1>
                        </div>
                        <div class="flex flex-row mt-auto">
                            <h2>National University - Philippines</h2>
                        </div>
                        <div class="flex flex-row items-center space-x-20 mt-auto">
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




        {{-- SIDE BAR --}}
        {{-- <div class="container max-w-sm mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="p-6 text-gray-900">
                {{ __("You're logged in!") }}
                aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa
                aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa
                aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa
                aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa aa
                aa aa aa aa aa aa aa aa
            </div>
        </div>


    </div> --}}











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
