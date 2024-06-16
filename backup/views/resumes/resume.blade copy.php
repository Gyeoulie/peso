<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PESO') }}</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.5.2-web/css/all.min.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />



    <!-- Scripts -->

    @livewireStyles
    @livewireScripts --}}
    @vite(['resources/css/app.css'])
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body>

    <main class="font-jost hyphens-manual">
        <!-- Page -------------------------------------------------------------------------------------------------------->
        <section
            class="p-3 my-auto mx-auto max-w-3xl bg-gray-100 rounded-2xl border-4 border-gray-700 sm:p-9 md:p-16 lg:mt-6 print:border-0 page print:max-w-letter print:max-h-letter print:mx-0 print:my-o xsm:p-8 print:bg-black md:max-w-letter md:h-letter lg:h-letter">
            <!-- Name ---------------------------------------------------------------------------------------------------->
            <header class="pb-2 inline-flex justify-between  mb-2 w-full align-top border-b-4 border-gray-300">
                <section class="p-3 text-white  rounded-3xl print:bg-black">
                    <img src="{{ public_path() . '/storage/default/PESO.png' }}"
                        class="w-[220px] h-[150px] rounded-3xl">
                </section>

                <section class="flex flex-col w-full ml-2">
                    <h1 class="mt-3 mb-0 text-5xl font-bold text-gray-700">
                        Name here
                    </h1>
                    <!--Location --------------------------------------------------------------------------------------------------------->

                    <h3 class="m-0 mt-2 ml-2 text-xl font-semibold text-gray-500 leading-snugish">
                        San Francisco, California
                    </h3>
                </section>
                <!--   Initials Block         -->

            </header>

            <!-- Column -------------------------------------------------------------------------------------------------->
            <section
                class="col-gap-8 print:col-count-2 print:h-letter-col-full col-fill-balance md:col-count-2 md:h-letter-col-full">
                <section class="flex-col">
                    <!-- Contact Information ------------------------------------------------------------------------------------->
                    <section class="pb-2 mt-4 mb-0 first:mt-0">
                        <!-- To keep in the same column -------------------------------------------------------------------------->
                        <section class="print:bg-gray-800">
                            <section class="pb-4 mb-2 border-b-4 border-gray-300 print:bg-gray-800">
                                <ul class="pr-7 list-inside">
                                    <li
                                        class="mt-1 leading-normal text-gray-500 transition duration-100 ease-in hover:text-gray-700 text-md">
                                        <a href="		    https://veilmail.io/e/J-td7W" class="group">
                                            <span class="mr-8 text-lg font-semibold text-gray-700 leading-snugish">
                                                Email:
                                            </span>
                                            https://veilmail.io/e/J-td7W

                                            <span
                                                class="inline-block font-normal text-gray-500 transition duration-100 ease-in group-hover:text-gray-700 print:text-black">
                                                ↗
                                            </span>
                                        </a>
                                    </li>
                                    <li
                                        class="mt-1 leading-normal text-gray-500 transition duration-100 ease-in hover:text-gray-700 text-md">
                                        <a href="tel:+15109070654">
                                            <span class="mr-5 text-lg font-semibold text-gray-700 leading-snugish">
                                                Phone:
                                            </span>
                                            +1(510)907-0654
                                        </a>
                                    </li>
                                </ul>
                            </section>
                        </section>
                    </section>
                    <!--Summary ---------------------------------------------------------------------------------------------------------->
                    <section class="pb-2 pb-4 mt-0 border-b-4 border-gray-300 first:mt-0">
                        <!-- To keep in the same column -->
                        <section class="print:bg-gray-800">
                            <h2 class="mb-2 text-xl font-bold tracking-widest text-gray-700 print:font-normal">
                                SUMMARY
                            </h2>

                            <section class="mb-2 print:bg-gray-800">
                                <p class="mt-2 leading-normal text-gray-700 text-md">
                                    Experienced full-stack web developer with a strong track record of independently
                                    addressing complex business requirements and overcoming challenges to deliver
                                    polished and user-friendly web solutions.
                                </p>
                            </section>
                        </section>
                    </section>
                    <!--Education -------------------------------------------------------------------------------------------------------->
                    <section class="pb-0 mt-2 border-b-4 border-gray-300 first:mt-0 print:bg-gray-800">
                        <!-- To keep in the same column -->
                        <section class="print:bg-gray-800">
                            <h2 class="mb-2 text-lg font-bold tracking-widest text-gray-700 print:font-normal">
                                EDUCATION
                            </h2>
                            <!-- school --------------------------------------------------------------------------->
                            <section class="my-4 border-b-2 print:bg-gray-800">
                                <header>
                                    <h3 class="text-lg font-semibold text-gray-700 leading-snugish">
                                        California State University East Bay
                                    </h3>
                                    <p class="leading-normal text-gray-500 text-md">
                                        2009 &ndash; 2014 | Bachelor of Arts
                                    </p>
                                </header>
                            </section>


                        </section>
                    </section>

                    <!--Begin Skills ----------------------------------------------------------------------------------------------------->
                    <section class="pb-6 mt-0 mb-4 border-b-4 border-gray-300 first:mt-0">
                        <!-- To keep in the same column -->
                        <section class="">
                            <h2 class="mb-2 text-lg font-bold tracking-widest text-gray-700 print:font-normal">
                                SKILLS
                            </h2>
                            <section class="mb-0">
                                <section class="mt-1 last:pb-1 print:bg-black">
                                    <ul class="flex flex-wrap -mb-1 font-bold leading-relaxed text-md -mr-1.6">
                                        <li
                                            class="p-1.5 mb-1 leading-relaxed text-white bg-gray-800 mr-1.6 print:bg-black print:border-inset">
                                            HTML5
                                        </li>
                                        <li
                                            class="p-1.5 mb-1 leading-relaxed text-white bg-gray-800 mr-1.6 print:bg-black print:border-inset">
                                            CSS3
                                        </li>
                                        <li
                                            class="p-1.5 mb-1 leading-relaxed text-white bg-gray-800 mr-1.6 print:bg-black print:border-inset">
                                            JavaScript
                                        </li>
                                        <li
                                            class="p-1.5 mb-1 leading-relaxed text-white bg-gray-800 mr-1.6 print:bg-black print:border-inset">
                                            TypeScript
                                        </li>
                                        <li
                                            class="p-1.5 mb-1 leading-relaxed text-white bg-gray-800 mr-1.6 print:bg-black print:border-inset">
                                            Node.js
                                        </li>
                                        <li
                                            class="p-1.5 mb-1 leading-relaxed text-white bg-gray-800 mr-1.6 print:bg-black print:border-inset">
                                            React.js
                                        </li>
                                        <li
                                            class="p-1.5 mb-1 leading-relaxed text-white bg-gray-800 mr-1.6 print:bg-black print:border-inset">
                                            Python
                                        </li>
                                        <li
                                            class="p-1.5 mb-1 leading-relaxed text-white bg-gray-800 mr-1.6 print:bg-black print:border-inset">
                                            NoSQL
                                        </li>
                                        <li
                                            class="p-1.5 mb-1 leading-relaxed text-white bg-gray-800 mr-1.6 print:bg-black print:border-inset">
                                            Postgresql
                                        </li>
                                        <li
                                            class="p-1.5 mb-1 leading-relaxed text-white bg-gray-800 mr-1.6 print:bg-black print:border-inset">
                                            MongoDB
                                        </li>
                                        <li
                                            class="p-1.5 mb-1 leading-relaxed text-white bg-gray-800 mr-1.6 print:bg-black print:border-inset">
                                            Linux
                                        </li>
                                        <li
                                            class="p-1.5 mb-1 leading-relaxed text-white bg-gray-800 mr-1.6 print:bg-black print:border-inset">
                                            AWS
                                        </li>
                                        <li
                                            class="p-1.5 mb-1 leading-relaxed text-white bg-gray-800 mr-1.6 print:bg-black print:border-inset">
                                            LLM/AI Prompting
                                        </li>
                                        <li
                                            class="p-1.5 mb-1 leading-relaxed text-white bg-gray-800 mr-1.6 print:bg-black print:border-inset">
                                            Web Design
                                        </li>
                                        <li
                                            class="p-1.5 mb-1 leading-relaxed text-white bg-gray-800 mr-1.6 print:bg-black print:border-inset">
                                            UI/UX</li>
                                        <li
                                            class="p-1.5 mb-1 leading-relaxed text-white bg-gray-800 mr-1.6 print:bg-black print:border-inset">
                                            CI/CD </li>
                                        <li
                                            class="p-1.5 mb-1 leading-relaxed text-white bg-gray-800 mr-1.6 print:bg-black print:border-inset">
                                            Lua </li>
                                    </ul>
                                </section>
                            </section>
                        </section>
                    </section>

                    <!--Experience ------------------------------------------------------------------------------------------------------>
                    <section class="pb-2 pb-4 mt-4 border-b-4 border-gray-300 first:mt-0">
                        <!-- To keep in the same column ------------------------------------------------------------------------->
                        <section class="print:bg-gray-800">
                            <h2 class="mb-2 text-xl font-black tracking-widest text-gray-800 print:font-normal">
                                EXPERIENCE
                            </h2>
                            <!--Job 1-->
                            <section class="my-4 border-b-2 border-gray-300 print:bg-gray-800">
                                <header>
                                    <h3 class="font-semibold text-gray-800 text-md leading-snugish">
                                        Full Stack Web Developer
                                    </h3>
                                    <p class="text-sm leading-normal text-gray-500">
                                        Jun 2018 &ndash; Present | Freelance
                                    </p>
                                </header>
                            </section>

                        </section>
                    </section>
                    <!--Certificates ------------------------------------------------------------------------------------------------------>
                    <section class="pb-2 pb-4 mt-4 border-b-4 border-gray-300 first:mt-0">
                        <!-- To keep in the same column ------------------------------------------------------------------------->
                        <section class="print:bg-gray-800">
                            <h2 class="mb-2 text-xl font-black tracking-widest text-gray-800 print:font-normal">
                                CERTIFICATES
                            </h2>
                            <!--Job 1-->
                            <section class="my-4 border-b-2 border-gray-300 print:bg-gray-800">
                                <header>
                                    <h3 class="font-semibold text-gray-800 text-md leading-snugish">
                                        Full Stack Web Developer
                                    </h3>
                                    <p class="text-sm leading-normal text-gray-500">
                                        Jun 2018 &ndash; Present | Freelance
                                    </p>
                                </header>
                            </section>

                        </section>
                    </section>

                    <!--Trainings ------------------------------------------------------------------------------------------------------>
                    <section class="pb-2 pb-4 mt-4 border-b-4 border-gray-300 first:mt-0">
                        <!-- To keep in the same column ------------------------------------------------------------------------->
                        <section class="print:bg-gray-800">
                            <h2 class="mb-2 text-xl font-black tracking-widest text-gray-800 print:font-normal">
                                Trainings
                            </h2>
                            <!--Job 1-->
                            <section class="my-4 border-b-2 border-gray-300 print:bg-gray-800">
                                <header>
                                    <h3 class="font-semibold text-gray-800 text-md leading-snugish">
                                        Full Stack Web Developer
                                    </h3>
                                    <p class="text-sm leading-normal text-gray-500">
                                        Jun 2018 &ndash; Present | Freelance
                                    </p>
                                </header>
                            </section>

                        </section>
                    </section>


                    <!-- end Column -->
                </section>
                <!-- end Page -->
    </main>

    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
