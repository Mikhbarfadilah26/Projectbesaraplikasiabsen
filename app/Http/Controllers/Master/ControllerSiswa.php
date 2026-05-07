<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelSiswa;
use App\Models\ModelKelas;

class ControllerSiswa extends Controller
{
    public function index()
    {
        $data = ModelSiswa::with('kelas')->get();
        return view('user.siswa.index', compact('data'));
    }

    public function create()
    {
        $kelas = ModelKelas::all();
        return view('user.siswa.create', compact('kelas'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'nis' => 'required|unique:siswa,nis',
            'nama' => 'required',
            'password' => 'required',
            'jeniskelamin' => 'required',
            'kelasid' => 'required'
        ]);

        ModelSiswa::create([
            'nis' => $r->nis,
            'nama' => $r->nama,
            'password' => bcrypt($r->password),
            'jeniskelamin' => $r->jeniskelamin,
            'kelasid' => $r->kelasid,
            'alamat' => $r->alamat
        ]);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambah');
    }
    public function show($id)
    {
        $siswa = ModelSiswa::with('kelas')->findOrFail($id);
        return view('user.siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = ModelSiswa::findOrFail($id);
        $kelas = ModelKelas::all();

        return view('user.siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $r, $id)
    {
        $r->validate([
            'nis' => 'required',
            'nama' => 'required',
            'kelasid' => 'required'
        ]);

        ModelSiswa::findOrFail($id)->update([
            'nis' => $r->nis,
            'nama' => $r->nama,
            'jeniskelamin' => $r->jeniskelamin,
            'kelasid' => $r->kelasid,
            'alamat' => $r->alamat
        ]);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil diupdate');
    }

    public function destroy($id)
    {
        ModelSiswa::destroy($id);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus');
    }
}
