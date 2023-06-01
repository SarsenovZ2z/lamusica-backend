<?php

namespace App\Modules\Audio\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Audio\Data\Models\PlaylistAdapter;
use App\Modules\Audio\Domain\Usecases\CreatePlaylist;
use App\Modules\Audio\Domain\Usecases\CreatePlaylistDTO;
use App\Modules\Audio\Domain\Usecases\DeletePlaylist;
use App\Modules\Audio\Domain\Usecases\DeletePlaylistDTO;
use App\Modules\Audio\Domain\Usecases\GetPlaylist;
use App\Modules\Audio\Domain\Usecases\GetPlaylistDTO;
use App\Modules\Audio\Domain\Usecases\GetUserPlaylists;
use App\Modules\Audio\Domain\Usecases\GetUserPlaylistsDTO;
use App\Modules\Audio\Domain\Usecases\UpdatePlaylist;
use App\Modules\Audio\Domain\Usecases\UpdatePlaylistDTO;
use App\Modules\Audio\Http\Requests\CreatePlaylistRequest;
use App\Modules\Audio\Http\Requests\UpdatePlaylistRequest;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{

    public function store(
        CreatePlaylistRequest $request,
        CreatePlaylist $createPlaylist,
    ) {
        return response()->json(
            PlaylistAdapter::toArray(
                $createPlaylist(
                    new CreatePlaylistDTO(
                        user: $request->user(),
                        name: $request->name,
                    )
                )
            ),
            201
        );
    }

    public function index(
        Request $request,
        GetUserPlaylists $getPlaylists,
    ) {
        return response()->json(
            $getPlaylists(
                new GetUserPlaylistsDTO(
                    user: $request->user(),
                )
            )
        );
    }

    public function show(
        Request $request,
        GetPlaylist $getPlaylist,
    ) {
        return response()->json(
            PlaylistAdapter::toArray(
                $getPlaylist(
                    new GetPlaylistDTO(
                        id: $request->playlist,
                    )
                )
            )
        );
    }

    public function update(
        UpdatePlaylistRequest $request,
        UpdatePlaylist $updatePlaylist,
    ) {
        return response()->json(
            PlaylistAdapter::toArray(
                $updatePlaylist(
                    new UpdatePlaylistDTO(
                        id: $request->playlist,
                        name: $request->name,
                    ),
                )
            )
        );
    }

    public function destroy(
        Request $request,
        DeletePlaylist $deletePlaylist,
    ) {
        $deletePlaylist(
            new DeletePlaylistDTO(
                id: $request->playlist,
            )
        );
    }
}
