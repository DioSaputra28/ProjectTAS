<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('users')
        ->join('jadwals', 'users.id', '=', 'jadwals.iduser')
        ->select('users.*', 'jadwals.*')
        ->orderBy('jadwals.id','DESC')
        ->get();
        return view('admin.jadwal.table',["title" => "Jadwal Kebersihan"])->with('jadwal',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $namaPetugas = User::where('status', '=', 'karyawan')->get();
        return view('admin.jadwal.create',[
            "title" => "Tambah Jadwal"
           ], compact('namaPetugas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Jadwal::create($request->all());

        return redirect()->route('jadwal.index')->with('sukses', 'Jadwal baru di Tambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)    
    {
        $jadwal = DB::table('users')
        ->join('jadwals', 'users.id', '=', 'jadwals.iduser')
        ->select('users.namalengkap', 'jadwals.*')
        ->where('jadwals.id', '=', $id)
        ->get();
        return view('admin.jadwal.detail', ["title" => "Jadwal","jadwal" => $jadwal]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $namaPetugas = User::all();   
        $jadwal = DB::table('users')
        ->join('jadwals', 'users.id', '=', 'jadwals.iduser')
        ->select('users.*', 'jadwals.*')
        ->where('jadwals.id', '=', $id)
        ->get();
        return view('admin.jadwal.edit', ["title" => "Jadwal Edit","jadwal" => $jadwal, "namaPetugas" => $namaPetugas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());
        return redirect()->route('jadwal.index')->with('sukses', 'Pengguna Telah di update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('sukses', 'Pengguna Telah di Hapus.');
    }
}
