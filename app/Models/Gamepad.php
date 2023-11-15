<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gamepad extends Model
{
    use HasFactory;
    protected $table = 'gamepads';
    protected $fillable = ['id_gamepad', 'nama', 'harga', 'stok', 'platform', 'gambar', 'console_id'];

    public function console(): BelongsTo
    {
        return $this->belongsTo(Console::class, 'console_id');
    }
}
