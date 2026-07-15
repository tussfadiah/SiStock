<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
  protected $fillable = [
    'barang_id',
    'tanggal',
    'keterangan',
];

     public function barangMasuks()
{
    return $this->hasMany(BarangMasuk::class);
}

    public function barangKeluars()
    {
        return $this->hasMany(BarangKeluar::class);
    }

    public function store(Request $request)
{
    dd($request->all());
}
}