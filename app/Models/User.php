<?php

namespace App\Models;

use App\Modules\Audio\Domain\Entities\HasAudios;
use App\Modules\Audio\Domain\Entities\HasPlaylists;
use App\Modules\Auth\Data\Models\AuthenticatableModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends AuthenticatableModel implements HasAudios, HasPlaylists
{
    use HasFactory, Notifiable;

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
