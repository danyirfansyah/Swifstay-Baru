<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Nama',
        'Lokasi',
        'Harga',
        'Fasilitas',
        'Gambar',
        'user_id', // foreign key to the User table
    ];

    /**
     * Relationship with User model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); // user_id is foreign key in kos table
    }

    public function favorit()
    {
        return $this->hasMany(Favorit::class, 'id_kos');
    }
}
