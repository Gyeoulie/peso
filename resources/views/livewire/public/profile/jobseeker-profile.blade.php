<div>
    <div class="flex flex-col md:flex-row w-full h-full gap-4 container mx-auto p-4 md:p-0 md:py-8">

        <div class="flex flex-col md:w-1/4 h-full md:sticky top-5">
            <div class="bg-white shadow-xl rounded-lg p-6">
                <div class="flex flex-col items-center">
                    <img src="https://randomuser.me/api/portraits/men/94.jpg"
                        class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">

                    </img>
                    <h1 class="text-xl font-bold">John Doe</h1>
                    <p class="text-gray-700">Software Developer</p>
                    <div class="mt-6 flex flex-wrap gap-4 justify-center">
                        <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Contact</a>
                        <a href="#"
                            class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded">Resume</a>
                    </div>
                </div>
                <hr class="my-6 border-t border-gray-300">
                <div class="flex flex-col">
                    <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Skills</span>
                    <ul>
                        <li class="mb-2">JavaScript</li>
                        <li class="mb-2">React</li>
                        <li class="mb-2">Node.js</li>
                        <li class="mb-2">HTML/CSS</li>
                        <li class="mb-2">Tailwind Css</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="flex flex-col space-y-5 md:w-3/4">
            <div class="container">
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-xl font-bold mb-4">About Me</h2>
                    <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                        finibus
                        est
                        vitae tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus non velit
                        egestas
                        suscipit. Nunc finibus vel ante id euismod. Vestibulum ante ipsum primis in faucibus
                        orci
                        luctus
                        et ultrices posuere cubilia Curae; Aliquam erat volutpat. Nulla vulputate pharetra
                        tellus,
                        in
                        luctus risus rhoncus id.
                    </p>
                </div>
            </div>




            <div class="container">
                <div class="bg-white shadow rounded-lg p-6" x-data="{
                    openTab: 1,
                    activeTab: 'text-blue-600 border-blue-600 active',
                    inactiveTab: 'border-transparent hover:text-gray-600 hover:border-gray-300',
                    activeIcon: 'text-blue-600',
                    inactiveIcon: 'text-gray-400 group-hover:text-gray-500'
                }">


                    <div class ="border-b border-gray-200">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 " role="tablist"
                            aria-label="tabs">
                            <li class="me-2">
                                <button @click="openTab = 1" :class="openTab === 1 ? activeTab : inactiveTab"
                                    class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active group tab">
                                    <i :class="openTab === 1 ? activeIcon : inactiveIcon"
                                        class="w-4 h-4 me-2 groupIcon fa-solid fa-school" id="panel-1"></i>

                                    Education
                                </button>
                            </li>
                            <li class="me-2">
                                <button @click="openTab = 2" :class="openTab === 2 ? activeTab : inactiveTab"
                                    class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group tab">
                                    <i :class="openTab === 2 ? activeIcon : inactiveIcon"
                                        class="w-4 h-4 me-2 groupIcon fas fa-briefcase" id="panel-2"></i>
                                    Dashboard
                                </button>
                            </li>
                            <li class="me-2">
                                <button @click="openTab = 3" :class="openTab === 3 ? activeTab : inactiveTab"
                                    class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group tab">
                                    <svg :class="openTab === 3 ? activeIcon : inactiveIcon"
                                        class="w-4 h-4 me-2 groupIcon" id="panel-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        a
                                        <path
                                            d="M5 11.424V1a1 1 0 1 0-2 0v10.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.228 3.228 0 0 0 0-6.152ZM19.25 14.5A3.243 3.243 0 0 0 17 11.424V1a1 1 0 0 0-2 0v10.424a3.227 3.227 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.243 3.243 0 0 0 2.25-3.076Zm-6-9A3.243 3.243 0 0 0 11 2.424V1a1 1 0 0 0-2 0v1.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0V8.576A3.243 3.243 0 0 0 13.25 5.5Z" />
                                    </svg>Settings
                                </button>
                            </li>
                            <li class="me-2">
                                <button @click="openTab = 4" :class="openTab === 4 ? activeTab : inactiveTab"
                                    class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group tab">

                                    <svg :class="openTab === 4 ? activeIcon : inactiveIcon"
                                        class="w-4 h-4 me-2 groupIcon" id="panel-4" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                        <path
                                            d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                                    </svg>Contacts
                                </button>
                            </li>

                        </ul>
                    </div>



                    <div x-show="openTab === 1" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-cloak>
                        <h2 class="text-xl font-bold mt-6 mb-4">Education Experience</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 ">

                            <div class="container bg-gray-200 p-3 rounded-lg shadow ">

                                <div class="flex flex-row">

                                    <div class="flex flex-col h-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-10 h-10 sm:w-20 sm:h-20 text-gray-800 ">
                                            <path
                                                d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                                            <path
                                                d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
                                            <path
                                                d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />
                                        </svg>

                                    </div>

                                    <div class="flex flex-col ml-4 w-full">
                                        <span class="text-2xl text-black font-bold">National University Baliwag</span>
                                        <div class="text-lg text-black font-semibold"><span>Bachelor of Science in
                                                Information Technology
                                        </div>
                                        <span class="text-sm text-gray-700 font-medium">June 2020 - June 2023</span>
                                    </div>

                                </div>

                            </div>

                            <div class="container bg-gray-200 p-3 rounded-lg shadow ">

                                <div class="flex flex-row">

                                    <div class="flex flex-col h-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-10 h-10 sm:w-20 sm:h-20 text-gray-800 ">
                                            <path
                                                d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                                            <path
                                                d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
                                            <path
                                                d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />
                                        </svg>

                                    </div>

                                    <div class="flex flex-col ml-4 w-full">
                                        <span class="text-2xl text-black font-bold">National University Baliwag</span>
                                        <div class="text-lg text-black font-semibold"><span>Bachelor of Science in
                                                Information Technology
                                        </div>
                                        <span class="text-sm text-gray-700 font-medium">June 2020 - June 2023</span>
                                    </div>

                                </div>

                            </div>


                            <div class="container bg-gray-200 p-3 rounded-lg shadow ">

                                <div class="flex flex-row">

                                    <div class="flex flex-col h-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-10 h-10 sm:w-20 sm:h-20 text-gray-800 ">
                                            <path
                                                d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                                            <path
                                                d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
                                            <path
                                                d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />
                                        </svg>

                                    </div>

                                    <div class="flex flex-col ml-4 w-full">
                                        <span class="text-2xl text-black font-bold">National University Baliwag</span>
                                        <div class="text-lg text-black font-semibold"><span>Bachelor of Science in
                                                Information Technology
                                        </div>
                                        <span class="text-sm text-gray-700 font-medium">June 2020 - June 2023</span>
                                    </div>

                                </div>

                            </div>

                            <div class="container bg-gray-200 p-3 rounded-lg shadow ">

                                <div class="flex flex-row">

                                    <div class="flex flex-col h-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" class="w-10 h-10 sm:w-20 sm:h-20 text-gray-800 ">
                                            <path
                                                d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                                            <path
                                                d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
                                            <path
                                                d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />
                                        </svg>

                                    </div>

                                    <div class="flex flex-col ml-4 w-full">
                                        <span class="text-2xl text-black font-bold">National University Baliwag</span>
                                        <div class="text-lg text-black font-semibold"><span>Bachelor of Science in
                                                Information Technology
                                        </div>
                                        <span class="text-sm text-gray-700 font-medium">June 2020 - June 2023</span>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    <div x-show="openTab === 2" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-cloak>
                        <h2 class="text-xl font-bold mt-6 mb-4">Work Experience</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 ">

                            <div class="container bg-gray-200 p-3 rounded-lg shadow ">

                                <div class="flex flex-row">

                                    <div class="flex flex-col h-full">
                                        <svg class="w-10 h-10 sm:w-20 sm:h-20 text-gray-800 " aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M10 2a3 3 0 0 0-3 3v1H5a3 3 0 0 0-3 3v2.382l1.447.723.005.003.027.013.12.056c.108.05.272.123.486.212.429.177 1.056.416 1.834.655C7.481 13.524 9.63 14 12 14c2.372 0 4.52-.475 6.08-.956.78-.24 1.406-.478 1.835-.655a14.028 14.028 0 0 0 .606-.268l.027-.013.005-.002L22 11.381V9a3 3 0 0 0-3-3h-2V5a3 3 0 0 0-3-3h-4Zm5 4V5a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v1h6Zm6.447 7.894.553-.276V19a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3v-5.382l.553.276.002.002.004.002.013.006.041.02.151.07c.13.06.318.144.557.242.478.198 1.163.46 2.01.72C7.019 15.476 9.37 16 12 16c2.628 0 4.98-.525 6.67-1.044a22.95 22.95 0 0 0 2.01-.72 15.994 15.994 0 0 0 .707-.312l.041-.02.013-.006.004-.002.001-.001-.431-.866.432.865ZM12 10a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H12Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>

                                    <div class="flex flex-col ml-4 w-full">
                                        <span class="text-2xl text-black font-bold">Company Name</span>
                                        <div class="text-lg text-black font-semibold"><span>Position</span> -
                                            <span>Fulltime</span>
                                        </div>
                                        <span class="text-sm text-gray-700 font-medium">June 2020 - June 2023</span>
                                        <span class="text-sm text-gray-700 font-medium">Baliwag, Bulacan</span>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>



    {{--    --}}



    @script
        <script>
            let tabs = document.querySelectorAll(".tab")
            let tabsIcon = document.querySelectorAll(".groupIcon")
            let panels = document.querySelectorAll(".tab-panel")


            tabs.forEach(tab => {
                tab.addEventListener("click", () => {
                    let tabTarget = tab.getAttribute("aria-controls")



                    tabs.forEach(tab => {
                        let tabId = tab.getAttribute("aria-controls")
                        if (tabTarget === tabId) {
                            tab.classList.remove("border-transparent", "hover:text-gray-600",
                                "hover:border-gray-300", "active")
                            tab.classList.add(
                                "text-blue-600", "border-blue-600", "active")
                        } else {
                            tab.classList.add("border-transparent", "hover:text-gray-600",
                                "hover:border-gray-300", "active")
                            tab.classList.remove(
                                "text-blue-600", "border-blue-600", "active")

                        }
                    })
                    panels.forEach(panel => {
                        let panelId = panel.getAttribute("id")
                        if (tabTarget === panelId) {
                            panel.classList.remove("hidden", "opacity-0")
                        } else {
                            panel.classList.add("hidden", "opacity-0")
                        }
                    })

                    tabsIcon.forEach(tabIcon => {
                        let tabIconId = tabIcon.getAttribute("id")
                        if (tabTarget === tabIconId) {
                            tabIcon.classList.remove("text-gray-400", "group-hover:text-gray-500")
                            tabIcon.classList.add("text-blue-600")
                        } else {
                            tabIcon.classList.add("text-gray-400", "group-hover:text-gray-500")
                            tabIcon.classList.remove("text-blue-600")

                        }
                    })
                })
            })


            // let tabs = document.querySelectorAll(".tab")
            // let indicator = document.querySelector(".active")
            // let panels = document.querySelectorAll(".tab-panel")

            // indicator.style.width = tabs[0].getBoundingClientRect().width + 'px'
            // indicator.style.left = tabs[0].getBoundingClientRect().left - tabs[0].parentElement.getBoundingClientRect().left +
            //     'px'

            // tabs.forEach(tab => {
            //     tab.addEventListener("click", () => {
            //         let tabTarget = tab.getAttribute("aria-controls")
            //         console.log("hello1")

            //         indicator.style.width = tab.getBoundingClientRect().width + 'px'
            //         indicator.style.left = tab.getBoundingClientRect().left - tab.parentElement
            //             .getBoundingClientRect().left + 'px'


            //         panels.forEach(panel => {
            //             let panelId = panel.getAttribute("id")
            //             if (tabTarget === panelId) {
            //                 panel.classList.remove("hidden", "opacity-0")
            //                 panel.classList.add("visible", "opacity-100")
            //             } else {
            //                 panel.classList.add("hidden", "opacity-0")
            //             }
            //         })
            //     })
            // })
        </script>
    @endscript


</div>
