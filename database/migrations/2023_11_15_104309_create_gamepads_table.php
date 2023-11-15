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
        Schema::create('gamepads', function (Blueprint $table) {
            $table->id();
            $table->string('id_gamepad')->unique();
            $table->string('nama');
            $table->string('harga');
            $table->string('stok');
            $table->string('platform');
            $table->string('gambar');
            $table->foreignId('console_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gamepads');
    }
};
