<?php

namespace App\Modules\Audio\Data\DataSources;

use App\Models\Audio as AudioModel;
use App\Modules\Audio\Data\Models\AudioAdapter;
use App\Modules\Audio\Domain\Entities\HasAudios;
use App\Modules\Audio\Domain\Entities\Audio;

class AudioEloquentDataSource implements AudioDataSource
{

    public function __construct(
        private AudioModel $audioModel,
    ) {
    }

    public function findAudio(int $id): Audio
    {
        return AudioAdapter::fromModel(
            $this->audioModel->findOrFail($id)
        );
    }
}
