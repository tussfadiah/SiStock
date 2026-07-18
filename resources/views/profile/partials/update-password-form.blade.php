<section>


    <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('PUT')


        <!-- Password Lama -->
        <div>
            <x-input-label
                for="update_password_current_password"
                :value="__('Password Lama')" />


            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="mt-2 block w-full"
                autocomplete="current-password" />


            <x-input-error
                class="mt-2"
                :messages="$errors->updatePassword->get('current_password')" />
        </div>


        <!-- Password Baru -->
        <div>
            <x-input-label
                for="update_password_password"
                :value="__('Password Baru')" />


            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="mt-2 block w-full"
                autocomplete="new-password" />


            <x-input-error
                class="mt-2"
                :messages="$errors->updatePassword->get('password')" />
        </div>


        <!-- Konfirmasi Password -->
        <div>
            <x-input-label
                for="update_password_password_confirmation"
                :value="__('Konfirmasi Password Baru')" />


            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-2 block w-full"
                autocomplete="new-password" />


            <x-input-error
                class="mt-2"
                :messages="$errors->updatePassword->get('password_confirmation')" />
        </div>


        <!-- Tombol Aksi Bersandingan -->
        <div class="flex items-center gap-3 pt-4 border-t border-gray-100 justify-end">
           
            <button
                type="button"
                @click="editPassword = false"
                class="px-5 py-2.5 border border-gray-300 rounded-xl text-gray-700 hover:bg-gray-100 text-sm font-medium transition font-sans order-last"
            >
                Batal
            </button>


            <x-primary-button class="px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-xl text-sm font-medium transition font-sans">
                Simpan Perubahan
            </x-primary-button>


        </div>


    </form>


    <!-- Hanya menampilkan notifikasi gagal di sini -->
    @if ($errors->updatePassword->any())
        <div class="p-4 mt-4 text-sm text-red-800 bg-red-50 rounded-xl border border-red-200 flex items-center gap-2">
            <svg class="w-5 h-5 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <div>
                <span class="font-semibold">Gagal Perbarui Password!</span> Harap periksa kembali form di bawah.
            </div>
        </div>
    @endif


</section>

