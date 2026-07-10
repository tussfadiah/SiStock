<x-app-layout>

<x-slot name="header">

<h2 class="text-xl font-bold">

Barang Masuk

</h2>

</x-slot>

<div class="p-6">

@if(session('success'))

<div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded mb-4">

{{ session('success') }}

</div>

@endif

<a href="{{ route('barang-masuk.create') }}"
class="bg-blue-600 text-white px-4 py-2 rounded">

Tambah Barang Masuk

</a>

<table class="w-full mt-5 border">

<thead class="bg-gray-200">

<tr>

<th class="border p-2">Tanggal</th>

<th class="border p-2">Barang</th>

<th class="border p-2">Jumlah</th>

<th class="border p-2">Supplier</th>

<th class="border p-2">Keterangan</th>

</tr>

</thead>

<tbody>

@foreach($barangMasuk as $bm)

<tr>

<td class="border p-2">

{{ $bm->tanggal }}

</td>

<td class="border p-2">

{{ $bm->barang->nama_barang }}

</td>

<td class="border p-2">

{{ $bm->jumlah }}

</td>

<td class="border p-2">

{{ $bm->supplier }}

</td>

<td class="border p-2">

{{ $bm->keterangan }}

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</x-app-layout>