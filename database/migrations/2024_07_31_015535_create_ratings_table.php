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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pasien');
            $table->unsignedBigInteger('id_dokter');
            $table->unsignedBigInteger('id_pengajuan');
            $table->unsignedInteger('rating')->nullable();
            $table->text('komentar')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_pasien')->references('id')->on('users');
            $table->foreign('id_dokter')->references('id')->on('users');
            $table->foreign('id_pengajuan')->references('id')->on('pengajuans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
