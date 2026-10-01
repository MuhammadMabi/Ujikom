<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayarans';

    protected $fillable = [
        'status',
        'nisn',
        'tgl_bayar',
        'tgl_terakhir_bayar',
        'batas_pembayaran',
        'jumlah_bulan',
        'id_spp',
        'nominal_bayar',
        'jumlah_bayar',
        'kembalian',
    ];
}
