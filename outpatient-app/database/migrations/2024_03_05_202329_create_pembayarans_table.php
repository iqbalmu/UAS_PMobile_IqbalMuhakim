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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->increments('id_pembayaran');
            $table->string('mrn');
            $table->integer('total_harga');
            $table->string('checkout_link')->nullable();
            $table->string('external_id')->nullable();
            $table->string('status', 50);
            $table->unsignedInteger('rekam_medik_id')->nullable();
            $table->timestamps();

            // $table->foreign('resep_id')->references('id_resep')->on('reseps')->onDelete('cascade');
            $table->foreign('rekam_medik_id')->references('id_rekam_medik')->on('rekam_mediks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
