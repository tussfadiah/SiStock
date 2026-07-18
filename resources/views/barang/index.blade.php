<x-app-layout>

    <div class="p-6">

        @if(session('success'))
            <div class="mb-6 rounded-lg border border-green-400 bg-green-100 p-3 text-green-700">
                {{ session('success') }}
            </div>
        @endif

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
                            class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg">
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
        <div class="bg-white rounded-lg shadow-md overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-blue-900 text-white">

                    <tr class="text-center">

                        <th class="border p-3">Kode</th>
                        <th class="border p-3">Nama</th>
                        <th class="border p-3">Kategori</th>
                        <th class="border p-3">Merk</th>
                        <th class="border p-3">Foto</th>
                        <th class="border p-3">Barcode</th>
                        <th class="border p-3">Lokasi</th>
                        <th class="border p-3">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($barang as $b)

                        <tr class="hover:bg-gray-50 text-center">

                            <td class="border p-3">{{ $b->kode_barang }}</td>

                            <td class="border p-3">
                                {{ $b->nama_barang }}
                            </td>

                            <td class="border p-3">
                                {{ $b->kategori }}
                            </td>

                            <td class="border p-3">
                                {{ $b->merk }}
                            </td>

                            <!-- Foto -->
                            <td class="border p-3">

                                @if($b->foto)

                                    <img
                                        src="{{ asset('storage/'.$b->foto) }}"
                                        alt="Foto Barang"
                                        class="mx-auto h-20 w-20 rounded-lg border object-cover">

                                @else

                                    <span class="text-gray-500 text-sm">
                                        Tidak ada foto
                                    </span>

                                @endif

                            </td>

                            <!-- Barcode -->
                            <td class="border p-3">
   @if($b->kode_barang)
    {!! DNS1D::getBarcodeHTML($b->kode_barang,'C128',2,50) !!}
@else
    -
@endif
</td>

                            <td class="border p-3">
                                {{ $b->lokasi }}
                            </td>

                            <!-- Aksi -->
                            <td class="border p-3">

                                <div class="flex flex-col gap-2 items-center">

                                    <a href="{{ route('barang.barcode', $b->id) }}"
                                        class="w-36 inline-flex justify-center items-center gap-2 rounded-lg bg-green-600 px-3 py-2 text-sm text-white hover:bg-green-700">

                                        <i class="fas fa-barcode"></i>
                                        Barcode

                                    </a>

                                    <a href="{{ route('barang.edit', $b->id) }}"
                                        class="w-36 inline-flex justify-center items-center gap-2 rounded-lg bg-blue-600 px-3 py-2 text-sm text-white hover:bg-blue-700">

                                        <i class="fas fa-pen"></i>
                                        Edit

                                    </a>

                                    <form
                                        action="{{ route('barang.destroy', $b->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Hapus data barang ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="w-36 inline-flex justify-center items-center gap-2 rounded-lg bg-red-600 px-3 py-2 text-sm text-white hover:bg-red-700">

                                            <i class="fas fa-trash"></i>
                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8" class="border p-6 text-center text-gray-500">
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