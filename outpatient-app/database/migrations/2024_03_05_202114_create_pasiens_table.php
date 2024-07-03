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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->increments('id_pasien');
            $table->string('mrn')->unique();
            $table->string('nik', 16);
            $table->string('bpjs', 13)->nullable();
            $table->string('jenis_kelamin', 1);
            $table->string('alamat', 100);
            $table->string('profesi', 50);
            $table->string('image_profile')->nullable();
            // $table->integer('tinggi_badan');
            // $table->integer('berat_badan');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
