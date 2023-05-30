<?php

namespace App\Modules\Audio\Data\DataSources;

use App\Models\Playlist as PlaylistModel;
use App\Modules\Audio\Data\Models\PlaylistAdapter;
use App\Modules\Audio\Domain\Entities\HasPlaylists;
use App\Modules\Audio\Domain\Entities\Playlist;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;

class PlaylistEloquentDataSource implements PlaylistDataSource
{

    public function __construct(
        private PlaylistModel $model,
    ) {
    }

    public function create(
        HasPlaylists $user,
        string $name,
    ): Playlist {

        Gate::authorize('create', $this->model);

        return PlaylistAdapter::fromModel(
            $this->model->create([
                'name' => $name,
                'user_id' => $user->id,
            ])
        );
    }

    public function update(
        int $id,
        string $name,
    ): Playlist {

        $playlist = $this->model
            ->findOrFail($id);

        Gate::authorize('update', $playlist);

        $playlist->update([
            'name' => $name,
        ]);

        return PlaylistAdapter::fromModel($playlist);
    }

    public function getPlaylists(
        HasPlaylists $user,
    ): Collection {

        Gate::authorize('viewAny', $this->model);

        return $this->model
            ->where('user_id', $user->id)
            ->get()
            ->map(function ($playlist) {
                Gate::authorize('view', $playlist);
                return PlaylistAdapter::fromModel($playlist);
            })
            ->values();
    }

    public function getPlaylist(
        int $id,
    ): Playlist {

        $playlist = $this->model
            ->findOrFail($id);

        Gate::authorize('view', $playlist);

        $playlist->load([
            'userAudios' => fn($query) => $query->with('audio'),
        ]);

        return PlaylistAdapter::fromModel($playlist);
    }

    public function delete(
        int $id,
    ): void {

        $playlist =  $this->model
            ->findOrFail($id);

        Gate::authorize('delete', $playlist);

        $playlist->delete();
    }
}
