<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full"
                          type="email" name="email"
                          :value="old('email')" required
                          autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password" name="password"
                          required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember & Forgot -->
        <div class="flex items-center justify-between mt-4">
            <label class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                       name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <!-- Submit -->
        <div class="mt-6">
            <x-primary-button class="w-full flex justify-center">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <!-- Register Link -->
        <p class="mt-4 text-center text-sm">
            {{ __("Not registered?") }}
            <a href="{{ route('register') }}"
               class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Create an account') }}
            </a>
        </p>

        <div style="display: flex; align-items: center; text-align: center; color: #888; margin: 20px 0;">
            <span style="flex: 1; border-bottom: 1px solid #ccc; margin-right: 10px;"></span>
            or
            <span style="flex: 1; border-bottom: 1px solid #ccc; margin-left: 10px;"></span>
        </div>


        <div class="mt-6">
            <a href="{{ route('auth.google.redirect') }}"
               class="w-full flex justify-center items-center bg-white text-gray-800 border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Login with Google') }}
            </a>
        </div>

    </form>
</x-guest-layout>
