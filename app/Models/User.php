<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relationship with Profile model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class, 'id_user'); // Profile references User's id_user field
    }

     /**
     * Relationship with Kos model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kos()
    {
        return $this->hasMany(Kos::class, 'id_user'); // user_id is the foreign key in kos table
    }

    public function favorit()
    {
        return $this->hasMany(Favorit::class, 'id_user');
    }
}
