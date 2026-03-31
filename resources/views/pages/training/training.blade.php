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
                    Corporate Training
                </p>

                <h1 class="mt-4 text-4xl md:text-5xl font-bold text-text-primary leading-tight">
                    Empower Your Team,
                    <span class="text-secondary">Accelerate Your Growth</span>
                </h1>

                <p class="mt-6 text-lg text-zinc-700 max-w-xl leading-relaxed">
                    GREVX designs and delivers world-class corporate training programmes that sharpen financial
                    acumen, elevate leadership capabilities, and build a culture of continuous improvement —
                    turning your people into your greatest competitive advantage.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ route('pages::contact') }}" wire:navigate
                        class="px-6 py-3 bg-secondary text-white font-semibold rounded-lg hover:bg-secondary/90 transition">
                        Enquire Now
                    </a>
                    <a href="#programmes"
                        class="px-6 py-3 border border-secondary text-secondary font-semibold rounded-lg hover:bg-secondary/10 transition">
                        View Programmes
                    </a>
                </div>
            </div>

            <!-- Feature Card -->
            <div class="bg-white border border-border rounded-xl p-8 shadow-sm space-y-6">

                <h2 class="text-xl font-semibold text-text-primary">
                    Why Invest in Training?
                </h2>

                <ul class="space-y-4 text-zinc-700">

                    <li class="flex items-start gap-3">
                        <i class="ri-check-double-line text-secondary text-lg mt-0.5"></i>
                        <span>Organisations with strong learning cultures are 92% more likely to innovate</span>
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="ri-check-double-line text-secondary text-lg mt-0.5"></i>
                        <span>Trained employees show a 17% increase in productivity on average</span>
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="ri-check-double-line text-secondary text-lg mt-0.5"></i>
                        <span>Every ₹1 invested in training returns ₹4.53 in productivity gains</span>
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="ri-check-double-line text-secondary text-lg mt-0.5"></i>
                        <span>Companies with structured training see 34% higher employee retention</span>
                    </li>

                </ul>

            </div>

        </div>
    </section>


    <!-- STATS BAR -->
    <section class="py-16 bg-secondary text-white">

        <div class="max-w-6xl mx-auto px-6 grid sm:grid-cols-4 gap-10 text-center">

            <div>
                <p class="text-4xl font-bold">500+</p>
                <p class="mt-2 text-white/70 text-sm">Professionals Trained</p>
            </div>

            <div>
                <p class="text-4xl font-bold">30+</p>
                <p class="mt-2 text-white/70 text-sm">Training Modules</p>
            </div>

            <div>
                <p class="text-4xl font-bold">20+</p>
                <p class="mt-2 text-white/70 text-sm">Corporate Clients</p>
            </div>

            <div>
                <p class="text-4xl font-bold">96%</p>
                <p class="mt-2 text-white/70 text-sm">Participant Satisfaction</p>
            </div>

        </div>

    </section>


    <!-- ABOUT THE PROGRAMME -->
    <section class="py-24 bg-white">

        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-14 items-center">

            <!-- Visual Box -->
            <div class="bg-gradient-to-br from-secondary/10 to-blue-50 rounded-2xl p-10 flex flex-col justify-between min-h-[340px]">
                <div class="w-16 h-16 flex items-center justify-center rounded-2xl bg-white shadow-md text-secondary text-3xl">
                    <i class="ri-team-line"></i>
                </div>
                <div class="mt-6 space-y-4">
                    <div class="flex items-center gap-3 bg-white/70 rounded-xl px-5 py-3 shadow-sm">
                        <i class="ri-focus-3-line text-secondary"></i>
                        <span class="text-sm font-semibold text-text-primary">Goal-Oriented Learning Design</span>
                    </div>
                    <div class="flex items-center gap-3 bg-white/70 rounded-xl px-5 py-3 shadow-sm">
                        <i class="ri-team-line text-secondary"></i>
                        <span class="text-sm font-semibold text-text-primary">Customised for Every Department</span>
                    </div>
                    <div class="flex items-center gap-3 bg-white/70 rounded-xl px-5 py-3 shadow-sm">
                        <i class="ri-global-line text-secondary"></i>
                        <span class="text-sm font-semibold text-text-primary">On-Site, Online & Blended Formats</span>
                    </div>
                </div>
            </div>

            <div>
                <p class="text-sm font-semibold text-secondary tracking-widest uppercase">Our Approach</p>

                <h2 class="mt-3 text-3xl font-bold text-text-primary">
                    Training That Delivers Real Business Impact
                </h2>

                <p class="mt-5 text-zinc-700 leading-relaxed">
                    At GREVX, we believe that learning should never be generic. Every programme we design
                    is rooted in real business challenges — tailored to your industry, your team's current
                    skill gaps, and your organisation's strategic goals.
                </p>

                <p class="mt-4 text-zinc-700 leading-relaxed">
                    Our expert facilitators combine deep domain expertise with practical, experiential
                    delivery methods — ensuring concepts move seamlessly from the classroom into daily
                    workflows where they create measurable impact.
                </p>

                <ul class="mt-6 space-y-3 text-zinc-700">
                    <li class="flex items-start gap-3">
                        <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                        Needs analysis and skill-gap assessment before every programme
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                        Case-study led, scenario-based learning methodology
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="ri-checkbox-circle-line text-secondary mt-0.5"></i>
                        Post-training reinforcement through toolkits and coaching
                    </li>
                </ul>
            </div>

        </div>

    </section>


    <!-- TRAINING PROGRAMMES -->
    <section id="programmes" class="py-24 bg-muted">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center max-w-2xl mx-auto">
                <p class="text-sm font-semibold text-secondary tracking-widest uppercase">What We Offer</p>
                <h2 class="mt-3 text-3xl md:text-4xl font-bold text-text-primary">
                    Our Training Programmes
                </h2>
                <p class="mt-4 text-zinc-600">
                    From finance fundamentals to advanced leadership strategy — we cover every layer of your
                    organisation with precision-designed learning experiences.
                </p>
            </div>

            <div class="mt-14 grid sm:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Programme 1 -->
                <div class="bg-white border border-border rounded-xl p-7 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-secondary/10 text-secondary text-2xl mb-5">
                        <i class="ri-money-dollar-circle-line"></i>
                    </div>
                    <h3 class="font-bold text-text-primary text-lg">Finance for Non-Finance Managers</h3>
                    <p class="mt-3 text-sm text-zinc-600 leading-relaxed">
                        Empower department heads and managers with financial literacy — so they can read P&L
                        statements, understand budgets, manage costs, and contribute meaningfully to business strategy.
                    </p>
                    <ul class="mt-4 space-y-2 text-sm text-zinc-700">
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Reading & interpreting financial statements</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Budget planning and variance analysis</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Cost management and profitability drivers</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Working capital & cash flow basics</li>
                    </ul>
                    <div class="mt-5 pt-5 border-t border-border flex items-center justify-between text-sm">
                        <span class="text-zinc-500">Duration: 2 Days</span>
                        <a href="{{ route('pages::contact') }}" wire:navigate class="text-secondary font-semibold hover:underline flex items-center gap-1">
                            Enquire <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>

                <!-- Programme 2 -->
                <div class="bg-white border border-border rounded-xl p-7 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-secondary/10 text-secondary text-2xl mb-5">
                        <i class="ri-leadership-line"></i>
                    </div>
                    <h3 class="font-bold text-text-primary text-lg">Leadership & Strategic Thinking</h3>
                    <p class="mt-3 text-sm text-zinc-600 leading-relaxed">
                        Build the next generation of business leaders. This programme develops strategic clarity,
                        decision-making frameworks, and the executive presence needed to drive organisational success.
                    </p>
                    <ul class="mt-4 space-y-2 text-sm text-zinc-700">
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Strategic planning & execution frameworks</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> High-stakes decision-making models</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Leading through change and uncertainty</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Building and motivating high-performance teams</li>
                    </ul>
                    <div class="mt-5 pt-5 border-t border-border flex items-center justify-between text-sm">
                        <span class="text-zinc-500">Duration: 3 Days</span>
                        <a href="{{ route('pages::contact') }}" wire:navigate class="text-secondary font-semibold hover:underline flex items-center gap-1">
                            Enquire <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>

                <!-- Programme 3 -->
                <div class="bg-white border border-border rounded-xl p-7 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-secondary/10 text-secondary text-2xl mb-5">
                        <i class="ri-shield-check-line"></i>
                    </div>
                    <h3 class="font-bold text-text-primary text-lg">Compliance & Regulatory Awareness</h3>
                    <p class="mt-3 text-sm text-zinc-600 leading-relaxed">
                        Keep your teams up-to-date with the latest regulatory requirements — GST, TDS, labour law,
                        and corporate governance — minimising risk and ensuring organisation-wide compliance culture.
                    </p>
                    <ul class="mt-4 space-y-2 text-sm text-zinc-700">
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> GST, TDS & income tax fundamentals</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Labour law & payroll compliance</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Corporate governance standards</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Risk identification and mitigation</li>
                    </ul>
                    <div class="mt-5 pt-5 border-t border-border flex items-center justify-between text-sm">
                        <span class="text-zinc-500">Duration: 1 Day</span>
                        <a href="{{ route('pages::contact') }}" wire:navigate class="text-secondary font-semibold hover:underline flex items-center gap-1">
                            Enquire <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>

                <!-- Programme 4 -->
                <div class="bg-white border border-border rounded-xl p-7 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-secondary/10 text-secondary text-2xl mb-5">
                        <i class="ri-bar-chart-grouped-line"></i>
                    </div>
                    <h3 class="font-bold text-text-primary text-lg">Financial Modeling & Analysis</h3>
                    <p class="mt-3 text-sm text-zinc-600 leading-relaxed">
                        Train finance teams to build robust financial models, conduct valuations, and prepare
                        scenario analyses that inform investment decisions and business planning with confidence.
                    </p>
                    <ul class="mt-4 space-y-2 text-sm text-zinc-700">
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Three-statement model building</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> DCF & valuation methodologies</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Scenario & sensitivity analysis</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Advanced Excel for finance</li>
                    </ul>
                    <div class="mt-5 pt-5 border-t border-border flex items-center justify-between text-sm">
                        <span class="text-zinc-500">Duration: 3 Days</span>
                        <a href="{{ route('pages::contact') }}" wire:navigate class="text-secondary font-semibold hover:underline flex items-center gap-1">
                            Enquire <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>

                <!-- Programme 5 -->
                <div class="bg-white border border-border rounded-xl p-7 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-secondary/10 text-secondary text-2xl mb-5">
                        <i class="ri-user-star-line"></i>
                    </div>
                    <h3 class="font-bold text-text-primary text-lg">Sales & Negotiation Mastery</h3>
                    <p class="mt-3 text-sm text-zinc-600 leading-relaxed">
                        Equip your sales and business development teams with advanced negotiation frameworks,
                        value-based selling techniques, and closing strategies that drive consistent revenue growth.
                    </p>
                    <ul class="mt-4 space-y-2 text-sm text-zinc-700">
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Consultative & value-based selling</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Objection handling & negotiation tactics</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Key account management strategies</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Pipeline management and forecasting</li>
                    </ul>
                    <div class="mt-5 pt-5 border-t border-border flex items-center justify-between text-sm">
                        <span class="text-zinc-500">Duration: 2 Days</span>
                        <a href="{{ route('pages::contact') }}" wire:navigate class="text-secondary font-semibold hover:underline flex items-center gap-1">
                            Enquire <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>

                <!-- Programme 6 -->
                <div class="bg-white border border-border rounded-xl p-7 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-secondary/10 text-secondary text-2xl mb-5">
                        <i class="ri-presentation-line"></i>
                    </div>
                    <h3 class="font-bold text-text-primary text-lg">Communication & Executive Presence</h3>
                    <p class="mt-3 text-sm text-zinc-600 leading-relaxed">
                        Help your leaders and managers communicate with clarity, authority, and impact — from
                        boardroom presentations to difficult conversations and cross-functional collaboration.
                    </p>
                    <ul class="mt-4 space-y-2 text-sm text-zinc-700">
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Structured business communication</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Executive presentation & storytelling</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Giving & receiving constructive feedback</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Conflict resolution and facilitation</li>
                    </ul>
                    <div class="mt-5 pt-5 border-t border-border flex items-center justify-between text-sm">
                        <span class="text-zinc-500">Duration: 2 Days</span>
                        <a href="{{ route('pages::contact') }}" wire:navigate class="text-secondary font-semibold hover:underline flex items-center gap-1">
                            Enquire <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </section>


    <!-- DELIVERY FORMATS -->
    <section class="py-24 bg-white">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center max-w-2xl mx-auto">
                <p class="text-sm font-semibold text-secondary tracking-widest uppercase">Flexible Delivery</p>
                <h2 class="mt-3 text-3xl md:text-4xl font-bold text-text-primary">
                    Learning That Fits Your Schedule
                </h2>
                <p class="mt-4 text-zinc-600">
                    We understand that every organisation has different needs. That's why we offer fully
                    flexible training formats to suit your team size, schedule, and learning preferences.
                </p>
            </div>

            <div class="mt-14 grid sm:grid-cols-3 gap-8">

                <!-- In-Person -->
                <div class="group p-8 border border-border rounded-xl bg-surface hover:border-secondary hover:shadow-lg transition-all duration-300">
                    <div class="w-14 h-14 flex items-center justify-center rounded-xl bg-secondary/10 text-secondary text-2xl mb-6 group-hover:bg-secondary group-hover:text-white transition-all duration-300">
                        <i class="ri-building-3-line"></i>
                    </div>
                    <h3 class="text-lg font-bold text-text-primary">In-Person Workshops</h3>
                    <p class="mt-3 text-sm text-zinc-600 leading-relaxed">
                        Immersive, on-site programmes held at your office or a dedicated learning centre.
                        Ideal for team cohesion, hands-on activities, and intensive learning experiences.
                    </p>
                    <ul class="mt-5 space-y-2 text-sm text-zinc-700">
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Full-day or multi-day formats</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Group sizes: 10–50 participants</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Facilitated by industry experts</li>
                    </ul>
                </div>

                <!-- Online / Virtual -->
                <div class="group p-8 border border-border rounded-xl bg-surface hover:border-secondary hover:shadow-lg transition-all duration-300">
                    <div class="w-14 h-14 flex items-center justify-center rounded-xl bg-secondary/10 text-secondary text-2xl mb-6 group-hover:bg-secondary group-hover:text-white transition-all duration-300">
                        <i class="ri-computer-line"></i>
                    </div>
                    <h3 class="text-lg font-bold text-text-primary">Live Virtual Sessions</h3>
                    <p class="mt-3 text-sm text-zinc-600 leading-relaxed">
                        Instructor-led sessions delivered online via Zoom or Teams. Perfect for distributed
                        teams, remote workforces, or organisations looking to scale training efficiently.
                    </p>
                    <ul class="mt-5 space-y-2 text-sm text-zinc-700">
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Interactive virtual breakouts</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Session recordings available</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Global team accessibility</li>
                    </ul>
                </div>

                <!-- Blended -->
                <div class="group p-8 border border-border rounded-xl bg-surface hover:border-secondary hover:shadow-lg transition-all duration-300">
                    <div class="w-14 h-14 flex items-center justify-center rounded-xl bg-secondary/10 text-secondary text-2xl mb-6 group-hover:bg-secondary group-hover:text-white transition-all duration-300">
                        <i class="ri-git-merge-line"></i>
                    </div>
                    <h3 class="text-lg font-bold text-text-primary">Blended Learning</h3>
                    <p class="mt-3 text-sm text-zinc-600 leading-relaxed">
                        The best of both worlds — combining pre-work, live sessions (in-person or virtual),
                        and follow-up coaching to create a sustained, long-term learning journey.
                    </p>
                    <ul class="mt-5 space-y-2 text-sm text-zinc-700">
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Self-paced pre-learning modules</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> Live group workshops included</li>
                        <li class="flex items-center gap-2"><i class="ri-check-line text-secondary"></i> 1:1 post-programme coaching</li>
                    </ul>
                </div>

            </div>

        </div>

    </section>


    <!-- HOW IT WORKS -->
    <section class="py-24 bg-muted">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center max-w-2xl mx-auto">
                <p class="text-sm font-semibold text-secondary tracking-widest uppercase">Our Process</p>
                <h2 class="mt-3 text-3xl md:text-4xl font-bold text-text-primary">
                    How We Design Your Programme
                </h2>
                <p class="mt-4 text-zinc-600">
                    Every training engagement follows a structured four-step methodology to ensure maximum
                    relevance, engagement, and measurable business impact.
                </p>
            </div>

            <div class="mt-14 grid sm:grid-cols-2 lg:grid-cols-4 gap-8">

                <div class="bg-white border border-border rounded-xl p-6 text-center hover:shadow-md transition">
                    <div class="w-12 h-12 mx-auto flex items-center justify-center rounded-full bg-secondary/10 text-secondary font-bold text-lg">
                        01
                    </div>
                    <h3 class="mt-4 font-semibold text-text-primary">Needs Assessment</h3>
                    <p class="mt-2 text-sm text-zinc-600 leading-relaxed">We analyse your team's current skills, goals, and organisational challenges to design a targeted programme.</p>
                </div>

                <div class="bg-white border border-border rounded-xl p-6 text-center hover:shadow-md transition">
                    <div class="w-12 h-12 mx-auto flex items-center justify-center rounded-full bg-secondary/10 text-secondary font-bold text-lg">
                        02
                    </div>
                    <h3 class="mt-4 font-semibold text-text-primary">Programme Design</h3>
                    <p class="mt-2 text-sm text-zinc-600 leading-relaxed">A bespoke curriculum is built with relevant case studies, exercises, and delivery formats aligned to your goals.</p>
                </div>

                <div class="bg-white border border-border rounded-xl p-6 text-center hover:shadow-md transition">
                    <div class="w-12 h-12 mx-auto flex items-center justify-center rounded-full bg-secondary/10 text-secondary font-bold text-lg">
                        03
                    </div>
                    <h3 class="mt-4 font-semibold text-text-primary">Delivery & Facilitation</h3>
                    <p class="mt-2 text-sm text-zinc-600 leading-relaxed">Expert facilitators lead engaging sessions using interactive methods that maximise knowledge retention.</p>
                </div>

                <div class="bg-white border border-border rounded-xl p-6 text-center hover:shadow-md transition">
                    <div class="w-12 h-12 mx-auto flex items-center justify-center rounded-full bg-secondary/10 text-secondary font-bold text-lg">
                        04
                    </div>
                    <h3 class="mt-4 font-semibold text-text-primary">Impact Measurement</h3>
                    <p class="mt-2 text-sm text-zinc-600 leading-relaxed">Post-training assessments, feedback surveys, and follow-up reviews measure real-world application and ROI.</p>
                </div>

            </div>

        </div>

    </section>


    <!-- WHO WE TRAIN -->
    <section class="py-24 bg-white">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center max-w-2xl mx-auto">
                <p class="text-sm font-semibold text-secondary tracking-widest uppercase">Who We Work With</p>
                <h2 class="mt-3 text-3xl md:text-4xl font-bold text-text-primary">
                    Training for Every Level of Your Organisation
                </h2>
                <p class="mt-4 text-zinc-600">
                    Whether you're onboarding new hires or developing your most senior executives — we have
                    the right programme for every stage of your team's journey.
                </p>
            </div>

            <div class="mt-14 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="p-6 bg-surface border border-border rounded-lg text-center hover:border-secondary transition">
                    <div class="w-11 h-11 mx-auto flex items-center justify-center rounded-lg bg-secondary/10 text-secondary text-xl">
                        <i class="ri-user-add-line"></i>
                    </div>
                    <h3 class="mt-4 font-semibold text-text-primary">New Joiners</h3>
                    <p class="mt-2 text-sm text-zinc-600">Foundational induction programmes to get new employees productive faster.</p>
                </div>

                <div class="p-6 bg-surface border border-border rounded-lg text-center hover:border-secondary transition">
                    <div class="w-11 h-11 mx-auto flex items-center justify-center rounded-lg bg-secondary/10 text-secondary text-xl">
                        <i class="ri-user-settings-line"></i>
                    </div>
                    <h3 class="mt-4 font-semibold text-text-primary">Middle Managers</h3>
                    <p class="mt-2 text-sm text-zinc-600">Operational excellence, team management, and financial acumen development.</p>
                </div>

                <div class="p-6 bg-surface border border-border rounded-lg text-center hover:border-secondary transition">
                    <div class="w-11 h-11 mx-auto flex items-center justify-center rounded-lg bg-secondary/10 text-secondary text-xl">
                        <i class="ri-vip-crown-line"></i>
                    </div>
                    <h3 class="mt-4 font-semibold text-text-primary">Senior Leadership</h3>
                    <p class="mt-2 text-sm text-zinc-600">Strategic thinking, enterprise-wide financial strategy, and executive leadership.</p>
                </div>

                <div class="p-6 bg-surface border border-border rounded-lg text-center hover:border-secondary transition">
                    <div class="w-11 h-11 mx-auto flex items-center justify-center rounded-lg bg-secondary/10 text-secondary text-xl">
                        <i class="ri-building-2-line"></i>
                    </div>
                    <h3 class="mt-4 font-semibold text-text-primary">Entire Organisation</h3>
                    <p class="mt-2 text-sm text-zinc-600">Compliance, communication, and cultural alignment programmes for all staff.</p>
                </div>

            </div>

        </div>

    </section>


    <!-- INDUSTRIES -->
    <section class="py-20 bg-secondary text-white">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center max-w-xl mx-auto mb-12">
                <p class="text-sm font-semibold text-white/60 tracking-widest uppercase">Industries We Serve</p>
                <h2 class="mt-3 text-3xl font-bold">Deep Domain Expertise Across Sectors</h2>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">

                <div class="bg-white/10 border border-white/15 rounded-xl p-5 text-center hover:bg-white/20 transition">
                    <i class="ri-building-4-line text-3xl mb-3 block"></i>
                    <p class="text-sm font-semibold">Banking & Finance</p>
                </div>

                <div class="bg-white/10 border border-white/15 rounded-xl p-5 text-center hover:bg-white/20 transition">
                    <i class="ri-hospital-line text-3xl mb-3 block"></i>
                    <p class="text-sm font-semibold">Healthcare</p>
                </div>

                <div class="bg-white/10 border border-white/15 rounded-xl p-5 text-center hover:bg-white/20 transition">
                    <i class="ri-store-3-line text-3xl mb-3 block"></i>
                    <p class="text-sm font-semibold">Retail & FMCG</p>
                </div>

                <div class="bg-white/10 border border-white/15 rounded-xl p-5 text-center hover:bg-white/20 transition">
                    <i class="ri-computer-line text-3xl mb-3 block"></i>
                    <p class="text-sm font-semibold">Technology</p>
                </div>

                <div class="bg-white/10 border border-white/15 rounded-xl p-5 text-center hover:bg-white/20 transition">
                    <i class="ri-truck-line text-3xl mb-3 block"></i>
                    <p class="text-sm font-semibold">Manufacturing</p>
                </div>

                <div class="bg-white/10 border border-white/15 rounded-xl p-5 text-center hover:bg-white/20 transition">
                    <i class="ri-seedling-line text-3xl mb-3 block"></i>
                    <p class="text-sm font-semibold">Startups & SMEs</p>
                </div>

            </div>

        </div>

    </section>


    <!-- CTA -->
    <section class="py-24 bg-secondary text-white">

        <div class="max-w-4xl mx-auto px-6 text-center">

            <h2 class="text-3xl md:text-4xl font-bold">
                Ready to Develop Your Team?
            </h2>

            <p class="mt-5 text-white/80 text-lg max-w-2xl mx-auto">
                Tell us about your team, your goals, and your challenges. We'll design a programme
                that delivers measurable results — and a lasting competitive advantage.
            </p>

            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <a href="{{ route('pages::contact') }}" wire:navigate
                    class="px-8 py-3 bg-white text-secondary font-semibold rounded-lg hover:bg-gray-100 transition">
                    Get a Custom Quote
                </a>
                <a href="tel:+91XXXXXXXXXX"
                    class="px-8 py-3 border border-white/40 text-white font-semibold rounded-lg hover:bg-white/10 transition">
                    Call Us Now
                </a>
            </div>

        </div>

    </section>

</div>