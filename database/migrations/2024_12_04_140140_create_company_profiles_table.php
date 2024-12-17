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
            $table->text('main_page_header');
            $table->text('main_page_title');
            $table->text('second_page_header');
            $table->text('second_page_title');
            $table->text('second_page_desc')->nullable();
            $table->text('third_page_header');
            $table->text('third_page_title');
            $table->text('third_page_desc')->nullable();
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
