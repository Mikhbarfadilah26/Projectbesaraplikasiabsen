<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelSemester;

class ControllerSemester extends Controller
{
    public function index(){
        $data = ModelSemester::all();
        return view('user.semester.index', compact('data'));
    }

    public function create(){
        return view('user.semester.create');
    }

    public function store(Request $r){
        $r->validate([
            'nama'=>'required|in:ganjil,genap'
        ]);

        ModelSemester::create([
            'nama'=>$r->nama
        ]);

        return redirect()->route('semester.index')
                         ->with('success','Data semester berhasil ditambah');
    }

    public function show($id){
        $semester = ModelSemester::findOrFail($id);
        return view('user.semester.show', compact('semester'));
    }

    public function edit($id){
        $semester = ModelSemester::findOrFail($id);
        return view('user.semester.edit', compact('semester'));
    }

    public function update(Request $r, $id){
        $r->validate([
            'nama'=>'required|in:ganjil,genap'
        ]);

        ModelSemester::findOrFail($id)->update([
            'nama'=>$r->nama
        ]);

        return redirect()->route('semester.index')
                         ->with('success','Data semester berhasil diupdate');
    }

    public function destroy($id){
        ModelSemester::destroy($id);

        return redirect()->route('semester.index')
                         ->with('success','Data semester berhasil dihapus');
    }
}