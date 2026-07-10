<x-app-layout>

<x-slot name="header">
    <h2 class="text-xl font-bold">
        Data Barang
    </h2>
</x-slot>
@if(session('success'))

<div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded mb-4">

{{ session('success') }}

</div>

@endif

<div class="p-6">

    <a href="{{ route('barang.create') }}"
        class="bg-blue-600 text-white px-4 py-2 rounded">

        Tambah Barang

    </a>

    <table class="w-full mt-5 border">

        <thead class="bg-gray-200">

        <tr>

            <th class="border p-2">Kode</th>
            <th class="border p-2">Nama</th>
            <th class="border p-2">Kategori</th>
            <th class="border p-2">Stok</th>
            <th class="border p-2">Satuan</th>
            <th class="border p-2">Lokasi</th>
            <th class="border p-2">Aksi</th>

        </tr>

        </thead>

        <tbody>

        @foreach($barang as $b)

        <tr>

            <td class="border p-2">{{ $b->kode_barang }}</td>

            <td class="border p-2">{{ $b->nama_barang }}</td>

            <td class="border p-2">{{ $b->kategori }}</td>

            <td class="border p-2">{{ $b->stok }}</td>

            <td class="border p-2">{{ $b->satuan }}</td>

            <td class="border p-2">{{ $b->lokasi }}</td>

            <td class="border p-2">

                <a href="{{ route('barang.edit',$b->id) }}"
                    class="text-blue-600">

                    Edit

                </a>

                |

                <form
                    action="{{ route('barang.destroy',$b->id) }}"
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