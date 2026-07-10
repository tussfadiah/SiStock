<x-app-layout>

<x-slot name="header">
    <h2 class="text-xl font-bold">
        Barang Keluar
    </h2>
</x-slot>

<div class="p-6">

@if(session('error'))

<div class="bg-red-100 text-red-700 p-3 rounded mb-3">

{{ session('error') }}

</div>

@endif

<form action="{{ route('barang-keluar.store') }}" method="POST">

@csrf

<div class="mb-4">

<label>Barang</label>

<select name="barang_id" class="border rounded w-full p-2">

@foreach($barang as $b)

<option value="{{ $b->id }}">

{{ $b->nama_barang }}

(Stok : {{ $b->stok }})

</option>

@endforeach

</select>

</div>

<div class="mb-4">

<label>Tanggal</label>

<input
type="date"
name="tanggal"
class="border rounded w-full p-2">

</div>

<div class="mb-4">

<label>Jumlah</label>

<input
type="number"
name="jumlah"
class="border rounded w-full p-2">

</div>

<div class="mb-4">

<label>Digunakan Oleh</label>

<input
type="text"
name="digunakan_oleh"
class="border rounded w-full p-2">

</div>

<div class="mb-4">

<label>Keperluan</label>

<textarea
name="keperluan"
class="border rounded w-full p-2"></textarea>

</div>

<button class="bg-red-600 text-white px-4 py-2 rounded">

Simpan

</button>

</form>

</div>

</x-app-layout>