<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelKelas;
use App\Models\ModelJurusan;

class ControllerKelas extends Controller
{
    public function index()
    {
        // AMBIL DATA + RELASI
        $kelas = ModelKelas::with('jurusan')
            ->orderBy('tingkat', 'asc')
            ->get()
            ->groupBy('tingkat'); // 10, 11, 12

        return view('user.kelas.index', compact('kelas'));
    }

    public function create()
    {
        $jurusan = ModelJurusan::all();
        return view('user.kelas.create', compact('jurusan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namakelas' => 'required',
            'tingkat' => 'required',
            'jurusanid' => 'required',
        ]);

        ModelKelas::create([
            'namakelas' => $request->namakelas,
            'tingkat' => $request->tingkat,
            'jurusanid' => $request->jurusanid,
        ]);

        return redirect()->route('kelas.index')
            ->with('success', 'Kelas berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kelas = ModelKelas::findOrFail($id);
        $jurusan = ModelJurusan::all();

        return view('user.kelas.edit', compact('kelas', 'jurusan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namakelas' => 'required',
            'tingkat' => 'required',
            'jurusanid' => 'required',
        ]);

        $kelas = ModelKelas::findOrFail($id);

        $kelas->update([
            'namakelas' => $request->namakelas,
            'tingkat' => $request->tingkat,
            'jurusanid' => $request->jurusanid,
        ]);

        return redirect()->route('kelas.index')
            ->with('success', 'Kelas berhasil diupdate');
    }

    public function destroy($id)
    {
        $kelas = ModelKelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')
            ->with('success', 'Kelas berhasil dihapus');
    }
}