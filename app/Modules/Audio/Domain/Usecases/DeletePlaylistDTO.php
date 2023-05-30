<?php

namespace App\Modules\Audio\Domain\Usecases;

class DeletePlaylistDTO
{
    public function __construct(
        public int $id,
    ) {
    }
}
