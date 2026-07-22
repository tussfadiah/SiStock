<x-app-layout>
    {{-- Hapus x-slot name="header" karena sudah ada di app.blade.php --}}

    <div class="p-4 md:p-6 lg:p-8 space-y-6">
        {{-- Statistik --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 md:gap-6">
            @php
                $stats = [
                    ['label' => 'Total Barang', 'value' => $totalBarang, 'color' => 'bg-[#0B2F64]'],
                    ['label' => 'Kategori', 'value' => $totalKategori, 'color' => 'bg-[#1e4a8a]'],
                    ['label' => 'Barang Masuk', 'value' => $totalBarangMasuk, 'color' => 'bg-[#3b6db5]'],
                    ['label' => 'Barang Keluar', 'value' => $totalBarangKeluar, 'color' => 'bg-[#5c8cd1]'],
                ];
            @endphp
            
            @foreach($stats as $stat)
                <div class="{{ $stat['color'] }} text-white rounded-xl shadow-lg p-6 transition-all duration-300 hover:scale-[1.02]">
                    <h3 class="text-sm font-medium opacity-80">{{ $stat['label'] }}</h3>
                    <p class="text-3xl md:text-4xl font-bold mt-2">{{ $stat['value'] }}</p>
                </div>
            @endforeach
        </div>

        {{-- Barang berdasarkan kategori --}}
        <div class="bg-white rounded-xl shadow-lg p-4 md:p-6">
            <h2 class="text-lg md:text-xl font-bold text-[#0B2F64] mb-6">Jumlah Barang Berdasarkan Kategori</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @foreach($kategori as $item)
                    <div class="border border-gray-100 rounded-lg p-4 text-center hover:border-blue-200 hover:bg-blue-50 transition-colors">
                        <h3 class="font-semibold text-gray-700 text-sm truncate">{{ $item->kategori }}</h3>
                        <p class="text-xl md:text-2xl font-bold text-blue-700 mt-2">{{ $item->total }}</p>
                        <small class="text-gray-400">Unit</small>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Barang terbaru --}}
        <div class="bg-white rounded-xl shadow-lg p-4 md:p-6">
            <h2 class="text-lg md:text-xl font-bold text-[#0B2F64] mb-5">Barang Terbaru</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm md:text-base">
                    <thead class="text-gray-600 bg-gray-50">
                        <tr>
                            <th class="p-4 text-left whitespace-nowrap">Kode</th>
                            <th class="p-4 text-left">Nama</th>
                            <th class="p-4 text-left">Kategori</th>
                            <th class="p-4 text-left">Lokasi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($barangTerbaru as $barang)
                            <tr class="hover:bg-blue-50/50 transition-colors">
                                <td class="p-4 font-medium text-gray-900">{{ $barang->kode_barang }}</td>
                                <td class="p-4 text-gray-700">{{ $barang->nama_barang }}</td>
                                <td class="p-4 text-gray-700">{{ $barang->kategori }}</td>
                                <td class="p-4 text-gray-700">{{ $barang->lokasi }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>