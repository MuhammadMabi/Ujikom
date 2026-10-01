<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    protected $table = 'spps';

    protected $fillable = [
        'id_spp',
        'tahun',
        'nominal',
    ];
}
