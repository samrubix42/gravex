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
            <div class="absolute w-[420px] h-[420px] bg-secondary/10 rounded-full blur-3xl -top-28 -left-28"></div>
            <div class="absolute w-[340px] h-[340px] bg-accent/10 rounded-full blur-3xl bottom-0 right-0"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

            <div>
                <p class="text-sm font-semibold text-secondary tracking-wider">
                    ABOUT GREVX
                </p>

                <h1 class="mt-4 text-4xl md:text-5xl font-bold text-text-primary leading-tight">
                    Strategic Thinking for
                    <span class="text-secondary">Growing Businesses</span>
                </h1>

                <p class="mt-6 text-lg text-zinc-700 max-w-xl">
                    Grevx partners with founders, executives, and leadership teams
                    to strengthen financial strategy, improve operational discipline,
                    and support sustainable business growth.
                </p>

                <p class="mt-4 text-zinc-700 max-w-xl">
                    Our approach focuses on practical solutions that teams can implement
                    quickly, helping organizations move from complexity to clarity.
                </p>
            </div>


            <!-- Focus Card -->
            <div class="bg-white border border-border rounded-xl p-8 shadow-sm">

                <h2 class="text-xl font-semibold text-text-primary">
                    Our Focus
                </h2>

                <ul class="mt-6 space-y-4 text-zinc-700">

                    <li class="flex items-start gap-3">
                        <i class="ri-check-line text-secondary mt-1"></i>
                        Financial strategy that supports confident decision-making
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="ri-check-line text-secondary mt-1"></i>
                        Leadership capability building for long-term growth
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="ri-check-line text-secondary mt-1"></i>
                        Advisory support for expansion, investment, and performance
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="ri-check-line text-secondary mt-1"></i>
                        Operational systems that strengthen execution discipline
                    </li>

                </ul>

            </div>

        </div>
    </section>



    <!-- COMPANY STORY -->
    <section class="py-24 bg-white">

        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-14 items-center">

            <div class="bg-muted rounded-xl h-[360px] flex items-center justify-center text-zinc-400 text-sm">
                Company Image / Illustration
            </div>

            <div>

                <h2 class="text-3xl font-bold text-text-primary">
                    Our Approach
                </h2>

                <p class="mt-6 text-zinc-700 leading-relaxed">
                    Many businesses struggle not because of lack of opportunity,
                    but because of limited strategic clarity and operational structure.
                </p>

                <p class="mt-4 text-zinc-700 leading-relaxed">
                    Grevx works closely with leadership teams to bring structure
                    to decision-making, align financial strategy with growth goals,
                    and implement processes that improve performance.
                </p>

                <p class="mt-4 text-zinc-700 leading-relaxed">
                    We believe strategy should not remain in presentations.
                    It should translate into daily actions that move the business forward.
                </p>

            </div>

        </div>

    </section>



    <!-- IMPACT NUMBERS -->
    <section class="py-20 bg-muted">

        <div class="max-w-6xl mx-auto px-6 grid sm:grid-cols-3 gap-8 text-center">

            <div>
                <h3 class="text-4xl font-bold text-secondary">50+</h3>
                <p class="mt-2 text-zinc-700 text-sm">
                    Strategic engagements with founders and leadership teams
                </p>
            </div>

            <div>
                <h3 class="text-4xl font-bold text-secondary">10+</h3>
                <p class="mt-2 text-zinc-700 text-sm">
                    Industries supported through advisory and consulting
                </p>
            </div>

            <div>
                <h3 class="text-4xl font-bold text-secondary">100%</h3>
                <p class="mt-2 text-zinc-700 text-sm">
                    Focus on practical, implementable recommendations
                </p>
            </div>

        </div>

    </section>



    <!-- VALUES -->
    <section class="py-24 bg-white">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center max-w-2xl mx-auto">

                <h2 class="text-3xl md:text-4xl font-bold text-text-primary">
                    What We Believe
                </h2>

                <p class="mt-4 text-zinc-700">
                    Our work is guided by principles that keep strategy
                    practical and execution focused.
                </p>

            </div>

            <div class="grid gap-6 mt-14 sm:grid-cols-2 lg:grid-cols-3">

                <div class="p-6 bg-surface border border-border rounded-lg">
                    <div class="w-11 h-11 flex items-center justify-center rounded-lg bg-secondary/10 text-secondary text-xl">
                        <i class="ri-lightbulb-line"></i>
                    </div>

                    <h3 class="mt-4 font-semibold text-text-primary">
                        Clarity Over Complexity
                    </h3>

                    <p class="mt-2 text-sm text-zinc-700">
                        Clear thinking and structured decisions lead to stronger execution.
                    </p>
                </div>



                <div class="p-6 bg-surface border border-border rounded-lg">
                    <div class="w-11 h-11 flex items-center justify-center rounded-lg bg-secondary/10 text-secondary text-xl">
                        <i class="ri-line-chart-line"></i>
                    </div>

                    <h3 class="mt-4 font-semibold text-text-primary">
                        Growth with Discipline
                    </h3>

                    <p class="mt-2 text-sm text-zinc-700">
                        Sustainable growth requires financial discipline and strategic focus.
                    </p>
                </div>



                <div class="p-6 bg-surface border border-border rounded-lg">
                    <div class="w-11 h-11 flex items-center justify-center rounded-lg bg-secondary/10 text-secondary text-xl">
                        <i class="ri-team-line"></i>
                    </div>

                    <h3 class="mt-4 font-semibold text-text-primary">
                        People-Centered Execution
                    </h3>

                    <p class="mt-2 text-sm text-zinc-700">
                        Teams empowered with clarity and structure can sustain performance.
                    </p>
                </div>

            </div>

        </div>

    </section>



    <!-- CTA -->
    <section class="py-24 bg-secondary text-white">

        <div class="max-w-4xl mx-auto px-6 text-center">

            <h2 class="text-3xl font-bold">
                Ready to Strengthen Your Business Strategy?
            </h2>

            <p class="mt-4 text-white/80">
                Let's discuss how Grevx can support your next stage of growth.
            </p>

            <button class="mt-8 px-8 py-3 bg-white text-secondary font-semibold rounded-md hover:bg-gray-100 transition">
                Start a Conversation
            </button>

        </div>

    </section>

</div>