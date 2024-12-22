<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorit extends Model
{
    protected $table = 'wishlist';
    protected $fillable = [
        'id_user',
        'id_kos',
    ];

    public function kost()
    {
        return $this->belongsTo(Kos::class, 'id_kos');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
