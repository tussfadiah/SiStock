<x-app-layout>

<x-slot name="header">
    <h2 class="text-xl font-bold">
        Tambah Barang Keluar
    </h2>
</x-slot>

<div class="max-w-3xl mx-auto mt-6 bg-white shadow rounded-lg p-6">

@if ($errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4">
    <ul>
        @foreach ($errors->all() as $error)
            <li>• {{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('barang-keluar.store') }}" method="POST">

@csrf

<div class="mb-4">

<label class="block font-medium">Barang</label>

<select name="barang_id"
class="w-full border rounded p-2">

<option value="">-- Pilih Barang --</option>

@foreach($barang as $b)

<option value="{{ $b->id }}">

{{ $b->kode_barang }} -
{{ $b->nama_barang }}
(Stok : {{ $b->stok }})

</option>

@endforeach

</select>

</div>

<div class="mb-4">

<label class="block font-medium">
Tanggal
</label>

<input
type="date"
name="tanggal"
value="{{ date('Y-m-d') }}"
class="w-full border rounded p-2">

</div>

<div class="mb-4">

<label class="block font-medium">
Jumlah
</label>

<input
type="number"
name="jumlah"
class="w-full border rounded p-2">

</div>

<div class="mb-4">

<label class="block font-medium">
Digunakan Oleh
</label>

<input
type="text"
name="digunakan_oleh"
class="w-full border rounded p-2">

</div>

<div class="mb-4">

<label class="block font-medium">
Keperluan
</label>

<textarea
name="keperluan"
class="w-full border rounded p-2"></textarea>

</div>

<button
class="bg-red-600 text-white px-5 py-2 rounded">

Simpan

</button>

<a href="{{ route('barang-keluar.index') }}"
class="bg-gray-600 text-white px-5 py-2 rounded">

Kembali

</a>

</form>

</div>

</x-app-layout>