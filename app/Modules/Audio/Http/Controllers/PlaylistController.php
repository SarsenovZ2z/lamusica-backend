<?php

namespace App\Modules\Audio\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use App\Modules\Audio\Http\Requests\CreatePlaylistRequest;
use App\Modules\Audio\Http\Requests\UpdatePlaylistRequest;
use App\Modules\Audio\Http\Resources\PlaylistResource;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Playlist::class, 'playlist');
    }

    public function store(
        CreatePlaylistRequest $request,
    ) {
        $playlist = Playlist::create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
        ]);

        return response()->json(
            new PlaylistResource($playlist),
            201
        );
    }

    public function index(
        Request $request,
    ) {
        return response()->json(
            $request->user()
                ->playlists
        );
    }

    public function show(
        Playlist $playlist,
    ) {
        $playlist->load([
            'playlistAudios' => fn ($query) => $query->with('audio'),
        ]);

        return response()->json(
            new PlaylistResource($playlist)
        );
    }

    public function update(
        UpdatePlaylistRequest $request,
        Playlist $playlist,
    ) {
        $playlist->update([
            'name' => $request->name,
        ]);

        return response()->json(
            new PlaylistResource($playlist)
        );
    }

    public function destroy(
        Playlist $playlist,
    ) {
        $playlist->delete();
    }
}
