<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0B2F64] min-h-screen flex flex-col justify-center items-center p-6 font-sans">

    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl flex flex-col items-center text-center">
        
        <div class="mb-6">
            <img src="{{ asset('logosistock.png') }}" alt="Logo" class="h-20 w-auto">
        </div>

        <h1 class="text-2xl font-bold text-[#0B2F64] mb-2">Selamat Datang</h1>
        <p class="text-gray-600 mb-8">Silakan masuk ke akun Anda atau daftar untuk memulai.</p>

        <div class="w-full flex flex-col gap-3">
            <a href="{{ route('login') }}" 
               class="w-full py-3 bg-[#0B2F64] text-white font-semibold rounded-lg hover:bg-blue-900 transition">
                Login
            </a>
            <a href="{{ route('register') }}" 
               class="w-full py-3 bg-gray-100 text-[#0B2F64] font-semibold rounded-lg hover:bg-gray-200 transition">
                Register
            </a>
        </div>
    </div>

</body>
</html>