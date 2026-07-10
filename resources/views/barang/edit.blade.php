<x-app-layout>

<x-slot name="header">
    <h2 class="text-xl font-bold">
        Edit Barang
    </h2>
</x-slot>

<div class="py-6">
<div class="max-w-4xl mx-auto bg-white shadow rounded-lg p-6">

<form action="{{ route('barang.update',$barang->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-4">
<label>Kode Barang</label>
<input type="text"
name="kode_barang"
value="{{ $barang->kode_barang }}"
class="w-full border rounded p-2">
</div>

<div class="mb-4">
<label>Nama Barang</label>
<input type="text"
name="nama_barang"
value="{{ $barang->nama_barang }}"
class="w-full border rounded p-2">
</div>

<div class="mb-4">
<label>Kategori</label>
<input type="text"
name="kategori"
value="{{ $barang->kategori }}"
class="w-full border rounded p-2">
</div>

<div class="mb-4">
<label>Merk</label>
<input type="text"
name="merk"
value="{{ $barang->merk }}"
class="w-full border rounded p-2">
</div>

<div class="mb-4">
<label>Stok</label>
<input type="number"
name="stok"
value="{{ $barang->stok }}"
class="w-full border rounded p-2">
</div>

<div class="mb-4">
<label>Satuan</label>
<input type="text"
name="satuan"
value="{{ $barang->satuan }}"
class="w-full border rounded p-2">
</div>

<div class="mb-4">
<label>Lokasi</label>
<input type="text"
name="lokasi"
value="{{ $barang->lokasi }}"
class="w-full border rounded p-2">
</div>

<div class="mb-4">
<label>Keterangan</label>
<textarea
name="keterangan"
class="w-full border rounded p-2">{{ $barang->keterangan }}</textarea>
</div>

<button class="bg-blue-600 text-white px-4 py-2 rounded">
Update
</button>

<a href="{{ route('barang.index') }}"
class="bg-gray-500 text-white px-4 py-2 rounded">
Kembali
</a>

</form>

</div>
</div>

</x-app-layout>