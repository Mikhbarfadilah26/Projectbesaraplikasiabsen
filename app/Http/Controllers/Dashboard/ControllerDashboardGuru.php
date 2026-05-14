<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelSiswa;
use App\Models\ModelKelas;
use App\Models\ModelAbsensi;

class ControllerDashboardGuru extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | TANGGAL HARI INI
        |--------------------------------------------------------------------------
        */
        $hariIni = Carbon::today()->toDateString();

        /*
        |--------------------------------------------------------------------------
        | DATA GURU
        |--------------------------------------------------------------------------
        */
        $guru = ModelUser::where('role', 'guru')->get();

        $jumlahGuru = ModelUser::where('role', 'guru')->count();

        /*
        |--------------------------------------------------------------------------
        | TOTAL SISWA
        |--------------------------------------------------------------------------
        */
        $jumlahSiswa = ModelSiswa::count();

        /*
        |--------------------------------------------------------------------------
        | TOTAL KELAS
        |--------------------------------------------------------------------------
        */
        $jumlahKelas = ModelKelas::count();

        /*
        |--------------------------------------------------------------------------
        | ABSENSI HARI INI
        |--------------------------------------------------------------------------
        */
        $absensiHariIni = ModelAbsensi::whereDate(
            'tanggal',
            $hariIni
        )->count();

        /*
        |--------------------------------------------------------------------------
        | STATUS ABSENSI HARI INI
        |--------------------------------------------------------------------------
        */
        $hadirHariIni = ModelAbsensi::whereDate(
            'tanggal',
            $hariIni
        )
        ->where('status', 'hadir')
        ->count();

        $izinHariIni = ModelAbsensi::whereDate(
            'tanggal',
            $hariIni
        )
        ->where('status', 'izin')
        ->count();

        $sakitHariIni = ModelAbsensi::whereDate(
            'tanggal',
            $hariIni
        )
        ->where('status', 'sakit')
        ->count();

        $alphaHariIni = ModelAbsensi::whereDate(
            'tanggal',
            $hariIni
        )
        ->where('status', 'alpha')
        ->count();

        /*
        |--------------------------------------------------------------------------
        | ABSENSI TERBARU
        |--------------------------------------------------------------------------
        */
        $absensiTerbaru = ModelAbsensi::latest()
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */
        return view(
            'user.dashboard.guru',
            compact(
                'guru',
                'jumlahGuru',
                'jumlahSiswa',
                'jumlahKelas',
                'absensiHariIni',
                'hadirHariIni',
                'izinHariIni',
                'sakitHariIni',
                'alphaHariIni',
                'absensiTerbaru'
            )
        );
    }
}