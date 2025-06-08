<aside :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
    class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[275px] flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0 transition-all duration-300 ease-in-out">

    <!-- SIDEBAR HEADER -->
    <div :class="sidebarToggle ? 'justify-center' : 'justify-between'"
        class="flex items-center gap-2 pt-4 pb-6 sidebar-header">
        <a href="{{ route('dashboard') }}">
            <div class="logo flex items-center gap-2" :class="sidebarToggle ? 'hidden' : ''">
                <x-application-logo class="h-10 w-auto fill-current text-gray-500 dark:text-gray-200" />
                <span class="text-gray-500 dark:text-gray-200 font-bold uppercase">
                    {{ config('app.name') }}
                </span>
            </div>

            <div class="logo-icon" :class="sidebarToggle ? 'lg:block' : 'hidden'">
                <x-application-logo class="h-10 w-auto fill-current text-gray-500 dark:text-gray-200" />
            </div>
        </a>
    </div>
    <!-- SIDEBAR HEADER -->

    <div class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar">
        <!-- Sidebar Menu -->
        <nav>
            <!-- Menu Group -->
            <div>
                <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
                    <span class="menu-group-title" :class="sidebarToggle ? 'lg:hidden' : ''">
                        MENU
                    </span>

                    <svg :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
                        class="mx-auto fill-current menu-group-icon" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
                            fill="" />
                    </svg>
                </h3>

                <ul class="flex flex-col gap-2 mb-6">
                    <li>
                        <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" :label="__('Dashboard')">
                            <x-hugeicons-dashboard-square-01 class="size-5" />
                        </x-sidebar-link>
                    </li>
                    <li>
                        <x-dropdown label="Collapse">
                            <x-hugeicons-right-to-left-list-number class="size-5" />
                            <x-slot:dropdownItems>
                                <x-dropdown-link href="#" label="Sub collapse 1" />
                                <x-dropdown-link href="#" label="Sub collapse 2" />
                            </x-slot:dropdownItems>
                        </x-dropdown>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Sidebar Menu -->
    </div>
</aside>
