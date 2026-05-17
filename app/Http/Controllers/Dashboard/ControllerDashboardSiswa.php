<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\ModelLibur;
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

        $data = [

            'absenHariIni' => ModelAbsensi::where('siswaid', $siswaId)
                ->whereDate('tanggal', $hariIni)
                ->latest()
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
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view(
            'Zonasiswa.riwayat.riwayatabsensi',
            compact('riwayat')
        );

    }

    /*
    |--------------------------------------------------------------------------
    | LAPORAN ABSENSI SISWA
    |--------------------------------------------------------------------------
    */
    public function laporan()
    {

        $siswaId = auth('siswa')->id();

        /*
        |--------------------------------------------------------------------------
        | QUERY SISWA LOGIN SAJA
        |--------------------------------------------------------------------------
        */
        $query = ModelAbsensi::with([
                'guru',
                'siswa.kelas.jurusan'
            ])
            ->where('siswaid', $siswaId);

        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL
        |--------------------------------------------------------------------------
        */
        if (request('tanggal')) {

            $query->whereDate(
                'tanggal',
                request('tanggal')
            );

        }

        /*
        |--------------------------------------------------------------------------
        | FILTER STATUS
        |--------------------------------------------------------------------------
        */
        if (request('status')) {

            $query->where(
                'status',
                request('status')
            );

        }

        /*
        |--------------------------------------------------------------------------
        | DATA LAPORAN
        |--------------------------------------------------------------------------
        | Ambil hanya 1 data per tanggal
        */
        $laporan = $query
            ->orderBy('tanggal', 'desc')
            ->get()
            ->unique('tanggal')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | DATA LIBUR
        |--------------------------------------------------------------------------
        */
        $libur = null;

        if (request('tanggal')) {

            $libur = ModelLibur::whereDate(
                    'tanggal',
                    request('tanggal')
                )
                ->where('aktif', 1)
                ->first();

        }

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */
        return view(
            'Zonasiswa.laporan.index',
            compact(
                'laporan',
                'libur'
            )
        );

    }

    /*
    |--------------------------------------------------------------------------
    | CETAK LAPORAN SISWA
    |--------------------------------------------------------------------------
    */
    public function cetak()
    {

        $siswaId = auth('siswa')->id();

        /*
        |--------------------------------------------------------------------------
        | QUERY CETAK
        |--------------------------------------------------------------------------
        | Hanya siswa yang login
        */
        $query = ModelAbsensi::with([
                'siswa.kelas.jurusan',
                'guru'
            ])
            ->where('siswaid', $siswaId);

        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL
        |--------------------------------------------------------------------------
        */
        if (request('tanggal')) {

            $query->whereDate(
                'tanggal',
                request('tanggal')
            );

        }

        /*
        |--------------------------------------------------------------------------
        | FILTER STATUS
        |--------------------------------------------------------------------------
        */
        if (request('status')) {

            $query->where(
                'status',
                request('status')
            );

        }

        /*
        |--------------------------------------------------------------------------
        | DATA CETAK
        |--------------------------------------------------------------------------
        | 1 tanggal hanya tampil 1 data
        */
        $absensi = $query
            ->orderBy('tanggal', 'desc')
            ->get()
            ->unique('tanggal')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | DATA LIBUR
        |--------------------------------------------------------------------------
        */
        $libur = null;

        if (request('tanggal')) {

            $libur = ModelLibur::whereDate(
                    'tanggal',
                    request('tanggal')
                )
                ->where('aktif', 1)
                ->first();

        }

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */
        return view(
            'Zonasiswa.cetaklaporan',
            compact(
                'absensi',
                'libur'
            )
        );

    }

}