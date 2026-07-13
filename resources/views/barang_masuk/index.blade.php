<x-app-layout>


<div class="p-6">

@if(session('success'))

<div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded mb-4">

{{ session('success') }}

</div>

@endif
    <!-- Card Filter -->
    <div class="bg-white rounded-lg shadow-md p-5 mb-6">

        <div class="flex justify-between items-center mb-4">

            <h2 class="text-xl font-bold text-gray-700">
                Data Barang Masuk
            </h2>

            <a href="{{ route('barang-masuk.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                + Tambah Barang Masuk
            </a>

        </div>

        <form method="GET" action="{{ route('barang-masuk.index') }}">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                <div class="md:col-span-3">

                    <input
                        type="text"
                        name="keyword"
                        value="{{ request('keyword') }}"
                        placeholder="Cari kode, nama, kategori, merk..."
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">

                </div>

                <div class="flex gap-2">

                    <button
                        type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-5 rounded-lg">

                        Cari

                    </button>

                    <a href="{{ route('barang.index') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg">

                        Reset

                    </a>

                </div>

            </div>

        </form>

    </div>


 <div class="bg-white rounded-lg shadow-md overflow-hidden">

        <table class="w-full">
<thead class="bg-blue-900 text-white ">

<tr>

<th class="border p-3">Tanggal</th>
<th class="border p-3">Barang</th>
<th class="border p-3">Jumlah</th>
<th class="border p-3">Supplier</th>
<th class="border p-3">Keterangan</th>
<th class="border p-3">Aksi</th>

</tr>

</thead>

<tbody>

@foreach($barangMasuk as $bm)

<tr class="hover:bg-gray-50">

<td class="border p-3">{{ $bm->tanggal }}</td>

<td class="border p-3">{{ $bm->barang->nama_barang }}</td>

<td class="border p-3">{{ $bm->jumlah }}</td>

<td class="border p-3">{{ $bm->supplier }}</td>

<td class="border p-3">{{ $bm->keterangan }}</td>

<td class="border p-3">

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