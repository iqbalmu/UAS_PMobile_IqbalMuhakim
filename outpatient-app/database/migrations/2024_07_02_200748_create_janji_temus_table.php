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
        Schema::create('janji_temus', function (Blueprint $table) {
            $table->increments('id_janjitemu');
            $table->string('mrn');
            $table->unsignedInteger('dokter_id');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('status', 10)->default('konfirmasi');
            $table->timestamps();

            $table->foreign('dokter_id')->references('id_dokter')->on('dokters')->onDelete('cascade');
            $table->foreign('mrn')->references('mrn')->on('pasiens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('janji_temus');
    }
};
