<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::count();

        $totalMasuk = BarangMasuk::sum('jumlah');

        $totalKeluar = BarangKeluar::sum('jumlah');

        $totalStok = Barang::sum('stok');

        $stokMenipis = Barang::where('stok','<=',5)->get();

        $barangTerbaru = Barang::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalBarang',
            'totalMasuk',
            'totalKeluar',
            'totalStok',
            'stokMenipis',
            'barangTerbaru'
        ));
    }
}