<?php

namespace App\Modules\Audio\Domain\Usecases;

use App\Modules\Audio\Domain\Repositories\PlaylistRepository;

class GetUserPlaylists
{
    public function __construct(
        private PlaylistRepository $playlistRepository,
    ) {
    }

    public function __invoke(
        GetUserPlaylistsDTO $params,
    ) {
        return $this->playlistRepository
            ->getUserPlaylists(
                user: $params->user,
            );
    }
}
