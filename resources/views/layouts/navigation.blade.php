<nav
    x-cloak
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-blue-100 text-blue-900 shadow-xl transform transition-transform duration-300 ease-in-out md:translate-x-0 overflow-y-auto">

    <!-- Tombol Close -->
    <div class="md:hidden flex justify-end p-4">

        <button
            @click="sidebarOpen = false"
            type="button"
            class="rounded-full p-2 hover:bg-blue-200 transition">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"/>

            </svg>

        </button>

    </div>

    <!-- Logo -->
    <div class="p-6">

        <div class="flex justify-center">

            <a href="{{ route('dashboard') }}">

                <img
                    src="{{ asset('logosistock.png') }}"
                    class="h-20 w-auto"
                    alt="Logo">

            </a>

        </div>

    </div>

    <!-- Menu -->
    <ul class="space-y-2 px-4 pb-6">

        <li>
            <a
                href="{{ route('dashboard') }}"
                class="block rounded p-3 transition-colors {{ request()->routeIs('dashboard') ? 'bg-blue-200 font-bold' : 'hover:bg-blue-200' }}">
                Dashboard
            </a>
        </li>

        <li class="mt-5 px-3 text-xs uppercase tracking-wider font-bold text-blue-400">
            Master Data
        </li>

        <li>
            <a
                href="{{ route('barang.index') }}"
                class="block rounded p-3 transition-colors {{ request()->routeIs('barang.*') ? 'bg-blue-200 font-bold' : 'hover:bg-blue-200' }}">
                Data Barang
            </a>
        </li>

        <li class="mt-5 px-3 text-xs uppercase tracking-wider font-bold text-blue-400">
            Transaksi
        </li>

        <li>
            <a
                href="{{ route('barang-masuk.index') }}"
                class="block rounded p-3 transition-colors {{ request()->routeIs('barang-masuk.*') ? 'bg-blue-200 font-bold' : 'hover:bg-blue-200' }}">
                Barang Masuk
            </a>
        </li>

        <li>
            <a
                href="{{ route('barang-keluar.index') }}"
                class="block rounded p-3 transition-colors {{ request()->routeIs('barang-keluar.*') ? 'bg-blue-200 font-bold' : 'hover:bg-blue-200' }}">
                Barang Keluar
            </a>
        </li>

        <li class="mt-5 px-3 text-xs uppercase tracking-wider font-bold text-blue-400">
            Akun
        </li>

        <li>
            <a
                href="{{ route('profile.edit') }}"
                class="block rounded p-3 transition-colors {{ request()->routeIs('profile.edit') ? 'bg-blue-200 font-bold' : 'hover:bg-blue-200' }}">
                Profile
            </a>
        </li>

        <li>

            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <button
                    type="submit"
                    class="w-full rounded p-3 text-left transition hover:bg-red-600 hover:text-white">

                    Logout

                </button>

            </form>

        </li>

    </ul>

</nav>

<!-- Overlay -->
<div
    x-cloak
    x-show="sidebarOpen"
    x-transition.opacity
    @click="sidebarOpen = false"
    class="fixed inset-0 z-40 bg-black/50 md:hidden">
</div>