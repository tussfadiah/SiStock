<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $barangMasuk = BarangMasuk::when($keyword, function ($query) use ($keyword) {

            $query->where('kode_barang', 'like', "%{$keyword}%")
                  ->orWhere('nama_barang', 'like', "%{$keyword}%")
                  ->orWhere('kategori', 'like', "%{$keyword}%")
                  ->orWhere('merk', 'like', "%{$keyword}%")
                  ->orWhere('lokasi', 'like', "%{$keyword}%");

        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

        return view('barang_masuk.index', compact('barangMasuk'));
    }

    public function destroy(BarangMasuk $barangMasuk)
    {
        $barangMasuk->delete();

        return redirect()
            ->route('barang-masuk.index')
            ->with('success', 'Riwayat barang masuk berhasil dihapus.');
    }
}