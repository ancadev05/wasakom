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
        Schema::create('laptops', function (Blueprint $table) {
            $table->id();
            $table->date('tgl');
            $table->string('sn')->unique();
            $table->string('kode_barang')->unique()->nullable();
            $table->string('cpu');
            $table->string('gpu');
            $table->string('ram');
            $table->string('storage');
            $table->integer('status');
            $table->integer('kondisi');
            $table->string('layar')->nullable();
            $table->text('keterangan')->nullable();
            $table->foreignId('laptop_merek_id')->constrained();
            $table->foreignId('laptop_tipe_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
