<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ModelAbsensi;

class ModelDetailAbsensi extends Model
{
    protected $table = 'detailabsensi';

    protected $fillable = [
        'absensiid',
        'keterangan'
    ];

    public function absensi()
    {
        return $this->belongsTo(ModelAbsensi::class, 'absensiid');
    }
}