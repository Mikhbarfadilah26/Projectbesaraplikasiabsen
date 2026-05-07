<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelSemester extends Model
{
    protected $table = 'semester';

    protected $fillable = [
        'nama'
    ];
}