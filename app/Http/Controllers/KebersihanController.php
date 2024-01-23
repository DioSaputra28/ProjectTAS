<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kebersihan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KebersihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('created_at','DESC')->get();
       return view('admin.pengguna.table',compact('user'),[
        "title" => "Jurnal Kebersihan"
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kebersihan $kebersihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kebersihan $kebersihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kebersihan $kebersihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kebersihan $kebersihan)
    {
        //
    }
}
