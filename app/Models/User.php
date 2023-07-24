<?php

namespace App\Models;

use App\Modules\Push\Concerns\HasPushTokens;
use App\Modules\Push\Contracts\HasPushTokens as HasPushTokensContract;
use App\Modules\Push\Contracts\PushToken;
use App\Modules\Push\Providers\FCM\FCMPushToken;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends AuthenticatableUser implements HasPushTokensContract
{
    use HasFactory, HasApiTokens, Notifiable, HasPushTokens;

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

    public function loadPushTokens(): void
    {
        // TODO: load tokens

        // $query->load('pushTokens');
    }

    public function scopeWithPushTokens(Builder $query): void
    {
        // TODO: something like
        // $query->with(['pushTokens' => function ($query) {
        //     $query->latest()->take(5);
        // }]);
    }

    public function setPushToken(PushToken $token): void
    {
        // TODO: add push token
    }

    public function getPushTokens(): array
    {
        return [
            new FCMPushToken(token: 'fWayVeOdbUvfu10YdOqoCu:APA91bHXsJ9Mp0WVX7lE5jsH_PzENJ6AkH7_GkcTGjNyrQFPeT7cCbROIleNbL7pQOQhHkAEmqEvSG4IWZ29GYiupIBw7Yt-FbvMI3zoq68T_fVo6Apc78QuBc_T12sC8YWY3WsUttav'),
        ];
    }
}
