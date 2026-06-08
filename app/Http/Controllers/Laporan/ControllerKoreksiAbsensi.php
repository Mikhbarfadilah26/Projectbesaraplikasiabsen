<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\ModelAbsensi;
use App\Models\ModelKelas;     // Pastikan nama model Kelas kamu sesuai
use App\Models\ModelJurusan;   // Pastikan nama model Jurusan kamu sesuai
use Illuminate\Http\Request;

class ControllerKoreksiAbsensi extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil semua data Jurusan dan Kelas untuk Dropdown Filter di View
        $jurusan = ModelJurusan::all();
        $kelas = ModelKelas::all();

        // 2. Query data absensi dengan pemetaan filter sesuai skema database
        $data = ModelAbsensi::with(['siswa', 'kelas.jurusan'])
            
            // Filter berdasarkan Tanggal (Default ke hari ini jika filter kosong)
            ->when($request->tanggal, function ($q) use ($request) {
                $q->whereDate('tanggal', $request->tanggal);
            }, function ($q) {
                $q->whereDate('tanggal', date('Y-m-d'));
            })

            // Filter berdasarkan Kelas (Langsung tembak kolom kelasid di tabel absensi)
            ->when($request->kelasid, function ($q) use ($request) {
                $q->where('kelasid', $request->kelasid);
            })

            // Filter berdasarkan Jurusan (Mencari lewat relasi kelasid -> jurusanid)
            ->when($request->jurusanid, function ($q) use ($request) {
                $q->whereHas('kelas', function ($query) use ($request) {
                    $query->where('jurusanid', $request->jurusanid);
                });
            })
            
            ->latest()
            ->get();

        // 3. Kirim data ke view
        return view('user.koreksiabsensi.index', compact('data', 'jurusan', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        // Validasi status sesuai enum di database kamu (hadir, izin, sakit, alpha, cabut)
        $request->validate([
            'status' => 'required|in:hadir,izin,sakit,alpha,cabut'
        ]);

        $absensi = ModelAbsensi::findOrFail($id);

        $absensi->update([
            'status' => $request->status
        ]);

        return redirect()
            ->back()
            ->with('success', 'Absensi berhasil dikoreksi!');
    }
}