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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('manufacturer');
            $table->string('image_name');
            $table->string('image_path');
            $table->string('JDD2021_code')->nullable();
            $table->string('FFPWD_code')->nullable();
            $table->string('UDF_code')->nullable();
            $table->string('SCF_code')->nullable();
            $table->foreignId('reviews_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
