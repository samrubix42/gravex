<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<footer class="bg-surface border-t border-border">




    <!-- Footer Main -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-14">

        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">

            <!-- Brand -->
            <div class="space-y-5">

                <a href="{{ route('home') }}" wire:navigate>
                    <img src="/logo.png" alt="GREVX Logo" class="w-32">
                </a>

                <p class="text-sm text-text-secondary leading-relaxed">
                    GREVX delivers modern infrastructure, cloud platforms
                    and enterprise software solutions that help companies
                    innovate and scale.
                </p>

                <!-- Social Icons -->
                <div class="flex gap-3">

                    <a href="#"
                        class="w-9 h-9 flex items-center justify-center rounded-md border border-border hover:bg-secondary hover:text-white transition">
                        <i class="ri-twitter-x-line"></i>
                    </a>

                    <a href="#"
                        class="w-9 h-9 flex items-center justify-center rounded-md border border-border hover:bg-secondary hover:text-white transition">
                        <i class="ri-linkedin-line"></i>
                    </a>

                    <a href="#"
                        class="w-9 h-9 flex items-center justify-center rounded-md border border-border hover:bg-secondary hover:text-white transition">
                        <i class="ri-github-line"></i>
                    </a>

                </div>

            </div>


            <!-- Company -->
            <div>

                <h3 class="text-text-primary font-semibold mb-4">
                    Company
                </h3>

                <ul class="space-y-2 text-sm text-text-secondary">

                    <li>
                        <a href="{{ route('pages::about') }}" wire:navigate class="hover:text-secondary transition">
                            About Us
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('home') }}" wire:navigate class="hover:text-secondary transition">
                            Our Services
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('pages::blog') }}" wire:navigate class="hover:text-secondary transition">
                            Blog
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('pages::contact') }}" wire:navigate class="hover:text-secondary transition">
                            Contact
                        </a>
                    </li>

                </ul>

            </div>


            <!-- Services -->
            <div>

                <h3 class="text-text-primary font-semibold mb-4">
                    Services
                </h3>

                <ul class="space-y-2 text-sm text-text-secondary">

                    <li>
                        <a href="#" class="hover:text-secondary transition">
                            Digital Infrastructure
                        </a>
                    </li>

                    <li>
                        <a href="#" class="hover:text-secondary transition">
                            Consulting
                        </a>
                    </li>

                    <li>
                        <a href="#" class="hover:text-secondary transition">
                            More Services
                        </a>
                    </li>

                    <li>
                        <a href="#" class="hover:text-secondary transition">
                            Technology Consulting
                        </a>
                    </li>

                </ul>

            </div>


            <!-- Newsletter -->
            <div x-data="{ email:'' }">

                <h3 class="text-text-primary font-semibold mb-4">
                    Newsletter
                </h3>

                <p class="text-sm text-text-secondary mb-4">
                    Get insights about infrastructure, cloud and modern digital systems.
                </p>

                <div class="flex flex-col sm:flex-row border border-border rounded-lg overflow-hidden">

                    <input
                        type="email"
                        x-model="email"
                        placeholder="Enter your email"
                        class="w-full px-3 py-2 text-sm outline-none text-text-primary placeholder-gray-400">

                    <button
                        class="px-4 py-2 bg-secondary hover:bg-accent transition text-white flex items-center justify-center">

                        <i class="ri-send-plane-line"></i>

                    </button>

                </div>

            </div>

        </div>

    </div>



    <!-- Bottom -->
    <div class="border-t border-border">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-sm text-text-secondary">

            <p class="text-center sm:text-left">
                (c) {{ date('Y') }} GREVX. All rights reserved.
            </p>

            <div class="flex flex-wrap justify-center gap-5">

                <a href="#" class="hover:text-secondary transition">
                    Privacy Policy
                </a>

                <a href="#" class="hover:text-secondary transition">
                    Terms
                </a>

                <a href="#" class="hover:text-secondary transition">
                    Security
                </a>

            </div>

        </div>

    </div>

</footer>
