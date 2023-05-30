<?php

namespace App\Modules\Audio\Domain\Usecases;

class GetPlaylistDTO
{
    public function __construct(
        public int $id,
    ) {
    }
}
