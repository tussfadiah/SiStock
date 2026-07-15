<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $barangMasuk = Barang::when($keyword, function ($query) use ($keyword) {

            $query->where('kode_barang', 'like', "%$keyword%")
                  ->orWhere('nama_barang', 'like', "%$keyword%")
                  ->orWhere('kategori', 'like', "%$keyword%")
                  ->orWhere('merk', 'like', "%$keyword%");

        })->latest()->paginate(10);

        return view('barang_masuk.index', compact('barangMasuk'));
    }
}