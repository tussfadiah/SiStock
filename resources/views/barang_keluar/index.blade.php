<x-app-layout>

<x-slot name="header">

<h2 class="text-xl font-bold">

Barang Keluar

</h2>

</x-slot>

<div class="p-6">

<a href="{{ route('barang-keluar.create') }}"
class="bg-red-600 text-white px-4 py-2 rounded">

Tambah Barang Keluar

</a>

<table class="w-full mt-5 border">

<thead class="bg-gray-200">

<tr>

<th class="border p-2">Tanggal</th>
<th class="border p-2">Barang</th>
<th class="border p-2">Jumlah</th>
<th class="border p-2">Digunakan Oleh</th>
<th class="border p-2">Keperluan</th>

</tr>

</thead>

<tbody>

@foreach($barangKeluar as $bk)

<tr>

<td class="border p-2">

{{ $bk->tanggal }}

</td>

<td class="border p-2">

{{ $bk->barang->nama_barang }}

</td>

<td class="border p-2">

{{ $bk->jumlah }}

</td>

<td class="border p-2">

{{ $bk->digunakan_oleh }}

</td>

<td class="border p-2">

{{ $bk->keperluan }}

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</x-app-layout>