<?php

namespace App\Modules\Audio\Domain\Usecases;

class FindAudioDTO
{
    public function __construct(
        public int $id,
    ) {
    }
}
