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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('nama');
            $table->string('password');
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif');
            $table->enum('role', ['Pasien', 'Dokter', 'Admin'])->default('Pasien');
            $table->unsignedBigInteger('divisi_id');
            $table->date('tanggal_lahir')->nullable();
            $table->float('tinggi_badan')->nullable();
            $table->float('berat_badan')->nullable();
            $table->softDeletes();
            $table->timestamps();

            // Foreign keys
            $table->foreign('divisi_id')->references('id')->on('divisis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
