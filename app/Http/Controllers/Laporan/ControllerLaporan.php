<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelAbsensi;
use App\Models\ModelKelas;
use App\Models\ModelSemester;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ControllerLaporan extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LAPORAN UTAMA
    |--------------------------------------------------------------------------
    */

    public function absensi(Request $request)
    {
        $kelas = ModelKelas::all();

        $query = ModelAbsensi::with([
            'siswa.kelas.jurusan',
            'kelas',
            'semester',
            'guru'
        ]);

        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL
        |--------------------------------------------------------------------------
        */

        if ($request->tanggal) {

            $query->whereDate(
                'tanggal',
                $request->tanggal
            );
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER KELAS
        |--------------------------------------------------------------------------
        */

        if ($request->kelasid) {

            $query->where(
                'kelasid',
                $request->kelasid
            );
        }

        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */

        $data = $query
            ->latest()
            ->get();

        /*
        |--------------------------------------------------------------------------
        | EXPORT PDF
        |--------------------------------------------------------------------------
        */

        if ($request->export == 'pdf') {

            $pdf = Pdf::loadView(
                'user.laporan.pdf',
                compact('data')
            );

            return $pdf->download(
                'laporan-absensi.pdf'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | REKAP
        |--------------------------------------------------------------------------
        */

        $rekap = [

            'hadir' => $data->where('status', 'hadir')->count(),

            'izin' => $data->where('status', 'izin')->count(),

            'sakit' => $data->where('status', 'sakit')->count(),

            'alpha' => $data->where('status', 'alpha')->count(),

        ];

        return view(
            'user.laporan.daftarlaporan',
            compact(
                'data',
                'kelas',
                'rekap'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | LAPORAN HARIAN
    |--------------------------------------------------------------------------
    */

    public function harian(Request $request)
    {
        $kelas = ModelKelas::orderBy(
            'namakelas',
            'asc'
        )->get();

        $tanggal = $request->tanggal
            ?? date('Y-m-d');

        $query = ModelAbsensi::with([
            'siswa',
            'kelas',
            'guru'
        ])

            ->whereDate(
                'tanggal',
                $tanggal
            );

        if ($request->kelasid) {

            $query->where(
                'kelasid',
                $request->kelasid
            );
        }

        $data = $query
            ->latest()
            ->get();

        return view(
            'user.laporan.harian',
            compact(
                'data',
                'kelas',
                'tanggal'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | LAPORAN MINGGUAN
    |--------------------------------------------------------------------------
    */

    public function mingguan(Request $request)
    {
        $kelas = ModelKelas::orderBy(
            'namakelas',
            'asc'
        )->get();

        $mulai = $request->mulai
            ?? Carbon::now()->startOfWeek()->format('Y-m-d');

        $selesai = $request->selesai
            ?? Carbon::now()->endOfWeek()->format('Y-m-d');

        $query = ModelAbsensi::with([
            'siswa',
            'kelas',
            'guru'
        ])

            ->whereBetween(
                'tanggal',
                [$mulai, $selesai]
            );

        if ($request->kelasid) {

            $query->where(
                'kelasid',
                $request->kelasid
            );
        }

        $data = $query
            ->latest()
            ->get();

        return view(
            'user.laporan.mingguan',
            compact(
                'data',
                'kelas',
                'mulai',
                'selesai'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | LAPORAN BULANAN
    |--------------------------------------------------------------------------
    */

    public function bulanan(Request $request)
    {
        $kelas = ModelKelas::orderBy(
            'namakelas',
            'asc'
        )->get();

        $bulan = (int) ($request->bulan ?? date('m'));

        $tahun = (int) ($request->tahun ?? date('Y'));

        $query = ModelAbsensi::with([
            'siswa',
            'kelas',
            'guru'
        ])

            ->whereMonth(
                'tanggal',
                $bulan
            )

            ->whereYear(
                'tanggal',
                $tahun
            );

        if ($request->kelasid) {

            $query->where(
                'kelasid',
                $request->kelasid
            );
        }

        $data = $query
            ->latest()
            ->get();

        return view(
            'user.laporan.bulanan',
            compact(
                'data',
                'kelas',
                'bulan',
                'tahun'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | LAPORAN TAHUNAN
    |--------------------------------------------------------------------------
    */

    public function tahunan(Request $request)
    {
        $kelas = ModelKelas::orderBy(
            'namakelas',
            'asc'
        )->get();

        $tahun = (int) (
            $request->tahun
            ?? date('Y')
        );

        $query = ModelAbsensi::with([
            'siswa',
            'kelas',
            'guru'
        ])

            ->whereYear(
                'tanggal',
                $tahun
            );

        if ($request->kelasid) {

            $query->where(
                'kelasid',
                $request->kelasid
            );
        }

        $data = $query
            ->latest()
            ->get();

        return view(
            'user.laporan.tahunan',
            compact(
                'data',
                'kelas',
                'tahun'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | LAPORAN SEMESTER
    |--------------------------------------------------------------------------
    */

    public function semester(Request $request)
    {
        $kelas = ModelKelas::orderBy(
            'namakelas',
            'asc'
        )->get();

        /*
        |--------------------------------------------------------------------------
        | SEMESTER
        |--------------------------------------------------------------------------
        */

        $semester = ModelSemester::all();

        /*
        |--------------------------------------------------------------------------
        | DEFAULT SEMESTER GANJIL
        |--------------------------------------------------------------------------
        */

        $semesterAktif = $request->semesterid ?? 1;

        $tahun = (int) (
            $request->tahun
            ?? date('Y')
        );

        /*
        |--------------------------------------------------------------------------
        | QUERY
        |--------------------------------------------------------------------------
        */

        $query = ModelAbsensi::with([

            'siswa',
            'kelas',
            'semester',
            'guru'

        ])

            ->whereYear(
                'tanggal',
                $tahun
            );

        /*
        |--------------------------------------------------------------------------
        | FILTER KELAS
        |--------------------------------------------------------------------------
        */

        if ($request->kelasid) {

            $query->where(
                'kelasid',
                $request->kelasid
            );
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER SEMESTER
        |--------------------------------------------------------------------------
        */

        if ($semesterAktif) {

            $query->where(
                'semesterid',
                $semesterAktif
            );
        }

        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */

        $data = $query
            ->latest()
            ->get();

        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'user.laporan.semester',
            compact(
                'data',
                'kelas',
                'semester',
                'semesterAktif',
                'tahun'
            )
        );
    }
}