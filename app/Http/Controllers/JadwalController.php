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
        ->get();
        return view('admin.jadwal.table',["title" => "Jadwal"])->with('jadwal',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $namaPetugas = User::all();   
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
        $jadwal = Jadwal::findOrFail($id);
        $jadwal = DB::table('tbuser')
        ->join('jadwals', 'users.id', '=', 'jadwals.iduser')
        ->select('users.*', 'jadwals.*')
        ->where('jadwals.id', '=', $id)
        ->get();
        dd($jadwal);    
        return view('admin.jadwal.detail', ["title" => "Jadwal","jadwal" => $jadwal]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        //
    }
}
