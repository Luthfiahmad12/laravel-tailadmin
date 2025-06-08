<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Avatar Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Update your avatar
        </p>
    </header>

    <div class="mt-6 space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-8">
            <form action="{{ route('update.avatar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <x-file-input id="avatar" name="image" class="block w-full" />
                <x-input-error :messages="$errors->get('image')" class="mt-1" />
                <div class="flex items-center gap-4 mt-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                    @if (session('status') === 'avatar-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                    @elseif(session('status' === 'update-failed'))
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-red-600 dark:text-red-400">{{ __('Failed.') }}</p>
                    @endif
                </div>
            </form>
            <div class="flex flex-col items-center">
                @if (auth()->user()->avatar)
                    <img src="{{ asset('storage/' . auth()->user()->avatar->path) }}" alt="User avatar"
                        class="border border-gray-200 dark:border-gray-100 rounded-full size-20">
                @else
                    <img src="{{ auth()->user()->initials() }}" alt="User Avatar"
                        class="border border-gray-200 dark:border-gray-100 rounded-full size-18" />
                @endif
                <span class="mt-2 text-gray-700 dark:text-gray-400">
                    {{ auth()->user()->avatar?->name }}
                </span>
            </div>
        </div>
    </div>
</section>
