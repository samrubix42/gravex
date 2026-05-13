<?php

use App\Models\Contact;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    #[On('contacts-updated')]
    public function refresh(): void
    {
        // Re-render to update notification counts.
    }

    public function with(): array
    {
        $user = auth()->user();

        return [
            'userName' => $user?->name ?? 'Admin',
            'userEmail' => $user?->email ?? 'admin@grevx.ae',
            'userInitials' => collect(explode(' ', $user?->name ?? 'Admin'))
                ->filter()
                ->map(fn($part) => strtoupper(substr($part, 0, 1)))
                ->take(2)
                ->implode(''),
            'unreadNotifications' => Contact::where('is_read', false)->count(),
        ];
    }
};
?>

<header class="h-20 bg-white border-b border-slate-200 sticky top-0 z-40">

    <div class="max-w-7xl mx-auto px-6 h-full flex items-center justify-between">

        <!-- LEFT -->

        <div class="flex items-center gap-5">

            <!-- Sidebar Toggle -->

            <button
                @click="sidebarOpen = !sidebarOpen"
                class="md:hidden text-slate-500 hover:text-blue-600 transition">

                <i class="ri-menu-2-line text-2xl"></i>

            </button>


            <!-- Page Title -->

            <div>

                <h1 class="text-lg font-semibold text-slate-800">
                    Dashboard
                </h1>

                <p class="text-xs text-slate-400 hidden sm:block">
                    Admin panel overview
                </p>

            </div>

        </div>



        <!-- RIGHT -->

        <div class="flex items-center gap-3">

            <!-- Notifications -->

            <button
                class="relative w-10 h-10 flex items-center justify-center text-slate-500 hover:text-blue-600 transition">

                <i class="ri-notification-3-line text-xl"></i>

                @if($unreadNotifications > 0)
                <span class="absolute -top-0.5 -right-0.5 min-w-[18px] h-[18px] px-1 rounded-full bg-rose-500 text-white text-[10px] font-semibold flex items-center justify-center">
                    {{ $unreadNotifications > 99 ? '99+' : $unreadNotifications }}
                </span>
                @endif

            </button>


            <!-- Divider -->

            <div class="h-6 w-px bg-slate-200 mx-2 hidden sm:block"></div>


            <!-- USER -->

            <div x-data="{ userMenu:false }" class="relative">

                <button
                    @click="userMenu=!userMenu"
                    class="flex items-center gap-3 hover:bg-slate-50 px-2 py-1 rounded-lg transition">

                    <div class="w-9 h-9 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-semibold">
                        {{ $userInitials }}
                    </div>

                    <div class="hidden sm:block text-left">

                        <p class="text-sm font-medium text-slate-800">
                            {{ $userName }}
                        </p>

                        <p class="text-xs text-slate-400">
                            Administrator
                        </p>

                    </div>

                    <i class="ri-arrow-down-s-line text-slate-400"></i>

                </button>


                <!-- USER DROPDOWN -->

                <div
                    x-show="userMenu"
                    @click.away="userMenu=false"
                    x-transition
                    x-cloak
                    class="absolute right-0 mt-3 w-56 bg-white border border-slate-200 rounded-lg shadow-lg p-2">

                    <div class="px-3 py-2 border-b border-slate-100">

                        <p class="text-xs text-slate-400">Signed in as</p>

                        <p class="text-sm font-medium text-slate-800 truncate">
                            {{ $userEmail }}
                        </p>

                    </div>

                    <div class="border-t border-slate-100 my-1"></div>

                    <a
                        href="#"
                        class="flex items-center gap-2 px-3 py-2 text-sm text-red-500 hover:bg-red-50 rounded-md">

                        <i class="ri-logout-circle-r-line"></i>

                        Logout

                    </a>

                </div>

            </div>


            <!-- Visit Site -->

            <a
                href="/"
                target="_blank"
                class="hidden md:flex items-center gap-2 px-4 py-2 text-sm font-medium text-blue-600 border border-blue-200 rounded-lg hover:bg-blue-600 hover:text-white transition">

                <i class="ri-external-link-line"></i>

                View Site

            </a>

        </div>

    </div>

</header>