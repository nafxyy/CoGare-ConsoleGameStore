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
        //protected $fillable = ['tanggal', 'nama_barang', 'harga', 'jumlah','status'];
        Schema::create('keranjangs', function (Blueprint $table) {
            $table->id();
            $table->integer('produk_id');
            $table->integer('pesanan_id');
            $table->integer('jumlah_item');
            $table->integer('jumlah_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjangs');
    }
};
