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
        Schema::create('pd_biodata_umum', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nik');
            $table->enum('jk', ['Laki - laki','Perempuan'])->default('Laki - laki');
            $table->string('tmpt_lahir');
            $table->date('tgl_lahir');
            $table->int('agama');
            $table->string('kewarganegaraan');
            $table->string('addr_prov');
            $table->string('addr_kab');
            $table->string('addr_kec');
            $table->string('addr_des');
            $table->string('addr_dus');
            $table->string('addr_rt');
            $table->string('addr_rw');
            $table->int('id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pd_biodata_umum');
    }
};
