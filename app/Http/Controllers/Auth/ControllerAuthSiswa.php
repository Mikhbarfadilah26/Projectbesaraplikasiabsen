<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerAuthSiswa extends Controller
{
    public function index()
    {
        return view('auth.loginsiswa');
    }

    public function login(Request $request)
    {
        // nanti isi login siswa
    }
}