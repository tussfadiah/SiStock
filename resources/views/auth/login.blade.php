<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h2 class="text-xl font-bold text-[#0B2F64] mb-6 text-center">Login ke Akun Anda</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
            <input id="email" 
                   type="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required 
                   autofocus 
                   class="block mt-1 w-full px-3 py-2 bg-white border border-gray-400 rounded-md text-sm shadow-sm placeholder-gray-400
                          focus:outline-none focus:border-[#0B2F64] focus:ring-1 focus:ring-[#0B2F64]" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
            <input id="password" 
                   type="password" 
                   name="password" 
                   required 
                   class="block mt-1 w-full px-3 py-2 bg-white border border-gray-400 rounded-md text-sm shadow-sm placeholder-gray-400
                          focus:outline-none focus:border-[#0B2F64] focus:ring-1 focus:ring-[#0B2F64]" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Forgot Password & Button Area -->
        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 hover:text-[#0B2F64] underline transition-colors duration-200" href="{{ route('password.request') }}">
                    {{ __('Lupa password?') }}
                </a>
            @endif

            <button type="submit" class="ms-3 px-5 py-2 bg-[#0B2F64] hover:bg-blue-900 text-white font-semibold text-sm rounded-md shadow transition-all duration-200 uppercase tracking-wider">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</x-guest-layout>