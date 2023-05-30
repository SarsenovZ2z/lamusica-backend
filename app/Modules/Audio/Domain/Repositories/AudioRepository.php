<?php

namespace App\Modules\Audio\Domain\Repositories;

use App\Modules\Audio\Domain\Entities\Audio;
use App\Modules\Audio\Domain\Entities\HasAudios;

interface AudioRepository
{

    public function findAudio(
        int $id,
    );
}
