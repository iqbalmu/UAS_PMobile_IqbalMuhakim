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
        Schema::create('obats', function (Blueprint $table) {
            $table->increments('id_obat');
            $table->string('nama', 50);
            $table->string('kategori', 50);
            $table->integer('harga');
            $table->string('stok', 50);
            $table->string('penyedia', 50);
            $table->string('keterangan', 100)->nullable();
            $table->date('kadaluarsa');
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
        Schema::dropIfExists('obats');
    }
};
