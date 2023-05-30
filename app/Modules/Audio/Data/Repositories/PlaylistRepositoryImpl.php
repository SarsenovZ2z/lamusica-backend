<?php

namespace App\Modules\Audio\Data\Repositories;

use App\Modules\Audio\Data\DataSources\PlaylistDataSource;
use App\Modules\Audio\Domain\Entities\HasPlaylists;
use App\Modules\Audio\Domain\Entities\Playlist;
use App\Modules\Audio\Domain\Repositories\PlaylistRepository;
use Illuminate\Support\Collection;

class PlaylistRepositoryImpl implements PlaylistRepository
{

    public function __construct(
        private PlaylistDataSource $playlistDataSource,
    ) {
    }

    public function create(
        HasPlaylists $user,
        string $name,
    ): Playlist {
        return $this->playlistDataSource
            ->create(
                user: $user,
                name: $name,
            );
    }

    public function getPlaylists(
        HasPlaylists $user,
    ): Collection {
        return $this->playlistDataSource
            ->getPlaylists($user);
    }

    public function getPlaylist(
        int $id,
    ): Playlist {
        return $this->playlistDataSource
            ->getPlaylist($id);
    }

    public function update(
        int $id,
        string $name,
    ): Playlist {
        return $this->playlistDataSource
            ->update(
                id: $id,
                name: $name,
            );
    }

    public function delete(
        int $id,
    ): void {
        $this->playlistDataSource
            ->delete($id);
    }
}
