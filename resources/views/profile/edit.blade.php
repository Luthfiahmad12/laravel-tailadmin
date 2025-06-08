<x-app-layout title="{{ __('Profile') }}">
    <div class="w-full space-y-6">
        <div
            class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg border border-gray-100 dark:border-gray-600">
            <div class="max-w-full">
                @include('profile.partials.update-avatar-form')
            </div>
        </div>

        <div
            class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg border border-gray-100 dark:border-gray-600">
            <div class="max-w-md">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div
            class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg border border-gray-100 dark:border-gray-600">
            <div class="max-w-md">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div
            class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg border border-gray-100 dark:border-gray-600">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
