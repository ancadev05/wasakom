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
        Schema::create('gambar_produks', function (Blueprint $table) {
            $table->id();
            $table->string('gambar_1')->nullable();
            $table->string('gambar_2')->nullable();
            $table->string('gambar_3')->nullable();
            $table->string('gambar_4')->nullable();
            $table->string('gambar_5')->nullable();
            $table->foreignId('laptop_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gambar_produks');
    }
};
