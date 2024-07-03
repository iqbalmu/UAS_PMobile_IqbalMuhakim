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
        Schema::create('antrians', function (Blueprint $table) {
            $table->increments('id_antrian');
            $table->string('mrn');
            $table->unsignedInteger('poli_id');
            $table->date('tanggal');
            $table->unsignedInteger('nomor');
            $table->string('status', 10)->default('menunggu');
            $table->timestamps();

            $table->foreign('poli_id')->references('id_poli')->on('polis')->onDelete('cascade');
            $table->foreign('mrn')->references('mrn')->on('pasiens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antrians');
    }
};
