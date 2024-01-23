<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }
    public function authenticate(Request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'username' => 'required|min:3',
            'password' => 'required'

        ]);

        
        if(Auth::attempt($credentials)){
            if(Auth::user()->status == 'administrator'){
            return redirect('/administrator');
            // $request->session()->regenerate();
            // return redirect()->intended('/');
            }elseif(Auth::user()->status == 'karyawan'){
                return redirect('/karyawan');
            }

            

        }
        

        return back()->with('loginError', 'Login gagal');
    }

    public function logout()
    {
        Auth::logout();
        
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
