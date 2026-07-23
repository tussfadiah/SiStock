<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $barang = Barang::when($keyword, function ($query) use ($keyword) {
            $query->where('kode_barang', 'like', "%{$keyword}%")
                  ->orWhere('nama_barang', 'like', "%{$keyword}%")
                  ->orWhere('kategori', 'like', "%{$keyword}%")
                  ->orWhere('merk', 'like', "%{$keyword}%")
                  ->orWhere('lokasi', 'like', "%{$keyword}%");
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
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'lokasi'      => 'required',
            'keterangan'  => 'nullable',
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('barang', 'public');
        }

        // Simpan barang
        $barang = Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'kategori'    => $request->kategori,
            'merk'        => $request->merk,
            'foto'        => $foto,
            'barcode'     => $request->kode_barang,
            'lokasi'      => $request->lokasi,
            'stok'        => 1,
            'keterangan'  => $request->keterangan,
        ]);

        // Simpan log barang masuk
        BarangMasuk::create([
            'kode_barang' => $barang->kode_barang,
            'nama_barang' => $barang->nama_barang,
            'kategori'    => $barang->kategori,
            'merk'        => $barang->merk,
            'lokasi'      => $barang->lokasi,
            'tanggal'     => now(),
            'keterangan'  => 'Barang baru ditambahkan',
        ]);

        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    public function barcode($id)
    {
        $barang = Barang::findOrFail($id);

        return view('barang.barcode', compact('barang'));
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barangs,kode_barang,' . $barang->id,
            'nama_barang' => 'required',
            'kategori'    => 'required',
            'merk'        => 'required',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'lokasi'      => 'required',
            'keterangan'  => 'nullable',
        ]);

        if ($request->hasFile('foto')) {

            if ($barang->foto && Storage::disk('public')->exists($barang->foto)) {
                Storage::disk('public')->delete($barang->foto);
            }

            $barang->foto = $request->file('foto')->store('barang', 'public');
        }

        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->kategori    = $request->kategori;
        $barang->merk        = $request->merk;
        $barang->barcode     = $request->kode_barang;
        $barang->lokasi      = $request->lokasi;
        $barang->keterangan  = $request->keterangan;

        $barang->save();

        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil diupdate.');
    }

    public function destroy(Barang $barang)
    {
        // Simpan log barang keluar
        BarangKeluar::create([
            'kode_barang'    => $barang->kode_barang,
            'nama_barang'    => $barang->nama_barang,
            'kategori'       => $barang->kategori,
            'merk'           => $barang->merk,
            'lokasi'         => $barang->lokasi,
            'tanggal'        => now(),
            'keperluan'      => 'Barang dihapus dari inventaris',
        ]);

        // Hapus foto
        if ($barang->foto && Storage::disk('public')->exists($barang->foto)) {
            Storage::disk('public')->delete($barang->foto);
        }

        // Hapus data barang
        $barang->delete();

        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil dihapus.');
    }
}