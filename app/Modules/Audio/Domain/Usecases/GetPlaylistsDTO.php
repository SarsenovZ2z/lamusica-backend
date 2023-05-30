<?php

namespace App\Modules\Audio\Domain\Usecases;

use App\Modules\Audio\Domain\Entities\HasPlaylists;

class GetPlaylistsDTO
{
    public function __construct(
        public HasPlaylists $user,
    ) {
    }
}
