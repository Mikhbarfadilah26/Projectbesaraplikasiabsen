<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\ModelAbsensi;
use App\Models\ModelSiswa;
use App\Models\ModelTahunAjaran;
use App\Models\ModelSemester;

class ControllerAbsensi extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CRUD ADMIN / GURU
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $data = ModelAbsensi::with([
                    'siswa',
                    'tahun',
                    'semester'
                ])
                ->latest()
                ->get();

        return view('user.absensi.index', compact('data'));
    }

    public function create()
    {
        $siswa = ModelSiswa::all();
        $tahun = ModelTahunAjaran::all();
        $semester = ModelSemester::all();

        return view('user.absensi.create', compact(
            'siswa',
            'tahun',
            'semester'
        ));
    }

    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | STORE DARI SISWA (ABSEN DIGITAL)
        |--------------------------------------------------------------------------
        */

        if (Auth::guard('siswa')->check()) {

            $cek = ModelAbsensi::where('siswaid', Auth::guard('siswa')->id())
                    ->whereDate('tanggal', Carbon::today())
                    ->first();

            if ($cek) {
                return back()->with(
                    'error',
                    'Hari ini sudah absen.'
                );
            }

            $jam = Carbon::now();

            $statusMasuk = $jam->format('H:i:s') > '07:30:00'
                ? 'telat'
                : 'hadir';

            $tahun = ModelTahunAjaran::latest()->first();
            $semester = ModelSemester::latest()->first();

            ModelAbsensi::create([
                'siswaid'       => Auth::guard('siswa')->id(),
                'tahunid'       => $tahun?->id,
                'semesterid'    => $semester?->id,
                'tanggal'       => Carbon::today(),
                'jam_masuk'     => $jam->format('H:i:s'),
                'status_masuk'  => $statusMasuk,
            ]);

            return back()->with(
                'success',
                'Absen masuk berhasil.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | STORE DARI ADMIN / GURU
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'siswaid'      => 'required',
            'tahunid'      => 'required',
            'semesterid'   => 'required',
            'tanggal'      => 'required|date',
        ]);

        $cek = ModelAbsensi::where('siswaid', $request->siswaid)
                    ->where('tanggal', $request->tanggal)
                    ->first();

        if ($cek) {
            return back()->with(
                'error',
                'Siswa sudah absen di tanggal ini'
            );
        }

        ModelAbsensi::create([
            'siswaid'        => $request->siswaid,
            'tahunid'        => $request->tahunid,
            'semesterid'     => $request->semesterid,
            'tanggal'        => $request->tanggal,
            'jam_masuk'      => $request->jam_masuk,
            'status_masuk'   => $request->status_masuk,
            'jam_pulang'     => $request->jam_pulang,
            'status_pulang'  => $request->status_pulang,
        ]);

        return redirect()
                ->route('absensi.index')
                ->with(
                    'success',
                    'Absensi berhasil ditambahkan'
                );
    }

    public function edit($id)
    {
        $data = ModelAbsensi::findOrFail($id);

        $siswa = ModelSiswa::all();
        $tahun = ModelTahunAjaran::all();
        $semester = ModelSemester::all();

        return view('user.absensi.edit', compact(
            'data',
            'siswa',
            'tahun',
            'semester'
        ));
    }

    public function update(Request $request, $id)
    {
        $data = ModelAbsensi::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | UPDATE DARI SISWA (ABSEN PULANG)
        |--------------------------------------------------------------------------
        */

        if (Auth::guard('siswa')->check()) {

            if ($data->jam_pulang != null) {

                return back()->with(
                    'error',
                    'Sudah absen pulang.'
                );
            }
$data->update([
    'jam_pulang'    => Carbon::now()->format('H:i:s'),
    'status_pulang' => 'hadir',
]);
            return back()->with(
                'success',
                'Absen pulang berhasil.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE DARI ADMIN / GURU
        |--------------------------------------------------------------------------
        */

        $data->update([
            'siswaid'        => $request->siswaid,
            'tahunid'        => $request->tahunid,
            'semesterid'     => $request->semesterid,
            'tanggal'        => $request->tanggal,
            'jam_masuk'      => $request->jam_masuk,
            'status_masuk'   => $request->status_masuk,
            'jam_pulang'     => $request->jam_pulang,
            'status_pulang'  => $request->status_pulang,
        ]);

        return redirect()
                ->route('absensi.index')
                ->with(
                    'success',
                    'Absensi berhasil diupdate'
                );
    }

    public function destroy($id)
    {
        ModelAbsensi::findOrFail($id)->delete();

        return back()->with(
            'success',
            'Absensi berhasil dihapus'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | ZONA SISWA
    |--------------------------------------------------------------------------
    */

    public function prosesAbsen()
    {
        $today = Carbon::today();

        $absen = ModelAbsensi::where(
                    'siswaid',
                    Auth::guard('siswa')->id()
                )
                ->whereDate('tanggal', $today)
                ->first();

        $riwayat = ModelAbsensi::where(
                        'siswaid',
                        Auth::guard('siswa')->id()
                    )
                    ->latest('tanggal')
                    ->get();

        return view(
            'Zonasiswa.absensi.prosesabsen',
            compact('absen', 'riwayat')
        );
    }
}