<x-app-layout>
    <div class="py-6 sm:py-10 md:ml-64">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <div x-data="{
                    editProfile: {{ $errors->updateProfileInformation->isNotEmpty() ? 'true' : 'false' }},
                    editPassword: {{ $errors->updatePassword->isNotEmpty() ? 'true' : 'false' }}
                 }" 
                 class="space-y-6"
            >
                <!-- NOTIFIKASI SUKSES PROFIL -->
                @if (session('status') === 'profile-updated')
                    <div class="p-4 bg-green-50 rounded-2xl shadow border border-green-200 text-sm text-green-800 flex items-center gap-2"
                         x-data="{ show: true }"
                         x-show="show"
                         x-init="setTimeout(() => show = false, 5000)"
                         x-transition>
                        <svg class="w-5 h-5 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <span class="font-bold">Berhasil!</span> Profil Anda telah diperbarui.
                        </div>
                    </div>
                @endif

                <!-- NOTIFIKASI SUKSES PASSWORD -->
                @if (session('status') === 'password-updated')
                    <div class="p-4 bg-green-50 rounded-2xl shadow border border-green-200 text-sm text-green-800 flex items-center gap-2"
                         x-data="{ show: true }"
                         x-show="show"
                         x-init="setTimeout(() => show = false, 5000)"
                         x-transition>
                        <svg class="w-5 h-5 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <span class="font-bold">Berhasil!</span> Kata sandi Anda telah diperbarui dengan aman.
                        </div>
                    </div>
                @endif

                <!-- ================= PROFILE ================= -->
                <div x-show="!editProfile" x-transition class="bg-white rounded-2xl shadow border border-gray-200 p-5 sm:p-8">
                    
                    <!-- Judul Utama -->
                    <div class="border-b border-gray-100 pb-5 mb-6 sm:mb-8">
                        <h2 class="text-lg sm:text-xl font-bold text-[#0B2F64] tracking-tight flex items-center gap-2">
                            <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Informasi Profil
                        </h2>
                    </div>

                    <!-- Layout Responsif: Kolom di HP, Berjajar (Row) di MD ke atas -->
                    <div class="flex flex-col md:flex-row gap-8 md:gap-14 items-center md:items-start">

                        <!-- FOTO PROFIL (SISI KIRI) -->
                        <div class="w-full md:w-44 shrink-0 flex flex-col items-center text-center">
                            <div class="rounded-full overflow-hidden border-4 border-white shadow-md flex items-center justify-center bg-white shrink-0"
                                 style="width: 150px; height: 150px; max-width: 150px; max-height: 150px;">
                                @if(Auth::user()->avatar)
                                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                                         alt="{{ Auth::user()->name }}"
                                         class="object-cover"
                                         style="width: 150px; height: 150px; object-fit: cover;">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white text-4xl font-bold uppercase">
                                        {{ substr(Auth::user()->name ?? 'U', 0, 2) }}
                                    </div>
                                @endif
                            </div>

                            <h3 class="mt-4 text-lg sm:text-xl font-bold text-gray-800 tracking-tight break-words max-w-xs">
                                {{ Auth::user()->name }}
                            </h3>
                            <p class="text-xs text-gray-400 uppercase font-bold tracking-wider mt-1">
                                09031382328128
                            </p>
                        </div>

                        <!-- INFORMASI DETAIL (SISI KANAN) -->
                        <div class="w-full flex-1 divide-y divide-gray-100 md:pr-4">

                            <!-- Box Email -->
                            <div class="py-4 first:pt-0 flex items-start gap-4">
                                <div class="w-6 h-6 text-gray-700 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="text-xs uppercase text-gray-400 font-bold tracking-wider">Email</p>
                                    <p class="text-sm sm:text-base font-semibold text-gray-800 mt-0.5 break-all">{{ Auth::user()->email }}</p>
                                </div>
                            </div>

                            <!-- Box Divisi -->
                            <div class="py-4 flex items-start gap-4">
                                <div class="w-6 h-6 text-gray-700 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs uppercase text-gray-400 font-bold tracking-wider">Divisi</p>
                                    <p class="text-sm sm:text-base font-semibold text-gray-800 mt-0.5">{{ Auth::user()->divisi ?? '-' }}</p>
                                </div>
                            </div>

                            <!-- Box Jabatan -->
                            <div class="py-4 last:pb-2 flex items-start gap-4">
                                <div class="w-6 h-6 text-gray-700 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs uppercase text-gray-400 font-bold tracking-wider">Jabatan</p>
                                    <p class="text-sm sm:text-base font-semibold text-gray-800 mt-0.5">{{ Auth::user()->jabatan ?? '-' }}</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- TOMBOL EDIT PROFIL -->
                    <div class="flex justify-end mt-6 border-t border-gray-100 pt-6">
                        <button @click="editProfile = true"
                            class="w-full sm:w-auto justify-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 active:scale-95 text-white font-medium text-sm rounded-xl shadow-md transition-all duration-200 flex items-center gap-2">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                            </svg>
                            Edit Profil
                        </button>
                    </div>
                </div>

                <!-- FORM EDIT PROFIL -->
                <div x-show="editProfile" x-transition class="bg-white rounded-2xl shadow border border-gray-200 p-5 sm:p-8">
                    <div class="flex justify-between items-center border-b border-gray-100 pb-4 mb-6">
                        <h3 class="text-lg sm:text-xl font-bold text-[#0B2F64]">Perbarui Informasi Profil</h3>
                        <button type="button" @click="editProfile = false" class="text-sm font-medium text-gray-500 hover:text-gray-700">
                            &larr; Batal / Kembali
                        </button>
                    </div>
                    @include('profile.partials.update-profile-information-form')
                </div>

                <!-- ================= PASSWORD ================= -->
                <!-- Ringkasan Password -->
                <div x-show="!editPassword" x-transition class="bg-white rounded-2xl shadow border border-gray-200 p-5 sm:p-8">
                    <div class="border-b border-gray-100 pb-5">
                        <h2 class="text-lg sm:text-xl font-bold text-[#0B2F64] tracking-tight flex items-center gap-2">
                            <svg class="w-7 h-7 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            Ubah Kata Sandi
                        </h2>
                    </div>

                    <div class="py-6">
                        <p class="text-gray-600 leading-relaxed text-sm">
                            Gunakan password yang kuat untuk menjaga keamanan akun Anda.
                        </p>
                    </div>

                    <!-- TOMBOL UBAH PASSWORD -->
                    <div class="flex justify-start border-t border-gray-100 pt-6">
                        <button @click="editPassword = true"
                                class="w-full sm:w-auto justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-md shadow transition-all duration-150">
                            Ubah Password
                        </button>
                    </div>
                </div>

                <!-- Form Edit Password -->
                <div x-show="editPassword" x-transition class="bg-white rounded-2xl shadow border border-gray-200 p-5 sm:p-8">
                    <div class="flex justify-between items-center border-b border-gray-100 pb-4 mb-6">
                        <h3 class="text-lg sm:text-xl font-bold text-[#0B2F64]">Ubah Kata Sandi</h3>
                        <button type="button" @click="editPassword = false" class="text-sm font-medium text-gray-500 hover:text-gray-700">
                            &larr; Batal
                        </button>
                    </div>
                    @include('profile.partials.update-password-form')
                </div>

                <!-- ================= DANGER ZONE ================= -->
                <div class="bg-white rounded-2xl shadow border border-gray-200 p-5 sm:p-8">
                    @include('profile.partials.delete-user-form')
                </div>

            </div>

        </div>
    </div>
</x-app-layout>