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
        Schema::create('laptop_terjuals', function (Blueprint $table) {
            $table->id();
            $table->string('nama_costumer');
            $table->string('merek_tipe');
            $table->string('spesifikasi');
            $table->text('ket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptop_terjuals');
    }
};
