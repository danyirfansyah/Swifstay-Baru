<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    // Kolom yang diizinkan untuk mass assignment
    protected $table = 'ulasan';
    protected $fillable = [
        'id_kos',     // ID kos yang diulas
        'id_user',     // ID pengguna yang memberikan ulasan
        'username',      // Isi ulasan
        'ulasan_user',      // Isi ulasan
        'Nilai',       // Rating ulasan (1-5)
    ];
}
