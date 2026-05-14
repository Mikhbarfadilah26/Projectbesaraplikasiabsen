<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ModelAbsensi;
use App\Models\ModelSiswa;
use App\Models\ModelKelas;
use App\Models\ModelJurusan;
use App\Models\ModelTahunAjaran;
use App\Models\ModelSemester;

class ControllerAbsensi extends Controller
{
    public function index()
    {
        $data = ModelAbsensi::with(['siswa', 'kelas', 'tahun', 'semester'])
            ->latest()
            ->get();

        return view('user.absensi.index', compact('data'));
    }

    public function create(Request $request)
    {
        $jurusan  = ModelJurusan::all();
        $kelas    = ModelKelas::all();
        $tahun    = ModelTahunAjaran::all();
        $semester = ModelSemester::all();

        // DEFAULT: semua siswa
        $query = ModelSiswa::query();

        // FILTER JURUSAN (optional)
        if ($request->jurusanid) {
            $query->whereHas('kelas', function ($q) use ($request) {
                $q->where('jurusanid', $request->jurusanid);
            });
        }

        // FILTER KELAS (optional)
        if ($request->kelasid) {
            $query->where('kelasid', $request->kelasid);
        }

        $siswa = $query->get();

        return view('user.absensi.create', compact(
            'jurusan',
            'kelas',
            'tahun',
            'semester',
            'siswa'
        ));
    }

    public function storeBulk(Request $request)
    {
        $request->validate([
            'siswaid' => 'required|array',
            'kelasid' => 'required',
            'tanggal' => 'required|date',
            'status'  => 'required|array',
        ]);

        $tahun = ModelTahunAjaran::latest()->first();
        $semester = ModelSemester::latest()->first();

        foreach ($request->siswaid as $i => $siswaid) {

            ModelAbsensi::create([
                'siswaid'    => $siswaid,
                'kelasid'    => $request->kelasid,
                'guruid'     => Auth::id(),
                'tahunid'    => $tahun->id ?? null,
                'semesterid' => $semester->id ?? null,
                'tanggal'    => $request->tanggal,
                'status'     => $request->status[$i] ?? 'hadir',
            ]);
        }

        return redirect()
            ->route('absensi.index')
            ->with('success', 'Absensi berhasil disimpan');
    }
}