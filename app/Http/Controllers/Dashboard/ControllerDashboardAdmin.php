<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ModelSiswa;
use App\Models\ModelKelas;
use App\Models\ModelJurusan;
use App\Models\ModelAbsensi;

class ControllerDashboardAdmin extends Controller
{
    public function index()
    {
        $totalsiswa = ModelSiswa::count();

        $totalkelas = ModelKelas::count();

        $totaljurusan = ModelJurusan::count();

        $totalabsensi = ModelAbsensi::whereDate('created_at', now())->count();

        // DATA TERBARU
        $datasiswa = ModelSiswa::latest()->take(5)->get();

        $datajurusan = ModelJurusan::latest()->take(5)->get();

        $dataabsensi = ModelAbsensi::latest()->take(5)->get();

        return view('user.dashboard.admin', compact(
            'totalsiswa',
            'totalkelas',
            'totaljurusan',
            'totalabsensi',
            'datasiswa',
            'datajurusan',
            'dataabsensi'
        ));
    }
}