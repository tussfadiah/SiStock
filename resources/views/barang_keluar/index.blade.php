<x-app-layout>


    @if(session('success'))
        <div class="mb-6 rounded-lg border border-green-400 bg-green-100 p-3 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <!-- Header -->
    <div class="bg-white rounded-lg shadow-md p-4 sm:p-5 mb-6">

        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mb-4">
            <h2 class="text-xl font-bold text-gray-700">
                Data Barang Keluar
            </h2>
        </div>

        <form method="GET" action="{{ route('barang-keluar.index') }}">

            <div class="flex flex-col lg:flex-row lg:items-center gap-3">

                <!-- Input -->
                <div class="flex-1">
                    <input
                        type="text"
                        name="keyword"
                        value="{{ request('keyword') }}"
                        placeholder="Cari kode, nama barang, pengguna..."
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Tombol -->
                <div class="flex gap-2 shrink-0">
                    <button
                        type="submit"
                        class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">
                        Cari
                    </button>

                    <a href="{{ route('barang-keluar.index') }}"
                        class="px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg text-center">
                        Reset
                    </a>
                </div>

            </div>

        </form>

    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">

            <table class="min-w-full whitespace-nowrap">

                <thead class="bg-blue-900 text-white">
                    <tr class="text-center">
                        <th class="border p-3">No</th>
                        <th class="border p-3">Tanggal</th>
                        <th class="border p-3">Kode Barang</th>
                        <th class="border p-3">Nama Barang</th>
                        <th class="border p-3">Koordinator</th>
                        <th class="border p-3">Keperluan</th>
                        <th class="border p-3">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($barangKeluar as $bk)
                    <tr class="hover:bg-gray-50 text-center">

                        <td class="border p-3">
                            {{ $loop->iteration }}
                        </td>

                        <td class="border p-3">
                            {{ \Carbon\Carbon::parse($bk->tanggal)->format('d-m-Y') }}
                        </td>

                        <td class="border p-3">
                            {{ $bk->kode_barang }}
                        </td>

                        <td class="border p-3">
                            {{ $bk->nama_barang }}
                        </td>

                        <td class="border p-3">
                            {{ $bk->digunakan_oleh }}
                        </td>

                        <td class="border p-3">
                            {{ $bk->keperluan }}
                        </td>

                        <td class="border p-3">
                            <div class="flex justify-center gap-2">
                                <form
                                    action="{{ route('barang-keluar.destroy',$bk->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg text-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="border p-6 text-center text-gray-500">
                            Belum ada data barang keluar.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>

</x-app-layout>