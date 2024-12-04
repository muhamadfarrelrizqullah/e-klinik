<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pivot_poli_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_dokter')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_poli')->constrained('polis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pivot_poli_users');
    }
};
