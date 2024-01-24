<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('created_at','DESC')->get();
       return view('admin.pengguna.table',compact('user'),[
        "title" => "Data Pengguna"
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pengguna.create',[
            "title" => "Tambah Pengguna"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'namalengkap' => 'required|max:255',
            'username'=>'required|min:3|max:255|unique:users',
            'password' => 'required|min:5|max:255',
            'jeniskelamin' => 'required',
            'status' => 'required',
        ]);

        // $validatedData['katasandi'] = bcrypt($validatedData['katasandi']);
        // $validatedData['password'] = Hash::make($validatedData['password']);

        // User::create($validatedData);

        // $request->session()->flush('sukses', 'Data Berhasil Ditambahkan');  
        if (User::create($validatedData)) {
            $validatedData['password'] = Hash::make($validatedData['password']);
            return redirect('/pengguna/create')->with('sukses', 'Data Berhasil Ditambahkan');
        }
            
        return back()->with('gagal', 'Data Gagal Ditambahkan');
        //     return redirect('/pengguna/create')->with('gagal', 'Data Gagal Ditambahkan');
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.pengguna.detail',[
            "title" => "Detail Pengguna"
        ], compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin.pengguna.edit',[
            "title" => "Detail Pengguna"
        ], compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = user::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('pengguna.index')->with('sukses', 'Pengguna Telah di update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('pengguna.index')->with('sukses', 'Pengguna Telah di Hapus.');
    }

    public function profil(string $id){
        $user = User::findOrFail($id);

        return view('admin.pengguna.profil',[
            "title" => "Profil"
        ], compact('user'));
    }

    public function ubahpass(){
        return view('admin.pengguna.ubahpass',[
            "title" => "Ubah Password"
        ]);
    }
}
