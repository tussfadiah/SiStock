<x-app-layout>


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

<form action="{{ route('barang.update',$barang->id) }}"
      method="POST"
      enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="mb-4">
<label class="block font-medium">Kode Barang</label>
<input
type="text"
name="kode_barang"
value="{{ old('kode_barang',$barang->kode_barang) }}"
class="w-full border rounded-lg p-2">
</div>

<div class="mb-4">
<label class="block font-medium">Nama Barang</label>
<input
type="text"
name="nama_barang"
value="{{ old('nama_barang',$barang->nama_barang) }}"
class="w-full border rounded-lg p-2">
</div>

<div class="mb-4">
<label class="block font-medium">Aksi</label>
<input
type="text"
name="kategori"
value="{{ old('kategori',$barang->kategori) }}"
class="w-full border rounded-lg p-2">
</div>

<div class="mb-4">
<label class="block font-medium">Merk</label>
<input
type="text"
name="merk"
value="{{ old('merk',$barang->merk) }}"
class="w-full border rounded-lg p-2">
</div>


<div class="mb-4">
<label class="block font-medium">Lokasi</label>
<input
type="text"
name="lokasi"
value="{{ old('lokasi',$barang->lokasi) }}"
class="w-full border rounded-lg p-2">
</div>

<div class="mb-4">
<label class="block font-medium">Keterangan</label>
<textarea
name="keterangan"
class="w-full border rounded-lg p-2">{{ old('keterangan',$barang->keterangan) }}</textarea>
</div>

<div class="mb-4">
<label class="block font-medium">Foto Barang</label>

@if($barang->foto)
    <img src="{{ asset('storage/'.$barang->foto) }}"
         class="w-40 rounded-lg shadow mb-3">
@endif

<input
type="file"
name="foto"
accept="image/*"
class="w-full border rounded-lg p-2">

<small class="text-gray-500">
Kosongkan jika tidak ingin mengganti foto.
</small>
</div>

<div class="mb-4">
<label class="block font-medium">Barcode</label>

<input
type="text"
value="{{ $barang->barcode }}"
class="w-full border rounded-lg p-2 bg-gray-100"
readonly>
</div>

<div class="flex gap-3">

<button
class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

Update

</button>

<a href="{{ route('barang.index') }}"
class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg">

Kembali

</a>

</div>

</form>

</div>
</div>

</x-app-layout>