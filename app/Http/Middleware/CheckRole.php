<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. Cek apakah pengguna sudah login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // 2. Cek apakah role pengguna ada di dalam daftar role yang diizinkan
        if (!in_array(auth()->user()->role, $roles)) {
            abort(403, 'Anda tidak memiliki hak akses ke halaman ini.');
        }

        return $next($request);
    }
}