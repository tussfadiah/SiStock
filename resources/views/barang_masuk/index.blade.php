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
<thead>

<tr>

<th>Tanggal</th>
<th>Barang</th>
<th>Jumlah</th>
<th>Supplier</th>
<th>Keterangan</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

@foreach($barangMasuk as $bm)

<tr>

<td>{{ $bm->tanggal }}</td>

<td>{{ $bm->barang->nama_barang }}</td>

<td>{{ $bm->jumlah }}</td>

<td>{{ $bm->supplier }}</td>

<td>{{ $bm->keterangan }}</td>

<td>

<a href="{{ route('barang-masuk.edit',$bm->id) }}"
class="text-blue-600">

Edit

</a>

|

<form
action="{{ route('barang-masuk.destroy',$bm->id) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button
onclick="return confirm('Hapus data?')">

Hapus

</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</x-app-layout>