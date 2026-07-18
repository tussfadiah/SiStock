<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Bagian Unggah & Pratinjau Foto Profil -->
        <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 flex flex-col sm:flex-row items-center gap-6">
            <div class="relative shrink-0">
                @if($user->avatar)
                    <img id="avatar-preview-element" src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar Preview" class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-md">
                @else
                    <div id="avatar-placeholder-element" class="w-24 h-24 rounded-full bg-[#2F56B3] border-4 border-white shadow-md flex items-center justify-center text-white font-bold text-2xl uppercase">
                        {{ strtoupper(substr($user->name, 0, 2)) }}
                    </div>
                    <img id="avatar-preview-element" src="#" alt="Avatar Preview" class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-md hidden">
                @endif
            </div>
            <div class="flex-1 w-full text-center sm:text-left">
                <x-input-label for="avatar_input" :value="__('Foto Profil (Avatar)')" class="text-gray-700 font-bold mb-1" />
                <input id="avatar_input" name="avatar" type="file" accept="image/*" onchange="runAvatarPreview(event)" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-200 rounded-xl p-1 bg-white shadow-sm cursor-pointer" />
                <p class="mt-2 text-xs text-gray-400">Format: JPG, JPEG, PNG. Maksimal ukuran file 2 MB.</p>
                <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
            </div>
        </div>

        <!-- Kolom Isian Data -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nama -->
            <div>
                <x-input-label for="profile_name" :value="__('Nama Lengkap')" class="text-gray-700 font-medium" />
                <x-text-input id="profile_name" name="name" type="text" class="mt-1 block w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-xl shadow-sm" :value="old('name', $user->name)" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <!-- Email -->
            <div>
                <x-input-label for="profile_email" :value="__('Alamat Email')" class="text-gray-700 font-medium" />
                <x-text-input id="profile_email" name="email" type="email" class="mt-1 block w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-xl shadow-sm" :value="old('email', $user->email)" required />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-2 text-sm text-gray-600">
                        <p>
                            {{ __('Email belum diverifikasi.') }}
                            <button form="send-verification" class="underline text-blue-600 hover:text-blue-800 font-medium">
                                {{ __('Kirim ulang kode verifikasi.') }}
                            </button>
                        </p>
                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-1 text-xs text-green-600 font-semibold">
                                {{ __('Link verifikasi baru telah dikirim ke email Anda.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Divisi -->
            <div>
                <x-input-label for="profile_divisi" :value="__('Divisi')" class="text-gray-700 font-medium" />
                <x-text-input id="profile_divisi" name="divisi" type="text" placeholder="Contoh: IT Support" class="mt-1 block w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-xl shadow-sm" :value="old('divisi', $user->divisi)" />
                <x-input-error class="mt-2" :messages="$errors->get('divisi')" />
            </div>

            <!-- Jabatan -->
            <div>
                <x-input-label for="profile_jabatan" :value="__('Jabatan')" class="text-gray-700 font-medium" />
                <x-text-input id="profile_jabatan" name="jabatan" type="text" placeholder="Contoh: Staff" class="mt-1 block w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-xl shadow-sm" :value="old('jabatan', $user->jabatan)" />
                <x-input-error class="mt-2" :messages="$errors->get('jabatan')" />
            </div>
        </div>

        <div class="flex items-center gap-3 pt-4 border-t border-gray-100 justify-end">
            <button type="button" @click="editProfile = false" class="px-5 py-2.5 border border-gray-300 rounded-xl text-gray-700 hover:bg-gray-100 text-sm font-medium transition">
                Batal
            </button>
            <x-primary-button class="px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-xl text-sm font-medium transition shadow-sm">
                {{ __('Simpan Perubahan') }}
            </x-primary-button>
        </div>
    </form>
</section>

<script>
function runAvatarPreview(event) {
    const input = event.target;
    const preview = document.getElementById('avatar-preview-element');
    const placeholder = document.getElementById('avatar-placeholder-element');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            if (preview) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            if (placeholder) {
                placeholder.classList.add('hidden');
            }
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>