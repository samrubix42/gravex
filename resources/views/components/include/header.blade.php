<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div x-data="{ open:false }">

    <!-- Header -->
    <header class="fixed top-0 left-0 w-full bg-white/80 backdrop-blur-lg border-b border-border z-50">

        <div class="max-w-7xl mx-auto px-3 h-20 flex items-center justify-between">

            <!-- Logo -->
            <a href="/" class="flex items-center gap-3">

                <img src="/logo.png" alt="GREVX" class="w-40 h-auto">


            </a>


            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center gap-12 text-base font-semibold">

                <a href="#" class="relative text-zinc-700 hover:text-primary transition group">

                    Home

                    <span class="absolute -bottom-2 left-0 w-0 h-[2px] bg-secondary transition-all duration-300 group-hover:w-full"></span>

                </a>

                <a href="#" class="relative text-zinc-700 hover:text-primary transition group">

                    About

                    <span class="absolute -bottom-2 left-0 w-0 h-[2px] bg-secondary transition-all duration-300 group-hover:w-full"></span>

                </a>

                <a href="#" class="relative text-zinc-700 hover:text-primary transition group">

                    Services

                    <span class="absolute -bottom-2 left-0 w-0 h-[2px] bg-secondary transition-all duration-300 group-hover:w-full"></span>

                </a>

                <a href="#" class="relative text-zinc-700 hover:text-primary transition group">

                    Projects

                    <span class="absolute -bottom-2 left-0 w-0 h-[2px] bg-secondary transition-all duration-300 group-hover:w-full"></span>

                </a>

                <a href="#" class="relative text-zinc-700 hover:text-primary transition group">

                    Contact

                    <span class="absolute -bottom-2 left-0 w-0 h-[2px] bg-secondary transition-all duration-300 group-hover:w-full"></span>

                </a>

            </nav>


            <!-- CTA -->
            <div class="hidden md:block">

                <a href="#"
                   class="px-6 py-3 text-sm font-semibold text-white rounded-md bg-secondary hover:bg-accent transition shadow-sm">
                    Get Started
                </a>

            </div>


            <!-- Mobile Navigation Button -->
            <button
                @click="open = true"
                class="md:hidden text-2xl text-primary hover:text-secondary transition"
            >
                <i class="ri-menu-3-fill"></i>
            </button>

        </div>

    </header>



    <!-- Mobile Navigation -->

    <div
        x-show="open"
        x-transition
        class="fixed inset-0 bg-white z-[100] flex flex-col"
    >

        <!-- Top -->
        <div class="flex items-center justify-between h-20 px-6 border-b border-border">

            <span class="text-xl font-bold text-primary">
                GREVX
            </span>

            <button
                @click="open=false"
                class="text-2xl text-primary hover:text-secondary transition"
            >
                <i class="ri-close-line"></i>
            </button>

        </div>


        <!-- Links -->

        <div class="flex flex-col items-center justify-center flex-1 gap-10 text-2xl font-semibold">

            <a href="#" @click="open=false" class="hover:text-secondary transition">
                Home
            </a>

            <a href="#" @click="open=false" class="hover:text-secondary transition">
                About
            </a>

            <a href="#" @click="open=false" class="hover:text-secondary transition">
                Services
            </a>

            <a href="#" @click="open=false" class="hover:text-secondary transition">
                Projects
            </a>

            <a href="#" @click="open=false" class="hover:text-secondary transition">
                Contact
            </a>


            <!-- CTA -->
            <a
                href="#"
                class="mt-6 px-10 py-3 bg-secondary text-white rounded-md hover:bg-accent transition"
            >
                Start Project
            </a>

        </div>

    </div>

</div> 