<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\ModelPengumuman;

class ControllerPengumuman extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $pengumuman = ModelPengumuman::with('user')
            ->latest()
            ->get();

        return view(
            'user.pengumuman.index',
            compact('pengumuman')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('user.pengumuman.create');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'judul' => 'required',

            'isi' => 'required',

            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);

        /*
        |--------------------------------------------------------------------------
        | UPLOAD FOTO
        |--------------------------------------------------------------------------
        */

        $foto = null;

        if ($request->hasFile('foto')) {

            $foto = $request->file('foto')
                ->store('pengumuman', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN
        |--------------------------------------------------------------------------
        */

        ModelPengumuman::create([

            'userid' => Auth::id(),

            'judul' => $request->judul,

            'isi' => $request->isi,

            'foto' => $foto,

            'tanggal' => now(),

            'is_active' => true

        ]);

        return redirect()

            ->route('pengumuman.index')

            ->with(
                'success',
                'Pengumuman berhasil ditambahkan'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show(string $id)
    {
        $pengumuman = ModelPengumuman::with('user')
            ->findOrFail($id);

        return view(
            'user.pengumuman.show',
            compact('pengumuman')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit(string $id)
    {
        $pengumuman = ModelPengumuman::findOrFail($id);

        return view(
            'user.pengumuman.edit',
            compact('pengumuman')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, string $id)
    {
        $request->validate([

            'judul' => 'required',

            'isi' => 'required',

            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);

        $pengumuman = ModelPengumuman::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | UPDATE FOTO
        |--------------------------------------------------------------------------
        */

        $foto = $pengumuman->foto;

        if ($request->hasFile('foto')) {

            /*
            |--------------------------------------------------------------------------
            | HAPUS FOTO LAMA
            |--------------------------------------------------------------------------
            */

            if ($pengumuman->foto) {

                Storage::disk('public')
                    ->delete($pengumuman->foto);
            }

            /*
            |--------------------------------------------------------------------------
            | UPLOAD FOTO BARU
            |--------------------------------------------------------------------------
            */

            $foto = $request->file('foto')
                ->store('pengumuman', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE DATA
        |--------------------------------------------------------------------------
        */

        $pengumuman->update([

            'judul' => $request->judul,

            'isi' => $request->isi,

            'foto' => $foto,

        ]);

        return redirect()

            ->route('pengumuman.index')

            ->with(
                'success',
                'Pengumuman berhasil diupdate'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy(string $id)
    {
        $pengumuman = ModelPengumuman::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | HAPUS FOTO
        |--------------------------------------------------------------------------
        */

        if ($pengumuman->foto) {

            Storage::disk('public')
                ->delete($pengumuman->foto);
        }

        /*
        |--------------------------------------------------------------------------
        | HAPUS DATA
        |--------------------------------------------------------------------------
        */

        $pengumuman->delete();

        return redirect()

            ->route('pengumuman.index')

            ->with(
                'success',
                'Pengumuman berhasil dihapus'
            );
    }
}