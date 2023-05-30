<?php

namespace App\Modules\Audio\Domain\Usecases;

class UpdatePlaylistDTO
{
    public function __construct(
        public int $id,
        public string $name,
    ) {
    }
}
