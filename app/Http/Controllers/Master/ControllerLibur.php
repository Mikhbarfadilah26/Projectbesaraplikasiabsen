<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelLibur;

class ControllerLibur extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $data = ModelLibur::latest()->get();

        return view('user.libur.index', compact('data'));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('user.libur.create');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([

            'tanggal'    => 'required|date',

            'keterangan' => 'required',

            'jenis'      => 'required'

        ]);

        ModelLibur::create([

            'tanggal'    => $request->tanggal,

            'keterangan' => $request->keterangan,

            'jenis'      => $request->jenis,

            'aktif'      => $request->aktif ?? true

        ]);

        return redirect()
            ->route('libur.index')
            ->with('success', 'Hari libur berhasil ditambahkan');
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $data = ModelLibur::findOrFail($id);

        return view('user.libur.edit', compact('data'));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $request->validate([

            'tanggal'    => 'required|date',

            'keterangan' => 'required',

            'jenis'      => 'required'

        ]);

        $data = ModelLibur::findOrFail($id);

        $data->update([

            'tanggal'    => $request->tanggal,

            'keterangan' => $request->keterangan,

            'jenis'      => $request->jenis,

            'aktif'      => $request->aktif ?? true

        ]);

        return redirect()
            ->route('libur.index')
            ->with('success', 'Hari libur berhasil diupdate');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $data = ModelLibur::findOrFail($id);

        $data->delete();

        return redirect()
            ->route('libur.index')
            ->with('success', 'Hari libur berhasil dihapus');
    }
}