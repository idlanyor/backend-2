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
        Schema::create('tahapan_proses_pendaftar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_tahapan_proses');
            $table->string('status');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('pd_users')->onDelete('cascade');
            $table->foreign('id_tahapan_proses')->references('id')->on('tahapan_proses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tahapan_proses_pendaftar');
    }
};
