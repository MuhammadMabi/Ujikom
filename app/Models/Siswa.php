<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';

    protected $fillable = [
        'nisn',
        'nama',
        'id_kelas',
        'nama_kelas',
        'alamat',
        'no_telp',
        'id_spp',
    ];
}
