<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produks';
    protected $fillable = ['id_produk', 'nama', 'harga', 'stok', 'platform', 'jenis', 'gambar'];

    public function keranjang(): HasMany
    {
        return $this->hasMany(Keranjang::class, 'produk_id');
    }
}
