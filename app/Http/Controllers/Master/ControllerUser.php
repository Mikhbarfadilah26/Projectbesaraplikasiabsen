<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelUser;

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
            'role' => 'required'
        ]);

        ModelUser::create([
            'nama' => $r->nama,
            'username' => $r->username,
            'password' => bcrypt($r->password),
            'role' => $r->role
        ]);

        return redirect()->route('user.index')
            ->with('success', 'User berhasil ditambah');
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
            'role' => 'required'
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

        $user->update($data);

        return redirect()->route('user.index')
            ->with('success', 'User berhasil diupdate');
    }

    public function destroy($id)
    {
        ModelUser::destroy($id);

        return redirect()->route('user.index')
            ->with('success', 'User berhasil dihapus');
    }
}