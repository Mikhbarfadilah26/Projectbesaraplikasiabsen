<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\ModelRegisterSiswa;
use App\Models\ModelKelas;

class ControllerRegisterSiswa extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FORM REGISTER
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $kelas = ModelKelas::all();

        return view('auth.registersiswa', compact('kelas'));
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN REGISTER
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'nama' => 'required',

            'nis' => 'required|unique:register_siswa,nis|unique:siswa,nis',

            'password' => 'required|min:6',

            'jeniskelamin' => 'required',

            'kelasid' => 'required',

            'alamat' => 'required',

        ]);

        /*
        |--------------------------------------------------------------------------
        | SIMPAN KE TABLE REGISTER SISWA
        |--------------------------------------------------------------------------
        */

        ModelRegisterSiswa::create([

            'nama' => $request->nama,

            'nis' => $request->nis,

            'password' => Hash::make($request->password),

            'jeniskelamin' => $request->jeniskelamin,

            'kelasid' => $request->kelasid,

            'alamat' => $request->alamat,

            /*
            |--------------------------------------------------------------------------
            | STATUS DEFAULT
            |--------------------------------------------------------------------------
            */

            'status' => 'pending',

        ]);

        return redirect()
            ->route('login.siswa')
            ->with(
                'success',
                'Register berhasil, tunggu persetujuan admin/guru.'
            );
    }
}