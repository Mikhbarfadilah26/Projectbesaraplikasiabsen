<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\ModelSiswa;
use App\Models\ModelKelas;
use App\Models\ModelJurusan;
use App\Models\ModelRegisterSiswa;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;

class ControllerSiswa extends Controller
{
    public function index()
    {
        // DATA SISWA AKTIF
        $data = ModelSiswa::with('kelas.jurusan')
            ->latest()
            ->get();

        // DATA REGISTER PENDING
        $pending = ModelRegisterSiswa::with('kelas.jurusan')
            ->where('status', 'pending')
            ->latest()
            ->get();

        // DATA DITERIMA
        $diterima = ModelRegisterSiswa::with('kelas.jurusan')
            ->where('status', 'disetujui')
            ->latest()
            ->get();

        // DATA DITOLAK
        $ditolak = ModelRegisterSiswa::with('kelas.jurusan')
            ->where('status', 'ditolak')
            ->latest()
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

        return view('user.siswa.create', compact(
            'kelas',
            'jurusan'
        ));
    }

    public function store(Request $r)
    {
        $r->validate([
            'nis'           => 'required|unique:siswa,nis',
            'nama'          => 'required',
            'password'      => 'required|min:4',
            'jeniskelamin'  => 'required',
            'kelasid'       => 'required',

            'nama_ortu'     => 'nullable',
            'wa_ortu'       => 'nullable',

            'alamat'        => 'nullable',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        // FOTO
        $foto = null;

        if ($r->hasFile('foto')) {

            $file = $r->file('foto');

            $namaFile = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('fotoupload/siswa'), $namaFile);

            $foto = $namaFile;
        }

        // SIMPAN SISWA
        ModelSiswa::create([
            'nis'           => $r->nis,
            'nama'          => $r->nama,
            'password'      => Hash::make($r->password),
            'foto'          => $foto,
            'jeniskelamin'  => $r->jeniskelamin,
            'kelasid'       => $r->kelasid,

            'nama_ortu'     => $r->nama_ortu,
            'wa_ortu'       => $r->wa_ortu,

            'alamat'        => $r->alamat,
        ]);
        return redirect()
            ->route('siswa.index')
            ->with('success', 'Siswa berhasil ditambahkan');
    }

    /*
    |--------------------------------------------------------------------------
    | IMPORT EXCEL SISWA
    |--------------------------------------------------------------------------
    */

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(
            new SiswaImport,
            $request->file('file')
        );

        return back()->with(
            'success',
            'Data siswa berhasil diimport'
        );
    }
 /*
    |--------------------------------------------------------------------------
    | EKSPORT EXCEL SISWA
    |--------------------------------------------------------------------------
    */
    public function export()
{
    return Excel::download(
        new SiswaExport,
        'data-siswa.xlsx'
    );
}
    public function show($id)
    {
        $siswa = ModelSiswa::with('kelas.jurusan')
            ->findOrFail($id);

        return view('user.siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = ModelSiswa::findOrFail($id);

        $kelas = ModelKelas::with('jurusan')->get();

        return view('user.siswa.edit', compact(
            'siswa',
            'kelas'
        ));
    }

    public function update(Request $r, $id)
    {
        $siswa = ModelSiswa::findOrFail($id);
        $r->validate([
            'nis'           => 'required|unique:siswa,nis,' . $id,
            'nama'          => 'required',
            'jeniskelamin'  => 'required',
            'kelasid'       => 'required',

            'nama_ortu'     => 'nullable',
            'wa_ortu'       => 'nullable',

            'alamat'        => 'nullable',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $data = [
            'nis'           => $r->nis,
            'nama'          => $r->nama,
            'jeniskelamin'  => $r->jeniskelamin,
            'kelasid'       => $r->kelasid,

            'nama_ortu'     => $r->nama_ortu,
            'wa_ortu'       => $r->wa_ortu,

            'alamat'        => $r->alamat,
        ];

        // UPDATE PASSWORD JIKA DIISI
        if ($r->password) {

            $data['password'] = Hash::make($r->password);
        }

        // UPDATE FOTO
        if ($r->hasFile('foto')) {

            // HAPUS FOTO LAMA
            if (
                $siswa->foto &&
                file_exists(public_path('fotoupload/siswa/' . $siswa->foto))
            ) {
                unlink(public_path('fotoupload/siswa/' . $siswa->foto));
            }

            $file = $r->file('foto');

            $namaFile = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('fotoupload/siswa'), $namaFile);

            $data['foto'] = $namaFile;
        }

        $siswa->update($data);

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil diupdate');
    }

    public function setujui($id)
    {
        $register = ModelRegisterSiswa::findOrFail($id);

        // CEK JIKA SUDAH ADA
        $cek = ModelSiswa::where('nis', $register->nis)->first();

        if ($cek) {

            return back()->with('error', 'NIS sudah terdaftar');
        }

        ModelSiswa::create([
            'nis'           => $register->nis,
            'nama'          => $register->nama,

            // HASH PASSWORD REGISTER
            'password'      => Hash::make($register->password),

            'foto'          => $register->foto,
            'jeniskelamin'  => $register->jeniskelamin,
            'kelasid'       => $register->kelasid,
            'alamat'        => $register->alamat,
        ]);

        $register->update([
            'status' => 'disetujui'
        ]);

        return back()->with(
            'success',
            'Siswa berhasil disetujui'
        );
    }

    public function tolak($id)
    {
        ModelRegisterSiswa::findOrFail($id)
            ->update([
                'status' => 'ditolak'
            ]);

        return back()->with(
            'success',
            'Siswa berhasil ditolak'
        );
    }

    public function destroy($id)
    {
        $siswa = ModelSiswa::findOrFail($id);

        // HAPUS FOTO
        if (
            $siswa->foto &&
            file_exists(public_path('fotoupload/siswa/' . $siswa->foto))
        ) {
            unlink(public_path('fotoupload/siswa/' . $siswa->foto));
        }

        $siswa->delete();

        return back()->with(
            'success',
            'Siswa berhasil dihapus'
        );
    }
}
