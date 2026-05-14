<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelPengumuman;
use Illuminate\Support\Facades\Auth;

class ControllerPengumuman extends Controller
{
    public function index()
    {
        $pengumuman = ModelPengumuman::with('user')
            ->latest()
            ->get();

        return view('user.pengumuman.index', compact('pengumuman'));
    }

    public function create()
    {
        return view('user.pengumuman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $user = Auth::user();

        ModelPengumuman::create([
            'userid' => $user->id,   // ✅ FIX PENTING
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => now(),      // optional tapi bagus
            'is_active' => true
        ]);

        return redirect()
            ->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $pengumuman = ModelPengumuman::with('user')
            ->findOrFail($id);

        return view('user.pengumuman.show', compact('pengumuman'));
    }

    public function edit(string $id)
    {
        $pengumuman = ModelPengumuman::findOrFail($id);

        return view('user.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $pengumuman = ModelPengumuman::findOrFail($id);

        $pengumuman->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return redirect()
            ->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $pengumuman = ModelPengumuman::findOrFail($id);

        $pengumuman->delete();

        return redirect()
            ->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus');
    }
}