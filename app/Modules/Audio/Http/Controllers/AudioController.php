<?php

namespace App\Modules\Audio\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Audio\Domain\Entities\Audio;
use App\Modules\Audio\Domain\Usecases\AddAudio;
use App\Modules\Audio\Domain\Usecases\AddAudioDTO;
use App\Modules\Audio\Domain\Usecases\FindAudio;
use Illuminate\Http\Request;

class AudioController extends Controller
{

    public function getCurrentUserAudios(Request $request)
    {
        return [];
    }

    public function addAudio(
        Request $request,
        FindAudio $findAudio,
        AddAudio $addAudio,
    ) {
        $user = $request->user() ?? \App\Models\User::first();
        $audio = $findAudio(id: $request->id);

        $addAudio(
            new AddAudioDTO(
                user: $user,
                audio: $audio,
            )
        );
    }

    public function deleteAudio(Request $request)
    {
    }
}
