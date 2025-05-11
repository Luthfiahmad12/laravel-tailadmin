<x-app-layout title="{{ greeting() . ', ' . auth()->user()->name . ' 🙌' }}">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            {{ __('You are Logged in') }}
        </div>
    </div>
</x-app-layout>
