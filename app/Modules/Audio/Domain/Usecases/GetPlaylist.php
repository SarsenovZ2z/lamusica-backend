<?php

namespace App\Modules\Audio\Domain\Usecases;

use App\Modules\Audio\Domain\Repositories\PlaylistRepository;

class GetPlaylist
{
    public function __construct(
        private PlaylistRepository $playlistRepository,
    ) {
    }

    public function __invoke(
        GetPlaylistDTO $params,
    ) {
        return $this->playlistRepository
            ->getPlaylist(
                id: $params->id,
            );
    }
}
