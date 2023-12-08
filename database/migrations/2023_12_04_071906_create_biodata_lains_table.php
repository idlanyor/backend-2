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
            $table->int('pkj_bapak');
            $table->int('pkj_ibu');
            $table->int('peng_bapak');
            $table->int('pengh_ibu');
            $table->int('pend_t_ayah');
            $table->int('pend_t_ibu');
            $table->int('id_user');
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
