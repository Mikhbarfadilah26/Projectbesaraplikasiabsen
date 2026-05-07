<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\ModelTahunAjaran;
use Illuminate\Http\Request;

class ControllerTahunAjaran extends Controller
{
    public function index()
    {
        $data = ModelTahunAjaran::latest()->get();

        return view('user.tahunajaran.index', compact('data'));
    }

    public function create()
    {
        return view('user.tahunajaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|string|max:20'
        ]);

        ModelTahunAjaran::create([
            'tahun' => $request->tahun
        ]);

        return redirect()
            ->route('tahunajaran.index')
            ->with('success', 'Tahun ajaran berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = ModelTahunAjaran::findOrFail($id);

        return view('user.tahunajaran.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required|string|max:20'
        ]);

        $data = ModelTahunAjaran::findOrFail($id);

        $data->update([
            'tahun' => $request->tahun
        ]);

        return redirect()
            ->route('tahunajaran.index')
            ->with('success', 'Tahun ajaran berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = ModelTahunAjaran::findOrFail($id);
        $data->delete();

        return redirect()
            ->route('tahunajaran.index')
            ->with('success', 'Tahun ajaran berhasil dihapus');
    }
}