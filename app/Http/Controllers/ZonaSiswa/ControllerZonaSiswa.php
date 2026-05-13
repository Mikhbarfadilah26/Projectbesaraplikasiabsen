<?php

namespace App\Http\Controllers\ZonaSiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ModelAbsensi;

class ControllerZonaSiswa extends Controller
{
    public function profile()
    {
        $siswa = auth('siswa')->user();

        return view('zonasiswa.profile', compact('siswa'));
    }

    public function cetakLaporan()
    {
        $siswa = auth('siswa')->user();

        $absensi = ModelAbsensi::where('siswaid', $siswa->id)
            ->latest()
            ->get();

        $pdf = Pdf::loadView(
            'zonasiswa.cetaklaporan',
            compact('siswa', 'absensi')
        );

        return $pdf->stream('laporan-absensi.pdf');
    }
}