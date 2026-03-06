<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::admin')] class extends Component
{
    //
};
?>

<div class="max-w-7xl mx-auto space-y-8">

    <!-- Welcome Header -->
    <div class="space-y-2">
        <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">
            Welcome back, <span class="text-secondary font-bold">Aayush</span>
        </h1>
        <p class="text-slate-500 max-w-2xl font-medium">
            Here's what developer is happening across <span class="text-slate-700 italic">Grevx Consulting</span> today.
        </p>
    </div>

    <!-- Quick Insights (Stats Cards) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Stats Card: Total Views -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-all group overflow-hidden relative">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-secondary/10 rounded-xl flex items-center justify-center text-secondary">
                    <i class="ri-eye-line text-2xl group-hover:scale-110 transition-transform"></i>
                </div>
                <div class="text-[11px] font-bold text-emerald-500 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-100 flex items-center gap-1">
                    <i class="ri-arrow-right-up-line"></i> 12.5%
                </div>
            </div>
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Total Site Views</p>
            <h3 class="text-3xl font-extrabold text-slate-800 mt-1">24,512</h3>
            <div class="absolute -right-4 -bottom-4 opacity-5 pointer-events-none group-hover:scale-110 transition-transform">
                <i class="ri-eye-line text-8xl text-secondary"></i>
            </div>
        </div>

        <!-- Stats Card: New Leads -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-all group overflow-hidden relative">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-500">
                    <i class="ri-user-follow-line text-2xl group-hover:scale-110 transition-transform"></i>
                </div>
                <div class="text-[11px] font-bold text-emerald-500 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-100 flex items-center gap-1">
                    <i class="ri-arrow-right-up-line"></i> 8.1%
                </div>
            </div>
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Inquiry Leads</p>
            <h3 class="text-3xl font-extrabold text-slate-800 mt-1">128</h3>
            <div class="absolute -right-4 -bottom-4 opacity-5 pointer-events-none group-hover:scale-110 transition-transform text-indigo-500">
                <i class="ri-user-follow-line text-8xl"></i>
            </div>
        </div>

        <!-- Stats Card: Blog Count -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-all group overflow-hidden relative">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center text-amber-500">
                    <i class="ri-article-line text-2xl group-hover:scale-110 transition-transform"></i>
                </div>
                <div class="text-[11px] font-bold text-slate-400 bg-slate-50 px-2 py-0.5 rounded-full border border-slate-200 flex items-center gap-1">
                    STABLE
                </div>
            </div>
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Total Articles</p>
            <h3 class="text-3xl font-extrabold text-slate-800 mt-1">42</h3>
            <div class="absolute -right-4 -bottom-4 opacity-5 pointer-events-none group-hover:scale-110 transition-transform text-amber-500">
                <i class="ri-article-line text-8xl"></i>
            </div>
        </div>

        <!-- Stats Card: Conversion -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-all group overflow-hidden relative">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-rose-50 rounded-xl flex items-center justify-center text-rose-500">
                    <i class="ri-pie-chart-line text-2xl group-hover:scale-110 transition-transform"></i>
                </div>
                <div class="text-[11px] font-bold text-rose-500 bg-rose-50 px-2 py-0.5 rounded-full border border-rose-100 flex items-center gap-1">
                    <i class="ri-arrow-right-down-line"></i> 2.4%
                </div>
            </div>
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Conversion Rate</p>
            <h3 class="text-3xl font-extrabold text-slate-800 mt-1">4.2%</h3>
            <div class="absolute -right-4 -bottom-4 opacity-5 pointer-events-none group-hover:scale-110 transition-transform text-rose-500">
                <i class="ri-pie-chart-line text-8xl"></i>
            </div>
        </div>

    </div>

    <!-- Main Dashboard Row: Recent Content and Growth -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Column 1 & 2: Recent Activity / Table -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white overflow-hidden rounded-2xl border border-slate-200 shadow-sm">
                <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-slate-800 tracking-tight">Recent Inquiries</h3>
                    <button class="text-xs font-bold text-secondary bg-secondary/10 px-3 py-1.5 rounded-full border border-secondary/20 hover:bg-secondary hover:text-white transition-all transform hover:-translate-y-px uppercase">View All Inquiries</button>
                </div>
                <div class="divide-y divide-slate-100">

                    @foreach (range(1, 4) as $item)
                    <div class="px-6 py-4 flex items-center justify-between hover:bg-slate-50/50 transition-all cursor-pointer group">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center bg-slate-100 text-slate-400 group-hover:bg-secondary/10 group-hover:text-secondary transition-colors">
                                <i class="ri-mail-line text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-700">Client #{{ rand(100, 999) }} Request</p>
                                <p class="text-[11px] text-slate-400 font-medium">Interest in Financial Modeling • 2h ago</p>
                            </div>
                        </div>
                        <button class="w-8 h-8 rounded-full flex items-center justify-center text-slate-300 hover:text-slate-600 transition-colors">
                            <i class="ri-arrow-right-s-line text-xl"></i>
                        </button>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

        <!-- Column 3: Stats or Info -->
        <div class="space-y-6">
            <div class="bg-slate-900 overflow-hidden rounded-2xl shadow-xl shadow-slate-200 relative group">
                <div class="p-8 space-y-4">
                    <div class="w-12 h-12 bg-secondary rounded-xl flex items-center justify-center text-white mb-6 transform group-hover:rotate-12 transition-transform">
                        <i class="ri-flashlight-line text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white leading-tight">Optimizing your <span class="text-secondary italic">Consulting Funnel</span></h3>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        Data shows that clients are searching for <span class="text-white font-medium italic">"Tax Compliance UAE"</span> more than ever.
                    </p>
                    <button class="mt-4 px-6 py-2.5 bg-white text-slate-900 text-sm font-extrabold rounded-lg hover:bg-slate-100 transition-all transform hover:-translate-y-px">
                        Review Strategy
                    </button>
                </div>
                <!-- Subtle Gradient Glow -->
                <div class="absolute -right-20 -bottom-20 w-40 h-40 bg-secondary/30 rounded-full blur-3xl pointer-events-none group-hover:scale-150 transition-transform duration-700"></div>
            </div>
        </div>

    </div>

</div>