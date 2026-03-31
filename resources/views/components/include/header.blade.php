<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div x-cloak x-data="{ open:false }" class="relative">

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

                <a href="{{ route('pages::consulting') }}" wire:navigate class="text-text-secondary hover:text-primary transition">
                    Consulting
                </a>

                <a href="{{ route('pages::training') }}" wire:navigate class="text-text-secondary hover:text-primary transition">
                    Training
                </a>

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

            <a href="{{ route('pages::consulting') }}" wire:navigate @click="open=false" class="text-text-secondary hover:text-primary transition">
                Consulting
            </a>

            <a href="{{ route('pages::training') }}" wire:navigate @click="open=false" class="text-text-secondary hover:text-primary transition">
                Training
            </a>

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
