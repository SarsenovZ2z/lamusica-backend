<?php

namespace App\Modules\Audio\Data\Models;

use App\Models\Audio as AudioModel;
use App\Modules\Audio\Domain\Entities\Audio;

class AudioAdapter
{

    public static function fromModel(AudioModel $audio): Audio
    {
        return new Audio(
            id: $audio->id,
            name: $audio->name,
            source: $audio->source,
            source_id: $audio->source_id,
            created_at: $audio->created_at,
            updated_at: $audio->updated_at,
        );
    }

    public static function toArray(Audio $audio): array
    {
        return [
            'id' => $audio->id,
            'name' => $audio->name,
            'source' => $audio->source,
            'source_id' => $audio->source_id,
            'created_at' => $audio->created_at,
            'updated_at' => $audio->updated_at,
        ];
    }
}
