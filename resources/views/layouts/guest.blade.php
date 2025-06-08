<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=outfit:100,200,300,400,500,600,700,800,900" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data="{ page: 'comingSoon', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark bg-gray-900': darkMode === true }">

    {{-- preloader --}}
    <div x-show="loaded" x-init="window.addEventListener('DOMContentLoaded', () => { setTimeout(() => loaded = false, 500) })"
        class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white dark:bg-black">
        <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-brand-500 border-t-transparent">
        </div>
    </div>

    <div class="relative p-6 bg-white z-1 dark:bg-gray-900 sm:p-0">

        <div class="relative flex flex-col justify-center w-full h-screen dark:bg-gray-900 sm:p-0 lg:flex-row">

            {{ $slot }}

            <div class="relative items-center hidden w-full h-full bg-brand-950 dark:bg-white/5 lg:grid lg:w-1/2">
                <div class="flex items-center justify-center z-1">
                    <!-- ===== Common Grid Shape Start ===== -->
                    <div class="absolute right-0 top-0 -z-1 w-full max-w-[250px] xl:max-w-[450px]">
                        <img src="{{ asset('grid-shape.svg') }}" alt="grid" />
                    </div>
                    <div class="absolute bottom-0 left-0 -z-1 w-full max-w-[250px] rotate-180 xl:max-w-[450px]">
                        <img src="{{ asset('grid-shape.svg') }}" alt="grid" />
                    </div>

                    <div class="flex flex-col items-center max-w-md gap-4">
                        <a href="index.html" class="block mb-2">
                            <x-application-logo class="fill-current text-gray-400 dark:text-gray-200 size-16" />
                        </a>
                        @php
                            [$message, $author] = str(Illuminate\Foundation\Inspiring::quotes()->random())->explode(
                                '-',
                            );
                        @endphp
                        <blockquote class="space-y-2 text-center">
                            <p class="text-lg font-semibold text-gray-400 dark:text-white/60">
                                &ldquo;{{ trim($message) }}&rdquo;
                            </p>
                            <p class="text-md font-base text-gray-300 dark:text-white/50">
                                - {{ trim($author) }}
                            </p>
                        </blockquote>
                    </div>
                </div>
            </div>

            <!-- Toggler -->
            <div class="fixed z-50 hidden bottom-6 right-6 sm:block">
                <button
                    class="inline-flex items-center justify-center text-gray-200 transition-colors rounded-full size-12 bg-brand-500 hover:bg-brand-600"
                    @click.prevent="darkMode = !darkMode">
                    <x-heroicon-o-sun class="hidden dark:block size-6" />
                    <x-heroicon-o-moon class="dark:hidden size-6" />
                </button>
            </div </div>
        </div>
</body>

</html>
