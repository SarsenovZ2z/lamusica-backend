<?php

namespace App\Modules\Audio\Domain\Usecases;

use App\Modules\Audio\Domain\Repositories\PlaylistRepository;

class GetPlaylists
{
    public function __construct(
        private PlaylistRepository $playlistRepository,
    ) {
    }

    public function __invoke(
        GetPlaylistsDTO $params,
    ) {
        return $this->playlistRepository
            ->getPlaylists(
                user: $params->user,
            );
    }
}
