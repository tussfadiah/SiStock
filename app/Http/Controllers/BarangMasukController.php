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
dd($request->all());

    $request->validate([
        'barang_id'=>'required|exists:barangs,id',
        'tanggal'=>'required|date',
        'jumlah'=>'required|integer|min:1',
        'supplier'=>'nullable|string|max:255',
        'keterangan'=>'nullable|string',
    ]);
}
    public function show(BarangMasuk $barangMasuk)
    {
        //
    }

    public function edit(BarangMasuk $barangMasuk)
    {
        //
    }

    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        //
    }

    public function destroy(BarangMasuk $barangMasuk)
    {
        //
    }
}