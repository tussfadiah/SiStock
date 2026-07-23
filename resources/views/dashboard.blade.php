<x-app-layout>


    {{-- Statistik --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 mb-6">

        <div class="bg-[#0B2F64] text-white rounded-xl shadow-lg p-5 sm:p-6">
            <h3 class="text-sm opacity-80">Total Barang</h3>
            <p class="text-3xl sm:text-4xl font-bold mt-2">{{ $totalBarang }}</p>
        </div>

        <div class="bg-[#1e4a8a] text-white rounded-xl shadow-lg p-5 sm:p-6">
            <h3 class="text-sm opacity-80">Kategori</h3>
            <p class="text-3xl sm:text-4xl font-bold mt-2">{{ $totalKategori }}</p>
        </div>

        <div class="bg-[#3b6db5] text-white rounded-xl shadow-lg p-5 sm:p-6">
            <h3 class="text-sm opacity-80">Barang Masuk</h3>
            <p class="text-3xl sm:text-4xl font-bold mt-2">{{ $totalBarangMasuk }}</p>
        </div>

        <div class="bg-[#5c8cd1] text-white rounded-xl shadow-lg p-5 sm:p-6">
            <h3 class="text-sm opacity-80">Barang Keluar</h3>
            <p class="text-3xl sm:text-4xl font-bold mt-2">{{ $totalBarangKeluar }}</p>
        </div>

    </div>

    {{-- Barang berdasarkan kategori --}}
    <div class="bg-white rounded-xl shadow-lg p-4 sm:p-6 mb-6">

        <h2 class="text-lg sm:text-xl font-bold text-[#0B2F64] mb-4 sm:mb-5">
            Jumlah Barang Berdasarkan Kategori
        </h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 sm:gap-4">

            @foreach($kategori as $item)

            <div class="border rounded-lg p-4 sm:p-5 text-center hover:shadow-lg transition-shadow">

                <h3 class="font-semibold text-gray-700 text-sm sm:text-base truncate">
                    {{ $item->kategori }}
                </h3>

                <p class="text-2xl sm:text-3xl font-bold text-blue-700 mt-2 sm:mt-3">
                    {{ $item->total }}
                </p>

                <small class="text-gray-500 text-xs">Unit</small>

            </div>

            @endforeach

        </div>

    </div>

    {{-- Barang terbaru --}}
    <div class="bg-white rounded-xl shadow-lg p-4 sm:p-6">

        <h2 class="text-lg sm:text-xl font-bold text-[#0B2F64] mb-4 sm:mb-5">
            Barang Terbaru
        </h2>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[550px] whitespace-nowrap">

                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="p-3 text-left text-xs sm:text-sm">Kode</th>
                        <th class="p-3 text-left text-xs sm:text-sm">Nama</th>
                        <th class="p-3 text-left text-xs sm:text-sm">Kategori</th>
                        <th class="p-3 text-left text-xs sm:text-sm">Lokasi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse($barangTerbaru as $barang)
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 text-xs sm:text-sm text-gray-800">{{ $barang->kode_barang }}</td>
                        <td class="p-3 text-xs sm:text-sm text-gray-800">{{ $barang->nama_barang }}</td>
                        <td class="p-3 text-xs sm:text-sm text-gray-800">{{ $barang->kategori }}</td>
                        <td class="p-3 text-xs sm:text-sm text-gray-800">{{ $barang->lokasi }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-500 text-sm">
                            Belum ada data barang terbaru.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

</div>

</x-app-layout>