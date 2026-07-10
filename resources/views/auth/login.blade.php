<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h2 class="text-xl font-bold text-[#0B2F64] mb-6 text-center">Login ke Akun Anda</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full border-gray-300 focus:border-[#0B2F64] focus:ring-[#0B2F64]" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full border-gray-300 focus:border-[#0B2F64] focus:ring-[#0B2F64]" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 hover:text-[#0B2F64] underline" href="{{ route('password.request') }}">
                    {{ __('Lupa password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3 bg-[#0B2F64] hover:bg-blue-900">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>