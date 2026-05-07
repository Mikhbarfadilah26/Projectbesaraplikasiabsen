<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelTahunAjaran extends Model
{
    protected $table = 'tahunajaran';

    protected $fillable = [
        'tahun'
    ];
}