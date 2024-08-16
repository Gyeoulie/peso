<x-empty-layout>
    <main class="font-jost hyphens-manual">
        <!-- Page -------------------------------------------------------------------------------------------------------->
        <section
            class="mb-4 p-3 my-auto mx-auto max-w-3xl bg-gray-100 rounded-2xl border-4 border-gray-700 sm:p-9 md:p-16 lg:mt-6 print:border-0 page print:max-w-letter print:max-h-letter print:mx-0 print:my-o xsm:p-8 print:bg-black md:max-w-letter md:h-letter lg:h-letter">
            <!-- Name ---------------------------------------------------------------------------------------------------->
            <header class="pb-2 inline-flex justify-between  mb-2 w-full align-top border-b-4 border-black">
                <section class="p-3 text-white  rounded-3xl print:bg-black">
                    <img src="{{ $employee->pimg ? asset('storage/' . $employee->pimg) : asset('https://randomuser.me/api/portraits/men/94.jpg') }}"
                        class="w-[260px] h-[180px] rounded-3xl object-cover">
                </section>

                <section class="flex flex-col w-full ml-2 justify-center ">
                    <h1 class="mt-3 mb-0 text-5xl font-bold text-gray-700">
                        {{ $employee->fname }} {{ $employee->lname }}
                    </h1>
                    <!--Location --------------------------------------------------------------------------------------------------------->

                    <h3 class="m-0 mt-2 ml-2 text-xl font-semibold text-gray-500 leading-snugish">
                        {{ $employee->barangay->municipality->municipality_Name }},
                        {{ $employee->barangay->municipality->province->province_Name }}
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
                            <section class="pb-4 mb-2 border-b-4 border-black print:bg-gray-800">
                                <ul class="pr-7 list-inside">
                                    <li
                                        class="mt-1 leading-normal text-gray-500 transition duration-100 ease-in hover:text-gray-700 text-md">
                                        <a href="mailto: {{ $employee->user->email }}" class="group">
                                            <span class="mr-8 text-lg font-semibold text-gray-700 leading-snugish">
                                                Email:
                                            </span>
                                            {{ $employee->user->email }}

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
                                            {{ $employee->pnumber }}
                                        </a>
                                    </li>
                                </ul>
                            </section>
                        </section>
                    </section>
                    <!--Summary ---------------------------------------------------------------------------------------------------------->
                    <section class="pb-2 pb-4 mt-0 border-b-4 border-black first:mt-0">
                        <!-- To keep in the same column -->
                        <section class="print:bg-gray-800">
                            <h2 class="mb-2 text-2xl font-bold tracking-widest text-gray-700 print:font-normal">
                                SUMMARY
                            </h2>
                            @if ($employee->empDesc)
                                <section class="mb-2 print:bg-gray-800">
                                    <p class="mt-2 leading-normal text-gray-700 text-md">
                                        {{ $employee->empDesc }}
                                    </p>
                                </section>
                            @endif
                        </section>
                    </section>
                    @if ($employee->education)
                        <!--Education -------------------------------------------------------------------------------------------------------->
                        <section class="pb-0 mt-2 border-b-4 border-black first:mt-0 print:bg-gray-800">
                            <!-- To keep in the same column -->
                            <section class="print:bg-gray-800">
                                <h2 class="mb-2 text-2xl font-bold tracking-widest text-gray-700 print:font-normal">
                                    EDUCATION
                                </h2>
                                @foreach ($employee->education as $data)
                                    <!-- school --------------------------------------------------------------------------->
                                    <section class="mt-2 border-b-2 print:bg-gray-800 ">
                                        <header class="space-y-1">
                                            <h3 class="text-xl font-semibold text-gray-700 leading-snugish">
                                                {{ $data->edu_School }}

                                            </h3>
                                            <p class="font-medium text-gray-600 text-md">
                                                {{ $eduLevels[$data->edu_Level] }} |
                                                {{ $data->edu_Course }}

                                            </p>
                                            <p class="leading-normal text-gray-500 text-md">
                                                {{ $data->edu_Started->format('F Y') }} &ndash;
                                                {{ $data->edu_Ongoing == 1 ? 'Present' : $data->edu_Ended->format('F Y') }}

                                            </p>
                                        </header>

                                    </section>
                                @endforeach
                                <!--school 2--------------------------------------------------------------------------------------------->

                            </section>
                        </section>
                    @endif

                    <!--Begin Skills ----------------------------------------------------------------------------------------------------->

                    @if ($employee->work_exp)
                        <!--Experience ------------------------------------------------------------------------------------------------------>
                        <section class="pb-2 pb-4 mt-4 border-b-4 border-black first:mt-0">
                            <!-- To keep in the same column ------------------------------------------------------------------------->
                            <section class="print:bg-gray-800">
                                <h2 class="mb-2 text-2xl font-black tracking-widest text-gray-800 print:font-normal">
                                    EXPERIENCE
                                </h2>
                                <!--Job 1-->
                                @foreach ($employee->work_exp as $data)
                                    <section class="mb-4 border-b-2 border-gray-300 print:bg-gray-800">
                                        <header class="space-y-1">
                                            <h3 class="font-semibold text-gray-800 text-xl leading-snugish">
                                                {{ $data->work_Name }}

                                            </h3>
                                            <p class="font-medium text-gray-600 text-md">
                                                {{ $data->job_positions->position_Title }}
                                            </p>
                                            <p class="text-md leading-normal text-gray-500">
                                                {{ $data->work_Start->format('F Y') }} -
                                                {{ $data->work_End->format('F Y') }}
                                            </p>
                                        </header>

                                    </section>
                                @endforeach

                            </section>
                        </section>
                    @endif

                    @if ($employee->training)
                        <!--TRAININGS ------------------------------------------------------------------------------------------------------>
                        <section class="pb-2 pb-4 mt-4 border-b-4 border-black first:mt-0">
                            <!-- To keep in the same column ------------------------------------------------------------------------->
                            <section class="print:bg-gray-800">
                                <h2 class="mb-2 text-2xl font-black tracking-widest text-gray-800 print:font-normal">
                                    EXPERIENCE
                                </h2>
                                <!--Job 1-->
                                @foreach ($employee->training as $data)
                                    <section class="mb-4 border-b-2 border-gray-300 print:bg-gray-800">
                                        <header class="space-y-1">
                                            <h3 class="font-semibold text-gray-800 text-xl leading-snugish">
                                                {{ $data->training_Name }}

                                            </h3>
                                            <p class="font-medium text-gray-600 text-md">
                                                {{ $data->training_From }}
                                            </p>
                                            <p class="text-md leading-normal text-gray-500">
                                                {{ $data->training_Start->format('F Y') }} -
                                                {{ $data->training_End->format('F Y') }}
                                            </p>
                                        </header>

                                    </section>
                                @endforeach

                            </section>
                        </section>
                    @endif

                    @if ($employee->certificate)
                        <!--CERTIFICATES ------------------------------------------------------------------------------------------------------>
                        <section class="pb-2 pb-4 mt-4 border-b-4 border-black first:mt-0">
                            <!-- To keep in the same column ------------------------------------------------------------------------->
                            <section class="print:bg-gray-800">
                                <h2 class="mb-2 text-2xl font-black tracking-widest text-gray-800 print:font-normal">
                                    EXPERIENCE
                                </h2>
                                <!--Job 1-->
                                @foreach ($employee->certificate as $data)
                                    <section class="mb-4 border-b-2 border-gray-300 print:bg-gray-800">
                                        <header class="space-y-1">
                                            <h3 class="font-semibold text-gray-800 text-xl leading-snugish">
                                                {{ $data->certificateType->cert_Name }}
                                            </h3>
                                            <p class="font-medium text-gray-600 text-md">
                                                {{ $data->cert_From }}
                                            </p>
                                            <p class="text-md leading-normal text-gray-500">
                                                {{ $data->cert_Date_Issued->format('F Y') }}
                                                | {{ $data->cert_Rating }} Rating
                                            </p>
                                        </header>

                                    </section>
                                @endforeach

                            </section>
                        </section>
                    @endif

                    @if ($employee->skills)
                        <section class="pb-6 mt-0 mb-4 border-b-4 border-black first:mt-0">
                            <!-- To keep in the same column -->
                            <section class="">
                                <h2 class="mb-2 text-2xl font-bold tracking-widest text-gray-700 print:font-normal">
                                    SKILLS
                                </h2>
                                <section class="mb-0">
                                    <section class="mt-1 last:pb-1 print:bg-black">
                                        <ul class="flex flex-wrap -mb-1 font-bold leading-relaxed text-md -mr-1.6">
                                            @foreach ($employee->skills as $data)
                                                <li
                                                    class="p-1.5 mb-1 leading-relaxed text-white bg-gray-800 mr-1.6 print:bg-black print:border-inset">
                                                    {{ $data->skill_Type }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </section>
                                </section>
                            </section>
                        </section>
                    @endif

                    <!-- end Column -->
                </section>
                <!-- end Page -->
    </main>

</x-empty-layout>
