<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<header class="h-20 bg-white border-b border-slate-200 sticky top-0 z-40">

    <div class="max-w-7xl mx-auto px-6 h-full flex items-center justify-between">

        <!-- LEFT -->

        <div class="flex items-center gap-5">

            <!-- Sidebar Toggle -->

            <button
                @click="sidebarOpen = !sidebarOpen"
                class="md:hidden text-slate-500 hover:text-blue-600 transition">

                <i class="ri-menu-2-line text-2xl"></i>

            </button>


            <!-- Page Title -->

            <div>

                <h1 class="text-lg font-semibold text-slate-800">
                    Dashboard
                </h1>

                <p class="text-xs text-slate-400 hidden sm:block">
                    Admin panel overview
                </p>

            </div>

        </div>



        <!-- CENTER SEARCH -->

        <div class="hidden lg:flex items-center w-96">

            <div class="flex items-center w-full bg-slate-50 border border-slate-200 rounded-lg px-4 h-10">

                <i class="ri-search-line text-slate-400 mr-3"></i>

                <input
                    type="text"
                    placeholder="Search..."
                    class="bg-transparent text-sm w-full outline-none placeholder-slate-400" />

                <span class="text-xs text-slate-400 ml-3 border border-slate-200 px-2 py-[1px] rounded">
                    ⌘K
                </span>

            </div>

        </div>



        <!-- RIGHT -->

        <div class="flex items-center gap-3">

            <!-- Notifications -->

            <button
                class="relative w-10 h-10 flex items-center justify-center text-slate-500 hover:text-blue-600 transition">

                <i class="ri-notification-3-line text-xl"></i>

                <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>

            </button>


            <!-- Settings -->

            <button
                class="w-10 h-10 flex items-center justify-center text-slate-500 hover:text-blue-600 transition">

                <i class="ri-settings-3-line text-xl"></i>

            </button>


            <!-- Divider -->

            <div class="h-6 w-px bg-slate-200 mx-2 hidden sm:block"></div>


            <!-- USER -->

            <div x-data="{ userMenu:false }" class="relative">

                <button
                    @click="userMenu=!userMenu"
                    class="flex items-center gap-3 hover:bg-slate-50 px-2 py-1 rounded-lg transition">

                    <div class="w-9 h-9 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-semibold">
                        AB
                    </div>

                    <div class="hidden sm:block text-left">

                        <p class="text-sm font-medium text-slate-800">
                            Admin
                        </p>

                        <p class="text-xs text-slate-400">
                            Administrator
                        </p>

                    </div>

                    <i class="ri-arrow-down-s-line text-slate-400"></i>

                </button>


                <!-- USER DROPDOWN -->

                <div
                    x-show="userMenu"
                    @click.away="userMenu=false"
                    x-transition
                    x-cloak
                    class="absolute right-0 mt-3 w-56 bg-white border border-slate-200 rounded-lg shadow-lg p-2">

                    <div class="px-3 py-2 border-b border-slate-100">

                        <p class="text-xs text-slate-400">Signed in as</p>

                        <p class="text-sm font-medium text-slate-800 truncate">
                            aayush@grevx.ae
                        </p>

                    </div>

                    <a
                        href="#"
                        class="flex items-center gap-2 px-3 py-2 text-sm text-slate-600 hover:bg-slate-50 rounded-md">

                        <i class="ri-user-line"></i>

                        Profile

                    </a>

                    <a
                        href="#"
                        class="flex items-center gap-2 px-3 py-2 text-sm text-slate-600 hover:bg-slate-50 rounded-md">

                        <i class="ri-shield-user-line"></i>

                        Security

                    </a>

                    <div class="border-t border-slate-100 my-1"></div>

                    <a
                        href="#"
                        class="flex items-center gap-2 px-3 py-2 text-sm text-red-500 hover:bg-red-50 rounded-md">

                        <i class="ri-logout-circle-r-line"></i>

                        Logout

                    </a>

                </div>

            </div>


            <!-- Visit Site -->

            <a
                href="/"
                target="_blank"
                class="hidden md:flex items-center gap-2 px-4 py-2 text-sm font-medium text-blue-600 border border-blue-200 rounded-lg hover:bg-blue-600 hover:text-white transition">

                <i class="ri-external-link-line"></i>

                View Site

            </a>

        </div>

    </div>

</header>