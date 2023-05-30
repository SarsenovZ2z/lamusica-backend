<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAudio extends Model
{
    use HasFactory;

    protected $table = 'audio_user';

    protected $fillable = [
        'user_id', 'audio_id', 'pos',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function audio()
    {
        return $this->belogsTo(Audio::class);
    }
}
