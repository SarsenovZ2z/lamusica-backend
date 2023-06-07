<?php

namespace App\Modules\Audio\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Audio;
use App\Models\Playlist;
use App\Models\UserAudio;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function toggleAudio(
        Request $request,
        Audio $audio,
    ): void
    {
        $this->authorize('view', $audio);
        $this->authorize('create', UserAudio::class);

        $request->user()
            ->audios()
            ->toggle($audio);
    }

    public function togglePlaylistAudio(
        Playlist $playlist,
        UserAudio $userAudio,
    ): void
    {
        $this->authorize('update', $playlist);
        $this->authorize('view', $userAudio);

        $playlist->userAudios()
            ->toggle($userAudio);
    }
}
