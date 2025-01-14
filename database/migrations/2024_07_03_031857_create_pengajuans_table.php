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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pasien');
            $table->unsignedBigInteger('id_dokter')->nullable();
            $table->unsignedBigInteger('id_poli')->nullable();
            $table->string('keluhan');
            $table->enum('status', ['Ditolak', 'Diterima', 'Diproses', 'Selesai'])->default('Diterima');
            $table->date('tanggal_pengajuan')->nullable();
            $table->date('tanggal_pemeriksaan')->nullable();
            $table->string('qrcode')->nullable();
            $table->enum('status_qrcode', ['null', 'aktif', 'expired'])->default('null');
            $table->string('catatan')->nullable();
            $table->unsignedBigInteger('id_rating')->nullable();
            $table->softDeletes();
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_pasien')->references('id')->on('users');
            $table->foreign('id_dokter')->references('id')->on('users');
            $table->foreign('id_poli')->references('id')->on('polis');
            $table->foreign('id_rating')->references('id')->on('ratings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
