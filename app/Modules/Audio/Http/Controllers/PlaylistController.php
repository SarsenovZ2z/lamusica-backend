<?php

namespace App\Modules\Audio\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use App\Modules\Audio\Data\Models\PlaylistAdapter;
use App\Modules\Audio\Domain\Repositories\PlaylistRepository;
use App\Modules\Audio\Http\Requests\CreatePlaylistRequest;
use App\Modules\Audio\Http\Requests\UpdatePlaylistRequest;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{

    public function __construct(
        private PlaylistRepository $playlistRepository,
    ) {
        $this->authorizeResource(Playlist::class, 'playlist');
    }

    public function store(
        CreatePlaylistRequest $request,
    ) {
        return response()->json(
            $this->playlistRepository
                ->createPlaylist(
                    user: $request->user(),
                    name: $request->name,
                ),
            201
        );
    }

    public function index(
        Request $request,
    ) {
        return response()->json(
            $this->playlistRepository
                ->getPlaylists(
                    user: $request->user(),
                )
        );
    }

    public function show(
        Request $request,
        Playlist $playlist,
    ) {
        return response()->json([
            'playlist' => $playlist,
            'audios' => [],
        ]);
    }

    public function update(
        UpdatePlaylistRequest $request,
        Playlist $playlist,
    ) {
        return response()->json(
            $this->playlistRepository
                ->updatePlaylist(
                    playlist: PlaylistAdapter::fromModel($playlist),
                    name: $request->name,
                ),
        );
    }

    public function destroy(
        Request $request,
        Playlist $playlist,
    ) {
        $this->playlistRepository
            ->deletePlaylist(
                playlist: PlaylistAdapter::fromModel($playlist),
            );
    }
}
