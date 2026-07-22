<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-100">

<div
    x-data="{ sidebarOpen: false }"
    :class="{ 'overflow-hidden': sidebarOpen }"
    class="min-h-screen flex">

    {{-- Sidebar --}}
    @include('layouts.navigation')

    {{-- Content --}}
    <div
        class="flex-1 flex flex-col transition-all duration-300 md:ml-64">

        {{-- Header Mobile --}}
        <header
            class="sticky top-0 z-30 bg-white shadow md:hidden">

            <div class="flex items-center justify-between px-4 py-4">

                <button
                    type="button"
                    @click="sidebarOpen = true"
                    class="rounded-md p-2 text-blue-900 hover:bg-gray-100">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-7 h-7"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>

                    </svg>

                </button>

                {{-- Spacer supaya judul tetap di tengah --}}
                <div class="w-7"></div>

            </div>

        </header>

        {{-- Main --}}
        <main class="flex-1 p-4 md:p-6 lg:p-8">

            {{ $slot }}

        </main>

    </div>

</div>

</body>

</html>