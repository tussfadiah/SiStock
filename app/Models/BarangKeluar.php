<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
  protected $fillable = [
    'kode_barang',
    'nama_barang',
    'kategori',
    'merk',
    'lokasi',
    'tanggal',
    'digunakan_oleh',
    'keperluan',
];
}