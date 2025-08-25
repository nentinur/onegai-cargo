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
        Schema::create('trackings', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesanan')->unique();
            $table->string('nama_pemesan');
            $table->string('email_pemesan');
            $table->string('no_hp_pemesan');
            $table->string('alamat_pemesan');
            $table->string('nama_produk');
            $table->integer('jumlah_produk');
            $table->string('daerah_asal');
            $table->string('daerah_tujuan');
            $table->string('status_pengiriman')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trackings');
    }
};
