<?php

namespace App\Modules\Audio\Domain\Entities;

use Illuminate\Support\Collection;

class Playlist
{
    public function __construct(
        public int $id,
        public string $name,
        public Collection|null $audios,
    ) {
    }
}
