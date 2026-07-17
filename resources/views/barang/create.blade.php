<x-app-layout>

    <x-slot name="header"z>
        <h2 class="text-xl font-bold">
            Tambah Barang
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto bg-white shadow rounded-lg p-6">

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
<form action="{{ route('barang.store') }}"
      method="POST"
      enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block mb-1">Kode Barang</label>
                    <input type="text"
                           name="kode_barang"
                           class="w-full border rounded p-2"
                           value="{{ old('kode_barang') }}">
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Nama Barang</label>
                    <input type="text"
                           name="nama_barang"
                           class="w-full border rounded p-2"
                           value="{{ old('nama_barang') }}">
                </div>

              <div class="mb-4">
    <label class="block mb-1 font-medium">Kategori</label>

    <select
        name="kategori"
        class="w-full border rounded p-2 focus:ring-2 focus:ring-blue-500"
        required>

        <option value="">-- Pilih Kategori --</option>

        <option value="Laptop" {{ old('kategori') == 'Laptop' ? 'selected' : '' }}>
            Laptop
        </option>

        <option value="Komputer" {{ old('kategori') == 'Komputer' ? 'selected' : '' }}>
            Komputer
        </option>

        <option value="Monitor" {{ old('kategori') == 'Monitor' ? 'selected' : '' }}>
            Monitor
        </option>

        <option value="Printer" {{ old('kategori') == 'Printer' ? 'selected' : '' }}>
            Printer
        </option>

        <option value="Scanner" {{ old('kategori') == 'Scanner' ? 'selected' : '' }}>
            Scanner
        </option>

        <option value="Kamera" {{ old('kategori') == 'Kamera' ? 'selected' : '' }}>
            Kamera
        </option>

        <option value="Lensa Kamera" {{ old('kategori') == 'Lensa Kamera' ? 'selected' : '' }}>
            Lensa Kamera
        </option>

        <option value="Mikrofon" {{ old('kategori') == 'Mikrofon' ? 'selected' : '' }}>
            Mikrofon
        </option>

        <option value="Speaker" {{ old('kategori') == 'Speaker' ? 'selected' : '' }}>
            Speaker
        </option>

        <option value="Broadcast" {{ old('kategori') == 'Broadcast' ? 'selected' : '' }}>
            Broadcast
        </option>

        <option value="Networking" {{ old('kategori') == 'Networking' ? 'selected' : '' }}>
            Networking
        </option>

        <option value="Server" {{ old('kategori') == 'Server' ? 'selected' : '' }}>
            Server
        </option>

        <option value="Storage" {{ old('kategori') == 'Storage' ? 'selected' : '' }}>
            Storage
        </option>

        <option value="UPS" {{ old('kategori') == 'UPS' ? 'selected' : '' }}>
            UPS
        </option>

        <option value="Proyektor" {{ old('kategori') == 'Proyektor' ? 'selected' : '' }}>
            Proyektor
        </option>

        <option value="Smart TV" {{ old('kategori') == 'Smart TV' ? 'selected' : '' }}>
            Smart TV
        </option>

        <option value="Lighting" {{ old('kategori') == 'Lighting' ? 'selected' : '' }}>
            Lighting
        </option>

        <option value="Peralatan Pendukung" {{ old('kategori') == 'Peralatan Pendukung' ? 'selected' : '' }}>
            Peralatan Pendukung
        </option>

        <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>
            Lainnya
        </option>

    </select>
</div>
  <div class="mb-4">
    <label class="block font-medium">Merk</label>
    <input type="text"
           name="merk"
           class="w-full border rounded-lg p-2"
           value="{{ old('merk') }}"
           required>
</div>

<div class="mb-4">
    <label class="block font-medium">Foto Barang</label>

    <input
        type="file"
        name="foto"
        class="w-full border rounded-lg p-2"
        accept="image/*">
</div>

                <div class="mb-4">
                    <label class="block mb-1">Lokasi</label>
                    <input type="text"
                           name="lokasi"
                           class="w-full border rounded p-2"
                           value="{{ old('lokasi') }}">
                </div>
                
<div class="mb-4">
    <label class="block font-medium">Keterangan</label>
    <textarea name="keterangan"
              class="w-full border rounded-lg p-2">{{ old('keterangan') }}</textarea>
</div>

                <button type="submit"
                        class="bg-blue-600 text-white px-5 py-2 rounded">
                    Simpan
                </button>

                <a href="{{ route('barang.index') }}"
                   class="bg-gray-500 text-white px-5 py-2 rounded">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</x-app-layout>