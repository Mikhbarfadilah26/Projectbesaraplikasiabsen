<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelAbsensi;
use App\Models\ModelKelas;
use Barryvdh\DomPDF\Facade\Pdf;

class ControllerLaporan extends Controller
{
    public function absensi(Request $request)
    {
        $kelas = ModelKelas::all();

        $query = ModelAbsensi::with([
            'siswa.kelas.jurusan'
        ]);

        // FILTER TANGGAL
        if ($request->tanggal) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        // FILTER KELAS
        if ($request->kelasid) {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('kelasid', $request->kelasid);
            });
        }

        $data = $query->latest()->get();

        // EXPORT PDF
        if ($request->export == 'pdf') {

            $pdf = Pdf::loadView(
                'user.laporan.pdf',
                compact('data')
            );

            return $pdf->download('laporan-absensi.pdf');
        }

        // REKAP
        $rekap = [
            'hadir' => $data->where('status_masuk', 'hadir')->count(),
            'izin'  => $data->where('status_masuk', 'izin')->count(),
            'sakit' => $data->where('status_masuk', 'sakit')->count(),
            'alpha' => $data->where('status_masuk', 'alpha')->count(),
        ];

        return view(
            'user.laporan.daftarlaporan',
            compact('data', 'kelas', 'rekap')
        );
    }
}