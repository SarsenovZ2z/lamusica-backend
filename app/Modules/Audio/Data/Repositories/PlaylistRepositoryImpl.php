<?php

namespace App\Modules\Audio\Data\Repositories;

use App\Modules\Audio\Data\DataSources\PlaylistDataSource;
use App\Modules\Audio\Domain\Entities\HasPlaylists;
use App\Modules\Audio\Domain\Entities\PlaylistEntity;
use App\Modules\Audio\Domain\Repositories\PlaylistRepository;
use Illuminate\Support\Collection;

class PlaylistRepositoryImpl implements PlaylistRepository
{

    public function __construct(
        private PlaylistDataSource $playlistDataSource,
    ) {
    }

    public function createPlaylist(
        HasPlaylists $user,
        string $name,
    ): PlaylistEntity {
        return $this->playlistDataSource
            ->createPlaylist(
                user: $user,
                name: $name,
            );
    }

    public function getPlaylists(
        HasPlaylists $user,
    ): Collection {
        return $this->playlistDataSource
            ->getPlaylists(
                user: $user,
            );
    }

    public function getPlaylistById(
        int $id,
    ): PlaylistEntity {
        return $this->playlistDataSource
            ->getPlaylistById(
                id: $id,
            );
    }

    public function updatePlaylist(
        PlaylistEntity $playlist,
        string $name,
    ): PlaylistEntity {
        return $this->playlistDataSource
            ->updatePlaylist(
                playlist: $playlist,
                name: $name,
            );
    }

    public function deletePlaylist(
        PlaylistEntity $playlist,
    ): void {
        $this->playlistDataSource
            ->deletePlaylist($playlist);
    }
}
