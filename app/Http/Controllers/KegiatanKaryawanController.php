<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatan = Kegiatan::with('user')->get();
        return view('karyawan.kegiatan.table',[
            "title" => "Jurnal Harian",
            "kegiatan" => $kegiatan
        ] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawan.kegiatan.create',[
            "title" => "Tambah Jurnal Harian"
        ] );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Kegiatan::create($request->all());
        return redirect()->route('kegiatankaryawan.index')->with('sukses', 'Kegiatan baru di Tambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Kegiatan::with('user')->findOrFail($id);
        return view('karyawan.kegiatan.detail',[
            "title" => "Detail Jurnal Harian",
            "data" => $data
        ] );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Kegiatan::with('user')->findOrFail($id);
        return view('karyawan.kegiatan.edit',[
            "title" => "Edit Jurnal Harian",
            "data" => $data
        ] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Kegiatan::with('user')->findOrFail($id);
        $data->update($request->all());
        return redirect()->route('kegiatankaryawan.index')->with('sukses', 'Kegiatan Telah di Update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
