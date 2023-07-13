<?php

namespace App\Modules\Audio\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Audio;
use App\Modules\Audio\Http\Requests\CreateAudioRequest;
use App\Modules\Audio\Http\Requests\UpdateAudioRequest;
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

    public function store(
        CreateAudioRequest $request,
    ) {
        $audio = Audio::firstOrCreate([
            'source' => $request->source,
            'source_id' => $request->source_id,
        ], [
            'name' => $request->name,
        ]);

        return response()->json(
            new AudioResource($audio),
            201
        );
    }

    public function update(
        UpdateAudioRequest $request,
        Audio $audio,
    ) {
        $audio->update([
            'name' => $request->name,
        ]);

        return response()->json(
            new AudioResource($audio),
        );
    }

    public function destroy(
        Audio $audio,
    ) {
        $audio->delete();
    }
}
