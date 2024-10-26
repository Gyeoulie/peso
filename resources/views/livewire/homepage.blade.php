<div class="box-border justify-items-center p-6 space-y-10">



    {{-- <div class="grid grid-cols-4">
        <aside class="self-start sticky top-0 col-span-1">
        </aside>
        <main class="col-span-3">
            <div>

        </main>
    </div> --}}

    {{-- section 2 - jobseeker --}}
    <div class="w-full overflow-x-auto lg:overflow-visible">
        <div
            class="flex flex-nowrap gap-x-4 p-6 min-w-min lg:grid lg:grid-flow-row lg:grid-cols-3 lg:w-11/12 lg:mx-auto">
            <div class="card flex-shrink-0 w-80 sm:card-side sm:w-96 lg:w-auto">
                <figure><img src="https://cdn.flyonui.com/fy-assets/components/card/image-7.png" alt="headphone" />
                </figure>
                <div class="card-body">
                    <h5 class="card-title mb-2.5">Build <span class="font-semibold text-blue-500">Impactful Profile</span>
                    </h5>
                    <p class="mb-3">
                        Showcase professional contributions in the industry by creating profile.
                        Highlight skills and abilities to <span class="font-semibold text-blue-500">attract the right
                            opportunities</span> and stand out to
                        employers.
                    </p>
                </div>
            </div>

            <div class="card flex-shrink-0 w-80 sm:card-side sm:w-96 lg:w-auto">
                <figure><img src="https://cdn.flyonui.com/fy-assets/components/card/image-7.png" alt="headphone" />
                </figure>
                <div class="card-body">
                    <h5 class="card-title mb-2.5"><span class="font-semibold text-blue-500">Develop and Upskill</span>
                        for
                        Success</h5>
                    <p class="mb-3">
                        Access a <span class="font-semibold text-blue-500">wide range of development trainings</span>
                        , sign up, and enhance technical
                        and soft skills boosting employability and career prospects.
                    </p>
                </div>
            </div>

            <div class="card flex-shrink-0 w-80 sm:card-side sm:w-96 lg:w-auto">
                <figure><img src="https://cdn.flyonui.com/fy-assets/components/card/image-7.png" alt="headphone" />
                </figure>
                <div class="card-body">
                    <h5 class="card-title mb-2.5">Secure Top <span class="font-semibold text-blue-500">Job
                            Opportunities</span></h5>
                    <p class="mb-3">
                        Get hired on <span class="font-semibold text-blue-500">verified job vacancies</span> from
                        reputable
                        companies. Discover
                        the <span class="font-semibold text-blue-500">best fit opportunities</span> offered.
                        Connect with employers and gain insights into the job market.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- section 3 - jobseeker --}}
    <div class="flex flex-col w-11/12 h-5/6 p-6 sm:gap-y-4 lg:gap-y-0 lg:gap-x-4 lg:flex-row">

        {{-- jobseeker chart --}}
        <div class="flex flex-col grow justify-evenly space-y-4 lg:space-y-0 lg:space-x-4 lg:flex-row bg-green-300">
            {{-- chart ng jobseeker na most tag/industry na na-hire --}}
            <div class="flex flex-col justify-center space-y-4 grow-0 w-full h-full ">
                <div class="flex grow bg-red-300">
                    dito chart
                </div>

            </div>

            {{-- chart ng matched? or narecommend na jobseeker,, top industry/tag --}}
            <div class="flex flex-col justify-center space-y-4 grow-0 w-full h-full ">
                <div>
                    <h3 class="text-xl font-semibold lg:text-3xl">Popular Job Openings</h3>

                </div>

                <div class="flex h-full bg-red-300">
                    <livewire:livewire-column-chart key="{{ $chartn->reactiveKey() }}" :column-chart-model="$chartn" />
                </div>
            </div>

        </div>

        {{-- short job stat --}}
        <div class="flex flex-col gap-2 grow-0 py-9 justify-center lg:items-center
        lg:w-3/12 ">
            <div class="card image-full sm:max-w-sm">
                <figure><img src="https://cdn.flyonui.com/fy-assets/components/card/image-5.png" alt="overlay image" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title mb-2.5 text-white">Marketing</h2>
                    <p class="text-white">Boost your brand's visibility and engagement through targeted
                        marketing
                        strategies.</p>
                </div>
            </div>
            <div class="card image-full sm:max-w-sm">
                <figure><img src="https://cdn.flyonui.com/fy-assets/components/card/image-5.png" alt="overlay image" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title mb-2.5 text-white">Marketing</h2>
                    <p class="text-white">Boost your brand's visibility and engagement through targeted
                        marketing
                        strategies.</p>
                </div>
            </div>
        </div>
    </div>



    {{-- section 4 - employer --}}
    <div class="w-full md:w-9/12 mt-20">
        <div class="text-right p-9">
            <h2 class="font-bold text-3xl sm:text-3xl md:text-4xl lg:text-5xl text-blue-500">
                Support Candidate Sourcing for Employers
            </h2>

            <div class="flex flex-wrap justify-center mt-14 text-left">
                <div class="w-full md:w-3/4 px-6 lg:w-1/2 text-center md:text-left">
                    <h3 class="font-bold mt-6 text-3xl md:mt-4 sm:text-left">
                        Boost <span class="text-blue-500 font-extrabold">Company Reputation</span>
                    </h3>
                    <p class="text-justify lg:text-2xl mt-4 text-3xl">
                        Become a <span class="text-blue-500">PESO Partner</span> and increase industry presence.
                        Get verified and expand connections on municipalities and their locals.
                        Enhance company visibility among top talent and foster employee growth.
                        Attract skilled professionals and build a strong, engaged workforce.
                    </p>
                </div>
                <div class="w-full md:w-3/4 px-6 lg:w-1/2 text-center md:text-left">
                    <h3 class="font-bold mt-6 text-3xl md:mt-4 sm:text-left">
                        Advertise <span class="text-blue-500 font-extrabold">Job Opportunities</span>
                    </h3>
                    <p class="text-3xl lg:text-2xl text-justify mt-4">
                        Source out candidates to support the company. Manage opportunity offers and
                        be known among skilled <span class="text-blue-500">Jobseekers</span>.
                        Highlight company’s career advancement opportunities.
                        Foster connections through networking and outreach, ensuring that potential
                        candidates view your organization as a desirable workplace.
                    </p>
                </div>
            </div>

            <div class="flex flex-wrap justify-between mt-14 text-center ">
                <div class="flex grow-0 w-full md:w-3/4 lg:w-5/12 h-80 lg:ms-11">
                    <img src="https://picsum.photos/400/240" alt="gem"
                        class="flex grow rounded shadow-lg border border-merino-400 ">
                </div>
                <div class="w-full md:w-3/4 px-6 lg:w-1/2 text-center md:text-left">
                    <h3 class="font-bold mt-6 text-3xl md:mt-4 sm:text-left">
                        Recruit <span class="text-blue-500 font-extrabold">Matched</span> Candidates
                    </h3>
                    <p class="text-3xl lg:text-2xl text-justify mt-4">
                        With <span class="text-blue-500">PESO-aided candidate-to-job matching</span>,
                        identify better-suited candidates among applicants.
                        Enhance team dynamics and drive organizational success by focusing on the right fit.
                        Improve retention rates and a more engaged workforce by emphasizing compatibility in skills and
                        values.
                    </p>
                </div>
            </div>

        </div>
    </div>





    {{-- section  - announcements --}}
    <div class="bg-stone-200 rounded-3xl  lg:mx-10 shadow-lg">
        <div class="mx-0 lg:mx-auto py-5 sm:px-2 lg:py-16">
            <div class="grid grid-cols-1 lg:grid-cols-3 lg:items-center gap-4">
                <div class="grid-cols-1 max-w-xl text-start mx-7 lg:me-0">
                    <h2 class="font-bold tracking-tight text-gray-900 text-3xl lg:text-5xl">
                        Public Notices from
                        <span class="text-blue-500"> PESO</span>.
                    </h2>

                    <p class="mt-4 text-md lg:text-lg text-justify">
                        Keep up with matters concerning public interest by checking in for the latest announcements.
                        Stay informed about your municipality's updates by signing up.
                    </p>

                    <div class="hidden lg:flex lg:mt-8 lg:gap-4">
                        <button aria-label="Previous slide" id="keen-slider-previous-desktop"
                            class="rounded-full border border-blue-500 p-3 text-blue-500 transition hover:bg-blue-500 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5 rtl:rotate-180">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                        </button>

                        <button aria-label="Next slide" id="keen-slider-next-desktop"
                            class="rounded-full border border-blue-500 p-3 text-blue-500 transition hover:bg-blue-500 hover:text-white">
                            <svg class="size-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" />
                            </svg>
                        </button>
                    </div>
                </div>

                @if ($announ->isEmpty())
                    <h2
                        class="sm:text-3xl font-bold tracking-tight text-center md:text-start lg:text-start text-stone-500 md:text-4xl lg:text-5xl">
                        No new announcement.
                    </h2>
                @else
                    <div class="mx-6 lg:col-span-2">
                        <div id="keen-slider" class="keen-slider">
                            @foreach ($announ as $ann)
                                <div class="keen-slider__slide">
                                    <div
                                        class="flex h-full flex-col justify-start  p-2 lg:p-4 lg:pb-2
                                card glass text-gray-700 sm:max-w-sm">
                                        <figure><img src="{{ asset('storage/' . $ann->announcement_pubmat) }}"
                                                alt="prog-{{ $ann->announcement_id }}"
                                                class="object-cover w-full h-36 lg:h-64 rounded" /></figure>
                                        <div class="card-bod ">
                                            <h2 class="card-title mt-0.5 mb-2.5 text-gray-900 text-lg lg:text-2xl">
                                                {{ $ann->announcement_Title }}
                                            </h2>
                                            <p class="mb-4 text-sm lg:text-lg text-justify">
                                                {!! \Illuminate\Support\Str::limit(strip_tags($ann->announcement_Content), 150, '...') !!}
                                            </p>
                                            <a wire:navigate
                                                href="{{ route('announcement.show', ['id' => $ann->announcement_id]) }}"
                                                class="underline text-blue-500 decoration-transparent transition duration-300 ease-in-out hover:decoration-inherit">
                                                Read More</a>
                                        </div>

                                        <div class="mt-auto mb-4 py-4 pe-6 md:pe-0 lg:pe-0 flex flex-col items-end">
                                            <div class="text-gray-700 text-sm">
                                                PESO {{ $ann->peso->municipality->municipality_Name }}
                                            </div>
                                            <div class="flex items-center">

                                                <span
                                                    class="bg-neutral-300 text-gray-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                                    Posted at: {{ $ann->created_at->format('M j, Y') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach

                        </div>

                    </div>
                @endif
            </div>

            <div class="mt-8 flex justify-center gap-4 lg:hidden">
                <button aria-label="Previous slide" id="keen-slider-previous"
                    class="rounded-full border border-blue-500 p-4 text-blue-500 transition hover:bg-blue-500 hover:text-white">
                    <svg class="size-5 -rotate-180 transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </button>

                <button aria-label="Next slide" id="keen-slider-next"
                    class="rounded-full border border-blue-500 p-4 text-blue-500 transition hover:bg-blue-500 hover:text-white">
                    <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

</div>
