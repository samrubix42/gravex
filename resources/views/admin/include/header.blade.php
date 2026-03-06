<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<header class="h-20 bg-white border-b border-slate-200 sticky top-0 z-40 transition-all duration-300">
    <div class="h-full px-6 flex items-center justify-between max-w-7xl mx-auto">

        <!-- Left Section: Toggle and Title -->
        <div class="flex items-center gap-6">
            <!-- Mobile Toggle -->
            <button
                @click="sidebarOpen = !sidebarOpen"
                class="md:hidden text-slate-500 hover:text-slate-800 transition-colors"
                title="Toggle Menu">
                <i class="ri-menu-2-line text-2xl"></i>
            </button>

            <!-- Page Title Area -->
            <div class="hidden sm:block">
                <h2 class="text-xl font-bold text-slate-800 tracking-tight">
                    Admin <span class="text-slate-400 font-normal ml-2">Dashboard</span>
                </h2>
            </div>
        </div>

        <!-- Center: Quick Search Area (Aesthetic) -->
        <div class="hidden lg:flex items-center bg-slate-50 border border-slate-200 rounded-full px-4 h-11 w-96 transform hover:scale-[1.01] transition-all group">
            <i class="ri-search-line text-slate-400 group-hover:text-secondary transition-colors mr-3 text-lg"></i>
            <input
                type="text"
                placeholder="Find everything anywhere..."
                class="bg-transparent border-none text-sm placeholder-slate-400 w-full focus:ring-0 focus:outline-none text-slate-700" />
            <span class="text-[10px] font-bold text-slate-400 border border-slate-200 rounded px-1 ml-2">⌘K</span>
        </div>

        <!-- Right Section: Actions and Profile (Minimalist) -->
        <div class="flex items-center gap-2 sm:gap-4 ml-4">

            <!-- Quick Action: Notifications -->
            <button
                class="w-10 h-10 rounded-full flex items-center justify-center text-slate-400 hover:bg-slate-50 hover:text-secondary transition-all group relative"
                title="Notifications">
                <i class="ri-notification-3-line text-xl group-hover:scale-110 transition-transform"></i>
                <span class="absolute top-2 right-2 w-2 h-2 bg-rose-500 rounded-full border border-white"></span>
            </button>


            <!-- Quick Action: Settings Shortcut -->
            <button
                class="w-10 h-10 rounded-full flex items-center justify-center text-slate-400 hover:bg-slate-50 hover:text-secondary transition-all group"
                title="Admin Settings">
                <i class="ri-settings-line text-xl group-hover:rotate-45 transition-transform duration-300"></i>
            </button>

            <!-- Minimalist User Context with Dropdown -->
            <div class="h-8 w-px bg-slate-200 mx-2 hidden sm:block"></div>

            <div class="relative" x-data="{ userMenu: false }">
                <button
                    @click="userMenu = !userMenu"
                    class="flex items-center gap-3 px-1 py-1 rounded-full border border-slate-200 hover:border-secondary transition-all group outline-none"
                    title="User Profile">
                    <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 group-hover:bg-secondary group-hover:text-white transition-colors">
                        <i class="ri-user-3-line"></i>
                    </div>
                </button>

                <!-- Pines UI Inspired Dropdown -->
                <div
                    x-show="userMenu"
                    @click.away="userMenu = false"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                    x-cloak
                    class="absolute right-0 top-full mt-3 w-56 bg-white border border-slate-200 rounded-2xl shadow-xl shadow-slate-200/50 p-2 z-50 overflow-hidden">
                    <div class="px-4 py-3 border-b border-slate-100 mb-1">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Signed in as</p>
                        <p class="text-sm font-bold text-slate-800 truncate">aayush@grevx.ae</p>
                    </div>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 text-sm text-slate-600 hover:bg-slate-50 rounded-xl transition-colors">
                        <i class="ri-user-smile-line text-lg text-slate-400"></i>
                        Profile Settings
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 text-sm text-slate-600 hover:bg-slate-50 rounded-xl transition-colors">
                        <i class="ri-shield-user-line text-lg text-slate-400"></i>
                        Security & Login
                    </a>
                    <div class="h-px bg-slate-100 my-1"></div>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 text-sm text-rose-500 hover:bg-rose-50 rounded-xl transition-colors font-bold">
                        <i class="ri-logout-circle-r-line text-lg"></i>
                        Logout
                    </a>
                </div>
            </div>

            <a
                href="/"
                target="_blank"
                class="hidden md:flex items-center gap-2 px-4 py-2 border border-secondary/20 rounded-full text-xs font-bold text-secondary bg-secondary/5 hover:bg-secondary hover:text-white transition-all transform hover:-translate-y-px"
                title="Visit Live Site">
                <i class="ri-external-link-line text-sm"></i>
                LIVE SITE
            </a>

        </div>

    </div>
</header>