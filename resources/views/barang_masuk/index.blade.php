<x-app-layout>

<div class="p-6">

    @if(session('success'))
        <div class="mb-6 rounded-lg border border-green-400 bg-green-100 p-3 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <!-- Header -->
    <div class="bg-white rounded-lg shadow-md p-5 mb-6">

        <div class="flex justify-between items-center mb-4">

            <h2 class="text-xl font-bold text-gray-700">
                Data Barang Masuk
            </h2>

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
                        class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg">
                        Cari
                    </button>

                    <a href="{{ route('barang-masuk.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg">
                        Reset
                    </a>

                </div>

            </div>

        </form>

    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow-md overflow-x-auto">

        <table class="min-w-full">

            <thead class="bg-blue-900 text-white">

                <tr class="text-center">

                    <th class="border p-3">No</th>
                    <th class="border p-3">Tanggal Masuk</th>
                    <th class="border p-3">Kode Barang</th>
                    <th class="border p-3">Nama Barang</th>
                    <th class="border p-3">Kategori</th>
                    <th class="border p-3">Lokasi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($barangMasuk as $bm)

                <tr class="hover:bg-gray-50 text-center">

                    <td class="border p-3">
                        {{ $loop->iteration }}
                    </td>

                    <td class="border p-3">
                        {{ $bm->created_at->format('d-m-Y') }}
                    </td>

                    <td class="border p-3">
                        {{ $bm->kode_barang }}
                    </td>

                    <td class="border p-3">
                        {{ $bm->nama_barang }}
                    </td>

                    <td class="border p-3">
                        {{ $bm->kategori }}
                    </td>

                    <td class="border p-3">
                        {{ $bm->lokasi }}
                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="8" class="border p-6 text-center text-gray-500">

                        Belum ada data barang masuk.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-5">
        {{ $barangMasuk->links() }}
    </div>

</div>

</x-app-layout>