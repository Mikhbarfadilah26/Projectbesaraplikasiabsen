<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\ModelAbsensi;
use App\Http\Controllers\Controller;

class ControllerDashboardSiswa extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD SISWA
    |--------------------------------------------------------------------------
    */
    public function index()
    {

        $siswaId = auth('siswa')->id();

        $hariIni = Carbon::today()->toDateString();

        /*
        |--------------------------------------------------------------------------
        | DATA DASHBOARD
        |--------------------------------------------------------------------------
        */
        $data = [

            'absenHariIni' => ModelAbsensi::where('siswaid', $siswaId)
                ->where('tanggal', $hariIni)
                ->first(),

            'hadir' => ModelAbsensi::where('siswaid', $siswaId)
                ->where('status', 'hadir')
                ->count(),

            'izin' => ModelAbsensi::where('siswaid', $siswaId)
                ->where('status', 'izin')
                ->count(),

            'sakit' => ModelAbsensi::where('siswaid', $siswaId)
                ->where('status', 'sakit')
                ->count(),

            'alpha' => ModelAbsensi::where('siswaid', $siswaId)
                ->where('status', 'alpha')
                ->count(),

            'cabut' => ModelAbsensi::where('siswaid', $siswaId)
                ->where('status', 'cabut')
                ->count(),

        ];

        return view(
            'Zonasiswa.dashboard.dashboardsiswa',
            $data
        );

    }

    /*
    |--------------------------------------------------------------------------
    | ABSENSI HARI INI
    |--------------------------------------------------------------------------
    */
    public function absensi()
    {

        $siswaId = auth('siswa')->id();

        $absensi = ModelAbsensi::where('siswaid', $siswaId)
            ->latest()
            ->first();

        return view(
            'Zonasiswa.absensi.prosesabsen',
            compact('absensi')
        );

    }

    /*
    |--------------------------------------------------------------------------
    | RIWAYAT ABSENSI
    |--------------------------------------------------------------------------
    */
    public function riwayat()
    {

        $siswaId = auth('siswa')->id();

        $riwayat = ModelAbsensi::where('siswaid', $siswaId)
            ->latest()
            ->paginate(10);

        return view(
            'Zonasiswa.riwayat.riwayatabsensi',
            compact('riwayat')
        );

    }

    /*
    |--------------------------------------------------------------------------
    | LAPORAN ABSENSI
    |--------------------------------------------------------------------------
    */
    public function laporan()
    {

        $siswaId = auth('siswa')->id();

        $laporan = ModelAbsensi::where('siswaid', $siswaId)
            ->latest()
            ->get();

        return view(
            'Zonasiswa.laporan.index',
            compact('laporan')
        );

    }

}