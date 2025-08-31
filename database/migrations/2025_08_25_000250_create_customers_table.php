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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('kode_resi')->unique();
            $table->string('nama_pengirim');
            $table->string('email_pengirim')->unique();
            $table->string('no_telp_pengirim');
            $table->text('alamat_pengirim');
            $table->string('nama_penerima');
            $table->string('no_telp_penerima');
            $table->text('alamat_penerima');
            $table->string('berat_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
