<?php

namespace App\Modules\Audio\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Audio;
use App\Modules\Audio\Http\Requests\CreateAudioRequest;
use App\Modules\Audio\Http\Resources\AudioResource;

class AudioController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Audio::class, 'audio');
    }

    public function index()
    {
        $query = Audio::query();


        return AudioResource::collection(
            $query->paginate(10)
        );
    }

    public function store(CreateAudioRequest $request)
    {
        $audio = Audio::create([
            'name' => $request->name,
            'source' => $request->source,
            'source_id' => $request->source_id,
        ]);
    }

    public function destroy(Audio $audio)
    {
        $audio->delete();
    }
}
