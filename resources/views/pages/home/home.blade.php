<?php

use App\Models\Testimonial;
use Livewire\Component;

new class extends Component
{
    public array $testimonials = [];

    public function mount(): void
    {
        $this->testimonials = Testimonial::query()
            ->where('is_active', true)
            ->latest()
            ->get(['description', 'name', 'company'])
            ->map(fn($testimonial) => [
                'quote' => $testimonial->description,
                'name' => $testimonial->name,
                'company' => $testimonial->company,
            ])
            ->toArray();
    }
};
?>

<div>

    <section
        x-data="{ show:false }"
        x-init="setTimeout(()=>show=true,200)"
        class="relative pt-28 md:pt-32 pb-24 bg-blue-50/20 overflow-hidden">

        <!-- subtle background pattern -->
        <div class="absolute inset-0 opacity-30 pointer-events-none">
            <div class="absolute w-[500px] h-[500px] bg-secondary/10 rounded-full blur-3xl -top-40 -left-40"></div>
            <div class="absolute w-[400px] h-[400px] bg-accent/10 rounded-full blur-3xl bottom-0 right-0"></div>
        </div>


        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 grid md:grid-cols-2 gap-14 items-center">


            <!-- LEFT CONTENT -->
            <div
                x-show="show"
                x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0 translate-y-6"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="text-center md:text-left">


                <!-- Heading -->
                <h1 class="mt-4 text-4xl sm:text-5xl font-bold leading-tight text-text-primary">

                    Strategic Consulting for
                    <br class="hidden sm:block">

                    <span class="text-[#37809F]">
                        Modern Businesses
                    </span>

                </h1>

                <!-- Description -->
                <p class="mt-6 text-lg text-zinc-700 max-w-xl mx-auto md:mx-0">
                    Every business has blind spots. We find yours from revenue leakages and process gaps to control deficiencies and build the roadmap to close them. Sharper operations. Stronger financials. Sustainable growth.
                </p>



                <!-- CTA -->
                <div class="flex flex-wrap justify-center md:justify-start gap-4 mt-9">

                    <a wire:navigate href="{{route('pages::contact')}}"
                        class="px-7 py-3 bg-secondary text-white rounded-md font-medium hover:bg-secondary/90 shadow-sm hover:shadow-md transition">

                        Book a Consultation

                    </a>

                    <a href="#learnmore"
                        class="px-7 py-3 border border-border rounded-md text-text-primary hover:bg-muted transition">

                        Learn More

                    </a>

                </div>

            </div>


            <!-- RIGHT IMAGE -->
            <div
                x-show="show"
                x-transition:enter="transition ease-out duration-700 delay-200"
                x-transition:enter-start="opacity-0 translate-y-6"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="flex justify-center md:justify-end">

                <div class="relative">

                    <!-- image -->
                    <img
                        src="/consulting-hero.png"
                        alt="Business Consulting"
                        class="w-[320px] sm:w-[420px] md:w-[480px] max-w-full relative z-10">

                    <!-- soft glow -->
                    <div class="absolute inset-0 bg-secondary/10 blur-3xl rounded-full -z-10"></div>

                </div>

            </div>

        </div>

    </section>
    <section class="py-24 bg-muted">

        <div class="max-w-7xl mx-auto px-4 sm:px-6">

            <!-- Section Header -->
            <div id="learnmore" class="text-center max-w-2xl mx-auto">

                <h2 class="text-3xl md:text-4xl font-bold text-text-primary">
                    Our Consulting <span class="text-[#37809F]">Services</span>
                </h2>

                <p class="mt-4 text-zinc-700">
                    We support businesses with financial expertise,
                    leadership development and strategic advisory
                    to help them grow with confidence.
                </p>

            </div>


            <!-- Services Grid -->
            <div class="grid gap-7 mt-16 sm:grid-cols-2 lg:grid-cols-3">


                <!-- Service Card -->
                <div class="group p-7 bg-surface rounded-xl border border-border transition hover:shadow-lg hover:-translate-y-1">

                    <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-secondary/10 text-secondary text-xl transition group-hover:bg-secondary group-hover:text-white">
                        <i class="ri-calculator-line"></i>
                    </div>

                    <h3 class="mt-5 text-lg font-semibold text-text-primary relative inline-block">

                        Accounting & Compliance

                        <span class="block h-[2px] w-10 bg-secondary mt-2 transition-all duration-300 group-hover:w-full"></span>

                    </h3>

                    <p class="mt-3 text-sm text-zinc-700 leading-relaxed">
                        Reliable accounting systems and financial compliance
                        support for growing businesses.
                    </p>

                </div>



                <!-- Card -->
                <div class="group p-7 bg-surface rounded-xl border border-border transition hover:shadow-lg hover:-translate-y-1">

                    <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-secondary/10 text-secondary text-xl transition group-hover:bg-secondary group-hover:text-white">
                        <i class="ri-file-text-line"></i>
                    </div>

                    <h3 class="mt-5 text-lg font-semibold text-text-primary relative inline-block">

                        Tax Filing

                        <span class="block h-[2px] w-10 bg-secondary mt-2 transition-all duration-300 group-hover:w-full"></span>

                    </h3>

                    <p class="mt-3 text-sm text-zinc-700 leading-relaxed">
                        Simplified tax planning and filing solutions
                        designed for compliance and efficiency.
                    </p>

                </div>



                <!-- Card -->
                <div class="group p-7 bg-surface rounded-xl border border-border transition hover:shadow-lg hover:-translate-y-1">

                    <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-secondary/10 text-secondary text-xl transition group-hover:bg-secondary group-hover:text-white">
                        <i class="ri-team-line"></i>
                    </div>

                    <h3 class="mt-5 text-lg font-semibold text-text-primary relative inline-block">

                        Corporate Training

                        <span class="block h-[2px] w-10 bg-secondary mt-2 transition-all duration-300 group-hover:w-full"></span>

                    </h3>

                    <p class="mt-3 text-sm text-zinc-700 leading-relaxed">
                        Leadership and communication programs designed
                        to strengthen high-performing teams.
                    </p>

                </div>



                <!-- Card -->
                <div class="group p-7 bg-surface rounded-xl border border-border transition hover:shadow-lg hover:-translate-y-1">

                    <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-secondary/10 text-secondary text-xl transition group-hover:bg-secondary group-hover:text-white">
                        <i class="ri-bar-chart-line"></i>
                    </div>

                    <h3 class="mt-5 text-lg font-semibold text-text-primary relative inline-block">

                        Financial Modeling

                        <span class="block h-[2px] w-10 bg-secondary mt-2 transition-all duration-300 group-hover:w-full"></span>

                    </h3>

                    <p class="mt-3 text-sm text-zinc-700 leading-relaxed">
                        Build robust financial models to guide
                        business decisions and growth strategies.
                    </p>

                </div>



                <!-- Card -->
                <div class="group p-7 bg-surface rounded-xl border border-border transition hover:shadow-lg hover:-translate-y-1">

                    <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-secondary/10 text-secondary text-xl transition group-hover:bg-secondary group-hover:text-white">
                        <i class="ri-line-chart-line"></i>
                    </div>

                    <h3 class="mt-5 text-lg font-semibold text-text-primary relative inline-block">

                        Valuation

                        <span class="block h-[2px] w-10 bg-secondary mt-2 transition-all duration-300 group-hover:w-full"></span>

                    </h3>

                    <p class="mt-3 text-sm text-zinc-700 leading-relaxed">
                        Accurate company valuation to support
                        investment decisions and strategic planning.
                    </p>

                </div>



                <!-- Card -->
                <div class="group p-7 bg-surface rounded-xl border border-border transition hover:shadow-lg hover:-translate-y-1">

                    <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-secondary/10 text-secondary text-xl transition group-hover:bg-secondary group-hover:text-white">
                        <i class="ri-funds-line"></i>
                    </div>

                    <h3 class="mt-5 text-lg font-semibold text-text-primary relative inline-block">

                        Investor Readiness

                        <span class="block h-[2px] w-10 bg-secondary mt-2 transition-all duration-300 group-hover:w-full"></span>

                    </h3>

                    <p class="mt-3 text-sm text-zinc-700 leading-relaxed">
                        Prepare your company with financial clarity
                        and strategy before approaching investors.
                    </p>

                </div>

            </div>

        </div>

    </section>

    <div class="py-20">
        <section
            x-data="{show:true}"
            class="py-24 bg-background">

            <div class="max-w-7xl mx-auto px-4 sm:px-6">

                <!-- Section Header -->
                <div class="text-center max-w-2xl mx-auto">

                    <h2 class="text-3xl md:text-4xl font-bold text-text-primary">
                        Why Businesses Choose <span class="text-[#37809F]">Grevx</span>
                    </h2>

                    <p class="mt-4 text-zinc-700">
                        Smart analysis, clear advice, and real results delivered with precision and integrity, every single time. </p>

                </div>


                <!-- Features Grid -->
                <div class="grid gap-6 mt-16 sm:grid-cols-2 lg:grid-cols-4">

                    <!-- Card -->
                    <div
                        class="group p-6 bg-white border border-border rounded-md transition hover:shadow-md hover:-translate-y-1">

                        <div class="w-12 h-12 flex items-center justify-center rounded-lg 
            bg-secondary/10 text-secondary text-xl transition group-hover:bg-secondary group-hover:text-white">

                            <i class="ri-user-star-line"></i>

                        </div>

                        <h3 class="mt-5 font-semibold text-text-primary">
                            Deep diagnostic expertise
                        </h3>

                        <p class="mt-2 text-sm text-zinc-700 leading-relaxed">

                            We don't just consult we uncover the root causes others miss and build the case for a lasting change
                        </p>

                    </div>



                    <!-- Card -->
                    <div
                        class="group p-6 bg-white border border-border rounded-md transition hover:shadow-md hover:-translate-y-1">

                        <div class="w-12 h-12 flex items-center justify-center rounded-lg 
            bg-secondary/10 text-secondary text-xl transition group-hover:bg-secondary group-hover:text-white">

                            <i class="ri-lightbulb-line"></i>

                        </div>

                        <h3 class="mt-5 font-semibold text-text-primary">
                            End to End Support
                        </h3>

                        <p class="mt-2 text-sm text-zinc-700 leading-relaxed">
                            From tax and accounting to valuations and investor readiness, all under one roof
                        </p>

                    </div>



                    <!-- Card -->
                    <div
                        class="group p-6 bg-white border border-border rounded-md transition hover:shadow-md hover:-translate-y-1">

                        <div class="w-12 h-12 flex items-center justify-center rounded-lg 
            bg-secondary/10 text-secondary text-xl transition group-hover:bg-secondary group-hover:text-white">

                            <i class="ri-team-line"></i>

                        </div>

                        <h3 class="mt-5 font-semibold text-text-primary">
                            Actionable Insights
                        </h3>

                        <p class="mt-2 text-sm text-zinc-700 leading-relaxed">
                            Every recommendation comes with a clear, practical roadmap your team can execute immediately.
                        </p>

                    </div>



                    <!-- Card -->
                    <div
                        class="group p-6 bg-white border border-border rounded-md transition hover:shadow-md hover:-translate-y-1">

                        <div class="w-12 h-12 flex items-center justify-center rounded-lg 
            bg-secondary/10 text-secondary text-xl transition group-hover:bg-secondary group-hover:text-white">

                            <i class="ri-line-chart-line"></i>

                        </div>

                        <h3 class="mt-5 font-semibold text-text-primary">
                            Trust & Transparency
                        </h3>

                        <p class="mt-2 text-sm text-zinc-700 leading-relaxed">
                            Clear findings, honest advice, and full visibility into everything we do for you.
                        </p>

                    </div>

                </div>

            </div>

        </section>
    </div>
    <section
        x-data="{
            active:0,
            testimonials:@js($testimonials),
            next(){
                if (!this.testimonials.length) return;
                this.active = (this.active + 1) % this.testimonials.length
            },
            prev(){
                if (!this.testimonials.length) return;
                this.active = (this.active - 1 + this.testimonials.length) % this.testimonials.length
            }
        }"
        x-init="if (testimonials.length > 1) setInterval(()=>next(),5000)"
        class="py-24 bg-muted">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 text-center">

            <!-- Heading -->
            <h2 class="text-3xl md:text-4xl font-bold text-text-primary">
                What Our <span class="text-[#37809F]">Clients</span> Say
            </h2>

            <p class="mt-3 text-zinc-700">
                Organizations trust <span class="text-[#37809F]">Grevx</span> Consulting for practical strategy and leadership development.
            </p>


            <!-- Testimonial Card -->
            <div class="relative mt-12">

                <template x-if="testimonials.length === 0">
                    <div class="bg-white border border-border rounded-md p-8 shadow-sm">
                        <p class="text-zinc-700">No testimonials available right now.</p>
                    </div>
                </template>

                <template x-for="(item,index) in testimonials" :key="index">

                    <div
                        x-show="active === index"
                        x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="bg-white border border-border rounded-md p-8 shadow-sm">

                        <div class="text-secondary text-3xl mb-4">
                            <i class="ri-double-quotes-l"></i>
                        </div>

                        <p class="text-lg text-zinc-700 leading-relaxed">
                            <span x-text="item.quote"></span>
                        </p>

                        <div class="mt-6">

                            <p class="font-semibold text-text-primary" x-text="item.name"></p>

                            <p class="text-sm text-zinc-700" x-text="item.company"></p>

                        </div>

                    </div>

                </template>

            </div>


            <!-- Navigation -->
            <div class="flex justify-center items-center gap-4 mt-8">

                <button
                    @click="prev()"
                    :disabled="testimonials.length < 2"
                    class="w-10 h-10 flex items-center justify-center border border-border rounded-full hover:bg-background transition">

                    <i class="ri-arrow-left-line"></i>

                </button>

                <button
                    @click="next()"
                    :disabled="testimonials.length < 2"
                    class="w-10 h-10 flex items-center justify-center border border-border rounded-full hover:bg-background transition">

                    <i class="ri-arrow-right-line"></i>

                </button>

            </div>




        </div>

    </section>



    <section class="py-20 bg-white">

        <div class="max-w-6xl mx-auto px-4 sm:px-6">

            <div class="px-8 md:px-16 py-14 text-center">

                <!-- Heading -->
                <h2 class="text-3xl md:text-4xl font-bold text-text-primary">
                    Ready to Strengthen Your <span class="text-[#37809F]">Business?</span>
                </h2>

                <!-- Description -->
                <p class="mt-4 text-zinc-700 max-w-2xl mx-auto">
                    Partner with Grevx Consulting to improve financial clarity,
                    develop stronger leadership teams, and prepare your organization
                    for long-term growth.
                </p>

                <!-- Buttons -->
                <div class="flex flex-wrap justify-center gap-4 mt-8">

                    <a href="#"
                        class="px-7 py-3 bg-secondary text-white font-medium rounded-lg hover:bg-accent transition">

                        Book a Consultation

                    </a>

                    <a wire:navigate href="{{route('pages::consulting')}}"
                        class="px-7 py-3 border border-border rounded-lg text-text-primary hover:bg-muted transition">

            Explore Our Services
                    </a>

                </div>

            </div>

        </div>

    </section>

</div>