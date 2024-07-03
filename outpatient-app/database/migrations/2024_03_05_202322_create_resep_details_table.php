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
        Schema::create('resep_details', function (Blueprint $table) {
            $table->increments('id_resep_detail');
            $table->unsignedInteger('resep_id');
            $table->unsignedInteger('obat_id');
            $table->string('dosis', 30);
            $table->string('frekuensi', 30);
            $table->string('durasi', 30);
            $table->string('metode', 30);
            $table->string('syarat', 30);
            $table->timestamps();

            $table->foreign('obat_id')->references('id_obat')->on('obats')->onDelete('cascade');
            $table->foreign('resep_id')->references('id_resep')->on('reseps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resep_details');
    }
};
