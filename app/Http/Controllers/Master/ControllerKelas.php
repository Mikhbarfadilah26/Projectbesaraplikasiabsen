<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\ModelKelas;
use App\Models\ModelJurusan;

class ControllerKelas extends Controller
{
    /**
     * =================================
     * LIST DATA KELAS
     * =================================
     */
    public function index()
    {
        $data = ModelKelas::with('jurusan')
                    ->latest()
                    ->get();

        return view('user.kelas.index', compact('data'));
    }

    /**
     * =================================
     * FORM TAMBAH KELAS
     * =================================
     */
    public function create()
    {
        $jurusan = ModelJurusan::latest()->get();

        return view('user.kelas.create', compact('jurusan'));
    }

    /**
     * =================================
     * SIMPAN DATA KELAS
     * =================================
     */
    public function store(Request $r)
    {
        $r->validate([

            'tingkat' => [

                'required',

                Rule::unique('kelas')
                    ->where(function ($q) use ($r) {

                        return $q->where(
                            'jurusanid',
                            $r->jurusanid
                        );

                    }),
            ],

            'jurusanid' => 'required'

        ], [

            'tingkat.required' => 'Tingkat wajib dipilih.',
            'tingkat.unique'   => 'Kelas tersebut sudah ada.',
            'jurusanid.required' => 'Jurusan wajib dipilih.'

        ]);

        ModelKelas::create([

            'tingkat'   => $r->tingkat,
            'jurusanid' => $r->jurusanid

        ]);

        return redirect()
            ->route('kelas.index')
            ->with(
                'success',
                'Data kelas berhasil ditambahkan.'
            );
    }

    /**
     * =================================
     * DETAIL KELAS
     * =================================
     */
    public function show($id)
    {
        $kelas = ModelKelas::with('jurusan')
                    ->findOrFail($id);

        return view('user.kelas.show', compact('kelas'));
    }

    /**
     * =================================
     * FORM EDIT KELAS
     * =================================
     */
    public function edit($id)
    {
        $kelas = ModelKelas::findOrFail($id);

        $jurusan = ModelJurusan::latest()->get();

        return view(
            'user.kelas.edit',
            compact('kelas', 'jurusan')
        );
    }

    /**
     * =================================
     * UPDATE DATA KELAS
     * =================================
     */
    public function update(Request $r, $id)
    {
        $kelas = ModelKelas::findOrFail($id);

        $r->validate([

            'tingkat' => [

                'required',

                Rule::unique('kelas')
                    ->where(function ($q) use ($r) {

                        return $q->where(
                            'jurusanid',
                            $r->jurusanid
                        );

                    })
                    ->ignore($id),
            ],

            'jurusanid' => 'required'

        ], [

            'tingkat.required' => 'Tingkat wajib dipilih.',
            'tingkat.unique'   => 'Kelas tersebut sudah ada.',
            'jurusanid.required' => 'Jurusan wajib dipilih.'

        ]);

        $kelas->update([

            'tingkat'   => $r->tingkat,
            'jurusanid' => $r->jurusanid

        ]);

        return redirect()
            ->route('kelas.index')
            ->with(
                'success',
                'Data kelas berhasil diupdate.'
            );
    }

    /**
     * =================================
     * HAPUS KELAS
     * =================================
     */
    public function destroy($id)
    {
        $kelas = ModelKelas::findOrFail($id);

        $kelas->delete();

        return redirect()
            ->route('kelas.index')
            ->with(
                'success',
                'Data kelas berhasil dihapus.'
            );
    }
}