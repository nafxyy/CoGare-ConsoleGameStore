<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gamepad extends Model
{
    use HasFactory;
    protected $table = 'gamepads';
    protected $fillable = ['id_gamepad', 'nama', 'harga', 'stok', 'platform', 'gambar', 'console_id'];
}
