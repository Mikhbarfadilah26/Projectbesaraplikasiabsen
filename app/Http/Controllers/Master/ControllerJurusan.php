<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelJurusan;

class ControllerJurusan extends Controller
{
    public function index(){
        $data = ModelJurusan::all();
        return view('user.jurusan.index', compact('data'));
    }

    public function create(){
        return view('user.jurusan.create');
    }

    public function store(Request $r){
        $r->validate([
            'namajurusan'=>'required'
        ]);

        ModelJurusan::create([
            'namajurusan'=>$r->namajurusan
        ]);

        return redirect()->route('jurusan.index')
                         ->with('success','Data jurusan berhasil ditambah');
    }

    public function show($id){
        $jurusan = ModelJurusan::findOrFail($id);
        return view('user.jurusan.show', compact('jurusan'));
    }

    public function edit($id){
        $jurusan = ModelJurusan::findOrFail($id);
        return view('user.jurusan.edit', compact('jurusan'));
    }

    public function update(Request $r, $id){
        $r->validate([
            'namajurusan'=>'required'
        ]);

        ModelJurusan::findOrFail($id)->update([
            'namajurusan'=>$r->namajurusan
        ]);

        return redirect()->route('jurusan.index')
                         ->with('success','Data jurusan berhasil diupdate');
    }

    public function destroy($id){
        ModelJurusan::destroy($id);

        return redirect()->route('jurusan.index')
                         ->with('success','Data jurusan berhasil dihapus');
    }
}