<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produks';
    protected $fillable = ['id_produk', 'nama', 'harga', 'stok', 'platform', 'jenis', 'gambar'];
}
