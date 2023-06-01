<?php

namespace App\Modules\Audio\Data\DataSources;

use App\Models\Playlist;
use App\Modules\Audio\Data\Models\PlaylistAdapter;
use App\Modules\Audio\Domain\Entities\HasPlaylists;
use App\Modules\Audio\Domain\Entities\PlaylistEntity;
use Illuminate\Support\Collection;

class PlaylistEloquentDataSource implements PlaylistDataSource
{

    public function __construct(
        private Playlist $playlistModel,
    ) {
    }

    public function createPlaylist(
        HasPlaylists $user,
        string $name,
    ): PlaylistEntity {
        return PlaylistAdapter::fromModel(
            $this->playlistModel
                ->create([
                    'user_id' => $user->getKey(),
                    'name' => $name,
                ])
        );
    }

    public function getPlaylists(
        HasPlaylists $user,
    ): Collection {
        return $this->playlistModel
            ->where('user_id', $user->id)
            ->get();
    }

    public function getPlaylistById(
        int $id,
    ): PlaylistEntity {
        return $this->playlistModel
            ->findOrFail($id);
    }

    public function updatePlaylist(
        PlaylistEntity $playlist,
        string $name,
    ): PlaylistEntity {

        $playlist = PlaylistAdapter::toModel($playlist);

        $playlist->update([
            'name' => $name,
        ]);

        return PlaylistAdapter::fromModel($playlist);
    }

    public function deletePlaylist(
        PlaylistEntity $playlist,
    ): void {
        PlaylistAdapter::toModel($playlist)
            ->delete();
    }
}
