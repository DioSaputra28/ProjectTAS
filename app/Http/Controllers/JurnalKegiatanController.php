<?php

namespace App\Http\Controllers;

use App\Models\JurnalKegiatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JurnalKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->status == "karyawan") {
            $iduser= Auth::user()->id;

            $data = DB::table('users')
            ->join('jurnalkegiatan', 'users.id', '=', 'jurnalkegiatan.iduser')
            ->select('users.namalengkap', 'jurnalkegiatan.*')
            ->where('users.id','=',$iduser)
            ->orderBy('jurnalkegiatan.id','DESC')
            ->get();
            return view('admin.jurnalkegiatan.table',["title" => "Jurnal Kegiatan"])->with('jurnalkegiatan',$data);
        }else{
            $data = DB::table('users')
            ->join('jurnalkegiatan', 'users.id', '=', 'jurnalkegiatan.iduser')
            ->select('users.namalengkap', 'jurnalkegiatan.*')
            ->orderBy('jurnalkegiatan.id','DESC')
            ->get();
            return view('admin.jurnalkegiatan.table',["title" => "Jurnal Kegiatan"])->with('jurnalkegiatan',$data);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jurnalkegiatan.create',[
            "title" => "Jurnal Kegiatan"
           ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        JurnalKegiatan::create($request->all());
        return redirect()->route('jurnalkegiatan.index')->with('sukses', 'Jurnal Kegiatan Baru Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jurnalkegiatan = DB::table('users')
        ->join('jurnalkegiatan', 'users.id', '=', 'jurnalkegiatan.iduser')
        ->select('users.*', 'jurnalkegiatan.*')
        ->where('jurnalkegiatan.id', '=', $id)
        ->get();
        return view('admin.jurnalkegiatan.detail', ["title" => "Jurnal Kegiatan","jurnalkegiatan" => $jurnalkegiatan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jurnalkegiatan = DB::table('users')
        ->join('jurnalkegiatan', 'users.id', '=', 'jurnalkegiatan.iduser')
        ->select('users.*', 'jurnalkegiatan.*')
        ->where('jurnalkegiatan.id', '=', $id)
        ->get();
        return view('admin.jurnalkegiatan.edit', ["title" => "Jurnal Kegiatan","jurnalkegiatan" => $jurnalkegiatan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jurnalkegiatan = JurnalKegiatan::findOrFail($id);
        $jurnalkegiatan->update($request->all());
        return redirect()->route('jurnalkegiatan.index')->with('sukses', 'Jurnal Kegiatan Telah Diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jurnalkegiatan = JurnalKegiatan::findOrFail($id);
        $jurnalkegiatan->delete();
        return redirect()->route('jurnalkegiatan.index')->with('sukses', 'Jurnal Kegiatan Telah Dihapus.');
    }

    public function status($id)
    { 
        $data = DB::table('jurnalkegiatan')->where('id',$id)->first();
        $status_sekarang = $data->validasi;

        if($status_sekarang == "0"){
            DB::table('jurnalkegiatan')->where('id',$id)->update(['validasi' => "1"]);
        }else{
            DB::table('jurnalkegiatan')->where('id',$id)->update(['validasi' => "0"]);
        }
        return redirect()->route('jurnalkegiatan.index')->with('sukses', 'Status Validasi Jurnal Kegiatan Telah Diupdate.');
    }
}
