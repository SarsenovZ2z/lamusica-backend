<?php

namespace App\Modules\Audio\Data\DataSources;

use App\Modules\Audio\Domain\Entities\Audio;
use App\Modules\Audio\Domain\Entities\HasAudios;
use Illuminate\Support\Collection;

interface AudioDataSource
{

    public function getUserAudios(
        HasAudios $user,
    ): Collection;

    public function getAudio(
        int $id,
    ): Audio;
}
