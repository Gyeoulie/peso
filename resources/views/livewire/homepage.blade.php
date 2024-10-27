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
    <div class="flex flex-col p-0 w-11/12 md:p-6 lg:h-5/6 lg:p-6 sm:gap-y-4 lg:gap-y-0 lg:gap-x-4 lg:flex-row ">

        {{-- jobseeker chart --}}
        <div
            class="flex flex-col w-full h-[45rem] justify-evenly space-y-4 md:h-[50rem] lg:h-[30rem] lg:space-y-0 lg:space-x-4 lg:flex-row">
            {{-- chart ng jobseeker na most tag/industry na na-hire --}}
            <div class="flex flex-col justify-center h-1/2 space-y-4 w-full lg:w-1/2 lg:h-full ">
                <div>
                    <h3 class="text-xl font-semibold lg:text-3xl">Employer Job Trends</h3>

                </div>
                <div class="flex h-full ">
                    <livewire:livewire-column-chart key="{{ $employmentTrend->reactiveKey() }}" :column-chart-model="$employmentTrend" />
                </div>

            </div>

            {{-- chart ng matched? or narecommend na jobseeker,, top industry/tag --}}
            <div class="flex flex-col justify-center space-y-4 w-full h-1/2 lg:w-1/2 lg:h-full ">
                <div>
                    <h3 class="text-xl font-semibold lg:text-3xl">Popular Job Openings</h3>

                </div>

                <div class="flex h-full">
                    <livewire:livewire-column-chart key="{{ $chartn->reactiveKey() }}" :column-chart-model="$chartn" />
                </div>
            </div>

        </div>

        {{-- short job stat --}}
        <div
            class="flex flex-col gap-4 grow-0 py-9 justify-center lg:items-center
        lg:w-3/12 md:flex-row lg:flex-col">

            <a href=""
                class="flex h-24 w-45 lg:w-48 flex-col items-center justify-center rounded-md border border-dashed border-stone-200 transition-colors duration-100 ease-in-out hover:border-gray-400/80">
                <div class="flex flex-row items-center justify-center">
                    {{-- <svg class="mr-3 fill-gray-500/95" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path
                            d="M12,23A1,1 0 0,1 11,22V19H7A2,2 0 0,1 5,17V7A2,2 0 0,1 7,5H21A2,2 0 0,1 23,7V17A2,2 0 0,1 21,19H16.9L13.2,22.71C13,22.89 12.76,23 12.5,23H12M13,17V20.08L16.08,17H21V7H7V17H13M3,15H1V3A2,2 0 0,1 3,1H19V3H3V15M9,9H19V11H9V9M9,13H17V15H9V13Z" />
                    </svg> --}}

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-9 mr-3 fill-gray-500/95">
                        <path fill-rule="evenodd"
                            d="M7.5 5.25a3 3 0 0 1 3-3h3a3 3 0 0 1 3 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0 1 12 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 0 1 7.5 5.455V5.25Zm7.5 0v.09a49.488 49.488 0 0 0-6 0v-.09a1.5 1.5 0 0 1 1.5-1.5h3a1.5 1.5 0 0 1 1.5 1.5Zm-3 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                            clip-rule="evenodd" />
                        <path
                            d="M3 18.4v-2.796a4.3 4.3 0 0 0 .713.31A26.226 26.226 0 0 0 12 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 0 1-6.477-.427C4.047 21.128 3 19.852 3 18.4Z" />
                    </svg>

                    <span class="font-bold text-gray-500 text-lg ">{{$openjobs}}</span>
                </div>

                <div class="mt-2 text-lg text-gray-700">Job Opportunities</div>
            </a>

            <a href=""
                class="flex h-24 w-45 lg:w-48 flex-col items-center justify-center rounded-md border border-dashed border-stone-200 transition-colors duration-100 ease-in-out hover:border-gray-400/80">
                <div class="flex flex-row items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" 
                    class="size-9 mr-3 fill-gray-500/95">
                        <path d="M6 3a3 3 0 0 0-3 3v2.25a3 3 0 0 0 3 3h2.25a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3H6ZM15.75 3a3 3 0 0 0-3 3v2.25a3 3 0 0 0 3 3H18a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3h-2.25ZM6 12.75a3 3 0 0 0-3 3V18a3 3 0 0 0 3 3h2.25a3 3 0 0 0 3-3v-2.25a3 3 0 0 0-3-3H6ZM17.625 13.5a.75.75 0 0 0-1.5 0v2.625H13.5a.75.75 0 0 0 0 1.5h2.625v2.625a.75.75 0 0 0 1.5 0v-2.625h2.625a.75.75 0 0 0 0-1.5h-2.625V13.5Z" />
                      </svg>
                      

                    <span class="font-bold text-gray-500 text-lg ">{{$opentrainings}}</span>
                </div>

                <div class="mt-2 text-lg text-gray-700">Development Trainings</div>
            </a>

            <a href=""
                class="flex h-24 w-45 lg:w-48 flex-col items-center justify-center rounded-md border border-dashed border-stone-200 transition-colors duration-100 ease-in-out hover:border-gray-400/80">
                <div class="flex flex-row items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-9 mr-3 fill-gray-500/95">
                        <path fill-rule="evenodd"
                            d="M3 2.25a.75.75 0 0 0 0 1.5v16.5h-.75a.75.75 0 0 0 0 1.5H15v-18a.75.75 0 0 0 0-1.5H3ZM6.75 19.5v-2.25a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-.75.75h-3a.75.75 0 0 1-.75-.75ZM6 6.75A.75.75 0 0 1 6.75 6h.75a.75.75 0 0 1 0 1.5h-.75A.75.75 0 0 1 6 6.75ZM6.75 9a.75.75 0 0 0 0 1.5h.75a.75.75 0 0 0 0-1.5h-.75ZM6 12.75a.75.75 0 0 1 .75-.75h.75a.75.75 0 0 1 0 1.5h-.75a.75.75 0 0 1-.75-.75ZM10.5 6a.75.75 0 0 0 0 1.5h.75a.75.75 0 0 0 0-1.5h-.75Zm-.75 3.75A.75.75 0 0 1 10.5 9h.75a.75.75 0 0 1 0 1.5h-.75a.75.75 0 0 1-.75-.75ZM10.5 12a.75.75 0 0 0 0 1.5h.75a.75.75 0 0 0 0-1.5h-.75ZM16.5 6.75v15h5.25a.75.75 0 0 0 0-1.5H21v-12a.75.75 0 0 0 0-1.5h-4.5Zm1.5 4.5a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Zm.75 2.25a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75v-.008a.75.75 0 0 0-.75-.75h-.008ZM18 17.25a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Z"
                            clip-rule="evenodd" />
                    </svg>

                    <span class="font-bold text-gray-500 text-lg ">{{$partners}}</span>
                </div>

                <div class="mt-2 text-lg text-gray-700">Partner Companies</div>
            </a>
            {{-- <div class="card image-full sm:max-w-sm">
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
            </div> --}}
        </div>
    </div>



    {{-- section 4 - employer --}}
    <div class="w-full md:w-11/12 mt-26">
        <div class="text-right py-2 lg:p-9">
            <h2 class="font-bold text-2xl lg:text-4xl text-blue-500">
                Support Candidate Sourcing for Employers
            </h2>

            <div class="flex flex-wrap justify-center mt-14 text-left">
                <div class="w-full px-6 lg:w-1/2 lg:text-center text-left">
                    <h3 class="font-bold mt-6 text-xl lg:text-3xl md:mt-4 sm:text-left">
                        Boost <span class="text-blue-500 font-extrabold">Company Reputation</span>
                    </h3>
                    <p class="text-justify lg:text-2xl mt-4 text-lg">
                        Become a <span class="text-blue-500">PESO Partner</span> and increase industry presence.
                        Get verified and expand connections on municipalities and their locals.
                        Enhance company visibility among top talent and foster employee growth.
                        Attract skilled professionals and build a strong, engaged workforce.
                    </p>
                </div>
                <div class="w-full px-6 lg:w-1/2 lg:text-center text-left">
                    <h3 class="font-bold mt-6 text-xl lg:text-3xl md:mt-4 sm:text-left">
                        Advertise <span class="text-blue-500 font-extrabold">Job Opportunities</span>
                    </h3>
                    <p class="text-justify lg:text-2xl mt-4 text-lg">
                        Source out candidates to support the company. Manage opportunity offers and
                        <span class="text-blue-500"> be known among skilled Jobseekers</span>.
                        Highlight company’s career advancement opportunities.
                        Foster connections through networking and outreach, ensuring that potential
                        candidates view your organization as a desirable workplace.
                    </p>
                </div>
            </div>

            <div class="flex flex-col-reverse lg:flex-wrap lg:flex-row lg:justify-between mt-6 text-center ">
                <div class="flex grow-0 w-full pt-2 lg:py-0 lg:w-5/12 lg:h-80 lg:ms-11">
                    <img src="https://picsum.photos/400/240" alt="gem"
                        class="flex grow rounded shadow-lg border border-merino-400 ">
                </div>
                <div class="w-full px-6 lg:w-1/2 lg:text-center text-left">
                    <h3 class="font-bold mt-6 text-xl lg:text-3xl md:mt-4 sm:text-left">
                        Recruit <span class="text-blue-500 font-extrabold">Matched</span> Candidates
                    </h3>
                    <p class="text-justify lg:text-2xl mt-4 text-lg">
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
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                        </button>

                        <button aria-label="Next slide" id="keen-slider-next-desktop"
                            class="rounded-full border border-blue-500 p-3 text-blue-500 transition hover:bg-blue-500 hover:text-white">
                            <svg class="size-5 rtl:rotate-180" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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
