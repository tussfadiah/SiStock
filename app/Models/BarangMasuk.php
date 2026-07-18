<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori',
        'merk',
        'lokasi',
        'tanggal',
        'keterangan',
    ];
}