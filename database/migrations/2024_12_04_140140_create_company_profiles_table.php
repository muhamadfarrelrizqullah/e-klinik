<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('company_profiles', function (Blueprint $table) {
        $table->id();
        $table->text('main_page_header'); // Untuk deskripsi
        $table->text('main_page_title'); // Untuk judul
        $table->text('second_page_header'); // Untuk deskripsi
        $table->text('second_page_title'); // Untuk deskripsi
        $table->text('second_page_desc')->nullable(); // Untuk email perusahaan
        $table->text('third_page_header'); // Untuk deskripsi
        $table->text('third_page_title'); // Untuk deskripsi
        $table->text('third_page_desc')->nullable(); // Untuk email perusahaan
        // $table->string('phone')->nullable(); // Untuk nomor telepon
        // $table->string('address')->nullable(); // Untuk alamat
        // $table->string('logo')->nullable(); // Untuk menyimpan path logo
        // $table->text('social_links')->nullable(); // JSON untuk link sosial media
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_profiles');
    }
};
