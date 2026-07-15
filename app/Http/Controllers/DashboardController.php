<?php

namespace App\Http\Controllers;

   use App\Models\Barang;

class DashboardController extends Controller
{

public function index()
{
    $totalBarang = Barang::count();

    $totalKategori = Barang::distinct('kategori')->count('kategori');

    $totalLokasi = Barang::distinct('lokasi')->count('lokasi');

    $totalMerk = Barang::distinct('merk')->count('merk');

    $kategori = Barang::selectRaw('kategori, COUNT(*) as total')
        ->groupBy('kategori')
        ->orderBy('total', 'DESC')
        ->get();

    $barangTerbaru = Barang::latest()->take(10)->get();

    return view('dashboard', compact(
        'totalBarang',
        'totalKategori',
        'totalLokasi',
        'totalMerk',
        'kategori',
        'barangTerbaru'
    ));
}
}