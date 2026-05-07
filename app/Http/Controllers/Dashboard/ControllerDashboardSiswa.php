<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ModelAbsensi;
use App\Models\ModelTahunAjaran;
use App\Models\ModelSemester;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ControllerDashboardSiswa extends Controller
{
    public function index()
    {
        $siswaId = auth('siswa')->id();
        $hariIni = Carbon::today()->toDateString();

        // Data statistik untuk dashboard
        $data = [
            'absenHariIni' => ModelAbsensi::where('siswaid', $siswaId)->where('tanggal', $hariIni)->first(),
            'hadir' => ModelAbsensi::where('siswaid', $siswaId)->where('status_masuk', 'hadir')->count(),
            'izin'  => ModelAbsensi::where('siswaid', $siswaId)->where('status_masuk', 'izin')->count(),
            'alfa'  => ModelAbsensi::where('siswaid', $siswaId)->where('status_masuk', 'alpha')->count(),
        ];

        return view('Zonasiswa.dashboard.dashboardsiswa', $data);
    }

    public function absensi()
    {
        $siswaId = auth('siswa')->id();
        $absen = ModelAbsensi::where('siswaid', $siswaId)
                            ->where('tanggal', Carbon::today()->toDateString())
                            ->first();

        return view('Zonasiswa.absensi.prosesabsen', compact('absen'));
    }

    public function riwayat()
    {
        $siswaId = auth('siswa')->id();
        $riwayat = ModelAbsensi::where('siswaid', $siswaId)
                                ->orderBy('tanggal', 'desc')
                                ->get();

        return view('Zonasiswa.riwayat.riwayatabsensi', compact('riwayat'));
    }
}