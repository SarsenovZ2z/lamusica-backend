<?php

namespace App\Modules\Audio\Data\Repositories;

use App\Modules\Audio\Data\DataSources\AudioDataSource;
use App\Modules\Audio\Domain\Entities\Audio;
use App\Modules\Audio\Domain\Entities\HasAudios;
use App\Modules\Audio\Domain\Repositories\AudioRepository;
use Illuminate\Support\Collection;

class AudioRepositoryImpl implements AudioRepository
{

    public function __construct(
        public AudioDataSource $audioDatasource,
    ) {
    }

    public function getUserAudios(
        HasAudios $user,
    ): Collection {
        return $this->audioDatasource
            ->getUserAudios($user);
    }

    public function getAudio(
        int $id,
    ): Audio {
        return $this->audioDatasource
            ->getAudio($id);
    }
}
