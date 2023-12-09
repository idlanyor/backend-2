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
        Schema::create('pd_biodata_lain', function (Blueprint $table) {
            $table->id();
            $table->string('asal_sekolah');
            $table->string('nisn');
            $table->string('nm_bapak');
            $table->string('nm_ibu');
            $table->unsignedBigInteger('pkj_ayah');
            $table->unsignedBigInteger('pkj_ibu');
            $table->unsignedBigInteger('pengh_ayah');
            $table->unsignedBigInteger('pengh_ibu');
            $table->unsignedBigInteger('pend_t_ayah');
            $table->unsignedBigInteger('pend_t_ibu');
            $table->unsignedBigInteger('id_pendaftar');
            $table->foreign('pkj_ayah')->references('id')->on('cat_pekerjaan_ayah')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pkj_ibu')->references('id')->on('cat_pekerjaan_ibu')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pengh_ayah')->references('id')->on('cat_penghasilan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pengh_ibu')->references('id')->on('cat_penghasilan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pend_t_ayah')->references('id')->on('cat_pend_terakhir')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pend_t_ibu')->references('id')->on('cat_pend_terakhir')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pendaftar')->references('id')->on('pd_users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pd_biodata_lain');
    }
};
