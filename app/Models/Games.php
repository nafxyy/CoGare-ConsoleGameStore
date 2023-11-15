<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Games extends Model
{
    use HasFactory;
    protected $table = 'games';
    protected $fillable = ['id_game', 'judul', 'harga', 'stok', 'platform', 'gambar', 'console_id'];

    public function console(): BelongsTo
    {
        return $this->belongsTo(Console::class, 'console_id');
    }
}
