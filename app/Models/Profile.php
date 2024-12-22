<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'profiles';
    protected $fillable = [
        'id_user',
        'nama',
        'Jenis_Kelamin',
        'Tanggal_lahir',
        'Nomor_Telepon',
        'img_prof',
    ];

    /**
     * Relationship with User model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); // Foreign key on profiles table
    }
}
