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
        Schema::create('detail_reseps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_resep');
            $table->unsignedBigInteger('id_obat');
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('id_resep')->references('id')->on('reseps');
            $table->foreign('id_obat')->references('id')->on('obats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_reseps');
    }
};
