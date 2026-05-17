<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelDetailAbsensi;
use App\Models\ModelAbsensi;

class ControllerDetailAbsensi extends Controller
{
    public function index()
    {
        $data = ModelDetailAbsensi::with('absensi.siswa')->latest()->get();
        return view('user.detailabsensi.index', compact('data'));
    }

    public function create()
    {
        $absensi = ModelAbsensi::with('siswa')->get();
        return view('user.detailabsensi.create', compact('absensi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'absensiid' => 'required',
            'keterangan' => 'required'
        ]);

        ModelDetailAbsensi::create($request->all());

        return redirect()->route('detailabsensi.index')
            ->with('success', 'Berhasil tambah detail');
    }

    public function edit($id)
    {
        $data = ModelDetailAbsensi::findOrFail($id);
        $absensi = ModelAbsensi::with('siswa')->get();

        return view('user.detilabsensi.edit', compact('data','absensi'));
    }

    public function update(Request $request, $id)
    {
        $data = ModelDetailAbsensi::findOrFail($id);

        $data->update([
            'absensiid' => $request->absensiid,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('detilabsensi.index')
            ->with('success', 'Berhasil update');
    }

    public function destroy($id)
    {
        ModelDetailAbsensi::findOrFail($id)->delete();

        return back()->with('success', 'Berhasil hapus');
    }
}