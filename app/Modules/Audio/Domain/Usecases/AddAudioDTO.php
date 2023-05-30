<?php

namespace App\Modules\Audio\Domain\Usecases;

use App\Modules\Audio\Domain\Entities\Audio;
use App\Modules\Audio\Domain\Entities\HasAudios;

class AddAudioDTO
{
    public function __construct(
        public HasAudios $user,
        public Audio $audio,
    ) {
    }
}
