<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Console extends Model
{
    use HasFactory;
    protected $table = 'consoles';
    protected $fillable = ['id_console', 'nama', 'harga', 'stok', 'gambar'];

    public function games() : HasMany
    {
        return $this->HasMany(Games::class);
    }

    public function console(): BelongsTo
    {
        return $this->belongsTo(Gamepad::class, 'id_gamepad');
    }
}
