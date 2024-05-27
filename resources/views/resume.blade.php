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
    {{-- @vite(['resources/css/app.css']) --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body style="font-family: Jost, sans-serif; hyphens: manual;">

    <main style="font-family: Jost, sans-serif; hyphens: manual;">
        <!-- Page -------------------------------------------------------------------------------------------------------->
        <section
            style="padding: 3rem; margin: auto; max-width: 48rem; background-color: #f3f4f6; border-radius: 1rem; border: 4px solid #374151; sm: padding: 2.25rem; md: padding: 4rem; lg: margin-top: 1.5rem; print: border: 0; print: max-width: 8.5in; print: max-height: 11in; print: margin: 0; xsm: padding: 2rem; print: background-color: #000000; md: max-width: 8.5in; md: height: 11in; lg: height: 11in;">
            <!-- Name ---------------------------------------------------------------------------------------------------->
            <header
                style="padding-bottom: 0.5rem; display: inline-flex; justify-content: space-between; margin-bottom: 0.5rem; width: 100%; align-items: top; border-bottom: 4px solid #d1d5db;">
                <section style="padding: 3rem; color: white; border-radius: 1rem; print: background-color: black;">
                    <img src="{{ public_path() . '/storage/default/PESO.png' }}"
                        style="width: 220px; height: 150px; border-radius: 1rem;">
                </section>

                <section style="display: flex; flex-direction: column; width: 100%; margin-left: 0.5rem;">
                    <h1
                        style="margin-top: 0.75rem; margin-bottom: 0; font-size: 3rem; font-weight: bold; color: #374151;">
                       Sample name here
                    </h1>
                    <!--Location --------------------------------------------------------------------------------------------------------->
                    <h3
                        style="margin: 0; margin-top: 0.5rem; margin-left: 0.5rem; font-size: 1.25rem; font-weight: 600; color: #6b7280; line-height: 1.5;">
                        San Francisco, California
                    </h3>
                </section>
                <!--   Initials Block         -->
            </header>

            <!-- Column -------------------------------------------------------------------------------------------------->
            <section
                style="column-gap: 2rem; print: column-count: 2; print: height: 100vh; column-fill: balance; md: column-count: 2; md: height: 100vh;">
                <section style="display: flex; flex-direction: column;">
                    <!-- Contact Information ------------------------------------------------------------------------------------->
                    <section
                        style="padding-bottom: 0.5rem; margin-top: 1rem; margin-bottom: 0; first-child: margin-top: 0;">
                        <!-- To keep in the same column -------------------------------------------------------------------------->
                        <section style="print: background-color: #374151;">
                            <section
                                style="padding-bottom: 1rem; margin-bottom: 0.5rem; border-bottom: 4px solid #d1d5db; print: background-color: #374151;">
                                <ul style="padding-right: 1.75rem; list-style-type: none; padding-left: 0;">
                                    <li
                                        style="margin-top: 0.25rem; line-height: 1.5; color: #4b5563; transition: color 0.1s ease-in; font-size: 1rem; print:;">
                                        <a href="https://veilmail.io/e/J-td7W" class="group"
                                            style="text-decoration: none;">
                                            <span
                                                style="margin-right: 0.5rem; font-size: 1.125rem; font-weight: 600; color: #374151; line-height: 1.5;">
                                                Portfolio:
                                            </span>
                                            https://veilmail.io/e/J-td7W
                                            <span
                                                style="display: inline-block; font-weight: normal; color: #4b5563; transition: color 0.1s ease-in; group-hover: color: #374151; print: color: #000000;">
                                                ↗
                                            </span>
                                        </a>
                                    </li>
                                    <li
                                        style="margin-top: 0.25rem; line-height: 1.5; color: #4b5563; transition: color 0.1s ease-in; font-size: 1rem;">
                                        <a href="https://github.com/Thomashighbaugh" class="group"
                                            style="text-decoration: none;">
                                            <span
                                                style="margin-right: 1.25rem; font-size: 1.125rem; font-weight: 600; color: #374151; line-height: 1.5;">
                                                Github:
                                            </span>
                                            Thomashighbaugh
                                            <span
                                                style="display: inline-block; font-weight: normal; color: #4b5563; transition: color 0.1s ease-in; group-hover: color: #374151; print: color: #000000;">
                                                ↗
                                            </span>
                                        </a>
                                    </li>

                                    <li
                                        style="margin-top: 0.25rem; line-height: 1.5; color: #4b5563; transition: color 0.1s ease-in; font-size: 1rem;">
                                        <a href="https://veilmail.io/e/J-td7W" class="group"
                                            style="text-decoration: none;">
                                            <span
                                                style="margin-right: 2rem; font-size: 1.125rem; font-weight: 600; color: #374151; line-height: 1.5;">
                                                Email:
                                            </span>
                                            https://veilmail.io/e/J-td7W
                                            <span
                                                style="display: inline-block; font-weight: normal; color: #4b5563; transition: color 0.1s ease-in; group-hover: color: #374151; print: color: #000000;">
                                                ↗
                                            </span>
                                        </a>
                                    </li>
                                    <li
                                        style="margin-top: 0.25rem; line-height: 1.5; color: #4b5563; transition: color 0.1s ease-in; font-size: 1rem;">
                                        <a href="tel:+15109070654" style="text-decoration: none;">
                                            <span
                                                style="margin-right: 1.25rem; font-size: 1.125rem; font-weight: 600; color: #374151; line-height: 1.5;">
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
                    <section
                        style="padding-bottom: 0.5rem; padding-bottom: 1rem; margin-top: 0; border-bottom: 4px solid #d1d5db; first-child: margin-top: 0;">
                        <!-- To keep in the same column -->
                        <section style="print: background-color: #374151;">
                            <h2
                                style="margin-bottom: 0.5rem; font-size: 1.25rem; font-weight: bold; letter-spacing: 0.1em; color: #374151; print: font-weight: normal;">
                                SUMMARY
                            </h2>

                            <section style="margin-bottom: 0.5rem; print: background-color: #374151;">
                                <p style="margin-top: 0.5rem; line-height: 1.5; color: #374151; font-size: 1rem;">
                                    Experienced full-stack web developer with a strong track record of independently
                                    addressing complex business requirements and overcoming challenges to deliver
                                    polished and user-friendly web solutions.
                                </p>
                            </section>
                        </section>
                    </section>
                    <!--Education -------------------------------------------------------------------------------------------------------->
                    <section
                        style="padding-bottom: 0; margin-top: 0.5rem; border-bottom: 4px solid #d1d5db; first-child: margin-top: 0; print: background-color: #374151;">
                        <!-- To keep in the same column -->
                        <section style="print: background-color: #374151;">
                            <h2
                                style="margin-bottom: 0.5rem; font-size: 1.25rem; font-weight: bold; letter-spacing: 0.1em; color: #374151; print: font-weight: normal;">
                                EDUCATION
                            </h2>

                            <section
                                style="padding-bottom: 0.5rem; margin-bottom: 0.5rem; border-bottom: 4px solid #d1d5db; print: background-color: #374151;">
                                <h3 style="font-size: 1.125rem; font-weight: 600; color: #6b7280;">
                                    San Francisco State University
                                </h3>
                                <p style="margin-top: 0.5rem; font-size: 1rem; line-height: 1.5; color: #4b5563;">
                                    Bachelor of Science in Computer Science
                                    <span
                                        style="display: block; font-size: 0.875rem; font-weight: 400; line-height: 1.25; color: #6b7280;">
                                        Graduated: 2016
                                    </span>
                                </p>
                            </section>
                        </section>
                    </section>
                    <!--Skills ---------------------------------------------------------------------------------------------------------->
                    <section
                        style="padding-bottom: 1rem; margin-top: 0.5rem; border-bottom: 4px solid #d1d5db; first-child: margin-top: 0; print: background-color: #374151;">
                        <!-- To keep in the same column -->
                        <section style="print: background-color: #374151;">
                            <h2
                                style="margin-bottom: 0.5rem; font-size: 1.25rem; font-weight: bold; letter-spacing: 0.1em; color: #374151; print: font-weight: normal;">
                                SKILLS
                            </h2>

                            <ul
                                style="display: flex; flex-wrap: wrap; padding-left: 0; list-style-type: none; gap: 0.5rem; print: background-color: #374151;">
                                <li
                                    style="padding-left: 0.5rem; padding-right: 0.5rem; padding-top: 0.25rem; padding-bottom: 0.25rem; font-size: 0.875rem; font-weight: 500; color: #4b5563; border-radius: 0.375rem; background-color: #d1d5db;">
                                    HTML
                                </li>
                                <li
                                    style="padding-left: 0.5rem; padding-right: 0.5rem; padding-top: 0.25rem; padding-bottom: 0.25rem; font-size: 0.875rem; font-weight: 500; color: #4b5563; border-radius: 0.375rem; background-color: #d1d5db;">
                                    CSS
                                </li>
                                <li
                                    style="padding-left: 0.5rem; padding-right: 0.5rem; padding-top: 0.25rem; padding-bottom: 0.25rem; font-size: 0.875rem; font-weight: 500; color: #4b5563; border-radius: 0.375rem; background-color: #d1d5db;">
                                    JavaScript
                                </li>
                                <li
                                    style="padding-left: 0.5rem; padding-right: 0.5rem; padding-top: 0.25rem; padding-bottom: 0.25rem; font-size: 0.875rem; font-weight: 500; color: #4b5563; border-radius: 0.375rem; background-color: #d1d5db;">
                                    React
                                </li>
                                <li
                                    style="padding-left: 0.5rem; padding-right: 0.5rem; padding-top: 0.25rem; padding-bottom: 0.25rem; font-size: 0.875rem; font-weight: 500; color: #4b5563; border-radius: 0.375rem; background-color: #d1d5db;">
                                    Node.js
                                </li>
                                <li
                                    style="padding-left: 0.5rem; padding-right: 0.5rem; padding-top: 0.25rem; padding-bottom: 0.25rem; font-size: 0.875rem; font-weight: 500; color: #4b5563; border-radius: 0.375rem; background-color: #d1d5db;">
                                    Express.js
                                </li>
                                <li
                                    style="padding-left: 0.5rem; padding-right: 0.5rem; padding-top: 0.25rem; padding-bottom: 0.25rem; font-size: 0.875rem; font-weight: 500; color: #4b5563; border-radius: 0.375rem; background-color: #d1d5db;">
                                    MongoDB
                                </li>
                                <li
                                    style="padding-left: 0.5rem; padding-right: 0.5rem; padding-top: 0.25rem; padding-bottom: 0.25rem; font-size: 0.875rem; font-weight: 500; color: #4b5563; border-radius: 0.375rem; background-color: #d1d5db;">
                                    SQL
                                </li>
                            </ul>
                        </section>
                    </section>
                    <!--Experience ------------------------------------------------------------------------------------------------------>
                    <section
                        style="padding-bottom: 0.5rem; padding-bottom: 1rem; margin-top: 0.5rem; border-bottom: 4px solid #d1d5db; first-child: margin-top: 0; print: background-color: #374151;">
                        <!-- To keep in the same column -->
                        <section style="print: background-color: #374151;">
                            <h2
                                style="margin-bottom: 0.5rem; font-size: 1.25rem; font-weight: bold; letter-spacing: 0.1em; color: #374151; print: font-weight: normal;">
                                EXPERIENCE
                            </h2>

                            <section style="margin-bottom: 1rem; print: background-color: #374151;">
                                <h3 style="font-size: 1.125rem; font-weight: 600; color: #6b7280;">
                                    Full-Stack Developer
                                </h3>
                                <p style="margin-top: 0.5rem; font-size: 1rem; line-height: 1.5; color: #4b5563;">
                                    ABC Tech Solutions
                                    <span
                                        style="display: block; font-size: 0.875rem; font-weight: 400; line-height: 1.25; color: #6b7280;">
                                        January 2020 - Present
                                    </span>
                                </p>
                                <ul style="padding-left: 1.25rem; list-style-type: disc;">
                                    <li style="margin-top: 0.25rem; line-height: 1.5; color: #4b5563; font-size: 1rem;">
                                        Designed and developed web applications using React, Node.js, and MongoDB.
                                    </li>
                                    <li style="margin-top: 0.25rem; line-height: 1.5; color: #4b5563; font-size: 1rem;">
                                        Collaborated with cross-functional teams to define project requirements and
                                        deliver solutions.
                                    </li>
                                    <li style="margin-top: 0.25rem; line-height: 1.5; color: #4b5563; font-size: 1rem;">
                                        Implemented RESTful APIs to support frontend functionalities.
                                    </li>
                                    <li style="margin-top: 0.25rem; line-height: 1.5; color: #4b5563; font-size: 1rem;">
                                        Ensured application performance and scalability through code optimization and
                                        testing.
                                    </li>
                                </ul>
                            </section>

                            <section style="margin-bottom: 1rem; print: background-color: #374151;">
                                <h3 style="font-size: 1.125rem; font-weight: 600; color: #6b7280;">
                                    Frontend Developer
                                </h3>
                                <p style="margin-top: 0.5rem; font-size: 1rem; line-height: 1.5; color: #4b5563;">
                                    XYZ Web Solutions
                                    <span
                                        style="display: block; font-size: 0.875rem; font-weight: 400; line-height: 1.25; color: #6b7280;">
                                        June 2016 - December 2019
                                    </span>
                                </p>
                                <ul style="padding-left: 1.25rem; list-style-type: disc;">
                                    <li style="margin-top: 0.25rem; line-height: 1.5; color: #4b5563; font-size: 1rem;">
                                        Developed responsive web interfaces using HTML, CSS, and JavaScript.
                                    </li>
                                    <li style="margin-top: 0.25rem; line-height: 1.5; color: #4b5563; font-size: 1rem;">
                                        Worked closely with designers to create visually appealing and user-friendly
                                        websites.
                                    </li>
                                    <li style="margin-top: 0.25rem; line-height: 1.5; color: #4b5563; font-size: 1rem;">
                                        Conducted code reviews and provided feedback to junior developers.
                                    </li>
                                    <li style="margin-top: 0.25rem; line-height: 1.5; color: #4b5563; font-size: 1rem;">
                                        Utilized version control systems (Git) for code management and collaboration.
                                    </li>
                                </ul>
                            </section>
                        </section>
                    </section>
                    </div>
                    </div>
                    </div>
                    </div>
</body>

</html>
