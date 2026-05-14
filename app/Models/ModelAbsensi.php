<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelAbsensi extends Model
{
    protected $table = 'absensi';

    protected $fillable = [
        'siswaid',
        'kelasid',
        'guruid',
        'tahunid',
        'semesterid',
        'tanggal',
        'status'
    ];

    // ✅ RELASI SISWA
    public function siswa()
    {
        return $this->belongsTo(ModelSiswa::class, 'siswaid');
    }

    // ✅ RELASI KELAS
    public function kelas()
    {
        return $this->belongsTo(ModelKelas::class, 'kelasid');
    }

    // ✅ RELASI TAHUN AJARAN
    public function tahun()
    {
        return $this->belongsTo(ModelTahunAjaran::class, 'tahunid');
    }

    // ✅ RELASI SEMESTER
    public function semester()
    {
        return $this->belongsTo(ModelSemester::class, 'semesterid');
    }
}