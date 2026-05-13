<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelUser;
use Illuminate\Support\Facades\Storage;

class ControllerUser extends Controller
{
    public function index()
    {
        $data = ModelUser::all();

        return view('user.user.index', compact('data'));
    }

    public function create()
    {
        return view('user.user.create');
    }

    public function store(Request $r)
    {
        $r->validate([
            'nama' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'role' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $foto = null;

        // upload foto
        if ($r->hasFile('foto')) {

            $foto = $r->file('foto')
                ->store('foto-user', 'public');
        }

        ModelUser::create([
            'nama' => $r->nama,
            'username' => $r->username,
            'password' => bcrypt($r->password),
            'foto' => $foto,
            'role' => $r->role
        ]);

        return redirect()->route('user.index')
            ->with('success', 'User berhasil ditambah');
    }

    public function show($id)
    {
        $data = ModelUser::findOrFail($id);

        return view('user.user.show', compact('data'));
    }

    public function edit($id)
    {
        $data = ModelUser::findOrFail($id);

        return view('user.user.edit', compact('data'));
    }

    public function update(Request $r, $id)
    {
        $r->validate([
            'nama' => 'required',
            'username' => 'required',
            'role' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $user = ModelUser::findOrFail($id);

        $data = [
            'nama' => $r->nama,
            'username' => $r->username,
            'role' => $r->role
        ];

        // password optional
        if ($r->password) {

            $data['password'] = bcrypt($r->password);
        }

        // upload foto baru
        if ($r->hasFile('foto')) {

            // hapus foto lama
            if ($user->foto && Storage::disk('public')->exists($user->foto)) {

                Storage::disk('public')->delete($user->foto);
            }

            $data['foto'] = $r->file('foto')
                ->store('foto-user', 'public');
        }

        $user->update($data);

        return redirect()->route('user.index')
            ->with('success', 'User berhasil diupdate');
    }

    public function destroy($id)
    {
        $user = ModelUser::findOrFail($id);

        // hapus foto
        if ($user->foto && Storage::disk('public')->exists($user->foto)) {

            Storage::disk('public')->delete($user->foto);
        }

        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'User berhasil dihapus');
    }
}