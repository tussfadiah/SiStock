<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans text-gray-900 antialiased bg-[#0B2F64]">
        <div class="min-h-screen flex flex-col justify-center items-center py-6">
            
            <!-- Pastikan menggunakan w-[90%] atau w-11/12 agar tidak mentok ke pinggir layar HP -->
            <div class="w-[90%] sm:max-w-md px-6 py-8 bg-white shadow-xl overflow-hidden rounded-2xl">
                
                <div class="flex flex-col items-center justify-center w-full mb-6">
                    <img src="{{ asset('logosistock.png') }}" class="h-20 w-auto" alt="Logo">
                </div>
                
                {{ $slot }}
            </div>

        </div>
    </body>
</html>