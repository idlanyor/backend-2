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
        Schema::create('gelombang_pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('gelombang_ke');
            $table->integer('isAktif');
            $table->string('tahun_pelajaran');
            $table->string('periode_mulai');
            $table->string('periode_akhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gelombang_pendaftaran');
    }
};
