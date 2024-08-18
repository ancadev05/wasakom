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
        Schema::create('servisans', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_masuk')->nullable();
            $table->string('no_servisan')->nullable();
            $table->foreignId('costumer_id')->constrained();
            $table->text('keluhan');
            $table->foreignId('laptop_merek_id')->constrained();
            $table->string('tipe')->nullable();
            $table->string('kelengkapan')->nullable();
            $table->string('ket')->nullable();
            $table->string('gambar')->nullable();
            $table->integer('status_pengerjaan')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servisans');
    }
};
