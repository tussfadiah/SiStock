<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
{
    $barangMasuk = BarangMasuk::with('barang')
                    ->latest()
                    ->get();

    return view('barang_masuk.index', compact('barangMasuk'));
}

public function create()
{
    $barang = Barang::all();

    return view('barang_masuk.create', compact('barang'));
}

    public function store(Request $request)
{
    $request->validate([
        'barang_id' => 'required',
        'tanggal' => 'required',
        'jumlah' => 'required|integer|min:1',
        'keterangan' => 'nullable',
    ]);

    BarangMasuk::create($request->all());

    $barang = Barang::find($request->barang_id);

    $barang->stok += $request->jumlah;

    $barang->save();

    return redirect()
            ->route('barang-masuk.index')
            ->with('success', 'Barang masuk berhasil disimpan.');
}
}