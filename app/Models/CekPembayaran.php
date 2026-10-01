<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CekPembayaran extends Model
{
    protected $table = 'cek_pembayarans';

    protected $fillable = [
        'id_pembayaran',
        'nisn',
        'tgl_terakhir_bayar',
        'tgl_sekarang',
        'status_pembayaran',
        'jumlah_bulan',
        'nama',
        'no_telp',
    ];

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_pembayaran');
    }
}
