<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            Dashboard SiStock TVRI Sumsel
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-6">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <div class="bg-blue-500 text-white rounded-lg p-6 shadow">
                    <h3 class="text-lg font-bold">Total Barang</h3>
                    <p class="text-4xl font-bold mt-3">
                        {{ \App\Models\Barang::count() }}
                    </p>
                </div>

                <div class="bg-green-500 text-white rounded-lg p-6 shadow">
                    <h3 class="text-lg font-bold">Barang Masuk</h3>
                    <p class="text-4xl font-bold mt-3">
                        {{ \App\Models\BarangMasuk::count() }}
                    </p>
                </div>

                <div class="bg-red-500 text-white rounded-lg p-6 shadow">
                    <h3 class="text-lg font-bold">Barang Keluar</h3>
                    <p class="text-4xl font-bold mt-3">
                        {{ \App\Models\BarangKeluar::count() }}
                    </p>
                </div>

                <div class="bg-yellow-500 text-white rounded-lg p-6 shadow">
                    <h3 class="text-lg font-bold">Stok Menipis</h3>
                    <p class="text-4xl font-bold mt-3">
                        {{ \App\Models\Barang::where('stok','<=',5)->count() }}
                    </p>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>