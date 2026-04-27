<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerLanding extends Controller
{
    public function index()
    {
        return view('landing.home');
    }

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

    public function pengumuman()
    {
        return view('landing.pengumuman');
    }

    public function detailPengumuman($id)
    {
        // Nantinya kamu bisa ambil data pengumuman berdasarkan ID dari database
        return view('landing.detailpengumuman');
    }
}