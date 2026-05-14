<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Models\ModelSiswa;
use App\Models\ModelKelas;
use App\Models\ModelJurusan;
use App\Models\ModelRegisterSiswa;

class ControllerSiswa extends Controller
{
    public function index()
    {
        // SISWA FINAL (yang sudah aktif)
        $data = ModelSiswa::with('kelas.jurusan')
            ->orderBy('created_at', 'desc')
            ->get();

        // REGISTER (PENDING)
        $pending = ModelRegisterSiswa::with('kelas.jurusan')
            ->where('status', 'pending')
            ->get();

        $diterima = ModelRegisterSiswa::with('kelas.jurusan')
            ->where('status', 'disetujui')
            ->get();

        $ditolak = ModelRegisterSiswa::with('kelas.jurusan')
            ->where('status', 'ditolak')
            ->get();

        return view('user.siswa.index', compact(
            'data',
            'pending',
            'diterima',
            'ditolak'
        ));
    }

    public function create()
    {
        $kelas = ModelKelas::with('jurusan')->get();
        $jurusan = ModelJurusan::all();

        return view('user.siswa.create', compact('kelas','jurusan'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'nis' => 'required|unique:siswa,nis',
            'nama' => 'required',
            'password' => 'required|min:4',
            'jeniskelamin' => 'required',
            'kelasid' => 'required',
        ]);

        ModelSiswa::create([
            'nis' => $r->nis,
            'nama' => $r->nama,
            'password' => Hash::make($r->password),
            'jeniskelamin' => $r->jeniskelamin,
            'kelasid' => $r->kelasid,
            'alamat' => $r->alamat,
        ]);

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa berhasil ditambahkan');
    }

    public function show($id)
    {
        $siswa = ModelSiswa::with('kelas.jurusan')->findOrFail($id);
        return view('user.siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = ModelSiswa::findOrFail($id);
        $kelas = ModelKelas::with('jurusan')->get();

        return view('user.siswa.edit', compact('siswa','kelas'));
    }

    public function update(Request $r, $id)
    {
        $siswa = ModelSiswa::findOrFail($id);

        $siswa->update([
            'nis' => $r->nis,
            'nama' => $r->nama,
            'jeniskelamin' => $r->jeniskelamin,
            'kelasid' => $r->kelasid,
            'alamat' => $r->alamat,
        ]);

        return redirect()->route('siswa.index')
            ->with('success','Data siswa diupdate');
    }

    public function setujui($id)
    {
        $register = ModelRegisterSiswa::findOrFail($id);

        ModelSiswa::create([
            'nis' => $register->nis,
            'nama' => $register->nama,
            'password' => $register->password,
            'jeniskelamin' => $register->jeniskelamin,
            'kelasid' => $register->kelasid,
            'alamat' => $register->alamat,
        ]);

        $register->update(['status' => 'disetujui']);

        return back()->with('success','Siswa disetujui');
    }

    public function tolak($id)
    {
        ModelRegisterSiswa::findOrFail($id)
            ->update(['status' => 'ditolak']);

        return back()->with('success','Siswa ditolak');
    }

    public function destroy($id)
    {
        $siswa = ModelSiswa::findOrFail($id);
        $siswa->delete();

        return back()->with('success','Siswa dihapus');
    }
}