<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
          

        <div>
            <x-input-label for="email" :value="__('Email')" class="block text-sm font-semibold text-gray-700" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus    class="block mt-1 w-full px-3 py-2 bg-white border border-gray-400 rounded-md text-sm shadow-sm placeholder-gray-400
                          focus:outline-none focus:border-[#000000] focus:ring-1 focus:ring-[#000000]"  />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
