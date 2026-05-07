<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelKelas;
use App\Models\ModelJurusan;

class ControllerKelas extends Controller
{
    public function index(){
        $data = ModelKelas::with('jurusan')->get();
        return view('user.kelas.index', compact('data'));
    }

    public function create(){
        $jurusan = ModelJurusan::all();
        return view('user.kelas.create', compact('jurusan'));
    }

    public function store(Request $r){
        $r->validate([
            'namakelas'=>'required',
            'tingkat'=>'required',
            'jurusanid'=>'required'
        ]);

        ModelKelas::create($r->all());

        return redirect()->route('kelas.index')
                         ->with('success','Data kelas berhasil ditambah');
    }

    public function show($id){
        $kelas = ModelKelas::with('jurusan')->findOrFail($id);
        return view('user.kelas.show', compact('kelas'));
    }

    public function edit($id){
        $kelas = ModelKelas::findOrFail($id);
        $jurusan = ModelJurusan::all();

        return view('user.kelas.edit', compact('kelas','jurusan'));
    }

    public function update(Request $r, $id){
        $r->validate([
            'namakelas'=>'required',
            'tingkat'=>'required',
            'jurusanid'=>'required'
        ]);

        ModelKelas::findOrFail($id)->update($r->all());

        return redirect()->route('kelas.index')
                         ->with('success','Data kelas berhasil diupdate');
    }

    public function destroy($id){
        ModelKelas::destroy($id);

        return redirect()->route('kelas.index')
                         ->with('success','Data kelas berhasil dihapus');
    }
}