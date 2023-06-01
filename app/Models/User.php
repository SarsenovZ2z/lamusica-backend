<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends AuthenticatableUser
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function userAudios()
    {
        return $this->hasMany(UserAudio::class);
    }

    public function audios()
    {
        return $this->belongsToMany(Audio::class);
    }

    public function playlists()
    {
        return $this->hasMany(Playlist::class);
    }
}
