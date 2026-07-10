<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
{
    $barang = Barang::all();

    return view('barang.index', compact('barang'));
}

    public function create()
    {
        return view('barang.create');
    }

 public function store(Request $request)
{
    $request->validate([
        'barang_id' => 'required|exists:barangs,id',
        'tanggal' => 'required|date',
        'jumlah' => 'required|integer|min:1',
        'supplier' => 'nullable|string|max:255',
        'keterangan' => 'nullable|string',
    ]);

    // Simpan transaksi barang masuk
    BarangMasuk::create([
        'barang_id' => $request->barang_id,
        'tanggal' => $request->tanggal,
        'jumlah' => $request->jumlah,
        'supplier' => $request->supplier,
        'keterangan' => $request->keterangan,
    ]);

    // Tambahkan stok barang
    $barang = Barang::find($request->barang_id);
    $barang->stok += $request->jumlah;
    $barang->save();

    return redirect()
        ->route('barang-masuk.index')
        ->with('success', 'Barang masuk berhasil ditambahkan.');
}

    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
{
    $request->validate([
        'kode_barang'=>'required',
        'nama_barang'=>'required',
        'kategori'=>'required',
        'stok'=>'required|integer',
        'satuan'=>'required',
        'lokasi'=>'required',
    ]);

    $barang->update($request->all());

    return redirect()->route('barang.index')
                     ->with('success','Barang berhasil diupdate');
}

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barang.index')
            ->with('success','Barang berhasil dihapus');
    }
}