<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Models\ModelSiswa;
use App\Models\ModelKelas;
use App\Models\ModelJurusan;

class ControllerSiswa extends Controller
{
    /**
     * =========================
     * LIST DATA SISWA
     * =========================
     */
    public function index()
    {
        $data = ModelSiswa::with('kelas.jurusan')->get();

        return view('user.siswa.index', compact('data'));
    }

    /**
     * =========================
     * FORM TAMBAH SISWA
     * =========================
     */
    public function create()
    {
        $kelas = ModelKelas::with('jurusan')->get();

        $jurusan = ModelJurusan::all();

        return view(
            'user.siswa.create',
            compact('kelas', 'jurusan')
        );
    }

    /**
     * =========================
     * SIMPAN DATA SISWA
     * =========================
     */
    public function store(Request $r)
    {
        $r->validate([
            'nis'           => 'required|unique:siswa,nis',
            'nama'          => 'required',
            'password'      => 'required|min:4',
            'jeniskelamin'  => 'required',
            'kelasid'       => 'required',
            'alamat'        => 'nullable',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $foto = null;

        // upload foto
        if ($r->hasFile('foto')) {

            $foto = $r->file('foto')
                ->store('foto-siswa', 'public');
        }

        ModelSiswa::create([
            'nis'           => $r->nis,
            'nama'          => $r->nama,
            'password'      => Hash::make($r->password),
            'foto'          => $foto,
            'jeniskelamin'  => $r->jeniskelamin,
            'kelasid'       => $r->kelasid,
            'alamat'        => $r->alamat,
        ]);

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan');
    }

    /**
     * =========================
     * DETAIL SISWA
     * =========================
     */
    public function show($id)
    {
        $siswa = ModelSiswa::with('kelas.jurusan')
                    ->findOrFail($id);

        return view('user.siswa.show', compact('siswa'));
    }

    /**
     * =========================
     * FORM EDIT SISWA
     * =========================
     */
    public function edit($id)
    {
        $siswa = ModelSiswa::findOrFail($id);

        $kelas = ModelKelas::with('jurusan')->get();

        $jurusan = ModelJurusan::all();

        return view(
            'user.siswa.edit',
            compact('siswa', 'kelas', 'jurusan')
        );
    }

    /**
     * =========================
     * UPDATE SISWA
     * =========================
     */
    public function update(Request $r, $id)
    {
        $siswa = ModelSiswa::findOrFail($id);

        $r->validate([
            'nis'           => 'required|unique:siswa,nis,' . $id,
            'nama'          => 'required',
            'jeniskelamin'  => 'required',
            'kelasid'       => 'required',
            'alamat'        => 'nullable',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = [
            'nis'           => $r->nis,
            'nama'          => $r->nama,
            'jeniskelamin'  => $r->jeniskelamin,
            'kelasid'       => $r->kelasid,
            'alamat'        => $r->alamat,
        ];

        // update password
        if ($r->password) {

            $data['password'] = Hash::make($r->password);
        }

        // update foto
        if ($r->hasFile('foto')) {

            // hapus foto lama
            if ($siswa->foto && Storage::disk('public')->exists($siswa->foto)) {

                Storage::disk('public')->delete($siswa->foto);
            }

            $data['foto'] = $r->file('foto')
                ->store('foto-siswa', 'public');
        }

        $siswa->update($data);

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil diupdate');
    }

    /**
     * =========================
     * HAPUS SISWA
     * =========================
     */
    public function destroy($id)
    {
        $siswa = ModelSiswa::findOrFail($id);

        // hapus foto
        if ($siswa->foto && Storage::disk('public')->exists($siswa->foto)) {

            Storage::disk('public')->delete($siswa->foto);
        }

        $siswa->delete();

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus');
    }
}