<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans';
    protected $fillable = ['user_id', 'id', 'tanggal', 'status', 'kode', 'jumlah_harga', 'total_item'];
    public function keranjang(): HasMany
    {
        return $this->hasMany(Keranjang::class, 'pesanan_id');
    }
}
