<?php

namespace App\Modules\Audio\Domain\Repositories;

use App\Modules\Audio\Domain\Entities\Audio;
use App\Modules\Audio\Domain\Entities\HasAudios;
use Illuminate\Support\Collection;

interface AudioRepository
{

    public function getUserAudios(
        HasAudios $user,
    ): Collection;

    public function getAudio(
        int $id,
    ): Audio;
}
