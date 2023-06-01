<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaylistAudio extends Model
{
    use HasFactory;

    protected $table = 'playlist_user_audio';

    protected $fillable = [
        'playlist_id', 'user_audio_id', 'pos',
    ];

    public function playlist()
    {
        return $this->belongsTo(Playlist::class);
    }

    public function userAudio()
    {
        return $this->belongsTo(UserAudio::class);
    }
}
