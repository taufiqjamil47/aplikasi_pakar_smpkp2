<div id="nav-menu"
    class="bg-blueColor bg-opacity-90 sm:bg-opacity-100 lg:bg-gray-100 hidden lg:block z-50 h-screen fixed md:sticky top-[70px] md:top-0 w-full sm:w-72  p-4 overflow-y-auto"
    aria-label="Sidebar">
    <div class="shadow-lg md:shadow-none px-3 py-4 overflow-y-auto rounded-[10px] bg-white dark:bg-gray-800">
        <ul class="space-y-2">
            <li>
                <a href="/admin/staff/home"
                    class="{{ Request::is('admin/staff/home') ? 'active' : '' }} flex items-center p-2 text-base font-normal hover:text-blueColor">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-droplet w-6 h-6"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M7.21.8C7.69.295 8 0 8 0c.109.363.234.708.371 1.038.812 1.946 2.073 3.35 3.197 4.6C12.878 7.096 14 8.345 14 10a6 6 0 0 1-12 0C2 6.668 5.58 2.517 7.21.8zm.413 1.021A31.25 31.25 0 0 0 5.794 3.99c-.726.95-1.436 2.008-1.96 3.07C3.304 8.133 3 9.138 3 10a5 5 0 0 0 10 0c0-1.201-.796-2.157-2.181-3.7l-.03-.032C9.75 5.11 8.5 3.72 7.623 1.82z" />
                        <path fill-rule="evenodd"
                            d="M4.553 7.776c.82-1.641 1.717-2.753 2.093-3.13l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448z" />
                    </svg>
                    <span class="ml-3">Beranda</span>
                </a>
            </li>
            <li class="ul-drop">
                <button type="button"
                    class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-blueColor"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-inbox w-6 h-6"
                        viewBox="0 0 16 16">
                        <path
                            d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438L14.933 9zM3.809 3.563A1.5 1.5 0 0 1 4.981 3h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a.5.5 0 0 1 .105.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374l3.7-4.625z" />
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Surat Dinas</span>
                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2">
                    <li class="ul-subDrop">
                        <a class="cursor-pointer justify-between flex items-center w-auto p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-blueColor ml-11"
                            aria-controls="dropdown-subDrop" data-collapse-toggle="dropdown-subDrop">
                            <span class="flex-1 text-left whitespace-nowrap" sidebar-toggle-item>Surat
                                Tunjangan</span>
                            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <ul id="dropdown-subDrop" class="hidden py-2">
                            <li><a href="#"
                                    class="flex items-center w-auto p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-blueColor ml-[94px]">Surat
                                    A</a></li>
                            <li><a href="#"
                                    class="flex items-center w-auto p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-blueColor ml-[94px]">Surat
                                    B</a></li>
                            <li><a href="#"
                                    class="flex items-center w-auto p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-blueColor ml-[94px]">Surat
                                    C</a></li>
                            <li><a href="#"
                                    class="flex items-center w-auto p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-blueColor ml-[94px]">Surat
                                    D</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-auto p-2 text-base font-normal hover:text-blueColor ml-11">Surat
                            Tugas</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-auto p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-blueColor ml-11">Surat
                            Edaran</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-auto p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-blueColor ml-11">Surat
                            Undangan</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-auto p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-blueColor ml-11">Surat
                            Keterangan</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-auto p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-blueColor ml-11">Surat
                            Kunjungan</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <a href="#setting"
        class="shadow-lg md:shadow-none text-xl w-full flex items-center justify-center gap-3 mt-5 overflow-y-auto rounded-[10px] bg-white hover:bg-gray-100 dark:bg-gray-800 py-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear"
            viewBox="0 0 16 16">
            <path
                d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
            <path
                d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
        </svg>
        Setting</a>
    <a href="/logout"
        class="shadow-lg md:shadow-none text-xl w-full flex items-center justify-center gap-3 mt-5 overflow-y-auto rounded-[10px] bg-white hover:bg-gray-100 dark:bg-gray-800 py-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-box-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
            <path fill-rule="evenodd"
                d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
        </svg>
        Logout</a>
</div>
