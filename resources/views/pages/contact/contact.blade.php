<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>

    <!-- HERO -->
    <section class="relative pt-32 pb-20 bg-blue-50/20 overflow-hidden border-b border-border">
        <div class="absolute inset-0 opacity-30 pointer-events-none">
            <div class="absolute w-[420px] h-[420px] bg-secondary/10 rounded-full blur-3xl -top-28 -left-28"></div>
            <div class="absolute w-[320px] h-[320px] bg-accent/10 rounded-full blur-3xl bottom-0 right-0"></div>
        </div>

        <div class="relative max-w-5xl mx-auto px-6 text-center">

            <p class="text-sm font-semibold tracking-widest text-secondary uppercase">
                Contact Us
            </p>

            <h1 class="mt-4 text-4xl md:text-5xl font-bold text-text-primary leading-tight">
                Let's Talk About Your <span class="text-secondary">Business</span>
            </h1>

            <p class="mt-6 text-lg text-zinc-700 max-w-2xl mx-auto">
                Whether you have a question, project idea, or partnership opportunity,
                our team is ready to help.
            </p>

        </div>

    </section>



    <!-- CONTACT SECTION -->
    <section class="py-24 bg-background">

        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16">

            <!-- LEFT SIDE INFO -->
            <div>

                <h2 class="text-2xl font-semibold text-text-primary">
                    Contact <span class="text-secondary">Information</span>
                </h2>

                <p class="mt-4 text-zinc-700">
                    Reach out to us directly using the information below or send
                    a message using the form.
                </p>


                <!-- EMAIL -->
                <div class="mt-10 flex items-start gap-4">

                    <div class="w-12 h-12 rounded-lg border border-border bg-secondary/10 text-secondary flex items-center justify-center text-lg">
                        <i class="ri-mail-line"></i>
                    </div>

                    <div>
                        <p class="font-semibold text-text-primary">Email</p>
                        <p class="text-zinc-700">hello@grevxconsulting.com</p>
                    </div>

                </div>


                <!-- PHONE -->
                <div class="mt-8 flex items-start gap-4">

                    <div class="w-12 h-12 rounded-lg border border-border bg-secondary/10 text-secondary flex items-center justify-center text-lg">
                        <i class="ri-phone-line"></i>
                    </div>

                    <div>
                        <p class="font-semibold text-text-primary">Phone</p>
                        <p class="text-zinc-700">+91 98XX XX XX XX</p>
                    </div>

                </div>


                <!-- OFFICE -->
                <div class="mt-8 flex items-start gap-4">

                    <div class="w-12 h-12 rounded-lg border border-border bg-secondary/10 text-secondary flex items-center justify-center text-lg">
                        <i class="ri-map-pin-line"></i>
                    </div>

                    <div>
                        <p class="font-semibold text-text-primary">Office</p>
                        <p class="text-zinc-700">Mumbai, India</p>
                    </div>

                </div>

            </div>



            <!-- CONTACT FORM -->
            <div class="border border-border bg-white rounded-xl p-8 shadow-sm">

                <h3 class="text-xl font-semibold text-text-primary">
                    Send a <span class="text-secondary">Message</span>
                </h3>

                <p class="mt-2 text-zinc-700">
                    Fill the form and our team will contact you soon.
                </p>


                <form class="mt-8 grid gap-6">

                    <div>
                        <label class="text-sm font-medium text-text-primary">
                            Full Name
                        </label>

                        <input
                            type="text"
                            class="mt-2 w-full border border-border rounded-md px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-secondary/30"
                            placeholder="Your name">
                    </div>


                    <div>
                        <label class="text-sm font-medium text-text-primary">
                            Email Address
                        </label>

                        <input
                            type="email"
                            class="mt-2 w-full border border-border rounded-md px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-secondary/30"
                            placeholder="you@company.com">
                    </div>


                    <div>
                        <label class="text-sm font-medium text-text-primary">
                            Subject
                        </label>

                        <input
                            type="text"
                            class="mt-2 w-full border border-border rounded-md px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-secondary/30"
                            placeholder="Subject">
                    </div>


                    <div>
                        <label class="text-sm font-medium text-text-primary">
                            Message
                        </label>

                        <textarea
                            rows="5"
                            class="mt-2 w-full border border-border rounded-md px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-secondary/30"
                            placeholder="Write your message"></textarea>
                    </div>


                    <button
                        type="button"
                        class="mt-2 w-full bg-secondary text-white py-3 rounded-md font-medium hover:bg-secondary/90 transition">
                        Submit Message
                    </button>

                </form>

            </div>

        </div>

    </section>



    <!-- MAP SECTION -->
    <section class="pb-24 bg-muted">

        <div class="max-w-7xl mx-auto px-6">

            <h2 class="text-2xl font-semibold text-text-primary text-center">
                Our <span class="text-secondary">Location</span>
            </h2>

            <p class="text-zinc-700 text-center mt-2">
                Visit our office or locate us on the map.
            </p>


            <div class="mt-10 rounded-xl overflow-hidden border border-border bg-white shadow-sm">

                <iframe
                    src="https://www.google.com/maps?q=Mumbai&output=embed"
                    width="100%"
                    height="400"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>

            </div>

        </div>

    </section>

</div>
