<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

class DashboardController extends Controller
{
    public function index()
    {
        // Card Dashboard
        $totalBarang = Barang::count();

        $totalKategori = Barang::distinct('kategori')->count();

        $totalBarangMasuk = BarangMasuk::count();

        $totalBarangKeluar = BarangKeluar::count();

        // Grafik kategori
        $kategori = Barang::selectRaw('kategori, COUNT(*) as total')
            ->groupBy('kategori')
            ->orderBy('total', 'DESC')
            ->get();

        // Barang terbaru
        $barangTerbaru = Barang::latest()->take(10)->get();

        return view('dashboard', compact(
            'totalBarang',
            'totalKategori',
            'totalBarangMasuk',
            'totalBarangKeluar',
            'kategori',
            'barangTerbaru'
        ));
    }
}