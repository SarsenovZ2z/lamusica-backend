<?php

namespace App\Modules\Audio\Data\Models;

use App\Models\Playlist as PlaylistModel;
use App\Modules\Audio\Domain\Entities\Playlist;

class PlaylistAdapter
{

    public static function fromModel(PlaylistModel $playlist): Playlist
    {
        return new Playlist(
            id: $playlist->id,
            name: $playlist->name,
            audios: $playlist->userAudios
                ?->map(function ($userAudio) {
                    return AudioAdapter::fromModel($userAudio->audio);
                }),
        );
    }

    public static function toArray(Playlist $playlist): array
    {
        return [
            'id' => $playlist->id,
            'name' => $playlist->name,
            'audios' => $playlist->audios?->map(function ($audio) {
                return AudioAdapter::toArray($audio);
            }),
        ];
    }
}
