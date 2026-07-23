<nav :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
     class="bg-blue-100 text-blue-900 min-h-screen w-64 fixed inset-y-0 left-0 z-50 transform transition-transform duration-300 ease-in-out md:translate-x-0">

    <div class="p-6">
        <div class="shrink-0 flex justify-center">
            <a href="{{ route('dashboard') }}">
                <img class="h-20 w-auto" src="{{ asset('logosistock.png') }}" alt="Logo">
            </a>
        </div>
    </div>

    <ul class="space-y-2 px-4">

        <!-- Dashboard -->
        <li>
            <a href="{{ route('dashboard') }}"
                class="block p-3 rounded hover:bg-gray-300 {{ request()->routeIs('dashboard') ? 'bg-gray-200 font-bold' : '' }}">
                Dashboard
            </a>
        </li>

        @if(auth()->user()->role == 'teknisi')

            <!-- MASTER DATA -->
            <li class="mt-5 text-gray-400 uppercase text-sm font-semibold px-3">
                Master Data
            </li>

            <li>
                <a href="{{ route('barang.index') }}"
                    class="block p-3 rounded hover:bg-gray-300 {{ request()->routeIs('barang.*') ? 'bg-gray-200 font-bold' : '' }}">
                    Data Barang
                </a>
            </li>

            <!-- TRANSAKSI -->
            <li class="mt-5 text-gray-400 uppercase text-sm font-semibold px-3">
                Transaksi
            </li>

            <li>
                <a href="{{ route('barang-masuk.index') }}"
                    class="block p-3 rounded hover:bg-gray-300 {{ request()->routeIs('barang-masuk.*') ? 'bg-gray-200 font-bold' : '' }}">
                    Barang Masuk
                </a>
            </li>

            <li>
                <a href="{{ route('barang-keluar.index') }}"
                    class="block p-3 rounded hover:bg-gray-300 {{ request()->routeIs('barang-keluar.*') ? 'bg-gray-200 font-bold' : '' }}">
                    Barang Keluar
                </a>
            </li>

        @else

            <!-- LAPORAN -->
            <li class="mt-5 text-gray-400 uppercase text-sm font-semibold px-3">
                Laporan
            </li>

            <li>
                <a href="{{ route('laporan.index') }}"
                    class="block p-3 rounded hover:bg-gray-300 {{ request()->routeIs('laporan.*') ? 'bg-gray-200 font-bold' : '' }}">
                    Rekap Barang
                </a>
            </li>

        @endif

        <!-- AKUN -->
        <li class="mt-5 text-gray-400 uppercase text-sm font-semibold px-3">
            Akun
        </li>

        <li>
            <a href="{{ route('profile.edit') }}"
                class="block p-3 rounded hover:bg-gray-300 {{ request()->routeIs('profile.edit') ? 'bg-gray-200 font-bold' : '' }}">
                Profile
            </a>
        </li>

        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left p-3 rounded hover:bg-red-600 hover:text-white transition-colors">
                    Logout
                </button>
            </form>
        </li>

    </ul>
</nav>