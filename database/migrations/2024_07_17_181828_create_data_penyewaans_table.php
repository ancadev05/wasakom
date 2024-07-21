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
        Schema::create('data_penyewaans', function (Blueprint $table) {
            $table->id();
            $table->date("tgl_buat");
            $table->date("tgl_mulai");
            $table->date("tgl_selesai");
            $table->string('keterangan');
            $table->foreignId('laptop_id')->constrained();
            $table->foreignId('data_costumer_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penyewaans');
    }
};
