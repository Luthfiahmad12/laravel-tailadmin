<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex items-center w-full lg:w-1/2">
        <div class="flex flex-col justify-center flex-1 w-full max-w-md mx-auto">
            <div class="mb-5 sm:mb-8">
                <h1 class="mb-2 font-semibold text-gray-800 text-title-sm dark:text-white/90 sm:text-title-md">
                    Log In
                </h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Enter your email and password to Log In!
                </p>
            </div>
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf
                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input type="email" id="email" name="email" :value="old('email')" required autofocus
                        autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <div x-data="{ showPassword: false }" class="relative">
                        <input :type="showPassword ? 'text' : 'password'" name="password" id="password"
                            class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pl-4 pr-11 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                        <span @click="showPassword = !showPassword"
                            class="absolute z-30 text-gray-500 -translate-y-1/2 cursor-pointer right-4 top-1/2 dark:text-gray-400">
                            <x-heroicon-o-eye x-show="!showPassword" class="text-gray-400 size-5" />
                            <x-heroicon-o-eye-slash x-show="showPassword" class="text-gray-400 size-5" />
                        </span>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <!-- remember -->
                <div class="flex items-center justify-between">
                    <div x-data="{ checkboxToggle: false }">
                        <label for="checkboxLabelOne"
                            class="flex items-center text-sm font-normal text-gray-700 cursor-pointer select-none dark:text-gray-400">
                            <div class="relative">
                                <input type="checkbox" name="remember" id="checkboxLabelOne" class="sr-only"
                                    x-on:change="checkboxToggle = !checkboxToggle" />
                                <div :class="checkboxToggle ? 'border-brand-500 bg-brand-500' :
                                    'bg-transparent border-gray-300 dark:border-gray-700'"
                                    class="mr-3 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px]">
                                    <span :class="checkboxToggle ? '' : 'opacity-0'">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.6666 3.5L5.24992 9.91667L2.33325 7" stroke="white"
                                                stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            Keep me logged in
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="text-sm text-brand-500 hover:text-brand-600 dark:text-brand-400">
                            Forgot password?
                        </a>
                    @endif
                </div>
                <!-- Button -->
                <div>
                    <button type="submit"
                        class="flex items-center justify-center w-full px-4 py-3 text-sm font-semibold text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600 active:bg-gray-900 dark:active:bg-gray-300 focus:outline-hidden focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 ease-in-out duration-150">
                        Log In
                    </button>
                </div>
            </form>
            <div class="mt-5">
                <p class="text-sm font-normal text-center text-gray-700 dark:text-gray-400 sm:text-start">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-brand-500 hover:text-brand-600 dark:text-brand-400">
                        Register
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
