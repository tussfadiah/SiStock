<x-app-layout>

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded mb-4">
    {{ session('success') }}
</div>
@endif

<div class="p-6">

    <!-- Card Filter -->
    <div class="bg-white rounded-lg shadow-md p-5 mb-6">

        <div class="flex justify-between items-center mb-4">

            <h2 class="text-xl font-bold text-gray-700">
                Data Barang
            </h2>

            <a href="{{ route('barang.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                + Tambah Barang
            </a>

        </div>

        <form method="GET" action="{{ route('barang.index') }}">

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

    <!-- Tabel -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">

        <table class="w-full">

            <thead class="bg-blue-900 text-white ">

            <tr>

                <th class="border p-3">Kode</th>
                <th class="border p-3">Nama</th>
                <th class="border p-3">Kategori</th>
                <th class="border p-3">Stok</th>
                <th class="border p-3">Satuan</th>
                <th class="border p-3">Lokasi</th>
                <th class="border p-3">Aksi</th>

            </tr>

            </thead>

            <tbody>

            @forelse($barang as $b)

            <tr class="hover:bg-gray-50">

                <td class="border p-3">{{ $b->kode_barang }}</td>
                <td class="border p-3">{{ $b->nama_barang }}</td>
                <td class="border p-3">{{ $b->kategori }}</td>
                <td class="border p-3">{{ $b->stok }}</td>
                <td class="border p-3">{{ $b->satuan }}</td>
                <td class="border p-3">{{ $b->lokasi }}</td>

                <td class="border p-3">

                    <a href="{{ route('barang.edit',$b->id) }}"
                       class="text-blue-600 hover:underline">

                        Edit

                    </a>

                    |

                    <form action="{{ route('barang.destroy',$b->id) }}"
                          method="POST"
                          class="inline">

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Hapus data?')"
                            class="text-red-600 hover:underline">

                            Hapus

                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="7" class="text-center p-4 text-gray-500">

                    Data barang tidak ditemukan.

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-5">

        {{ $barang->links() }}

    </div>

</div>

</x-app-layout>