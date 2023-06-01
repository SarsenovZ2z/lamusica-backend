<?php

namespace App\Modules\Audio\Domain\Usecases;

use App\Modules\Audio\Domain\Entities\HasPlaylists;

class GetUserPlaylistsDTO
{
    public function __construct(
        public HasPlaylists $user,
    ) {
    }
}
