<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    /**
     * Menampilkan halaman laporan.
     */
    public function index(Request $request)
    {
        $barang = Barang::orderBy('created_at', 'desc')->paginate(10);

        return view('laporan.index', compact('barang'));
    }

    /**
     * Download laporan barang dalam bentuk PDF.
     */
    public function downloadPdf()
    {
        $barang = Barang::orderBy('nama_barang')->get();

        $pdf = Pdf::loadView('laporan.pdf', compact('barang'));

        return $pdf->download('Laporan_Data_Barang.pdf');
    }
}