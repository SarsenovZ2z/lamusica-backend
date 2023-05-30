<?php

namespace App\Modules\Audio\Domain\Usecases;

use App\Modules\Audio\Domain\Repositories\AudioRepository;

class FindAudio
{

    public function __construct(
        private AudioRepository $audioRepository,
    )
    {
        
    }

    public function __invoke(
        FindAudioDTO $params,
    ) {
        return $this->audioRepository
            ->findAudio(
                id: $params->id,
            );
    }
}
