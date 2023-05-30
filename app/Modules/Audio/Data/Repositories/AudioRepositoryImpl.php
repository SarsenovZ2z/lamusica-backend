<?php

namespace App\Modules\Audio\Data\Repositories;

use App\Modules\Audio\Data\DataSources\AudioDataSource;
use App\Modules\Audio\Domain\Entities\Audio;
use App\Modules\Audio\Domain\Entities\HasAudios;
use App\Modules\Audio\Domain\Repositories\AudioRepository;

class AudioRepositoryImpl implements AudioRepository
{

    public function __construct(
        public AudioDataSource $audioDatasource,
    ) {
    }

    public function findAudio(int $id)
    {
        return $this->audioDatasource
            ->findAudio($id);
    }

}
