<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{


public function index()
{

$data=BarangKeluar::with('barang')->get();

return view('barang_keluar.index',
compact('data'));

}



public function create()
{

$barang=Barang::all();

return view('barang_keluar.create',
compact('barang'));

}




public function store(Request $request)
{


$barang=Barang::find($request->barang_id);



if($barang->stok < $request->jumlah)
{

return back()
->with(
'error',
'Stok tidak mencukupi'
);

}



BarangKeluar::create($request->all());



$barang->stok -= $request->jumlah;


$barang->save();



return redirect('/barang-keluar');

}


}