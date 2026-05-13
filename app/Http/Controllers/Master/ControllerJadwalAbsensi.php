<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelJadwalAbsensi;

class ControllerJadwalAbsensi extends Controller
{
    public function index()
    {
        $data = ModelJadwalAbsensi::all();

        return view('user.jadwalabsensi.index', compact('data'));
    }

    public function create()
    {
        return view('user.jadwalabsensi.create');
    }

    public function store(Request $r)
    {
        $r->validate([

            'hari' => 'required|unique:jadwal_absensi,hari',

            'jam_masuk' => 'required',

            'batas_telat' => 'required',

            'jam_pulang' => 'required',

        ]);

        ModelJadwalAbsensi::create($r->all());

        return redirect()
            ->route('jadwalabsensi.index')
            ->with('success', 'Jadwal berhasil ditambah');
    }

    public function edit($id)
    {
        $jadwal = ModelJadwalAbsensi::findOrFail($id);

        return view('user.jadwalabsensi.edit', compact('jadwal'));
    }

    public function update(Request $r, $id)
    {
        $jadwal = ModelJadwalAbsensi::findOrFail($id);

        $r->validate([

            'hari' => 'required|unique:jadwal_absensi,hari,' . $id,

            'jam_masuk' => 'required',

            'batas_telat' => 'required',

            'jam_pulang' => 'required',

        ]);

        $jadwal->update($r->all());

        return redirect()
            ->route('jadwalabsensi.index')
            ->with('success', 'Jadwal berhasil diupdate');
    }

    public function destroy($id)
    {
        ModelJadwalAbsensi::destroy($id);

        return redirect()
            ->route('jadwalabsensi.index')
            ->with('success', 'Jadwal berhasil dihapus');
    }
}