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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user');
            // $table->string('username', 50);
            $table->string('email', 50)->unique();
            $table->string('password', 60);
            $table->string('nama', 50);
            $table->string('nomor_hp', 20);
            $table->string('status_aktif', 10)->default('aktif');
            $table->unsignedInteger('role_id');
            $table->timestamps();

            $table->foreign('role_id')->references('id_role')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
