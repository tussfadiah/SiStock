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
            'barang_id'=>'required|exists:barangs,id',
            'tanggal'=>'required|date',
            'jumlah'=>'required|integer|min:1',
            'digunakan_oleh'=>'required',
            'keperluan'=>'required',
        ]);

        $barang = Barang::find($request->barang_id);

        if($barang->stok < $request->jumlah){

            return back()
                    ->with('error','Stok barang tidak mencukupi.');

        }

        BarangKeluar::create([

            'barang_id'=>$request->barang_id,
            'tanggal'=>$request->tanggal,
            'jumlah'=>$request->jumlah,
            'digunakan_oleh'=>$request->digunakan_oleh,
            'keperluan'=>$request->keperluan,

        ]);

        $barang->stok -= $request->jumlah;

        $barang->save();

        return redirect()
                ->route('barang-keluar.index')
                ->with('success','Barang keluar berhasil ditambahkan.');
    }
}