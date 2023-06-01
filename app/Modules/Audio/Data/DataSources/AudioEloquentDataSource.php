<?php

namespace App\Modules\Audio\Data\DataSources;

use App\Models\Audio as AudioModel;
use App\Modules\Audio\Data\Models\AudioAdapter;
use App\Modules\Audio\Domain\Entities\HasAudios;
use App\Modules\Audio\Domain\Entities\Audio;
use Illuminate\Support\Collection;

class AudioEloquentDataSource implements AudioDataSource
{

    public function __construct(
        private AudioModel $model,
    ) {
    }

    public function getUserAudios(
        HasAudios $user,
    ): Collection {
        return $this->model
            ->whereHas(
                'users',
                fn ($query) =>
                $query->where('user_id', $user->getKey())
            );
    }

    public function getAudio(
        int $id,
    ): Audio {
        return AudioAdapter::fromModel(
            $this->model
                ->findOrFail($id)
        );
    }
}
