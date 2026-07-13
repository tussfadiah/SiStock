<x-app-layout>

    <div class=" background-color:blue; p-6">
        <!-- Statistik Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-6">
            @php
                $cards = [
                    ['title' => 'Total Barang', 'value' => $totalBarang, 'color' => 'bg-[#0B2F64]'],
                    ['title' => 'Barang Masuk', 'value' => $totalMasuk, 'color' => 'bg-[#1e4a8a]'],
                    ['title' => 'Barang Keluar', 'value' => $totalKeluar, 'color' => 'bg-[#3b6db5]'],
                    ['title' => 'Total Stok', 'value' => $totalStok, 'color' => 'bg-[#5c8cd1]'],
                ];
            @endphp

            @foreach($cards as $card)
            <div class="{{ $card['color'] }} text-white rounded-xl shadow-lg p-6">
                <h3 class="text-sm font-medium opacity-80">{{ $card['title'] }}</h3>
                <p class="text-4xl font-bold mt-2">{{ $card['value'] }}</p>
            </div>
            @endforeach
        </div>

        <!-- Tabel Stok Menipis -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <h3 class="font-bold text-lg mb-4 text-[#0B2F64] border-b pb-2">
                Barang Stok Menipis
            </h3>
            <table class="w-full text-left">
                <thead>
                    <tr class="text-gray-500 uppercase text-xs tracking-wider">
                        <th class="pb-3">Nama Barang</th>
                        <th class="pb-3">Sisa Stok</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($stokMenipis as $barang)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 text-gray-700">{{ $barang->nama_barang }}</td>
                        <td class="py-3 text-red-600 font-bold">
                            {{ $barang->stok }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>