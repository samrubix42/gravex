<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<footer class="bg-surface border-t border-border relative">


    <!-- Footer Main -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 pt-10 pb-12">

        <div class="grid items-start gap-8 sm:gap-10 sm:grid-cols-2 lg:grid-cols-3">

            <!-- Brand -->
            <div class="space-y-4 self-start">

                <a href="{{ route('home') }}" wire:navigate class="inline-flex items-start leading-none">
                    <img src="/logo.png" alt="GREVX Logo" class="block w-32 h-auto -mt-8">
                </a>


                <!-- Social Icons -->
                <div class="flex gap-3">

                    <a href="https://wa.me/918376059410?text=Hi%20happy%20to%20know%20about%20your%20services"

                        target="_blank"
                        class="w-9 h-9 flex items-center justify-center rounded-md border border-border hover:bg-secondary hover:text-white transition">
                        <i class="ri-whatsapp-line"></i>
                    </a>

                    <a href="#"
                        class="w-9 h-9 flex items-center justify-center rounded-md border border-border hover:bg-secondary hover:text-white transition">
                        <i class="ri-linkedin-line"></i>
                    </a>

                    <a href="#"
                        class="w-9 h-9 flex items-center justify-center rounded-md border border-border hover:bg-secondary hover:text-white transition">
                        <i class="ri-instagram-line"></i>
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
                        <a href="{{ route('home') }}" wire:navigate class="hover:text-secondary transition">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('pages::about') }}" wire:navigate class="hover:text-secondary transition">
                            About Us
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('pages::blog') }}" wire:navigate class="hover:text-secondary transition">
                            Articles
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('pages::contact') }}" wire:navigate class="hover:text-secondary transition">
                            Contact Us
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
                        <a href="{{ route('pages::consulting') }}" wire:navigate class="hover:text-secondary transition">
                            Consulting
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('pages::training') }}" wire:navigate class="hover:text-secondary transition">
                            Corporate Training
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('pages::consulting') }}" wire:navigate class="hover:text-secondary transition">
                            Tax Preparation &amp; Filing
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('pages::consulting') }}" wire:navigate class="hover:text-secondary transition">
                            Financial Modeling
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('pages::consulting') }}" wire:navigate class="hover:text-secondary transition">
                            Capital Infusion
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('pages::consulting') }}" wire:navigate class="hover:text-secondary transition">
                            Investor Readiness
                        </a>
                    </li>

                </ul>

            </div>


        </div>

    </div>



    <!-- Bottom -->
    <div class="border-t border-border">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-sm text-text-secondary">

            <p class="text-center sm:text-left">
                &copy; {{ date('Y') }} GREVX. All rights reserved.
            </p>

            <div class="">
                <span>Powered By</span>
                <a href="https://techonika.com" class="hover:text-secondary transition">
                    Techonika
                </a>

            </div>

        </div>

    </div>

</footer>