<?php

namespace App\Modules\Audio\Domain\Entities;

use Carbon\Carbon;

class PlaylistEntity
{
    public function __construct(
        public int $id,
        public string $name,
        public int $user_id,
        public Carbon $created_at,
        public Carbon $updated_at,
    ) {
    }
}
