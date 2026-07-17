<x-app-layout>

<div class="p-6">

    @if(session('success'))
        <div class="mb-4 rounded-lg border border-green-400 bg-green-100 p-3 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <!-- Header -->
    <div class="bg-white rounded-lg shadow-md p-5 mb-6">

        <div class="flex justify-between items-center mb-4">

            <h2 class="text-xl font-bold text-gray-700">
                Data Barang Keluar
            </h2>
        </div>

        <form method="GET" action="{{ route('barang-keluar.index') }}">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                <div class="md:col-span-3">

                    <input
                        type="text"
                        name="keyword"
                        value="{{ request('keyword') }}"
                        placeholder="Cari kode, nama barang, pengguna..."
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">

                </div>

                <div class="flex gap-2">

                    <button
                        type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg">

                        Cari

                    </button>

                    <a href="{{ route('barang-keluar.index') }}"
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

                                    <i class="fas fa-trash"></i>
                                    Hapus

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7" class="text-center p-6 text-gray-500">

                        Belum ada data barang keluar.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</x-app-layout>