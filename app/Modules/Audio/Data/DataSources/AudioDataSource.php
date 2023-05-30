<?php

namespace App\Modules\Audio\Data\DataSources;

use App\Modules\Audio\Domain\Entities\Audio;
use App\Modules\Audio\Domain\Entities\HasAudios;

interface AudioDataSource
{
    public function findAudio(int $id): Audio;
}
