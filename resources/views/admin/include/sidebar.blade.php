<?php

use Livewire\Component;
use App\View\Builders\AdminSidebar;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
    public function render()
    {
        return view('admin.include.sidebar', [
            'sidebarItems' => AdminSidebar::menu(Auth::user())->get()
        ]);
    }
};
?>

<aside
    id="sidebar"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-slate-200
transition-transform duration-300 transform md:relative md:translate-x-0
flex flex-col"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

    <!-- Logo -->

    <div class="flex items-center justify-between h-20 px-6 border-b border-slate-100">

        <a href="/" class="flex items-center gap-3">

            <div class="w-9 h-9 rounded-lg bg-blue-600 flex items-center justify-center text-white font-bold text-sm">
                G
            </div>

            <div class="leading-tight">
                <p class="text-sm font-semibold text-slate-800 tracking-tight">
                    GREVX
                </p>
                <p class="text-[10px] uppercase text-slate-400 font-medium tracking-widest">
                    Admin
                </p>
            </div>

        </a>

        <button
            @click="sidebarOpen = false"
            class="md:hidden text-slate-400 hover:text-slate-700 transition">
            <i class="ri-close-line text-2xl"></i>
        </button>

    </div>


    <!-- Navigation -->

    <div
        class="flex-1 overflow-y-auto px-3 py-6 space-y-6 custom-scrollbar"
        x-data="{ openMenu:null }">

        <nav class="space-y-1">

            @foreach ($sidebarItems as $item)

            @if (! $item->hasSubmenu)

            <a
                href="{{ $item->url }}"
                wire:navigate
                class="flex items-center gap-3 px-4 py-2.5 text-sm rounded-lg transition-all group

{{ request()->url() === $item->url
? 'bg-blue-600 text-white shadow-sm'
: 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                <i class="{{ $item->icon }} text-lg
{{ request()->url() === $item->url
? 'text-white'
: 'text-slate-400 group-hover:text-blue-600' }}"></i>

                <span class="flex-1 font-medium">
                    {{ $item->title }}
                </span>

            </a>

            @else

            <!-- Dropdown -->

            <div class="space-y-1">

                <button
                    @click="openMenu === '{{ $item->title }}'
? openMenu = null
: openMenu = '{{ $item->title }}'"
                    class="w-full flex items-center justify-between px-4 py-2.5 rounded-lg text-sm transition group

{{ str_contains(request()->url(), strtolower($item->title))
? 'bg-slate-100 text-slate-900'
: 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                    <div class="flex items-center gap-3">

                        <i class="{{ $item->icon }} text-lg
{{ str_contains(request()->url(), strtolower($item->title))
? 'text-blue-600'
: 'text-slate-400 group-hover:text-blue-600' }}"></i>

                        <span class="font-medium">
                            {{ $item->title }}
                        </span>

                    </div>

                    <i
                        class="ri-arrow-down-s-line text-slate-400 transition-transform duration-200"
                        :class="openMenu === '{{ $item->title }}' ? 'rotate-180' : ''"></i>

                </button>


                <div
                    x-show="openMenu === '{{ $item->title }}'"
                    x-collapse
                    class="ml-8 border-l border-slate-200 pl-4 space-y-1">

                    @foreach ($item->submenu as $child)

                    <a
                        href="{{ $child->url }}"
                        wire:navigate
                        class="block px-3 py-2 text-xs rounded-md transition

{{ request()->url() === $child->url
? 'text-blue-600 font-semibold bg-blue-50'
: 'text-slate-500 hover:text-slate-900 hover:bg-slate-100' }}">

                        {{ $child->title }}

                    </a>

                    @endforeach

                </div>

            </div>

            @endif

            @endforeach

        </nav>

    </div>


    <!-- User Section -->

    <div class="border-t border-slate-100 p-4">

        <div class="flex items-center gap-3 p-3 rounded-lg bg-slate-50">

            <div class="w-9 h-9 rounded-lg bg-blue-600 text-white flex items-center justify-center font-semibold">
                ADMIN
            </div>

            <div class="flex-1 min-w-0">

                <p class="text-sm font-semibold text-slate-800 truncate">
                    ADMIN
                </p>

                <p class="text-[10px] uppercase text-slate-400 tracking-wider font-medium">
                    Administrator
                </p>

            </div>

            <button
                class="text-slate-400 hover:text-red-500 transition"
                title="Logout">
                <i class="ri-logout-circle-r-line text-xl"></i>
            </button>

        </div>

    </div>

</aside>