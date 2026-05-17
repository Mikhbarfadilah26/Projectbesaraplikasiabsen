<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelLibur extends Model
{
    protected $table = 'libur';

    protected $fillable = [

        'tanggal',
        'keterangan',
        'jenis',
        'aktif'

    ];
}