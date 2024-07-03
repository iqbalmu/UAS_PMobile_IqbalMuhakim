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
        Schema::create('dokters', function (Blueprint $table) {
            $table->increments('id_dokter');
            $table->string('nomor_str', 20);
            $table->string('nomor_sip', 20);
            $table->string('foto', 30);
            $table->string('spesialisasi', 30);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('poli_id');
            $table->timestamps();

            $table->foreign('poli_id')->references('id_poli')->on('polis')->onDelete('cascade');
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};
