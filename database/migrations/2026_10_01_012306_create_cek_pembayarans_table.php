<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cek_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pembayaran');
            $table->string('nisn', 10);
            $table->date('tgl_terakhir_bayar');
            $table->date('tgl_sekarang');
            $table->enum('status_pembayaran', ['Belum Lunas', 'Sudah Lunas'])->default('Belum Lunas');
            $table->string('jumlah_bulan', 5);
            $table->string('nama', 50);
            $table->string('no_telp', 13);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cek_pembayarans');
    }
};
