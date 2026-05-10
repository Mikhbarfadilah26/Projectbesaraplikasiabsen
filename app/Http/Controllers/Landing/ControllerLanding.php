<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelJurusan;
use App\Models\ModelPengumuman;

class ControllerLanding extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HOME LANDING
    |--------------------------------------------------------------------------
    | Pengumuman di HOME ambil dari DATABASE
    */

    public function index()
    {
        $jurusan = ModelJurusan::latest()->take(6)->get();

        $pengumumanHome = ModelPengumuman::latest()->take(3)->get();

        return view('landing.home', compact(
            'jurusan',
            'pengumumanHome'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | MENU NAVBAR
    |--------------------------------------------------------------------------
    */

    public function tentang()
    {
        return view('landing.tentang');
    }

    public function kontak()
    {
        return view('landing.kontak');
    }

    public function informasi()
    {
        return view('landing.informasi');
    }

    public function jadwalUmum()
    {
        return view('landing.jadwalumum');
    }

    /*
    |--------------------------------------------------------------------------
    | JURUSAN DATABASE
    |--------------------------------------------------------------------------
    */

    public function jurusan()
    {
        $jurusan = ModelJurusan::latest()->get();

        return view('landing.jurusan', compact('jurusan'));
    }

    public function detailJurusan($id)
    {
        $jurusan = ModelJurusan::findOrFail($id);

        return view('landing.detailjurusan', compact('jurusan'));
    }

    /*
    |--------------------------------------------------------------------------
    | PENGUMUMAN NAVBAR
    |--------------------------------------------------------------------------
    | Ini halaman penuh pengumuman
    */

    public function pengumuman()
    {
        $pengumuman = ModelPengumuman::latest()->paginate(6);

        return view('landing.pengumuman', compact('pengumuman'));
    }

    public function detailPengumuman($id)
    {
        $pengumuman = ModelPengumuman::findOrFail($id);

        return view('landing.detailpengumuman', compact('pengumuman'));
    }
}