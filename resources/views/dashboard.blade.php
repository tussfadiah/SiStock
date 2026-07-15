<x-app-layout>

<div class="p-6">

    {{-- Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-6">

        <div class="bg-[#0B2F64] text-white rounded-xl shadow-lg p-6">
            <h3 class="text-sm opacity-80">Total Barang</h3>
            <p class="text-4xl font-bold mt-2">{{ $totalBarang }}</p>
        </div>

        <div class="bg-[#1e4a8a] text-white rounded-xl shadow-lg p-6">
            <h3 class="text-sm opacity-80">Kategori</h3>
            <p class="text-4xl font-bold mt-2">{{ $totalKategori }}</p>
        </div>

        <div class="bg-[#3b6db5] text-white rounded-xl shadow-lg p-6">
            <h3 class="text-sm opacity-80">Lokasi</h3>
            <p class="text-4xl font-bold mt-2">{{ $totalLokasi }}</p>
        </div>

        <div class="bg-[#5c8cd1] text-white rounded-xl shadow-lg p-6">
            <h3 class="text-sm opacity-80">Merk</h3>
            <p class="text-4xl font-bold mt-2">{{ $totalMerk }}</p>
        </div>

    </div>

    {{-- Barang berdasarkan kategori --}}
    <div class="bg-white rounded-xl shadow-lg p-6 mb-6">

        <h2 class="text-xl font-bold text-[#0B2F64] mb-5">
            Jumlah Barang Berdasarkan Kategori
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

            @foreach($kategori as $item)

            <div class="border rounded-lg p-5 text-center hover:shadow-lg">

                <h3 class="font-semibold text-gray-700">
                    {{ $item->kategori }}
                </h3>

                <p class="text-3xl font-bold text-blue-700 mt-3">
                    {{ $item->total }}
                </p>

                <small>Unit</small>

            </div>

            @endforeach

        </div>

    </div>

    {{-- Barang terbaru --}}
    <div class="bg-white rounded-xl shadow-lg p-6">

        <h2 class="text-xl font-bold text-[#0B2F64] mb-5">
            Barang Terbaru
        </h2>

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-3 text-left">Kode</th>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-left">Kategori</th>
                    <th class="p-3 text-left">Lokasi</th>

                </tr>

            </thead>

            <tbody>

                @foreach($barangTerbaru as $barang)

                <tr class="border-b">

                    <td class="p-3">{{ $barang->kode_barang }}</td>
                    <td class="p-3">{{ $barang->nama_barang }}</td>
                    <td class="p-3">{{ $barang->kategori }}</td>
                    <td class="p-3">{{ $barang->lokasi }}</td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

</x-app-layout>