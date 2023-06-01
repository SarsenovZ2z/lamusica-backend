<?php

namespace App\Modules\Audio\Domain\Usecases;

class GetAudioDTO
{
    public function __construct(
        public int $id,
    ) {
    }
}
