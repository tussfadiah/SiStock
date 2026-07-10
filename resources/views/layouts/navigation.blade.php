

      <nav class="bg-gray-900 text-white min-h-screen w-64 fixed">

    <div class="p-6">
          <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img class="block h-10 w-auto" src="{{ asset('logosistock.png') }}" alt="Logo">                    </a>
                </div> 

        <h1 class="text-2xl font-bold">
            SiStock TVRI
        </h1>

    </div>

    <ul class="space-y-2 px-4">

        <li>
            <a href="{{ route('dashboard') }}"
               class="block p-3 rounded hover:bg-gray-700">
                🏠 Dashboard
            </a>
        </li>

        <li class="mt-5 text-gray-400 uppercase text-sm">
            Master Data
        </li>

        <li>
            <a href="{{ route('barang.index') }}"
               class="block p-3 rounded hover:bg-gray-700">
                📦 Data Barang
            </a>
        </li>

        <li class="mt-5 text-gray-400 uppercase text-sm">
            Transaksi
        </li>

        <li>
            <a href="{{ route('barang-masuk.index') }}"
               class="block p-3 rounded hover:bg-gray-700">
                📥 Barang Masuk
            </a>
        </li>

        <li>
            <a href="{{ route('barang-keluar.index') }}"
               class="block p-3 rounded hover:bg-gray-700">
                📤 Barang Keluar
            </a>
        </li>

        <li class="mt-5 text-gray-400 uppercase text-sm">
            Akun
        </li>

        <li>
            <a href="{{ route('profile.edit') }}"
               class="block p-3 rounded hover:bg-gray-700">
                👤 Profile
            </a>
        </li>

        <li>

            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <button
                    class="w-full text-left p-3 rounded hover:bg-red-600">

                    🚪 Logout

                </button>

            </form>

        </li>

    </ul>

</nav>