<x-app-layout>


<div class="p-6">

@if(session('success'))

<div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded mb-4">

{{ session('success') }}

</div>

@endif

<a href="{{ route('barang-keluar.create') }}"
class="bg-red-600 text-white px-4 py-2 rounded">

Tambah Barang Keluar

</a>

<table class="w-full mt-5 border">

<thead class="bg-gray-100">

<tr>

<th class="border p-2">Tanggal</th>

<th class="border p-2">Barang</th>

<th class="border p-2">Jumlah</th>

<th class="border p-2">Digunakan Oleh</th>

<th class="border p-2">Keperluan</th>

<th class="border p-2">Aksi</th>

</tr>

</thead>

<tbody>

@forelse($barangKeluar as $bk)

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

<td class="border p-2">

<a
href="{{ route('barang-keluar.edit',$bk->id) }}"
class="text-blue-600">

Edit

</a>

|

<form
action="{{ route('barang-keluar.destroy',$bk->id) }}"
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

@empty

<tr>

<td colspan="6"
class="text-center p-4">

Belum ada data.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</x-app-layout>