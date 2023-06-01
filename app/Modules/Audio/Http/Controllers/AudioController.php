<?php

namespace App\Modules\Audio\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Audio\Domain\Usecases\AddAudio;
use App\Modules\Audio\Domain\Usecases\AddAudioDTO;
use Illuminate\Http\Request;

class AudioController extends Controller
{

    public function getCurrentUserAudios(Request $request)
    {
        return [];
    }

}
