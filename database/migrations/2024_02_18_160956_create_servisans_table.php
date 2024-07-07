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
            $table->date('tgl_masuk');
            $table->string('nama');
            $table->integer('hp');
            $table->text('alamat');
            $table->string('penerima');
            $table->text('keluan');
            $table->string('kelengkapan');
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
