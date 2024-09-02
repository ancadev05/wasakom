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
        Schema::create('servisan_teknisis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servisan_id')->constrained();
            $table->string('kerusakan')->nullable();
            $table->enum('status', ['Selesai', 'Proses', 'Oper Vendor', 'Cancel', 'Diambil'])->default('Proses');
            $table->date('estimasi')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->enum('jenis_kerusakan', ['Ringan', 'Sedang', 'Berat'])->default('Ringan');
            $table->text('ket')->nullable();
            $table->text('catatan')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servisan_teknisis');
    }
};
