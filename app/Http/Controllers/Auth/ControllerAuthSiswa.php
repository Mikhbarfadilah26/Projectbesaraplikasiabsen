<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerAuthSiswa extends Controller
{
    public function index()
    {
        return view('auth.loginsiswa');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('nis', 'password');

        if (Auth::guard('siswa')->attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->route('siswa.dashboard');
        }

        return back()->with('error', 'NIS atau Password salah');
    }

    public function logout()
    {
        Auth::guard('siswa')->logout();
        return redirect('/');
    }
}