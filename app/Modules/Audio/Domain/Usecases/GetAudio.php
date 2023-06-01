<?php

namespace App\Modules\Audio\Domain\Usecases;

use App\Modules\Audio\Domain\Repositories\AudioRepository;

class GetAudio
{

    public function __construct(
        private AudioRepository $audioRepository,
    )
    {
        
    }

    public function __invoke(
        GetAudioDTO $params,
    ) {
        return $this->audioRepository
            ->getAudio(
                id: $params->id,
            );
    }
}
