<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>

    <!-- HERO -->
    <section class="relative pt-32 pb-24 bg-blue-50/20 overflow-hidden">

        <div class="absolute inset-0 opacity-30 pointer-events-none">
            <div class="absolute w-[480px] h-[480px] bg-secondary/10 rounded-full blur-3xl -top-32 -left-32"></div>
            <div class="absolute w-[360px] h-[360px] bg-accent/10 rounded-full blur-3xl bottom-0 right-0"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

            <div>
                <p class="text-sm font-semibold text-secondary tracking-widest uppercase">
                    Consulting Services
                </p>

                <h1 class="mt-4 text-4xl md:text-5xl font-bold text-text-primary leading-tight">
                    Expert Guidance for
                    <span class="text-secondary">Sustainable Business Growth</span>
                </h1>

                <p class="mt-6 text-lg text-zinc-700 max-w-xl leading-relaxed">
                    GREVX delivers end-to-end consulting solutions — from financial compliance and tax strategy to
                    corporate training, investor readiness, and capital access. We partner with businesses at
                    every stage to unlock clarity, structure, and measurable results.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ route('pages::contact') }}" wire:navigate
                        class="px-6 py-3 bg-secondary text-white font-semibold rounded-lg hover:bg-secondary/90 transition">
                        Book a Consultation
                    </a>
                    <a href="#services"
                        class="px-6 py-3 border border-secondary text-secondary font-semibold rounded-lg hover:bg-secondary/10 transition">
                        Explore Services
                    </a>
                </div>
            </div>

            <!-- Stats Card -->
            <div class="bg-white border border-border rounded-xl p-8 shadow-sm space-y-6">

                <h2 class="text-xl font-semibold text-text-primary">
                    Why GREVX?
                </h2>

                <ul class="space-y-4 text-zinc-700">

                    <li class="flex items-start gap-3">
                        <i class="ri-check-double-line text-secondary text-lg mt-0.5"></i>
                        <span>End-to-end financial, tax, and compliance support under one roof</span>
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="ri-check-double-line text-secondary text-lg mt-0.5"></i>
                        <span>Structured corporate training programs that build lasting capability</span>
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="ri-check-double-line text-secondary text-lg mt-0.5"></i>
                        <span>Advanced financial modeling that drives confident investment decisions</span>
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="ri-check-double-line text-secondary text-lg mt-0.5"></i>
                        <span>Direct access to capital networks and investor readiness roadmaps</span>
                    </li>

                </ul>

            </div>

        </div>
    </section>


    <!-- IMPACT NUMBERS -->
    <section class="py-16 bg-secondary text-white">

        <div class="max-w-6xl mx-auto px-6 grid sm:grid-cols-4 gap-10 text-center">

            <div>
                <p class="text-4xl font-bold">200+</p>
                <p class="mt-2 text-white/70 text-sm">Clients Served</p>
            </div>

            <div>
                <p class="text-4xl font-bold">15+</p>
                <p class="mt-2 text-white/70 text-sm">Industries Covered</p>
            </div>

            <div>
                <p class="text-4xl font-bold">₹500Cr+</p>
                <p class="mt-2 text-white/70 text-sm">Capital Facilitated</p>
            </div>

            <div>
                <p class="text-4xl font-bold">98%</p>
                <p class="mt-2 text-white/70 text-sm">Client Satisfaction</p>
            </div>

        </div>

    </section>


    <!-- SERVICES -->
    <section id="services" class="py-24 bg-white">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center max-w-2xl mx-auto">
                <p class="text-sm font-semibold text-secondary tracking-widest uppercase">What We Offer</p>
                <h2 class="mt-3 text-3xl md:text-4xl font-bold text-text-primary">
                    Our Consulting Services
                </h2>
                <p class="mt-4 text-zinc-600">
                    Comprehensive advisory solutions built for founders, leadership teams, and growing enterprises
                    looking to achieve financial clarity and strategic momentum.
                </p>
            </div>


            <!-- Service 1: Accounting & Compliance -->
            <div id="accounting" class="mt-20 grid md:grid-cols-2 gap-12 items-center">

                <div class="order-2 md:order-1">
                    <div class="inline-flex items-center gap-2 bg-secondary/10 text-secondary text-sm font-medium px-4 py-1.5 rounded-full mb-5">
                        <i class="ri-calculator-line"></i>
                        Service 01
                    </div>

                    <h2 class="text-3xl font-bold text-text-primary">
                        Accounting & Compliance
                    </h2>

                    <p class="mt-4 text-zinc-700 leading-relaxed">
                        Accurate accounting is the backbone of every successful business. At GREVX, we bring
                        precision, transparency, and compliance to your financial records — so you always know
                        where you stand and remain audit-ready at all times.
                    </p>

                    <ul class="mt-6 space-y-3 text-zinc-700">
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Bookkeeping & monthly financial statements
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Statutory compliance — GST, TDS, ROC, FEMA
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Annual audit preparation and financial reporting
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Payroll management and labour law compliance
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Internal controls and risk management advisory
                        </li>
                    </ul>

                    <a href="{{ route('pages::contact') }}" wire:navigate
                        class="mt-8 inline-flex items-center gap-2 px-6 py-3 bg-secondary text-white font-semibold rounded-lg hover:bg-secondary/90 transition">
                        Get Started
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>

                <div class="order-1 md:order-2 bg-gradient-to-br from-secondary/10 to-blue-50 rounded-2xl p-10 flex flex-col items-center justify-center gap-6 min-h-[300px]">
                    <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-white shadow-md text-secondary text-4xl">
                        <i class="ri-calculator-line"></i>
                    </div>
                    <div class="text-center">
                        <p class="font-semibold text-text-primary text-lg">Always Audit-Ready</p>
                        <p class="text-sm text-zinc-600 mt-1 max-w-xs">Stay compliant, organised, and financially transparent at every regulatory touchpoint.</p>
                    </div>
                </div>

            </div>


            <div class="my-16 border-t border-border"></div>


            <!-- Service 2: Tax Preparation & Filing -->
            <div id="tax" class="grid md:grid-cols-2 gap-12 items-center">

                <div class="bg-gradient-to-br from-accent/10 to-blue-50 rounded-2xl p-10 flex flex-col items-center justify-center gap-6 min-h-[300px]">
                    <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-white shadow-md text-secondary text-4xl">
                        <i class="ri-file-text-line"></i>
                    </div>
                    <div class="text-center">
                        <p class="font-semibold text-text-primary text-lg">Zero-Stress Tax Filing</p>
                        <p class="text-sm text-zinc-600 mt-1 max-w-xs">We handle the complexity so you can focus on building your business.</p>
                    </div>
                </div>

                <div>
                    <div class="inline-flex items-center gap-2 bg-secondary/10 text-secondary text-sm font-medium px-4 py-1.5 rounded-full mb-5">
                        <i class="ri-file-text-line"></i>
                        Service 02
                    </div>

                    <h2 class="text-3xl font-bold text-text-primary">
                        Tax Preparation & Filing
                    </h2>

                    <p class="mt-4 text-zinc-700 leading-relaxed">
                        Navigating the tax landscape requires expertise and strategic planning. Our tax advisory
                        team ensures you meet every deadline, optimise your tax position legally, and never face
                        unnecessary penalties or exposure.
                    </p>

                    <ul class="mt-6 space-y-3 text-zinc-700">
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Income tax filing — individuals, HUFs, companies, LLPs
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            GST registration, returns, and refund management
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Tax planning strategies to minimise liability
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            TDS compliance, filings, and assessments
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Representation before tax authorities
                        </li>
                    </ul>

                    <a href="{{ route('pages::contact') }}" wire:navigate
                        class="mt-8 inline-flex items-center gap-2 px-6 py-3 bg-secondary text-white font-semibold rounded-lg hover:bg-secondary/90 transition">
                        Get Started
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>

            </div>


            <div class="my-16 border-t border-border"></div>


            <!-- Service 3: Corporate Training -->
            <div id="training" class="grid md:grid-cols-2 gap-12 items-center">

                <div class="order-2 md:order-1">
                    <div class="inline-flex items-center gap-2 bg-secondary/10 text-secondary text-sm font-medium px-4 py-1.5 rounded-full mb-5">
                        <i class="ri-team-line"></i>
                        Service 03
                    </div>

                    <h2 class="text-3xl font-bold text-text-primary">
                        Corporate Training
                    </h2>

                    <p class="mt-4 text-zinc-700 leading-relaxed">
                        A highly skilled team is your most valuable competitive asset. GREVX designs and
                        delivers bespoke corporate training programmes that sharpen financial acumen, enhance
                        leadership capabilities, and foster a culture of continuous improvement across your
                        organisation.
                    </p>

                    <ul class="mt-6 space-y-3 text-zinc-700">
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Finance & accounting literacy for non-finance managers
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Leadership, strategy, and decision-making workshops
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Compliance and regulatory awareness training
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Customised learning paths for departmental teams
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            On-site, online, and blended delivery formats
                        </li>
                    </ul>

                    <a href="{{ route('pages::contact') }}" wire:navigate
                        class="mt-8 inline-flex items-center gap-2 px-6 py-3 bg-secondary text-white font-semibold rounded-lg hover:bg-secondary/90 transition">
                        Get Started
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>

                <div class="order-1 md:order-2 bg-gradient-to-br from-secondary/10 to-blue-50 rounded-2xl p-10 flex flex-col items-center justify-center gap-6 min-h-[300px]">
                    <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-white shadow-md text-secondary text-4xl">
                        <i class="ri-team-line"></i>
                    </div>
                    <div class="text-center">
                        <p class="font-semibold text-text-primary text-lg">Build High-Impact Teams</p>
                        <p class="text-sm text-zinc-600 mt-1 max-w-xs">Empower your people with the financial and strategic knowledge to drive business forward.</p>
                    </div>
                </div>

            </div>


            <div class="my-16 border-t border-border"></div>


            <!-- Service 4: Financial Modeling & Valuation -->
            <div id="modeling" class="grid md:grid-cols-2 gap-12 items-center">

                <div class="bg-gradient-to-br from-accent/10 to-blue-50 rounded-2xl p-10 flex flex-col items-center justify-center gap-6 min-h-[300px]">
                    <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-white shadow-md text-secondary text-4xl">
                        <i class="ri-bar-chart-2-line"></i>
                    </div>
                    <div class="text-center">
                        <p class="font-semibold text-text-primary text-lg">Data-Driven Decisions</p>
                        <p class="text-sm text-zinc-600 mt-1 max-w-xs">Turn complex financial data into clear, actionable insights for leadership and investors.</p>
                    </div>
                </div>

                <div>
                    <div class="inline-flex items-center gap-2 bg-secondary/10 text-secondary text-sm font-medium px-4 py-1.5 rounded-full mb-5">
                        <i class="ri-bar-chart-2-line"></i>
                        Service 04
                    </div>

                    <h2 class="text-3xl font-bold text-text-primary">
                        Financial Modeling & Valuation
                    </h2>

                    <p class="mt-4 text-zinc-700 leading-relaxed">
                        Sound financial models are the foundation of smart business strategy. Our financial
                        modeling and valuation experts build robust, scenario-driven frameworks that support
                        fundraising, mergers, acquisitions, and strategic planning with precision.
                    </p>

                    <ul class="mt-6 space-y-3 text-zinc-700">
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Three-statement financial models (P&L, Balance Sheet, Cash Flow)
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            DCF, comparable company, and precedent transaction analysis
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Startup valuation for funding rounds (Seed to Series C+)
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            M&A financial advisory and due diligence support
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Scenario planning and sensitivity analysis
                        </li>
                    </ul>

                    <a href="{{ route('pages::contact') }}" wire:navigate
                        class="mt-8 inline-flex items-center gap-2 px-6 py-3 bg-secondary text-white font-semibold rounded-lg hover:bg-secondary/90 transition">
                        Get Started
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>

            </div>


            <div class="my-16 border-t border-border"></div>


            <!-- Service 5: Capital Infusion -->
            <div id="capital" class="grid md:grid-cols-2 gap-12 items-center">

                <div class="order-2 md:order-1">
                    <div class="inline-flex items-center gap-2 bg-secondary/10 text-secondary text-sm font-medium px-4 py-1.5 rounded-full mb-5">
                        <i class="ri-bank-line"></i>
                        Service 05
                    </div>

                    <h2 class="text-3xl font-bold text-text-primary">
                        Capital Infusion
                    </h2>

                    <p class="mt-4 text-zinc-700 leading-relaxed">
                        Access to the right capital at the right time is a game-changer. GREVX connects
                        businesses with a curated network of lenders, investors, and financial institutions,
                        while structuring your capital requirements for maximum efficiency and minimal dilution.
                    </p>

                    <ul class="mt-6 space-y-3 text-zinc-700">
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Debt structuring — term loans, working capital, overdrafts
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Equity fundraising — angel, VC, and PE introductions
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Government grant and subsidy identification
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Bank loan facilitation and credit rating improvement
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Capital allocation strategy and treasury management
                        </li>
                    </ul>

                    <a href="{{ route('pages::contact') }}" wire:navigate
                        class="mt-8 inline-flex items-center gap-2 px-6 py-3 bg-secondary text-white font-semibold rounded-lg hover:bg-secondary/90 transition">
                        Get Started
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>

                <div class="order-1 md:order-2 bg-gradient-to-br from-secondary/10 to-blue-50 rounded-2xl p-10 flex flex-col items-center justify-center gap-6 min-h-[300px]">
                    <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-white shadow-md text-secondary text-4xl">
                        <i class="ri-bank-line"></i>
                    </div>
                    <div class="text-center">
                        <p class="font-semibold text-text-primary text-lg">Fuel Your Next Phase</p>
                        <p class="text-sm text-zinc-600 mt-1 max-w-xs">Access strategic capital solutions tailored to your business stage and growth ambitions.</p>
                    </div>
                </div>

            </div>


            <div class="my-16 border-t border-border"></div>


            <!-- Service 6: Investor Readiness -->
            <div id="investor" class="grid md:grid-cols-2 gap-12 items-center">

                <div class="bg-gradient-to-br from-accent/10 to-blue-50 rounded-2xl p-10 flex flex-col items-center justify-center gap-6 min-h-[300px]">
                    <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-white shadow-md text-secondary text-4xl">
                        <i class="ri-rocket-line"></i>
                    </div>
                    <div class="text-center">
                        <p class="font-semibold text-text-primary text-lg">Pitch with Confidence</p>
                        <p class="text-sm text-zinc-600 mt-1 max-w-xs">Walk into every investor meeting with a compelling story backed by solid financial evidence.</p>
                    </div>
                </div>

                <div>
                    <div class="inline-flex items-center gap-2 bg-secondary/10 text-secondary text-sm font-medium px-4 py-1.5 rounded-full mb-5">
                        <i class="ri-rocket-line"></i>
                        Service 06
                    </div>

                    <h2 class="text-3xl font-bold text-text-primary">
                        Investor Readiness
                    </h2>

                    <p class="mt-4 text-zinc-700 leading-relaxed">
                        In today's competitive funding environment, the businesses that win aren't just the
                        ones with the best ideas — they're the ones that tell the most credible, compelling
                        financial story. GREVX helps you build that story from the ground up.
                    </p>

                    <ul class="mt-6 space-y-3 text-zinc-700">
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Pitch deck creation with investor-grade financial narratives
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Business plan and information memorandum preparation
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Virtual data room setup and due diligence management
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Funding round strategy and term sheet negotiations
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Cap table management and equity structuring advice
                        </li>
                    </ul>

                    <a href="{{ route('pages::contact') }}" wire:navigate
                        class="mt-8 inline-flex items-center gap-2 px-6 py-3 bg-secondary text-white font-semibold rounded-lg hover:bg-secondary/90 transition">
                        Get Started
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>

            </div>

        </div>

    </section>


    <!-- PROCESS -->
    <section class="py-24 bg-muted">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center max-w-2xl mx-auto">
                <p class="text-sm font-semibold text-secondary tracking-widest uppercase">How We Work</p>
                <h2 class="mt-3 text-3xl md:text-4xl font-bold text-text-primary">
                    Our Proven Consulting Process
                </h2>
                <p class="mt-4 text-zinc-600">
                    From first conversation to ongoing advisory, every engagement follows a structured methodology
                    designed for maximum impact.
                </p>
            </div>

            <div class="mt-14 grid sm:grid-cols-2 lg:grid-cols-4 gap-8">

                <div class="bg-white border border-border rounded-xl p-6 text-center">
                    <div class="w-12 h-12 mx-auto flex items-center justify-center rounded-full bg-secondary/10 text-secondary font-bold text-lg">
                        01
                    </div>
                    <h3 class="mt-4 font-semibold text-text-primary">Discovery & Assessment</h3>
                    <p class="mt-2 text-sm text-zinc-600">We understand your business, goals, pain points, and financial position in depth.</p>
                </div>

                <div class="bg-white border border-border rounded-xl p-6 text-center">
                    <div class="w-12 h-12 mx-auto flex items-center justify-center rounded-full bg-secondary/10 text-secondary font-bold text-lg">
                        02
                    </div>
                    <h3 class="mt-4 font-semibold text-text-primary">Strategy Design</h3>
                    <p class="mt-2 text-sm text-zinc-600">A tailored consulting roadmap is crafted based on your specific objectives and industry context.</p>
                </div>

                <div class="bg-white border border-border rounded-xl p-6 text-center">
                    <div class="w-12 h-12 mx-auto flex items-center justify-center rounded-full bg-secondary/10 text-secondary font-bold text-lg">
                        03
                    </div>
                    <h3 class="mt-4 font-semibold text-text-primary">Execution & Support</h3>
                    <p class="mt-2 text-sm text-zinc-600">Our team works alongside yours to implement strategies with precision and accountability.</p>
                </div>

                <div class="bg-white border border-border rounded-xl p-6 text-center">
                    <div class="w-12 h-12 mx-auto flex items-center justify-center rounded-full bg-secondary/10 text-secondary font-bold text-lg">
                        04
                    </div>
                    <h3 class="mt-4 font-semibold text-text-primary">Review & Optimise</h3>
                    <p class="mt-2 text-sm text-zinc-600">Ongoing performance reviews ensure outcomes stay aligned with your evolving business needs.</p>
                </div>

            </div>

        </div>

    </section>


    <!-- CTA -->
    <section class="py-24 bg-secondary text-white">

        <div class="max-w-4xl mx-auto px-6 text-center">

            <h2 class="text-3xl md:text-4xl font-bold">
                Ready to Transform Your Business?
            </h2>

            <p class="mt-5 text-white/80 text-lg max-w-2xl mx-auto">
                Whether you need compliance support, a compelling investor pitch, or access to capital —
                GREVX has the expertise to deliver. Let's start with a conversation.
            </p>

            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <a href="{{ route('pages::contact') }}" wire:navigate
                    class="px-8 py-3 bg-white text-secondary font-semibold rounded-lg hover:bg-gray-100 transition">
                    Book a Free Consultation
                </a>
                <a href="tel:+91XXXXXXXXXX"
                    class="px-8 py-3 border border-white/40 text-white font-semibold rounded-lg hover:bg-white/10 transition">
                    Call Us Now
                </a>
            </div>

        </div>

    </section>

</div>