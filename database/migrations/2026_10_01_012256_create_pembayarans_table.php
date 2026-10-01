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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Belum Lunas', 'Sudah Lunas'])->default('Belum Lunas');
            $table->string('nisn', 10);
            $table->date('tgl_bayar');
            $table->date('tgl_terakhir_bayar');
            $table->date('batas_pembayaran');
            $table->string('jumlah_bulan', 10);
            $table->string('id_spp', 40);
            $table->string('nominal_bayar', 100);
            $table->string('jumlah_bayar', 100);
            $table->string('kembalian', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
