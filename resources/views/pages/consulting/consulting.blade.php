<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

@section('title', 'Consulting Services - Grevx Consulting')
@section('meta_description', 'End-to-end consulting for financial compliance, tax strategy, investor readiness, and growth planning for modern businesses.')

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
                    Helping Businesses Build with
                    <span class="text-secondary">Clarity and Confidence
                    </span>
                </h1>

                <p class="mt-6 text-lg text-zinc-700 max-w-xl leading-relaxed">

                    At GREVX, we support businesses with practical consulting solutions that simplify financial operations, strengthen decision-making, and prepare organizations for long-term growth. Our services are designed to help companies improve structure, manage risk, optimize performance, and unlock new opportunities.

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
                <p class="text-4xl font-bold">100+</p>
                <p class="mt-2 text-white/70 text-sm">Businesses Advised</p>
            </div>

            <div>
                <p class="text-4xl font-bold">60+</p>
                <p class="mt-2 text-white/70 text-sm">Years of Accumulated experience</p>
            </div>

            <div>
                <p class="text-4xl font-bold">10+</p>
                <p class="mt-2 text-white/70 text-sm">Industries Covered</p>
            </div>

            <div>
                <p class="text-4xl font-bold">98%</p>
                <p class="mt-2 text-white/70 text-sm">Satisfaction Rate</p>
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


            <!-- Service 1: Control Deficiency & Risk Advisory -->
            <div id="control-risk" class="mt-20 grid md:grid-cols-2 gap-12 items-center">

                <div class="order-2 md:order-1">
                    <div class="inline-flex items-center gap-2 bg-secondary/10 text-secondary text-sm font-medium px-4 py-1.5 rounded-full mb-5">
                        <i class="ri-shield-check-line"></i>
                        Service 01
                    </div>

                    <h2 class="text-3xl font-bold text-text-primary">
                        Control Deficiency & Risk Advisory
                    </h2>

                    <p class="mt-4 text-zinc-700 leading-relaxed">
                        Operational gaps and weak internal controls can expose businesses to financial,
                        compliance, and strategic risks. GREVX helps organizations identify control
                        deficiencies, strengthen governance structures, and improve operational discipline
                        through practical risk advisory solutions.
                    </p>

                    <p class="mt-4 text-zinc-700 leading-relaxed">
                        As businesses increasingly adopt automation and AI-powered systems, we also help
                        assess AI-related process risks, control gaps, and governance challenges to ensure
                        secure and efficient implementation.
                    </p>

                    <ul class="mt-6 space-y-3 text-zinc-700">
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Internal control reviews and gap assessments
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            SOP and process framework development
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Risk identification and mitigation planning
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Compliance and governance advisory
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            AI governance and workflow risk assessment
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Operational efficiency and monitoring systems
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
                        <i class="ri-shield-check-line"></i>
                    </div>
                    <div class="text-center">
                        <p class="font-semibold text-text-primary text-lg">Strengthen Governance with Better Controls</p>
                        <p class="text-sm text-zinc-600 mt-1 max-w-xs">Build resilient processes that improve accountability, reduce risk, and support sustainable growth.</p>
                    </div>
                </div>

            </div>


            <div class="my-16 border-t border-border"></div>


            <!-- Service 2: Accounting & Compliance -->
            <div id="accounting" class="grid md:grid-cols-2 gap-12 items-center">

                <div class="bg-gradient-to-br from-accent/10 to-blue-50 rounded-2xl p-10 flex flex-col items-center justify-center gap-6 min-h-[300px]">
                    <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-white shadow-md text-secondary text-4xl">
                        <i class="ri-calculator-line"></i>
                    </div>
                    <div class="text-center">
                        <p class="font-semibold text-text-primary text-lg">Accurate Books. Stronger Business Decisions.</p>
                        <p class="text-sm text-zinc-600 mt-1 max-w-xs">Create reliable financial systems that keep your business compliant, organized, and growth-ready.</p>
                    </div>
                </div>

                <div>
                    <div class="inline-flex items-center gap-2 bg-secondary/10 text-secondary text-sm font-medium px-4 py-1.5 rounded-full mb-5">
                        <i class="ri-calculator-line"></i>
                        Service 02
                    </div>

                    <h2 class="text-3xl font-bold text-text-primary">
                        Accounting & Compliance
                    </h2>

                    <p class="mt-4 text-zinc-700 leading-relaxed">
                        Strong accounting systems are essential for business clarity and long-term growth. GREVX
                        helps businesses maintain accurate financial records, stay compliant with evolving
                        regulations, and build streamlined accounting processes that support informed
                        decision-making.
                    </p>

                    <p class="mt-4 text-zinc-700 leading-relaxed">
                        We work with modern accounting platforms including QuickBooks, Zoho Books, Tally, and
                        cloud-based financial systems to improve reporting efficiency and operational
                        transparency.
                    </p>

                    <ul class="mt-6 space-y-3 text-zinc-700">
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Bookkeeping and monthly financial reporting
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            GST, TDS, ROC, and FEMA compliance support
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            QuickBooks and Zoho Books implementation and management
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Payroll processing and labour law compliance
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            MIS reporting and reconciliations
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Audit preparation and finance process optimization
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


            <!-- Service 3: Tax Prep & Filing -->
            <div id="tax" class="grid md:grid-cols-2 gap-12 items-center">

                <div class="order-2 md:order-1">
                    <div class="inline-flex items-center gap-2 bg-secondary/10 text-secondary text-sm font-medium px-4 py-1.5 rounded-full mb-5">
                        <i class="ri-file-text-line"></i>
                        Service 03
                    </div>

                    <h2 class="text-3xl font-bold text-text-primary">
                        Tax Prep & Filing
                    </h2>

                    <p class="mt-4 text-zinc-700 leading-relaxed">
                        Managing taxes effectively requires a balance of compliance, planning, and financial
                        clarity. GREVX provides reliable tax preparation and filing support that helps
                        businesses reduce compliance risks and stay financially structured.
                    </p>

                    <p class="mt-4 text-zinc-700 leading-relaxed">
                        Our approach focuses on timely execution, strategic planning, and proactive support
                        across direct and indirect taxation.
                    </p>

                    <ul class="mt-6 space-y-3 text-zinc-700">
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Income tax and GST return filings
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            TDS compliance and reconciliations
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Tax planning and advisory support
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Regulatory notices and assessment assistance
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Compliance reviews and tax health checks
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Financial documentation and reporting support
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
                        <i class="ri-file-text-line"></i>
                    </div>
                    <div class="text-center">
                        <p class="font-semibold text-text-primary text-lg">Simplifying Tax Compliance</p>
                        <p class="text-sm text-zinc-600 mt-1 max-w-xs">Stay compliant, minimize risk, and manage taxation with greater confidence and efficiency.</p>
                    </div>
                </div>

            </div>


            <div class="my-16 border-t border-border"></div>


            <!-- Service 4: Corporate Training -->
            <div id="training" class="grid md:grid-cols-2 gap-12 items-center">

                <div class="bg-gradient-to-br from-accent/10 to-blue-50 rounded-2xl p-10 flex flex-col items-center justify-center gap-6 min-h-[300px]">
                    <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-white shadow-md text-secondary text-4xl">
                        <i class="ri-team-line"></i>
                    </div>
                    <div class="text-center">
                        <p class="font-semibold text-text-primary text-lg">Building Future-Ready Teams</p>
                        <p class="text-sm text-zinc-600 mt-1 max-w-xs">Equip your workforce with practical skills, strategic thinking, and AI-enabled capabilities.</p>
                    </div>
                </div>

                <div>
                    <div class="inline-flex items-center gap-2 bg-secondary/10 text-secondary text-sm font-medium px-4 py-1.5 rounded-full mb-5">
                        <i class="ri-team-line"></i>
                        Service 04
                    </div>

                    <h2 class="text-3xl font-bold text-text-primary">
                        Corporate Training
                    </h2>

                    <p class="mt-4 text-zinc-700 leading-relaxed">
                        GREVX delivers practical and business-focused corporate training programs designed to
                        strengthen workforce capability, leadership effectiveness, and organizational
                        productivity. Our sessions are highly interactive, implementation-driven, and tailored
                        to industry requirements.
                    </p>

                    <p class="mt-4 text-zinc-700 leading-relaxed">
                        We also help organizations embrace the future of work through training on Generative AI,
                        AI productivity tools, automation workflows, and AI-enabled business processes.
                    </p>

                    <ul class="mt-6 space-y-3 text-zinc-700">
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Finance and business acumen programs
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Leadership and communication training
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Generative AI and AI adoption workshops
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Excel, Power BI, and productivity training
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Compliance and risk awareness programs
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Customized corporate learning solutions
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


            <!-- Service 5: Financial Modelling & Valuations -->
            <div id="modeling" class="grid md:grid-cols-2 gap-12 items-center">

                <div class="order-2 md:order-1">
                    <div class="inline-flex items-center gap-2 bg-secondary/10 text-secondary text-sm font-medium px-4 py-1.5 rounded-full mb-5">
                        <i class="ri-bar-chart-2-line"></i>
                        Service 05
                    </div>

                    <h2 class="text-3xl font-bold text-text-primary">
                        Financial Modelling & Valuations
                    </h2>

                    <p class="mt-4 text-zinc-700 leading-relaxed">
                        Strategic financial insights are critical for investment decisions, business planning,
                        fundraising, and growth strategy. GREVX develops robust financial models and valuation
                        frameworks that help businesses understand performance, assess opportunities, and make
                        informed decisions.
                    </p>

                    <p class="mt-4 text-zinc-700 leading-relaxed">
                        Our solutions combine analytical depth with practical business understanding to deliver
                        actionable financial intelligence.
                    </p>

                    <ul class="mt-6 space-y-3 text-zinc-700">
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Three-statement financial models
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Forecasting, budgeting, and scenario analysis
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Startup and fundraising financial models
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Business and startup valuations
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            DCF and market-based valuation approaches
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Investor presentations and financial analysis support
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
                        <i class="ri-bar-chart-2-line"></i>
                    </div>
                    <div class="text-center">
                        <p class="font-semibold text-text-primary text-lg">Financial Insights That Drive Growth</p>
                        <p class="text-sm text-zinc-600 mt-1 max-w-xs">Turn financial data into strategic clarity with structured modelling and valuation expertise.</p>
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
                        <p class="font-semibold text-text-primary text-lg">Prepare to Raise with Confidence</p>
                        <p class="text-sm text-zinc-600 mt-1 max-w-xs">Build credibility with investors through strong financial foundations and strategic preparation.</p>
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
                        Raising capital requires more than strong ideas - it requires preparation, clarity, and
                        investor confidence. GREVX helps businesses become investment-ready through structured
                        financial preparation, strategic positioning, and fundraising support.
                    </p>

                    <p class="mt-4 text-zinc-700 leading-relaxed">
                        We work closely with founders and leadership teams to strengthen investor communication
                        and improve overall readiness for capital opportunities.
                    </p>

                    <ul class="mt-6 space-y-3 text-zinc-700">
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Investor pitch deck preparation
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Financial projections and fundraising strategy
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Business plans and growth storytelling
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Due diligence readiness support
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Investor communication and presentation guidance
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                            Capital readiness and strategic advisory
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
                Whether you need compliance support, a compelling investor pitch, or access to capital
                GREVX has the expertise to deliver. Let's start with a conversation.
            </p>

            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <a href="{{ route('pages::contact') }}" wire:navigate
                    class="px-8 py-3 bg-white text-secondary font-semibold rounded-lg hover:bg-gray-100 transition">
                    Book a Free Consultation
                </a>
                <a href="tel:+918376059410"
                    class="px-8 py-3 border border-white/40 text-white font-semibold rounded-lg hover:bg-white/10 transition">
                    Call Us Now
                </a>
            </div>

        </div>

    </section>

</div>