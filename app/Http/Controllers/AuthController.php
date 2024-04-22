<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class AuthController extends Controller
{
    //Membuat login
    function index()
    {
        return view('auth.login');
    }

    function doLogin(Request $request){
        $data = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        //ketika datanya ada maka akan sesion dandialihkan ke halaman dashboard
        if(Auth::attempt($data)){
            $request->session()->regenerate();
            Alert::success('Success', 'Selamat datang admin.'); //sweetalert
            return redirect('/dashboard');
        }

        //jika tidak ada akan kehalaman itu kembali
        return back()->with('loginError', 'Email atau password salah');
    }
    function logout(){
        Auth::logout();
        request()->session()->invalidate(); // mentidak validkan login
        request()->session()->regenerateToken(); //menghancurkan token
        return redirect('/login'); //tampilkan halaman login
    }
}
