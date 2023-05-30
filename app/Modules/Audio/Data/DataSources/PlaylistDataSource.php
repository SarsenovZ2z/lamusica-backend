<?php

namespace App\Modules\Audio\Data\DataSources;

use App\Modules\Audio\Domain\Entities\HasPlaylists;
use App\Modules\Audio\Domain\Entities\Playlist;
use Illuminate\Support\Collection;

interface PlaylistDataSource
{

    public function create(
        HasPlaylists $user,
        string $name,
    ): Playlist;

    public function update(
        int $id,
        string $name,
    ): Playlist;

    public function getPlaylists(HasPlaylists $user): Collection;

    public function getPlaylist(int $id): Playlist;

    public function delete(int $id): void;
}
