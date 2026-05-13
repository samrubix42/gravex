<?php

use App\Models\Contact;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

new class extends Component
{
    public array $testimonials = [];
    public string $consult_name = '';
    public ?string $consult_phone = null;
    public ?string $consult_email = null;
    public string $consult_subject = 'Consultation Request';
    public string $consult_message = '';

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

    protected function rules(): array
    {
        return [
            'consult_name' => ['required', 'string', 'min:2', 'max:100'],
            'consult_phone' => ['nullable', 'regex:/^[0-9+\-\s()]{7,20}$/'],
            'consult_email' => ['nullable', 'email', 'max:255'],
            'consult_subject' => ['nullable', 'string', 'min:3', 'max:150'],
            'consult_message' => ['required', 'string', 'min:10', 'max:5000'],
        ];
    }

    protected function messages(): array
    {
        return [
            'consult_name.required' => 'Please enter your full name.',
            'consult_name.min' => 'Name must be at least 2 characters.',
            'consult_phone.regex' => 'Please enter a valid phone number.',
            'consult_email.email' => 'Please enter a valid email address.',
            'consult_message.required' => 'Please enter your message.',
            'consult_message.min' => 'Message must be at least 10 characters.',
        ];
    }

    public function submitConsultation(): void
    {
        $this->consult_name = trim($this->consult_name);
        $this->consult_phone = blank($this->consult_phone) ? null : trim($this->consult_phone);
        $this->consult_email = blank($this->consult_email) ? null : trim($this->consult_email);
        $this->consult_subject = 'Consultation Request';
        $this->consult_message = trim($this->consult_message);

        $validated = $this->validate();
        if (empty($validated['consult_phone']) && empty($validated['consult_email'])) {
            $this->addError('consult_contact', 'Please provide at least a phone number or email address.');
            return;
        }

        $contact = Contact::create([
            'name' => $validated['consult_name'],
            'phone' => $validated['consult_phone'] ?: null,
            'email' => $validated['consult_email'] ?: null,
            'subject' => $validated['consult_subject'],
            'message' => $validated['consult_message'],
            'is_read' => false,
        ]);

        Mail::to('samcool3203@gmail.com')->send(new \App\Mail\ContactSubmissionMail($contact));

        $this->reset(['consult_name', 'consult_phone', 'consult_email', 'consult_subject', 'consult_message']);
        $this->resetErrorBag();
        session()->flash('consult_success', 'Thank you. We received your request and will respond soon.');
    }
};
?>

@section('title', 'Grevx Consulting - Strategic Business Consulting')
@section('meta_description', 'Strategic consulting to close revenue leakages, strengthen operations, and drive sustainable growth for modern businesses.')

