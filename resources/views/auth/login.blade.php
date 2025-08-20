<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('auth.email')" />
            <x-text-input id="email" class="block mt-1 w-full"
                          type="email" name="email"
                          :value="old('email')" required
                          autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('auth.password_field')" />
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
                <span class="ml-2 text-sm text-gray-600">{{ __('auth.remember_me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('auth.forgot_password') }}
                </a>
            @endif
        </div>

        <!-- Submit -->
        <div class="mt-6">
            <x-primary-button class="w-full flex justify-center">
                {{ __('auth.login') }}
            </x-primary-button>
        </div>

        <!-- Register Link -->
        <p class="mt-4 text-center text-sm">
            {{ __('auth.not_registered') }}
            <a href="{{ route('register') }}"
               class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('auth.create_account') }}
            </a>
        </p>

        <div style="display: flex; align-items: center; text-align: center; color: #888; margin: 20px 0;">
            <span style="flex: 1; border-bottom: 1px solid #ccc; margin-right: 10px;"></span>
            {{ __('auth.or_separator') }}
            <span style="flex: 1; border-bottom: 1px solid #ccc; margin-left: 10px;"></span>
        </div>


        <div class="mt-6">
            <a href="{{ route('auth.google.redirect') }}"
               class="w-full flex justify-center items-center bg-white text-gray-800 border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('auth.login_with_google') }}
            </a>
        </div>

    </form>
</x-guest-layout>
