<?php

namespace App\Modules\Audio\Domain\Usecases;

use App\Modules\Audio\Domain\Repositories\AudioRepository;

class AddAudio
{

    public function __construct(
        private AudioRepository $audioRepository,
    ) {
    }

    public function __invoke(AddAudioDTO $params)
    {
        // return $this->audioRepository
        //     ->addAudio(
        //         user: $params->user,
        //         audio: $params->audio,
        //     );
    }
}
