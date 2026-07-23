<section>


    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>


    <form
        method="POST"
        action="{{ route('profile.update') }}"
        enctype="multipart/form-data"
        class="space-y-6"
    >
        @csrf
        @method('PATCH')


        <!-- Judul -->
        <div>
            <h2 class="text-2xl font-semibold text-gray-900">
                Edit Profil
            </h2>


            <p class="mt-1 text-sm text-gray-500">
                Perbarui informasi akun Anda di bawah ini.
            </p>
        </div>


        <!-- FOTO PROFIL -->
        <div class="flex justify-center">


            @if($user->avatar)


                <img
                    src="{{ asset('storage/' . $user->avatar) }}"
                    alt="Avatar"
                    class="w-24 h-24 rounded-full object-cover border-4 border-indigo-500 shadow-md">


            @else


                <div class="w-24 h-24 rounded-full bg-[#2F56B3] border-4 border-indigo-500 shadow-md flex items-center justify-center">


                    <span class="text-3xl font-bold text-white">
                        {{ strtoupper(substr($user->name,0,2)) }}
                    </span>


                </div>


            @endif


        </div>


        <!-- Upload Foto -->
        <div class="pt-4 border-t">


            <input
                id="avatar"
                name="avatar"
                type="file"
                accept="image/*"
                class="mt-2 block w-full text-sm text-gray-500
                file:mr-4
                file:py-2
                file:px-4
                file:rounded-md
                file:border-0
                file:bg-indigo-50
                file:text-indigo-700
                hover:file:bg-indigo-100
                cursor-pointer">


            <p class="mt-2 text-xs text-gray-400">
                Format: JPG, JPEG, PNG. Maksimal 2 MB.
            </p>


            <x-input-error
                class="mt-2"
                :messages="$errors->get('avatar')" />


        </div>


        <!-- FORM -->
        <div class="space-y-5">


            <!-- Nama -->
            <div>


                <x-input-label
                    for="name"
                    :value="'Nama'" />


                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    class="mt-2 block w-full"
                    :value="old('name', $user->name)"
                    required
                    autofocus />


                <x-input-error
                    class="mt-2"
                    :messages="$errors->get('name')" />


            </div>


            <!-- Email -->
            <div>


                <x-input-label
                    for="email"
                    :value="'Email'" />


                <x-text-input
                    id="email"
                    name="email"
                    type="email"
                    class="mt-2 block w-full"
                    :value="old('email', $user->email)"
                    required />


                <x-input-error
                    class="mt-2"
                    :messages="$errors->get('email')" />


                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())


                    <div class="mt-3">


                        <p class="text-sm text-gray-600">


                            Email Anda belum diverifikasi.


                            <button
                                form="send-verification"
                                class="underline text-indigo-600 hover:text-indigo-700">


                                Kirim ulang email verifikasi


                            </button>


                        </p>


                        @if (session('status') === 'verification-link-sent')


                            <p class="mt-2 text-sm text-green-600">


                                Link verifikasi berhasil dikirim.


                            </p>


                        @endif


                    </div>


                @endif


            </div>


            <!-- Divisi -->
            <div>


                <x-input-label
                    for="divisi"
                    :value="'Divisi'" />


                <x-text-input
                    id="divisi"
                    name="divisi"
                    type="text"
                    class="mt-2 block w-full"
                    :value="old('divisi', $user->divisi)"
                    placeholder="Contoh : IT Support" />


                <x-input-error
                    class="mt-2"
                    :messages="$errors->get('divisi')" />


            </div>


            <!-- Jabatan -->
            <div>


                <x-input-label
                    for="jabatan"
                    :value="'Jabatan'" />


                <x-text-input
                    id="jabatan"
                    name="jabatan"
                    type="text"
                    class="mt-2 block w-full"
                    :value="old('jabatan', $user->jabatan)"
                    placeholder="Contoh : Staff" />


                <x-input-error
                    class="mt-2"
                    :messages="$errors->get('jabatan')" />


            </div>


        </div>


        <!-- BUTTON -->
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





            @if (session('status') === 'profile-updated')


                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600">


                    Berhasil disimpan.


                </p>


            @endif


        </div>


    </form>


</section>

