

      <nav class="bg-blue-100 text-blue min-h-screen w-64 fixed">

    <div class="p-6">
          <div class="shrink-0 flex justify-center">
                    <a href="{{ route('dashboard') }}">
                        <img class="h-20 w-auto " src="{{ asset('logosistock.png') }}" alt="Logo">                    </a>
                </div> 

    </div>

    <ul class="space-y-2 px-4">

        <li>
            <a href="{{ route('dashboard') }}"
               class="block p-3 rounded hover:bg-gray-300">
                Dashboard
            </a>
        </li>

        <li class="mt-5 text-gray-400 uppercase text-sm">
            Master Data
        </li>

        <li>
            <a href="{{ route('barang.index') }}"
               class="block p-3 rounded hover:bg-gray-300">
                Data Barang
            </a>
        </li>

        <li class="mt-5 text-gray-400 uppercase text-sm">
            Transaksi
        </li>

        <li>
            <a href="{{ route('barang-masuk.index') }}"
               class="block p-3 rounded hover:bg-gray-300">
                Barang Masuk
            </a>
        </li>

        <li>
            <a href="{{ route('barang-keluar.index') }}"
               class="block p-3 rounded hover:bg-gray-300">
                Barang Keluar
            </a>
        </li>

        <li class="mt-5 text-gray-400 uppercase text-sm">
            Akun
        </li>

        <li>
            <a href="{{ route('profile.edit') }}"
               class="block p-3 rounded hover:bg-gray-300">
                Profile
            </a>
        </li>

        <li>

            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <button
                    class="w-full text-left p-3 rounded hover:bg-red-600">

                     Logout

                </button>

            </form>

        </li>

    </ul>

</nav>