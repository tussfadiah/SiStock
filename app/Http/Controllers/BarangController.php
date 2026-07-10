<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
 public function index(Request $request)
{
    $keyword = $request->keyword;

    $barang = Barang::when($keyword, function ($query) use ($keyword) {

        $query->where('kode_barang', 'like', "%$keyword%")
              ->orWhere('nama_barang', 'like', "%$keyword%")
              ->orWhere('kategori', 'like', "%$keyword%")
              ->orWhere('merk', 'like', "%$keyword%")
              ->orWhere('lokasi', 'like', "%$keyword%");

    })->latest()->paginate(10);

    return view('barang.index', compact('barang'));
}

    public function create()
    {
        return view('barang.create');
    }

public function store(Request $request)
{
    $request->validate([
        'kode_barang' => 'required|unique:barangs,kode_barang',
        'nama_barang' => 'required',
        'kategori'    => 'required',
        'merk'        => 'required',
        'stok'        => 'required|integer|min:0',
        'satuan'      => 'required',
        'lokasi'      => 'required',
        'keterangan'  => 'nullable',
    ]);

    Barang::create([
        'kode_barang' => $request->kode_barang,
        'nama_barang' => $request->nama_barang,
        'kategori'    => $request->kategori,
        'merk'        => $request->merk,
        'stok'        => $request->stok,
        'satuan'      => $request->satuan,
        'lokasi'      => $request->lokasi,
        'keterangan'  => $request->keterangan,
    ]);

    return redirect()
        ->route('barang.index')
        ->with('success', 'Barang berhasil ditambahkan.');
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