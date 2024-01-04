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
        Schema::create('jadwal_jalur_pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->date('simulasi_mulai');
            $table->date('simulasi_akhir');
            $table->date('pendaftaran_mulai');
            $table->date('pendaftaran_akhir');
            $table->date('seleksi_awal');
            $table->date('seleksi_akhir');
            $table->date('daftar_ulang_awal');
            $table->date('daftar_ulang_akhir');
            $table->date('pengumuman');
            $table->unsignedBigInteger('id_jalur');
            $table->foreign('id_jalur')->references('id')->on('jalur_pendaftaran')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_jalur_pendaftaran');
    }
};
