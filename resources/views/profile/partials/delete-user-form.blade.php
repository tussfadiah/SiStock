<section>


    <!-- Header dengan Simbol Kotak Sampah -->
    <div class="border-b border-gray-100 pb-5">
        <h2 class="text-xl font-bold text-red-600 tracking-tight flex items-center gap-2">
            <!-- Simbol Kotak Sampah -->
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
            </svg>
            Hapus Akun
        </h2>
    </div>


    <!-- Deskripsi (py-6 diubah menjadi py-4 agar tidak terlalu renggang) -->
    <div class="py-4">
        <p class="text-gray-600 leading-relaxed font-sans text-sm">
            Setelah akun dihapus, seluruh data akan dihapus secara permanen dan tidak dapat dikembalikan lagi.
            Pastikan Anda telah mencadangkan data yang masih diperlukan.
        </p>
    </div>


    <!-- Tombol Pembatas -->
    <div class="flex justify-start border-t border-gray-100 pt-6">
        <x-danger-button
            x-data
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="px-5 py-2.5 bg-red-600 hover:bg-red-700 active:scale-98 text-white font-bold text-xs uppercase tracking-wider rounded-lg shadow-sm transition-all duration-150 font-sans shrink-0 whitespace-nowrap"
        >
            Hapus Akun
        </x-danger-button>
    </div>


    <!-- Modal Konfirmasi -->
    <x-modal
        name="confirm-user-deletion"
        :show="$errors->userDeletion->isNotEmpty()"
        focusable
    >


        <form
            method="POST"
            action="{{ route('profile.destroy') }}"
            class="p-6"
        >


            @csrf
            @method('DELETE')


            <h2 class="text-xl font-semibold text-gray-900 flex items-center gap-2">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                Konfirmasi Hapus Akun
            </h2>


            <p class="mt-2 text-sm text-gray-600">
                Tindakan ini tidak dapat dibatalkan.
                Masukkan password Anda untuk mengonfirmasi penghapusan akun.
            </p>


            <div class="mt-6">


                <x-input-label
                    for="password"
                    :value="__('Password')" />


                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-2 block w-full"
                    placeholder="Masukkan password"
                />


                <x-input-error
                    :messages="$errors->userDeletion->get('password')"
                    class="mt-2"
                />


            </div>


            <div class="mt-8 flex justify-end gap-3">


                <x-secondary-button
                    x-on:click="$dispatch('close')"
                >
                    Batal
                </x-secondary-button>


                <x-danger-button>
                    Ya, Hapus Akun
                </x-danger-button>


            </div>


        </form>


    </x-modal>


</section>

