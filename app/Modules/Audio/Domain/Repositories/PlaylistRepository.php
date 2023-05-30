<?php

namespace App\Modules\Audio\Domain\Repositories;

use App\Modules\Audio\Domain\Entities\HasPlaylists;
use App\Modules\Audio\Domain\Entities\Playlist;
use Illuminate\Support\Collection;

interface PlaylistRepository
{
    public function create(
        HasPlaylists $user,
        string $name,
    ): Playlist;

    public function update(
        int $id,
        string $name,
    ): Playlist;

    public function getPlaylists(
        HasPlaylists $user,
    ): Collection;

    public function getPlaylist(
        int $id,
    ): Playlist;

    public function delete(
        int $id,
    ): void;
}
