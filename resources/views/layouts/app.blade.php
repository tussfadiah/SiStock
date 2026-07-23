<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div x-data="{ sidebarOpen: false }" class="min-h-screen bg-gray-100 flex">
        
        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 z-50">
            @include('layouts.navigation')
        </div>

        <!-- Konten Utama -->
        <div class="flex-1 flex flex-col min-w-0 md:ml-64 transition-all duration-300">
            
            <!-- Header Mobile Saja (Muncul hanya di HP untuk tombol toggle) -->
            <header class="bg-white shadow-sm sticky top-0 z-40 md:hidden flex items-center px-4 py-3">
                <button @click="sidebarOpen = !sidebarOpen" class="text-blue-900 focus:outline-none mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </header>

            <!-- PERBAIKAN: Tambahkan pt-6 atau md:pt-8 di sini agar ada jarak aman dari atas -->
            <main class="flex-1 p-4 md:p-6 lg:p-8 pt-6 md:pt-8">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>