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
        Schema::create('jadwal_prakteks', function (Blueprint $table) {
            $table->increments('id_jadwal');
            $table->string('hari', 30);
            $table->time('startTime');
            $table->time('endTime');
            $table->unsignedInteger('dokter_id');
            $table->timestamps();

            $table->foreign('dokter_id')->references('id_dokter')->on('dokters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_prakteks');
    }
};
