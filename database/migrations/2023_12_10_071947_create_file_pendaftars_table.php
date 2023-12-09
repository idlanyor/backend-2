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
        Schema::create('file_pendaftar', function (Blueprint $table) {
            $table->id();
            $table->string('kk');
            $table->string('ijazah');
            $table->string('skl');
            $table->string('pasfoto');
            $table->unsignedBigInteger('id_pendaftar');
            $table->foreign('id_pendaftar')->references('id')->on('pd_users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_pendaftar');
    }
};
