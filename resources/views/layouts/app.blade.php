<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=outfit:100,200,300,400,500,600,700,800,900" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data="{ 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark bg-gray-900': darkMode === true }">

    {{-- preloader --}}
    <div x-show="loaded" x-init="window.addEventListener('DOMContentLoaded', () => { setTimeout(() => loaded = false, 500) })"
        class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white dark:bg-black">
        <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-brand-500 border-t-transparent">
        </div>
    </div>

    <div class="flex h-screen overflow-hidden">
        @include('partials.sidebar')

        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">

            {{-- overlay --}}
            <div x-on:click="sidebarToggle = false" :class="sidebarToggle ? 'block lg:hidden' : 'hidden'"
                class="fixed w-full h-screen z-9 bg-gray-900/50"></div>

            {{-- header --}}
            @include('partials.header')

            <!-- Page Content -->
            <main>
                <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
                    @if (isset($title))
                        <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90 capitalize">
                                {{ $title }}
                            </h2>

                            @if (!request()->routeIs('dashboard'))
                                <nav>
                                    <ol class="flex items-center gap-1.5">
                                        <li>
                                            <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400"
                                                href="{{ route('dashboard') }}">
                                                Home
                                                <x-heroicon-o-chevron-right class="size-4" />
                                            </a>
                                        </li>
                                        <li class="text-sm text-gray-800 dark:text-white/90 lowercase">
                                            {{ $title }}
                                        </li>
                                    </ol>
                                </nav>
                            @endif
                        </div>
                    @endif

                    {{ $slot }}

                </div>
            </main>
        </div>

    </div>
</body>

</html>
