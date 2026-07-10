<x-app-layout>

<x-slot name="header">
    <h2 class="text-xl font-bold">
        Tambah Barang Masuk
    </h2>
</x-slot>

<div class="max-w-3xl mx-auto mt-6 bg-white shadow rounded-lg p-6">

<form action="{{ route('barang-masuk.store') }}" method="POST">

@csrf

<div class="mb-4">

<label>Barang</label>

<select name="barang_id"
class="w-full border rounded p-2">

@foreach($barang as $b)

<option value="{{ $b->id }}">

{{ $b->nama_barang }}

</option>

@endforeach

</select>

</div>

<div class="mb-4">

<label>Tanggal</label>

<input
type="date"
name="tanggal"
value="{{ date('Y-m-d') }}"
class="w-full border rounded p-2">

</div>

<div class="mb-4">

<label>Jumlah</label>

<input
type="number"
name="jumlah"
class="w-full border rounded p-2">

</div>

<div class="mb-4">

<label>Supplier</label>

<input
type="text"
name="supplier"
class="w-full border rounded p-2">

</div>

<div class="mb-4">

<label>Keterangan</label>

<textarea
name="keterangan"
class="w-full border rounded p-2"></textarea>

</div>

<button
class="bg-green-600 text-white px-5 py-2 rounded">

Simpan

</button>

<a href="{{ route('barang-masuk.index') }}"
class="bg-gray-600 text-white px-5 py-2 rounded">

Kembali

</a>

</form>

</div>

</x-app-layout>