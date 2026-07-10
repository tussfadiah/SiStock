<x-app-layout>

<x-slot name="header">

<h2 class="text-2xl font-bold">

Dashboard SiStock TVRI Sumsel

</h2>

</x-slot>

<div class="p-6">

<div class="grid grid-cols-1 md:grid-cols-4 gap-5">

<div class="bg-blue-500 text-white rounded-lg shadow p-5">

<h3>Total Barang</h3>

<p class="text-4xl font-bold">

{{ $totalBarang }}

</p>

</div>

<div class="bg-green-500 text-white rounded-lg shadow p-5">

<h3>Barang Masuk</h3>

<p class="text-4xl font-bold">

{{$totalMasuk}}

</p>

</div>

<div class="bg-red-500 text-white rounded-lg shadow p-5">

<h3>Barang Keluar</h3>

<p class="text-4xl font-bold">

{{ $totalKeluar }}

</p>

</div>

<div class="bg-yellow-500 text-white rounded-lg shadow p-5">

<h3>Total Stok</h3>

<p class="text-4xl font-bold">

{{ $totalStok }}

</p>

</div>

</div>

<br>

<div class="grid grid-cols-2 gap-6">

<div class="bg-white shadow rounded p-4">

<h3 class="font-bold text-lg mb-3">

Barang Stok Menipis

</h3>

<table class="w-full">

<tr>

<th>Nama</th>

<th>Stok</th>

</tr>

@foreach($stokMenipis as $barang)

<tr>

<td>{{ $barang->nama_barang }}</td>

<td class="text-red-600 font-bold">

{{ $barang->stok }}

</td>

</tr>

@endforeach

</table>

</div>

</div>

</div>

</x-app-layout>