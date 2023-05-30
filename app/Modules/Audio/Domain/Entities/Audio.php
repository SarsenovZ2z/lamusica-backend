<?php

namespace App\Modules\Audio\Domain\Entities;

use Carbon\Carbon;

class Audio
{

    public function __construct(
        public int $id,
        public string $name,
        public string $source,
        public string $source_id,
        public Carbon $created_at,
        public Carbon $updated_at,
    ) {
    }
}
