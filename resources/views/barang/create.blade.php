<x-app-layout>

    <x-slot name="header">
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

            <form action="{{ route('barang.store') }}" method="POST">
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
                    <label class="block mb-1">Kategori</label>
                    <input type="text"
                           name="kategori"
                           class="w-full border rounded p-2"
                           value="{{ old('kategori') }}">
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Stok</label>
                    <input type="number"
                           name="stok"
                           class="w-full border rounded p-2"
                           value="{{ old('stok') }}">
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Satuan</label>
                    <input type="text"
                           name="satuan"
                           class="w-full border rounded p-2"
                           value="{{ old('satuan') }}">
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