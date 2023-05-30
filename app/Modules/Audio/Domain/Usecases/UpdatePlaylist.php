<?php

namespace App\Modules\Audio\Domain\Usecases;

use App\Modules\Audio\Domain\Repositories\PlaylistRepository;

class UpdatePlaylist
{
    public function __construct(
        private PlaylistRepository $playlistRepository,
    ) {
    }

    public function __invoke(UpdatePlaylistDTO $params)
    {
        return $this->playlistRepository
            ->update(
                id: $params->id,
                name: $params->name,
            );
    }
}
