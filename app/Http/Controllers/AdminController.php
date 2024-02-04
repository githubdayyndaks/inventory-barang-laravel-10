<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('admin.index');
    }
    function petugas(){
        return view('petugas.index');
    }
    function pengguna(){
        return view('pengguna.index');
    }
}
