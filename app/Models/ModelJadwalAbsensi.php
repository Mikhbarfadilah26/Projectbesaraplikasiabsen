<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelJadwalAbsensi extends Model
{
    protected $table = 'jadwal_absensi';

    protected $fillable = [

        'hari',
        'jam_masuk',
        'batas_telat',
        'jam_pulang'

    ];
}