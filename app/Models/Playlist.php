<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function playlistAudios()
    {
        return $this->hasMany(PlaylistAudio::class);
    }

    public function userAudios()
    {
        return $this->belongsToMany(UserAudio::class);
    }
}