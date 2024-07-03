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
        Schema::create('rekam_mediks', function (Blueprint $table) {
            $table->increments('id_rekam_medik');
            $table->string('mrn');
            // $table->date('tanggal_pemeriksaan');
            // $table->date('tanggal_entri');
            // riwayat kesehatan
            $table->string('keluhan_utama', 100);
            $table->string('riwayat_kesehatan', 100)->nullable();
            $table->string('riwayat_obat', 100)->nullable();

            // diagnosa dan tindakan
            $table->string('diagnosis', 100);
            $table->string('penatalaksanaan', 100);
            $table->string('catatan_dokter', 100)->nullable();

            // $table->unsignedInteger('pasien_id');
            $table->unsignedInteger('dokter_id');
            $table->unsignedInteger('pemeriksaan_id');
            $table->unsignedInteger('resep_id');
            $table->timestamps();

            $table->foreign('mrn')->references('mrn')->on('pasiens')->onDelete('cascade');
            $table->foreign('dokter_id')->references('id_dokter')->on('dokters')->onDelete('cascade');
            $table->foreign('pemeriksaan_id')->references('id_pemeriksaan')->on('pemeriksaans')->onDelete('cascade');
            $table->foreign('resep_id')->references('id_resep')->on('reseps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_mediks');
    }
};
