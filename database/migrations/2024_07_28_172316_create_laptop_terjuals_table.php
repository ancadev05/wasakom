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
            $table->date('tgl_jual')->nullable();
            $table->string('mt');
            $table->string('spesifikasi');
            $table->text('keterangan')->nullable();
            $table->integer('harga_jual')->nullable();
            $table->foreignId('costumer_id')->constrained();
            $table->foreignId('user_id')->constrained();
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
