<?php

namespace App\Modules\Audio\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Audio\Data\Models\PlaylistAdapter;
use App\Modules\Audio\Domain\Usecases\CreatePlaylist;
use App\Modules\Audio\Domain\Usecases\CreatePlaylistDTO;
use App\Modules\Audio\Domain\Usecases\UpdatePlaylist;
use App\Modules\Audio\Domain\Usecases\UpdatePlaylistDTO;
use App\Modules\Audio\Http\Requests\CreatePlaylistRequest;
use App\Modules\Audio\Http\Requests\UpdatePlaylistRequest;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{

    public function index(Request $request)
    {
        $user = $request->user() ?? \App\Models\User::first();
    }

    public function show(Request $request, int $id)
    {
    }

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

    public function destroy(Request $request)
    {
    }
}
