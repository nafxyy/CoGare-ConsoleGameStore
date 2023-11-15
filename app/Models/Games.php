<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;
    protected $table = 'games';
    protected $fillable = ['id_game', 'judul', 'harga', 'stok', 'platform', 'gambar', 'console_id'];
}