<div x-data="{ openConsult:false }">

    <style>
        .consult-scroll::-webkit-scrollbar {
            width: 8px;
        }

        .consult-scroll::-webkit-scrollbar-track {
            background: #f3f4f6;
            border-radius: 999px;
        }

        .consult-scroll::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 999px;
        }

        .consult-scroll::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .consult-scroll {
            scrollbar-width: thin;
            scrollbar-color: #cbd5e1 #f3f4f6;
        }
    </style>

    <!-- Consultation Modal -->
    <div
        class="fixed inset-0 z-50 flex items-center justify-center px-4 sm:px-6"
        x-show="openConsult">

        <div
            class="absolute inset-0 bg-black/50"
            @click="openConsult=false">
        </div>

        <div
            x-cloak
            x-show="openConsult"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="consult-scroll relative w-full max-w-lg rounded-xl bg-surface border border-border shadow-xl p-5 sm:p-6 max-h-[85vh] sm:max-h-[80vh] overflow-y-auto">

            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-sm font-semibold tracking-widest text-secondary uppercase">
                        Book a Consultation
                    </p>
                    <h3 class="mt-2 text-xl sm:text-2xl font-semibold text-text-primary">
                        Contact Our Team
                    </h3>
                </div>
                <button
                    type="button"
                    class="w-9 h-9 flex items-center justify-center rounded-md border border-border text-text-primary hover:bg-muted transition"
                    @click="openConsult=false">
                    <i class="ri-close-line"></i>
                </button>
            </div>

            <p class="mt-2 sm:mt-3 text-sm text-zinc-700">
                Share your needs and we will respond within 48 hours.
            </p>

            @if (session('consult_success'))
            <div class="mt-5 rounded-md bg-secondary/10 text-secondary px-4 py-3 text-sm">
                {{ session('consult_success') }}
            </div>
            @endif

            @error('consult_contact')
            <div class="mt-5 rounded-md bg-red-50 text-red-700 px-4 py-3 text-sm">
                {{ $message }}
            </div>
            @enderror

            <form wire:submit.prevent="submitConsultation" class="mt-4 sm:mt-5 grid gap-4">
                <div>
                    <label class="text-sm font-medium text-text-primary">
                        Full Name
                    </label>
                    <input
                        type="text"
                        wire:model.live.debounce.300ms="consult_name"
                        class="mt-2 w-full border border-border rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-secondary/30"
                        placeholder="Your name">
                    @error('consult_name')
                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label class="text-sm font-medium text-text-primary">
                            Phone Number
                        </label>
                        <input
                            type="text"
                            wire:model.live.debounce.300ms="consult_phone"
                            class="mt-2 w-full border border-border rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-secondary/30"
                            placeholder="+91 98XX XX XX XX">
                        @error('consult_phone')
                        <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="text-sm font-medium text-text-primary">
                            Email Address
                        </label>
                        <input
                            type="email"
                            wire:model.live.debounce.300ms="consult_email"
                            class="mt-2 w-full border border-border rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-secondary/30"
                            placeholder="you@company.com">
                        @error('consult_email')
                        <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="text-sm font-medium text-text-primary">
                        Message
                    </label>
                    <textarea
                        rows="3"
                        wire:model.live.debounce.300ms="consult_message"
                        class="mt-2 w-full border border-border rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-secondary/30"
                        placeholder="Tell us about your needs"></textarea>
                    @error('consult_message')
                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="mt-1 w-full bg-secondary text-white py-2.5 rounded-md font-medium hover:bg-secondary/90 transition">
                    <span wire:loading.remove wire:target="submitConsultation">Submit Request</span>
                    <span wire:loading wire:target="submitConsultation">Submitting...</span>
                </button>
            </form>

            <div class="mt-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 rounded-lg border border-border bg-muted/40 px-4 py-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg border border-border bg-secondary/10 text-secondary flex items-center justify-center">
                        <i class="ri-whatsapp-line"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-text-primary">WhatsApp (India)</p>
                        <a
                            href="https://wa.me/918376059410?text=Hi%20happy%20to%20know%20about%20your%20services"
                            target="_blank"
                            class="text-sm text-secondary hover:underline">
                            +91-8376059410
                        </a>
                    </div>
                </div>
                <div class="text-xs text-zinc-600 sm:text-right">
                    Tap to message us on WhatsApp.
                </div>
            </div>

            <div class="mt-4 flex justify-end">
                <button
                    type="button"
                    class="px-4 py-2 border border-border rounded-md text-text-primary hover:bg-muted transition"
                    @click="openConsult=false">
                    Close
                </button>
            </div>

        </div>

    </div>

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

                    <a href="#"
                        @click.prevent="openConsult=true"
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

                        Control Deficiency
                        <span class="block h-[2px] w-10 bg-secondary mt-2 transition-all duration-300 group-hover:w-full"></span>

                    </h3>

                    <p class="mt-3 text-sm text-zinc-700 leading-relaxed">
                        Identify gaps in internal controls, reduce operational risks, and strengthen governance systems to improve business efficiency and compliance confidence.

                    </p>

                </div>



                <!-- Card -->
                <div class="group p-7 bg-surface rounded-xl border border-border transition hover:shadow-lg hover:-translate-y-1">

                    <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-secondary/10 text-secondary text-xl transition group-hover:bg-secondary group-hover:text-white">
                        <i class="ri-file-text-line"></i>
                    </div>

                    <h3 class="mt-5 text-lg font-semibold text-text-primary relative inline-block">

                        Accounting & Compliance
                        <span class="block h-[2px] w-10 bg-secondary mt-2 transition-all duration-300 group-hover:w-full"></span>

                    </h3>

                    <p class="mt-3 text-sm text-zinc-700 leading-relaxed">
                        Streamline your accounting processes and stay compliant with evolving regulations through accurate reporting, reliable bookkeeping, and expert financial oversight.

                    </p>

                </div>
                <div class="group p-7 bg-surface rounded-xl border border-border transition hover:shadow-lg hover:-translate-y-1">

                    <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-secondary/10 text-secondary text-xl transition group-hover:bg-secondary group-hover:text-white">
                        <i class="ri-article-line"></i>
                    </div>

                    <h3 class="mt-5 text-lg font-semibold text-text-primary relative inline-block">

                        Tax Prep & Filing
                        <span class="block h-[2px] w-10 bg-secondary mt-2 transition-all duration-300 group-hover:w-full"></span>

                    </h3>

                    <p class="mt-3 text-sm text-zinc-700 leading-relaxed">
                        Simplify tax management with timely filings, strategic tax planning, and compliance-focused solutions tailored to your business needs.

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
                        Empower your teams with practical, industry-focused training programs designed to enhance productivity, leadership, finance, and business skills.

                    </p>

                </div>



                <!-- Card -->
                <div class="group p-7 bg-surface rounded-xl border border-border transition hover:shadow-lg hover:-translate-y-1">

                    <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-secondary/10 text-secondary text-xl transition group-hover:bg-secondary group-hover:text-white">
                        <i class="ri-bar-chart-line"></i>
                    </div>

                    <h3 class="mt-5 text-lg font-semibold text-text-primary relative inline-block">

                        Financial Modelling & Valuations
                        <span class="block h-[2px] w-10 bg-secondary mt-2 transition-all duration-300 group-hover:w-full"></span>

                    </h3>

                    <p class="mt-3 text-sm text-zinc-700 leading-relaxed">
                        Build dynamic financial models that support strategic decision-making, forecasting, fundraising, budgeting and gain clear insights into your company’s worth with data driven valuations.

                    </p>

                </div>



                <!-- Card -->
                <div class="group p-7 bg-surface rounded-xl border border-border transition hover:shadow-lg hover:-translate-y-1">

                    <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-secondary/10 text-secondary text-xl transition group-hover:bg-secondary group-hover:text-white">
                        <i class="ri-line-chart-line"></i>
                    </div>

                    <h3 class="mt-5 text-lg font-semibold text-text-primary relative inline-block">

                        Investor Readiness

                        <span class="block h-[2px] w-10 bg-secondary mt-2 transition-all duration-300 group-hover:w-full"></span>

                    </h3>

                    <p class="mt-3 text-sm text-zinc-700 leading-relaxed">
                        Prepare your business for investors with compelling financials, strategic positioning, pitch support, and investment-ready documentation.
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
                        @click.prevent="openConsult=true"
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