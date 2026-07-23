<x-app-layout>


        <!-- Header -->
        <div class="bg-white rounded-lg shadow-md p-5 mb-6">

            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">

                <h2 class="text-2xl font-bold text-gray-700">
                    Rekap Data Barang
                </h2>

                <div class="flex gap-3">

                    <!-- Download PDF -->
                    <a href="{{ route('laporan.pdf') }}"
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition">
                        Download PDF
                    </a>


                </div>

            </div>

        </div>

        <!-- Tabel -->
        <div class="bg-white rounded-lg shadow-md overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-blue-900 text-white">

                    <tr class="text-center">

                        <th class="border p-3">Kode Barang</th>
                        <th class="border p-3">Nama Barang</th>
                        <th class="border p-3">Kategori</th>
                        <th class="border p-3">Merk</th>
                        <th class="border p-3">Foto</th>
                        <th class="border p-3">Lokasi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($barang as $b)

                        <tr class="text-center hover:bg-gray-50">

                            <td class="border p-3">{{ $b->kode_barang }}</td>
                            <td class="border p-3">{{ $b->nama_barang }}</td>
                            <td class="border p-3">{{ $b->kategori }}</td>
                            <td class="border p-3">{{ $b->merk }}</td>
                            <td class="border p-3">
    @if($b->foto)
        <img 
            src="{{ asset('storage/' . $b->foto) }}" 
            class="w-16 h-16 rounded-lg object-cover mx-auto"
            alt="Foto {{ $b->nama_barang }}"
        >
    @else
        <span class="text-gray-400">Tidak ada foto</span>
    @endif
</td>
                            <td class="border p-3">{{ $b->lokasi }}</td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="border p-6 text-center text-gray-500">
                                Tidak ada data barang.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <!-- Pagination -->
        <div class="mt-5">
            {{ $barang->links() }}
        </div>

    </div>

</x-app-layout>