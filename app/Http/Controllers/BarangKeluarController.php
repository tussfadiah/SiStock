<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluar = BarangKeluar::with('barang')
                            ->latest()
                            ->get();

        return view('barang_keluar.index', compact('barangKeluar'));
    }

    public function create()
    {
        $barang = Barang::all();

        return view('barang_keluar.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1',
            'digunakan_oleh' => 'required',
            'keperluan' => 'required',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        if ($request->jumlah > $barang->stok) {
            return back()
                ->withInput()
                ->withErrors([
                    'jumlah' => 'Stok tidak mencukupi.'
                ]);
        }

        BarangKeluar::create([
            'barang_id' => $request->barang_id,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'digunakan_oleh' => $request->digunakan_oleh,
            'keperluan' => $request->keperluan,
        ]);

        $barang->stok -= $request->jumlah;
        $barang->save();

        return redirect()
            ->route('barang-keluar.index')
            ->with('success', 'Barang keluar berhasil ditambahkan.');
    }

    public function edit(BarangKeluar $barangKeluar)
    {
        $barang = Barang::all();

        return view('barang_keluar.edit', compact('barangKeluar', 'barang'));
    }

    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1',
            'digunakan_oleh' => 'required',
            'keperluan' => 'required',
        ]);

        $barangLama = Barang::find($barangKeluar->barang_id);
        $barangLama->stok += $barangKeluar->jumlah;
        $barangLama->save();

        $barangBaru = Barang::find($request->barang_id);

        if ($request->jumlah > $barangBaru->stok) {
            return back()
                ->withInput()
                ->withErrors([
                    'jumlah' => 'Stok tidak mencukupi.'
                ]);
        }

        $barangBaru->stok -= $request->jumlah;
        $barangBaru->save();

        $barangKeluar->update($request->all());

        return redirect()
            ->route('barang-keluar.index')
            ->with('success', 'Data berhasil diubah.');
    }

    public function destroy(BarangKeluar $barangKeluar)
    {
        $barang = Barang::find($barangKeluar->barang_id);

        $barang->stok += $barangKeluar->jumlah;
        $barang->save();

        $barangKeluar->delete();

        return redirect()
            ->route('barang-keluar.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}