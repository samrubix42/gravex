<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div x-cloak x-data="{ open:false, services:false }" class="relative">

    <!-- HEADER -->
    <header class="fixed top-0 left-0 w-full bg-white/80 backdrop-blur-md border-b border-border z-50">

        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">

            <!-- Logo -->
            <a href="{{ route('home') }}" wire:navigate class="flex items-center">
                <img src="/logo.png" alt="Grevx" class="h-32">
            </a>


            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center gap-10 font-medium text-[15px]">

                <a href="{{ route('home') }}" wire:navigate class="text-text-secondary hover:text-primary transition">
                    Home
                </a>

                <a href="{{ route('pages::about') }}" wire:navigate class="text-text-secondary hover:text-primary transition">
                    About
                </a>


                <!-- Services Dropdown -->
                <div
                    class="relative"
                    @mouseenter="services=true"
                    @mouseleave="services=false">

                    <button class="flex items-center gap-1 text-text-secondary hover:text-primary transition">

                        Services

                        <i class="ri-arrow-down-s-line text-lg transition"
                            :class="services ? 'rotate-180' : ''"></i>

                    </button>


                    <!-- Dropdown -->
                    <div
                        x-show="services"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-2"
                        class="absolute left-0 top-full mt-3 w-64 bg-white border border-border rounded-xl shadow-lg p-2">

                        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-muted transition">
                            <i class="ri-calculator-line text-secondary"></i>
                            Accounting & Compliance
                        </a>

                        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-muted transition">
                            <i class="ri-file-text-line text-secondary"></i>
                            Tax Filing
                        </a>

                        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-muted transition">
                            <i class="ri-team-line text-secondary"></i>
                            Corporate Training
                        </a>

                        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-muted transition">
                            <i class="ri-bar-chart-line text-secondary"></i>
                            Financial Modeling
                        </a>

                        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-muted transition">
                            <i class="ri-line-chart-line text-secondary"></i>
                            Valuation
                        </a>

                    </div>

                </div>


                <a href="{{ route('pages::blog') }}" wire:navigate class="text-text-secondary hover:text-primary transition">
                    Blog
                </a>

                <a href="{{ route('pages::contact') }}" wire:navigate class="text-text-secondary hover:text-primary transition">
                    Contact
                </a>

            </nav>


            <!-- CTA -->
            <div class="hidden md:block">

                <a href="{{ route('pages::contact') }}" wire:navigate
                    class="px-5 py-2.5 bg-secondary text-white rounded-lg font-medium hover:bg-secondary/90 transition">
                    Get Started
                </a>

            </div>


            <!-- Mobile Menu Button -->
            <button
                @click="open=true"
                class="md:hidden text-2xl text-primary">
                <i class="ri-menu-3-line"></i>
            </button>

        </div>

    </header>


    <!-- MOBILE MENU -->
    <div
        x-show="open"
        x-transition
        class="fixed inset-0 bg-white z-[100] flex flex-col">

        <!-- Top -->
        <div class="flex items-center justify-between h-20 px-6 border-b border-border">

            <a href="{{ route('home') }}" wire:navigate @click="open=false">
                <img src="/logo.png" class="h-8">
            </a>

            <button @click="open=false" class="text-2xl text-primary">
                <i class="ri-close-line"></i>
            </button>

        </div>


        <!-- Links -->
        <div class="flex flex-col px-6 pt-10 space-y-6 text-lg font-medium">

            <a href="{{ route('home') }}" wire:navigate @click="open=false" class="text-text-secondary hover:text-primary transition">
                Home
            </a>

            <a href="{{ route('pages::about') }}" wire:navigate @click="open=false" class="text-text-secondary hover:text-primary transition">
                About
            </a>


            <!-- Mobile Services Dropdown -->
            <div x-data="{ mobileServices:false }">

                <button
                    @click="mobileServices=!mobileServices"
                    class="flex items-center justify-between w-full text-text-secondary hover:text-primary transition">

                    <span>Services</span>

                    <i class="ri-arrow-down-s-line transition"
                        :class="mobileServices ? 'rotate-180' : ''"></i>

                </button>


                <div
                    x-show="mobileServices"
                    x-transition
                    class="mt-3 pl-4 flex flex-col space-y-3 text-[16px]">

                    <a href="#" @click="open=false" class="hover:text-secondary">
                        Accounting & Compliance
                    </a>

                    <a href="#" @click="open=false" class="hover:text-secondary">
                        Tax Filing
                    </a>

                    <a href="#" @click="open=false" class="hover:text-secondary">
                        Corporate Training
                    </a>

                    <a href="#" @click="open=false" class="hover:text-secondary">
                        Financial Modeling
                    </a>

                    <a href="#" @click="open=false" class="hover:text-secondary">
                        Valuation
                    </a>

                </div>

            </div>


            <a href="{{ route('pages::blog') }}" wire:navigate @click="open=false" class="text-text-secondary hover:text-primary transition">
                Blog
            </a>

            <a href="{{ route('pages::contact') }}" wire:navigate @click="open=false" class="text-text-secondary hover:text-primary transition">
                Contact
            </a>


            <!-- CTA -->
            <a
                href="{{ route('pages::contact') }}"
                wire:navigate
                class="mt-6 inline-flex justify-center px-6 py-3 bg-secondary text-white rounded-lg font-medium hover:bg-secondary/90 transition">

                Get Started

            </a>

        </div>

    </div>

</div>
