<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ModelSiswa;
use App\Models\ModelTahunAjaran;
use App\Models\ModelSemester;
use App\Models\ModelDetailAbsensi;

class ModelAbsensi extends Model
{
    protected $table = 'absensi';

    protected $fillable = [
        'siswaid',
        'tahunid',
        'semesterid',
        'tanggal',
        'jam_masuk',
        'status_masuk',
        'jam_pulang',
        'status_pulang'
    ];

    public function siswa()
    {
        return $this->belongsTo(ModelSiswa::class, 'siswaid');
    }

    public function tahun()
    {
        return $this->belongsTo(ModelTahunAjaran::class, 'tahunid');
    }

    public function semester()
    {
        return $this->belongsTo(ModelSemester::class, 'semesterid');
    }
    public function detail()
    {
        return $this->hasMany(ModelDetailAbsensi::class, 'absensiid');
    }
}
