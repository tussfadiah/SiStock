<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $barangKeluar = BarangKeluar::when($keyword, function ($query) use ($keyword) {

            $query->where('kode_barang', 'like', "%{$keyword}%")
                  ->orWhere('nama_barang', 'like', "%{$keyword}%")
                  ->orWhere('kategori', 'like', "%{$keyword}%")
                  ->orWhere('merk', 'like', "%{$keyword}%");

        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

        return view('barang_keluar.index', compact('barangKeluar'));
    }

    public function destroy(BarangKeluar $barangKeluar)
    {
        $barangKeluar->delete();

        return redirect()
            ->route('barang-keluar.index')
            ->with('success', 'Riwayat barang keluar berhasil dihapus.');
    }
}