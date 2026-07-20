<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <!-- Tambahkan x-data untuk mengelola status sidebar -->
    <div x-data="{ sidebarOpen: false }" class="min-h-screen bg-gray-100 flex">
        
        <!-- Sidebar -->
        @include('layouts.navigation')

        <!-- Area Konten Utama -->
        <!-- Tambahkan md:ml-64 agar konten bergeser saat sidebar muncul di desktop -->
        <div class="flex-1 flex flex-col min-w-0 transition-all duration-300">
            
            <!-- Header (Mobile Toggle Button) -->
            <header class="bg-white shadow-sm px-4 py-3 flex items-center md:hidden">
                <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                <span class="ml-4 font-semibold">{{ config('app.name', 'Laravel') }}</span>
            </header>

            <!-- Page Heading (Opsional) -->
            @isset($header)
                <header class="bg-white shadow hidden md:block">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-1 p-4 md:p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>