<?php

namespace App\Modules\Audio\Domain\Usecases;

use App\Modules\Audio\Domain\Repositories\PlaylistRepository;

class DeletePlaylist
{
    public function __construct(
        private PlaylistRepository $playlistRepository,
    ) {
    }

    public function __invoke(
        DeletePlaylistDTO $params,
    ) {
        return $this->playlistRepository
            ->delete(
                id: $params->id,
            );
    }
}
