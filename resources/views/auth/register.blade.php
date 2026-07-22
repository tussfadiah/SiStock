<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Judul Form -->
    <h2 class="text-xl sm:text-2xl font-bold text-[#0B2F64] mb-6 text-center">
        Daftar Akun Baru
    </h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
            <input id="name" 
                   type="text" 
                   name="name" 
                   value="{{ old('name') }}" 
                   required 
                   autofocus 
                   autocomplete="name"
                   placeholder="Masukkan nama lengkap Anda"
                   class="block mt-1 w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg text-sm shadow-sm placeholder-gray-400
                          focus:outline-none focus:border-[#0B2F64] focus:ring-1 focus:ring-[#0B2F64] transition-all" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
            <input id="email" 
                   type="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required 
                   autocomplete="username"
                   placeholder="example@email.com"
                   class="block mt-1 w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg text-sm shadow-sm placeholder-gray-400
                          focus:outline-none focus:border-[#0B2F64] focus:ring-1 focus:ring-[#0B2F64] transition-all" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
            <input id="password" 
                   type="password" 
                   name="password" 
                   required 
                   autocomplete="new-password"
                   placeholder="••••••••"
                   class="block mt-1 w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg text-sm shadow-sm placeholder-gray-400
                          focus:outline-none focus:border-[#0B2F64] focus:ring-1 focus:ring-[#0B2F64] transition-all" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700">Konfirmasi Password</label>
            <input id="password_confirmation" 
                   type="password" 
                   name="password_confirmation" 
                   required 
                   autocomplete="new-password"
                   placeholder="••••••••"
                   class="block mt-1 w-full px-3.5 py-2.5 bg-white border border-gray-300 rounded-lg text-sm shadow-sm placeholder-gray-400
                          focus:outline-none focus:border-[#0B2F64] focus:ring-1 focus:ring-[#0B2F64] transition-all" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Links & Action Button -->
        <div class="flex flex-col-reverse sm:flex-row items-center justify-between gap-4 mt-6">
            <a class="text-sm text-gray-500 hover:text-[#0B2F64] underline transition-colors duration-200 text-center sm:text-left" href="{{ route('login') }}">
                {{ __('Sudah punya akun?') }}
            </a>

            <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-[#0B2F64] hover:bg-blue-900 text-white font-semibold text-sm rounded-lg shadow-md transition-all duration-200 uppercase tracking-wider text-center">
                {{ __('Daftar') }}
            </button>
        </div>
    </form>
</x-guest-layout>