<?php

namespace App\Modules\Audio\Domain\Usecases;

use App\Modules\Audio\Domain\Entities\HasPlaylists;

class CreatePlaylistDTO
{
    public function __construct(
        public HasPlaylists $user,
        public string $name,
    ) {
    }
}
