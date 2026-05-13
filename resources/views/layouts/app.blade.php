<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', $title ?? config('app.name'))</title>
    <meta name="description" content="@yield('meta_description', '')">
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css"
        rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

</head>

<body>

    <livewire:include.header />


    <!-- Main Content -->
    <main class="flex-1 ">

        {{ $slot }}

    </main>

    <a
        href="https://wa.me/918376059410?text=Hi%20happy%20to%20know%20about%20your%20services"
        target="_blank"
        class="fixed bottom-10 right-2 md:right-4 z-50 flex h-16 w-16 items-center justify-center rounded-full bg-green-500 text-white shadow-lg">
        <i class="ri-whatsapp-line text-3xl"></i>
    </a>

    <livewire:include.footer />


    @livewireScripts

</body>

</html>