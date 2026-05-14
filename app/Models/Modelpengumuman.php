<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ModelUser;

class ModelPengumuman extends Model
{
    protected $table = 'pengumuman';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(ModelUser::class, 'userid');
    }
}