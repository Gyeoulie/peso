<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    {{-- @include('dashboard.partials.job-dash') --}}
    {{-- @include('dashboard.partials.employer-dash') --}}





    <div class="mt-12">
        <div class="max-w-4xl md:max-w-7xl mx-2 md:mx-auto md:my-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="flex flex-row w-full h-full justify-center items-center">
                    <div class="flex flex-row justify-center items-center h-full p-5 flex-shrink-0">
                        <img src="{{ asset('assets/img/peso-1.png') }}" alt="Default I mage"
                            class="w-36 h-36    md:w-48 md:h-48 bg-gray-300 rounded object-contain">
                    </div>
                    <div class="flex flex-col w-full h-full ml-5 space-y-1 justify-center ">
                        <div class="flex flex-col">
                            <div class="flex flex-col md:flex-row  text-left">
                                <div class="flex flex-col md:w-3/4">
                                    <h1 class=" text-4xl      text-blue-500 md:text-6xl font-semibold">IT Professor</h1>
                                </div>
                                <div class="hidden md:flex flex-col mt-4 md:mt-0 md:w-1/4">
                                    <h1 class="text-black      text-xl text-left md:text-center font-medium">
                                        ₱50,000</h1>
                                </div>
                            </div>

                        </div>
                        <div class="flex flex-row h-full">
                            <div class="flex flex-col w-3/4 h-full">
                                <div class="flex flex-col">
                                    <div class="flex-row w-3/4 text-left">
                                        <h2 class="text-md     md:text-xl font-bold">National University Baliwag</h2>
                                    </div>
                                </div>

                                <div class="hidden md:flex flex-col w-full h-full">
                                    <div class="flex flex-col md:flex-row md:space-x-2">
                                        <div class="">

                                            <h3 class="text-xs     md:text-sm"> <i class="fa-solid fa-location-dot"></i>
                                                Baliuag, Bulacan
                                            </h3>
                                        </div>

                                        <div class="hidden md:flex items-center justify-center">
                                            <i class="fa-solid fa-circle text-xs" style="font-size: 0.4rem;"></i>
                                        </div>

                                        <div class="">
                                            <h3 class="text-xs     md:text-sm"> <i
                                                    class="fa-solid fa-graduation-cap"></i>
                                                Master's
                                                Graduate</h3>
                                        </div>

                                        <div class="hidden md:flex items-center justify-center">
                                            <i class="fa-solid fa-circle text-xs" style="font-size: 0.4rem;"></i>
                                        </div>

                                        <div class="">
                                            <h3 class="text-xs     md:text-sm"> <i class="fa-solid fa-briefcase"></i>
                                                Full Time
                                            </h3>
                                        </div>

                                        <div class="hidden md:flex items-center justify-center">
                                            <i class="fa-solid fa-circle text-xs" style="font-size: 0.4rem;"></i>
                                        </div>

                                        <div class="">
                                            <h3 class="text-xs     md:text-sm"> <i class="fa-solid fa-calendar"></i>
                                                March 30,
                                                2024
                                            </h3>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="hidden md:flex flex-col ml-auto mr-10 justify-center w-1/4 items-center">
                                <button type="button"
                                    class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-10 border border-red-500 hover:border-transparent rounded "
                                    onclick="">
                                    Apply Now
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="mobile-apply md:hidden mt-3">
        <div class="max-w-4xl md:max-w-7xl mx-2 md:mx-auto md:my-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="flex flex-col w-full h-full p-5">
                    <div class="flex flex-row space-x-2 ">
                        <div class="flex items-center justify-center ">
                            <i class="fa-solid fa-circle text-xs" style="font-size: 0.4rem;"></i>
                        </div>
                        <div class="w-1/2 justify-">
                            <h3 class="text-md "> <i class="fa-solid fa-location-dot"></i>
                                Baliuag, Bulacan
                            </h3>
                        </div>

                        <div class="flex items-center justify-center">
                            <i class="fa-solid fa-circle text-xs" style="font-size: 0.4rem;"></i>
                        </div>

                        <div class="w-1/2">
                            <h3 class="text-md "> <i class="fa-solid fa-graduation-cap"></i>
                                Master's
                                Graduate</h3>
                        </div>
                    </div>
                    <div class="flex flex-row space-x-2">


                        <div class="flex items-center justify-center">
                            <i class="fa-solid fa-circle text-xs" style="font-size: 0.4rem;"></i>
                        </div>

                        <div class="w-1/2">
                            <h3 class="text-md "> <i class="fa-solid fa-briefcase"></i>
                                Full Time
                            </h3>
                        </div>

                        <div class="flex items-center justify-center">
                            <i class="fa-solid fa-circle text-xs" style="font-size: 0.4rem;"></i>
                        </div>

                        <div class="w-1/2">
                            <h3 class="text-md"><i class="fa-solid fa-money-bill"></i>
                                ₱50,000 - ₱70,000
                            </h3>
                        </div>

                    </div>

                    <div class="flex flex-col ml-auto mr-10 justify-center w-full mt-3 items-center md:hidden">
                        <button type="button"
                            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-10 border border-red-500 hover:border-transparent rounded "
                            onclick="">
                            Apply Now
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="Job-apply mt-3">
        <div class="max-w-4xl md:max-w-7xl mx-2 md:mx-auto md:my-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="flex flex-col w-full h-full p-5 space-y-2">

                    <div class="Job-Description">
                        <div class="flex flex-row w-full">
                            <h1 class="text-xl text-blue-900 font-bold">Job Description</h1>
                            <h1 class="text-md text-blue-900 font-medium ml-auto mr-2">Posted on April 26, 2021</h1>
                        </div>
                        <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mt-2">

                        <div class="no-tailwindcss-base">
                            <h2>Job Summary:</h2>
                            <p>NU Baliwag is seeking a dynamic and experienced IT Professor to join our esteemed faculty
                                team. The successful candidate will be responsible for delivering high-quality
                                instruction in various areas of Information Technology, fostering a stimulating learning
                                environment, and contributing to the academic and professional development of students.
                            </p>

                            <h2>Key Responsibilities:</h2>
                            <ol>
                                <li>Deliver engaging and effective lectures, seminars, and practical sessions in IT
                                    subjects, including but not limited to programming, database management, networking,
                                    cybersecurity, and software engineering.</li>
                                <li>Develop and update course materials, syllabi, and assessments in alignment with
                                    industry trends, academic standards, and program objectives.</li>
                                <li>Provide academic guidance and support to students through mentorship, advising, and
                                    constructive feedback on assignments and projects.</li>
                                <li>Utilize innovative teaching methodologies, educational technologies, and practical
                                    applications to enhance student learning experiences and promote critical thinking
                                    and problem-solving skills.</li>
                                <li>Foster a collaborative and inclusive learning environment by encouraging student
                                    participation, facilitating group discussions, and promoting teamwork and peer
                                    learning.</li>
                                <li>Stay current with advancements in IT fields, pedagogical practices, and educational
                                    technologies through continuous professional development, research, and
                                    participation in relevant conferences and workshops.</li>
                                <li>Contribute to curriculum development, program assessment, and accreditation
                                    processes to ensure the quality and relevance of the IT program.</li>
                                <li>Collaborate with colleagues, departmental leaders, and industry partners to enrich
                                    the academic curriculum, organize workshops, seminars, and industry visits, and
                                    facilitate internship and placement opportunities for students.</li>
                                <li>Engage in scholarly activities, research projects, and publications to contribute to
                                    the advancement of knowledge in IT disciplines and enhance the academic reputation
                                    of NU Baliwag.</li>
                                <li>Perform other duties and responsibilities as assigned by the department chair, dean,
                                    or academic administration.</li>
                            </ol>

                        </div>
                    </div>

                    <div class="Job-Qualification">

                        <h1 class="text-xl text-blue-900 font-bold">Job Qualification</h1>


                        <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mt-2">

                        <div class="no-tailwindcss-base">
                            <ul>
                                <li>A master's or doctoral degree in Information Technology, Computer Science, Computer
                                    Engineering, or a related field from an accredited institution.</li>
                                <li>Previous teaching experience at the tertiary level, preferably in higher education
                                    institutions with a strong emphasis on student-centered learning.</li>
                                <li>Proficiency in a wide range of IT topics and programming languages, with practical
                                    experience in software development, systems analysis, and project management.</li>
                                <li>Strong communication and interpersonal skills, with the ability to effectively
                                    engage and motivate students from diverse backgrounds and levels of proficiency.
                                </li>
                                <li>Commitment to academic excellence, innovation in teaching, and continuous
                                    professional development.</li>
                                <li>Demonstrated research capabilities, scholarly achievements, or industry experience
                                    in relevant IT domains would be advantageous.</li>
                                <li>Familiarity with learning management systems, educational technologies, and digital
                                    resources for teaching and learning purposes.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="Job-Remarks">

                        <h1 class="text-xl text-blue-900 font-bold">Job Remarks</h1>


                        <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mt-2">

                        <div class="no-tailwindcss-base">
                            <ul>
                                <li>Competitive salary commensurate with qualifications and experience.</li>
                                <li>Opportunities for professional development, research grants, and participation in
                                    conferences and seminars.</li>
                                <li>Access to state-of-the-art facilities, resources, and support services for teaching,
                                    research, and professional growth.</li>
                                <li>Health insurance coverage, retirement benefits, and other employee welfare programs
                                    as per institutional policies.</li>
                                <li>Collaborative and stimulating work environment within a vibrant academic community.
                                </li>
                            </ul>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="Job-apply mt-3">
        <div class="max-w-4xl md:max-w-7xl mx-2 md:mx-auto md:my-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col w-full h-full p-5">


                <div class="About-Company">

                    <h1 class="text-xl text-blue-900 font-bold">About National University Baliwag</h1>


                    <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mt-2">

                    <div class="mt-2">
                        National University (NU) Baliwag is a distinguished institution of higher education situated in Baliwag, Bulacan, Philippines. Committed to academic excellence, innovation, and social responsibility, NU Baliwag aims to empower minds and transform lives through quality education and holistic development.

                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>












</x-app-layout>
