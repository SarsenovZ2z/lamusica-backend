<?php

namespace App\Modules\Audio\Domain\Usecases;

use App\Modules\Audio\Domain\Repositories\PlaylistRepository;

class CreatePlaylist
{

    public function __construct(
        private PlaylistRepository $playlistRepository,
    ) {
    }

    public function __invoke(CreatePlaylistDTO $params)
    {
        return $this->playlistRepository
            ->create(
                user: $params->user,
                name: $params->name,
            );
    }
}
