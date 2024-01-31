<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $tahunSekarang = date('Y');
        $bulanSekarang = date('m');
    
        $laporan = Laporan::whereYear('tanggal', $tahunSekarang)
            ->whereMonth('tanggal', $bulanSekarang)
            ->get();
    
        return view('laporan.index', compact('laporan', 'tahunSekarang', 'bulanSekarang'),[
            'title' => 'Laporan'
        ]);
    }

    public function filter(Request $request)
    {
        $tahun = $request->input('tahun');
        $bulan = $request->input('bulan');

        $laporan = Laporan::whereYear('tanggal', $tahun)
            ->whereMonth('tanggal', $bulan)
            ->get();

        return view('laporan.index', compact('laporan', 'tahun', 'bulan'));
    }

    public function cetak(Request $request)
    {
        $tahun = $request->input('tahun');
        $bulan = $request->input('bulan');

        $laporan = Laporan::whereYear('tanggal', $tahun)
            ->whereMonth('tanggal', $bulan)
            ->get();

        return view('laporan.cetak', compact('laporan', 'tahun', 'bulan'));
    }
}
