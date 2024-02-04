<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
class SesiController extends Controller
{
    function index(){
        return view('login');
    }
    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi',
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if (Auth::attempt($infologin)) {
            $user = Auth::user();

            // Periksa level pengguna dan arahkan sesuai dengan level
            if ($user->level === 'Admin') {
                return redirect()->route('admin.index');

            } elseif ($user->level === 'Petugas') {
                return redirect()->route('petugas.index');
            } elseif ($user->level === 'Pengguna') {
                return redirect()->route('pengguna.index');
            } else {
                // Level tidak dikenali, atur tindakan yang sesuai
                // Contoh: kembali ke halaman beranda
                return redirect()->route('home');
            }
        }else{
            return redirect('')->withErrors('Username dan password yang di masukan tidak sesuai')->withInput();

        }
    }

    function logout(){
        Auth::logout();
        return redirect('login');
    }
}
