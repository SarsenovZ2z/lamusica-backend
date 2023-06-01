<?php

namespace App\Modules\Audio\Data\DataSources;

use App\Modules\Audio\Domain\Entities\HasPlaylists;
use App\Modules\Audio\Domain\Entities\PlaylistEntity;
use Illuminate\Support\Collection;

interface PlaylistDataSource
{

    public function createPlaylist(
        HasPlaylists $user,
        string $name,
    ): PlaylistEntity;

    public function getPlaylists(
        HasPlaylists $user,
    ): Collection;

    public function getPlaylistById(
        int $id,
    ): PlaylistEntity;

    public function updatePlaylist(
        PlaylistEntity $playlist,
        string $name,
    ): PlaylistEntity;

    public function deletePlaylist(
        PlaylistEntity $playlist,
    ): void;
}
