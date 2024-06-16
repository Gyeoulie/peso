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
                    <a href="#" class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded">Resume</a>
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
            <div class="bg-white shadow rounded-lg p-6">
                <div class="border-b border-gray-200">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 " role="tablist"
                        aria-label="tabs">
                        <li class="me-2">
                            <button role="tab" aria-selected="true" aria-controls="panel-1" id="tab-1"
                                tabindex="0"
                                class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active group tab">
                                <i class="w-4 h-4 me-2 text-blue-600 groupIcon fa-solid fa-school" id="panel-1"></i>

                                Education
                            </button>
                        </li>
                        <li class="me-2">
                            <button role="tab" aria-selected="false" aria-controls="panel-2" id="tab-2"
                                tabindex="-1"
                                class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300  group tab">
                                <i class="w-4 h-4 me-2 text-gray-400 group-hover:text-gray-500 groupIcon fas fa-briefcase"
                                    id="panel-2"></i>
                                Dashboard
                            </button>
                        </li>
                        <li class="me-2">
                            <button role="tab" aria-selected="false" aria-controls="panel-3" id="tab-3"
                                tabindex="-1"
                                class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 group tab">
                                <svg class="w-4 h-4 me-2 text-gray-400 group-hover:text-gray-500 groupIcon"
                                    id="panel-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M5 11.424V1a1 1 0 1 0-2 0v10.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.228 3.228 0 0 0 0-6.152ZM19.25 14.5A3.243 3.243 0 0 0 17 11.424V1a1 1 0 0 0-2 0v10.424a3.227 3.227 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.243 3.243 0 0 0 2.25-3.076Zm-6-9A3.243 3.243 0 0 0 11 2.424V1a1 1 0 0 0-2 0v1.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0V8.576A3.243 3.243 0 0 0 13.25 5.5Z" />
                                </svg>Settings
                            </button>
                        </li>
                        <li class="me-2">
                            <button role="tab" aria-selected="false" aria-controls="panel-4" id="tab-4"
                                tabindex="-1"
                                class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300  group tab">
                                <svg class="w-4 h-4 me-2 text-gray-400 group-hover:text-gray-500 groupIcon"
                                    id="panel-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 18 20">
                                    <path
                                        d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                                </svg>Contacts
                            </button>
                        </li>

                    </ul>
                </div>



                <div role="tabpanel" id="panel-1" class="education w-full h-full tab-panel">
                    <h2 class="text-xl font-bold mt-6 mb-4">Education Experience</h2>
                    <div class="grid grid-cols-2 gap-4 ">
                        <div class="container bg-red-200 p-2 rounded-lg">
                            <div class="mb-6">
                                <div class="flex flex- justify-between flex-wrap gap-2 w-full">
                                    <span class="text-gray-700 font-bold">Web Developer</span>
                                    <p>
                                        <span class="text-gray-700 mr-2">at ABC Company</span>
                                        <span class="text-gray-700">2017 - 2019</span>
                                    </p>
                                </div>
                                <p class="mt-2">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus est
                                    vitae
                                    tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus
                                    non
                                    velit
                                    egestas
                                    suscipit.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>



                <div role="tabpanel" id="panel-2" class="hidden workExp w-full h-full tab-panel ">
                    <h2 class="text-xl font-bold mt-6 mb-4">Work Experience</h2>
                    <div class="grid grid-cols-2 gap-4 ">
                        <div class="container bg-red-200 p-2 rounded-lg">
                            <div class="mb-6">
                                <div class="flex flex- justify-between flex-wrap gap-2 w-full">
                                    <span class="text-gray-700 font-bold">Web Developer</span>
                                    <p>
                                        <span class="text-gray-700 mr-2">at ABC Company</span>
                                        <span class="text-gray-700">2017 - 2019</span>
                                    </p>
                                </div>
                                <p class="mt-2">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus est
                                    vitae
                                    tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus
                                    non
                                    velit
                                    egestas
                                    suscipit.
                                </p>
                            </div>
                        </div>
                        <div class="container bg-red-200 p-2 rounded-lg">
                            <div class="mb-6">
                                <div class="flex flex- justify-between flex-wrap gap-2 w-full">
                                    <span class="text-gray-700 font-bold">Web Developer</span>
                                    <p>
                                        <span class="text-gray-700 mr-2">at ABC Company</span>
                                        <span class="text-gray-700">2017 - 2019</span>
                                    </p>
                                </div>
                                <p class="mt-2">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus est
                                    vitae
                                    tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus
                                    non
                                    velit
                                    egestas
                                    suscipit.
                                </p>
                            </div>
                        </div>

                        <div class="container bg-red-200 p-2 rounded-lg">
                            <div class="mb-6">
                                <div class="flex flex- justify-between flex-wrap gap-2 w-full">
                                    <span class="text-gray-700 font-bold">Web Developer</span>
                                    <p>
                                        <span class="text-gray-700 mr-2">at ABC Company</span>
                                        <span class="text-gray-700">2017 - 2019</span>
                                    </p>
                                </div>
                                <p class="mt-2">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus est
                                    vitae
                                    tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus
                                    non
                                    velit
                                    egestas
                                    suscipit.
                                </p>
                            </div>
                        </div>
                        <div class="container bg-red-200 p-2 rounded-lg">
                            <div class="mb-6">
                                <div class="flex flex- justify-between flex-wrap gap-2 w-full">
                                    <span class="text-gray-700 font-bold">Web Developer</span>
                                    <p>
                                        <span class="text-gray-700 mr-2">at ABC Company</span>
                                        <span class="text-gray-700">2017 - 2019</span>
                                    </p>
                                </div>
                                <p class="mt-2">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus est
                                    vitae
                                    tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus
                                    non
                                    velit
                                    egestas
                                    suscipit.
                                </p>
                            </div>
                        </div>

                        <div class="container bg-red-200 p-2 rounded-lg">
                            <div class="mb-6">
                                <div class="flex flex- justify-between flex-wrap gap-2 w-full">
                                    <span class="text-gray-700 font-bold">Web Developer</span>
                                    <p>
                                        <span class="text-gray-700 mr-2">at ABC Company</span>
                                        <span class="text-gray-700">2017 - 2019</span>
                                    </p>
                                </div>
                                <p class="mt-2">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus est
                                    vitae
                                    tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus
                                    non
                                    velit
                                    egestas
                                    suscipit.
                                </p>
                            </div>
                        </div>

                        <div class="container bg-red-200 p-2 rounded-lg">
                            <div class="mb-6">
                                <div class="flex flex- justify-between flex-wrap gap-2 w-full">
                                    <span class="text-gray-700 font-bold">Web Developer</span>
                                    <p>
                                        <span class="text-gray-700 mr-2">at ABC Company</span>
                                        <span class="text-gray-700">2017 - 2019</span>
                                    </p>
                                </div>
                                <p class="mt-2">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus est
                                    vitae
                                    tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus
                                    non
                                    velit
                                    egestas
                                    suscipit.
                                </p>
                            </div>
                        </div>

                        <div class="container bg-red-200 p-2 rounded-lg">
                            <div class="mb-6">
                                <div class="flex flex- justify-between flex-wrap gap-2 w-full">
                                    <span class="text-gray-700 font-bold">Web Developer</span>
                                    <p>
                                        <span class="text-gray-700 mr-2">at ABC Company</span>
                                        <span class="text-gray-700">2017 - 2019</span>
                                    </p>
                                </div>
                                <p class="mt-2">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus est
                                    vitae
                                    tortor ullamcorper, ut vestibulum velit convallis. Aenean posuere risus
                                    non
                                    velit
                                    egestas
                                    suscipit.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>



{{--    --}}




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
