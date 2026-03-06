<?php

use Livewire\Component;
use App\View\Builders\AdminSidebar;

new class extends Component
{
    public function render()
    {
        return view('admin.include.sidebar', [
            'sidebarItems' => AdminSidebar::menu(auth()->user())->get()
        ]);
    }
};
?>

<aside
    id="sidebar"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-slate-200 transition-transform duration-300 transform md:relative md:translate-x-0 overflow-hidden flex flex-col"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
    <!-- Logo Section -->
    <div class="flex items-center justify-between h-20 px-6 border-b border-slate-100 flex-shrink-0">
        <a href="/" class="flex items-center gap-2">
            <span class="text-xl font-bold tracking-tight text-slate-800">
                GREVX<span class="text-secondary text-sm ml-1 uppercase">Admin</span>
            </span>
        </a>
        <button @click="sidebarOpen = false" class="md:hidden text-slate-400 hover:text-slate-600 transition-colors">
            <i class="ri-close-line text-2xl"></i>
        </button>
    </div>

    <!-- Navigation Area -->
    <div class="flex-1 overflow-y-auto p-4 custom-scrollbar" x-data="{ openMenu: null }">

        <nav class="space-y-1">
            @foreach ($sidebarItems as $item)

            @if (! $item->hasSubmenu)
            {{-- SINGLE ITEM --}}
            <a
                href="{{ $item->url }}"
                wire:navigate
                class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-lg transition-all 
                               {{ request()->url() === $item->url || request()->fullUrlIs($item->url)
                                   ? 'bg-secondary text-white shadow-sm shadow-secondary/20' 
                                   : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900 group' }}">
                <i class="{{ $item->icon }} text-lg 
                                  {{ request()->url() === $item->url || request()->fullUrlIs($item->url)
                                      ? 'text-white' 
                                      : 'text-slate-400 group-hover:text-secondary' }} transition-colors"></i>
                <span class="flex-1">{{ $item->title }}</span>
            </a>

            @else
            {{-- DROPDOWN --}}
            <div class="space-y-1">
                <button
                    @click="openMenu === '{{ $item->title }}' ? openMenu = null : openMenu = '{{ $item->title }}'"
                    class="w-full flex items-center justify-between px-3 py-2.5 text-sm font-medium rounded-lg transition-all group
                                   {{ str_contains(request()->url(), strtolower($item->title)) ? 'text-slate-900' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <div class="flex items-center gap-3">
                        <i class="{{ $item->icon }} text-lg 
                                          {{ str_contains(request()->url(), strtolower($item->title)) ? 'text-secondary' : 'text-slate-400 group-hover:text-secondary' }} transition-colors"></i>
                        <span class="flex-1">{{ $item->title }}</span>
                    </div>
                    <i class="ri-arrow-down-s-line text-slate-400 transition-transform duration-200"
                        :class="openMenu === '{{ $item->title }}' ? 'rotate-180' : ''"></i>
                </button>

                <div
                    x-show="openMenu === '{{ $item->title }}'"
                    x-collapse
                    class="ml-9 space-y-1 border-l border-slate-100">
                    @foreach ($item->submenu as $child)
                    <a
                        href="{{ $child->url }}"
                        wire:navigate
                        class="block px-4 py-2 text-xs font-medium rounded-lg transition-all 
                                           {{ request()->url() === $child->url || request()->fullUrlIs($child->url)
                                               ? 'text-secondary bg-secondary/5' 
                                               : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">
                        {{ $child->title }}
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            @endforeach
        </nav>

    </div>

    <!-- User Section Bottom -->
    <div class="mt-auto border-t border-slate-100 p-4 bg-slate-50/50 flex-shrink-0">
        <div class="flex items-center gap-4 px-2 py-3 bg-white rounded-xl border border-slate-100 shadow-sm">
            <div class="w-9 h-9 rounded-lg bg-secondary/10 text-secondary flex items-center justify-center font-bold">
                AB
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-slate-800 truncate">Aayush Bajaj</p>
                <p class="text-[10px] text-slate-400 truncate tracking-wide uppercase font-bold">Founder / CEO</p>
            </div>
            <button class="text-slate-400 hover:text-rose-500 transition-colors">
                <i class="ri-logout-circle-r-line text-xl"></i>
            </button>
        </div>
    </div>
</aside>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #e2e8f0;
        border-radius: 10px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #cbd5e1;
    }
</style>