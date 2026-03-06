<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin Dashboard - Grevx' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css" rel="stylesheet" />

    @livewireStyles
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-slate-50 font-sans text-slate-700 antialiased">

    <div
        x-data="{ sidebarOpen: false }"
        class="flex h-screen overflow-hidden"
        x-cloak>
        <!-- Sidebar -->
        <livewire:admin::include.sidebar />

        <!-- Main Content -->
        <div class="flex flex-col flex-1 min-w-0 bg-slate-50 overflow-hidden">

            <!-- Admin Header -->
            <livewire:admin::include.header />

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-4 md:p-6 lg:p-8">
                {{ $slot }}
            </main>
        </div>
    </div>

    @livewireScripts
</body>

</html>