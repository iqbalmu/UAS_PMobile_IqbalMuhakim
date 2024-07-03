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
        Schema::create('pemeriksaans', function (Blueprint $table) {
            $table->increments('id_pemeriksaan');
            $table->string('suhu', 10)->nullable();
            $table->string('tekanan_darah', 10)->nullable();
            $table->string('nadi', 10)->nullable();
            $table->string('pernapasan', 10)->nullable();
            $table->integer('tinggi')->nullable();
            $table->integer('berat')->nullable();
            $table->string('laboratorium', 10)->nullable();
            $table->string('rontgen', 10)->nullable();
            $table->string('ctscan', 10)->nullable();
            $table->string('usg', 10)->nullable();
            $table->string('mri', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaans');
    }
};
