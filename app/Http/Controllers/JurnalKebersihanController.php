<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JurnalKebersihan;
use App\Models\User;
use App\Models\Jadwal;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JurnalKebersihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $iduser = Auth::user()->id;

        $data = DB::table('jadwals')
        ->where('jadwals.iduser','=', $iduser)->first();

        if (Auth::user()->status == "karyawan" && $data != NULL ) {
            $ruangan = Jadwal::where('iduser', '=', $iduser)->latest()->first();
            $data = DB::table('users')
            ->join('jurnalkebersihan', 'users.id', '=', 'jurnalkebersihan.iduser')
            ->join('jadwals','jadwals.id','=','jurnalkebersihan.idjadwal')
            ->select('users.namalengkap','jadwals.blokruang', 'jurnalkebersihan.*')
            ->where('users.id','=',$iduser)
            ->orderBy('jurnalkebersihan.id','DESC')
            ->get();
            return view('admin.jurnalkebersihan.table',["title" => "Jurnal Kebersihan", "ruangan" => $ruangan])->with('jurnalkebersihan',$data);
        }elseif(Auth::user()->status == "karyawan" && $data == NULL){
            return view('admin.jurnalkebersihan.tablenull',["title" => "Jurnal Kebersihan"]);
        }else{
            $data = DB::table('users')
            ->join('jurnalkebersihan', 'users.id', '=', 'jurnalkebersihan.iduser')
            ->join('jadwals','jadwals.id','=','jurnalkebersihan.idjadwal')
            ->select('users.namalengkap','jadwals.blokruang', 'jurnalkebersihan.*')
            ->orderBy('jurnalkebersihan.id','DESC')
            ->get();
            return view('admin.jurnalkebersihan.table',["title" => "Jurnal Kebersihan"])->with('jurnalkebersihan',$data);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $iduser = Auth::user()->id;
        $jadwal = DB::table('jadwals')
        ->select('jadwals.id')
        ->where('jadwals.iduser','=', $iduser)->get();

        return view('admin.jurnalkebersihan.create',[
            "title" => "Tambah Jurnal Kebersihan"
           ], compact('jadwal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jurnal = new JurnalKebersihan();
        $jurnal->iduser = $request->iduser;
        $jurnal->idjadwal = $request->idjadwal;
        $jurnal->tanggal = $request->tanggal;
        $jurnal->waktu = $request->waktu;
        $jurnal->foto = $request->foto;
        $jurnal->keterangan = $request->keterangan;
        $jurnal->save();
        
            if ($request->hasFile('foto')) {
                $request->file('foto')->move('imgKebersihan/', $request->file('foto')->getClientOriginalName());
                $jurnal->foto = $request->file('foto')->getClientOriginalName();
                $jurnal->save();
            }

        return redirect()->route('jurnalkebersihan.index')->with('sukses', 'Jurnal Kebersihan Baru Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('users')
            ->join('jurnalkebersihan', 'users.id', '=', 'jurnalkebersihan.iduser')
            ->join('jadwals','jadwals.id','=','jurnalkebersihan.idjadwal')
            ->select('users.namalengkap','jadwals.blokruang', 'jurnalkebersihan.*')
            ->where('jurnalkebersihan.id', '=', $id)
            ->orderBy('jurnalkebersihan.id','DESC')
            ->get();

            return view('admin.jurnalkebersihan.detail',["title" => "Jurnal Kebersihan", "jurnalkebersihan" => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function status($id)
    { 
        $data = DB::table('jurnalkebersihan')->where('id',$id)->first();
        $status_sekarang = $data->validasi;

        if($status_sekarang == "0"){
            DB::table('jurnalkebersihan')->where('id',$id)->update(['validasi' => "1"]);
        }else{
            DB::table('jurnalkebersihan')->where('id',$id)->update(['validasi' => "0"]);
        }
        return redirect()->route('jurnalkebersihan.index')->with('sukses', 'Status Validasi Jurnal Kebersihan Telah Diupdate.');
    }
}
