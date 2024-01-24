<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            $request->session()->regenerate();
            return redirect()->intended('/');
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

    public function changepass(){
        return view('admin.pengguna.ubahpass',[
            "title" => "Ubah Password"
        ]);
    }

    public function proseschangepass(Request $request){
        // dd($cek);
        if(!Hash::check($request->passlama, auth()->user()->password)){
            return back()->with('error','Password lama tidak sesuai dengan yang anda inputkan');
        }

        if($request->passbaru != $request->passconfirm){
            return back()->with('error','Password baru dan konfirmasi password baru tidak sama');
        }

        // auth()->user()->update([
        //     'password'
        // ]);
        $id = Auth::user()->id;
        $user = user::findOrFail($id);
        $user->update([
            'password' => Hash::make($request->passbaru)
        ]);

        return back()->with('status', 'Proses ubah password berhasil');

    }
}
