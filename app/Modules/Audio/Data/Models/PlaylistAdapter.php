<?php

namespace App\Modules\Audio\Data\Models;

use App\Models\Playlist as PlaylistModel;
use App\Modules\Audio\Domain\Entities\PlaylistEntity;

class PlaylistAdapter
{

    public static function toModel(PlaylistEntity $playlistEntity): PlaylistModel
    {
        $model = PlaylistModel::make();
        $model->exists = true;

        $attributes = [
            'id' => $playlistEntity->id,
            'name' => $playlistEntity->name,
            'user_id' => $playlistEntity->user_id,
            'created_at' => $playlistEntity->created_at,
            'updated_at' => $playlistEntity->updated_at,
        ];

        foreach($attributes as $key => $value) {
            $model->{$key} = $value;
        }

        return $model;
    }

    public static function fromModel(PlaylistModel $playlistModel): PlaylistEntity
    {
        return new PlaylistEntity(
            id: $playlistModel->id,
            name: $playlistModel->name,
            user_id: $playlistModel->user_id,
            created_at: $playlistModel->created_at,
            updated_at: $playlistModel->updated_at,
        );
    }

    public static function toArray(PlaylistEntity $playlistEntity)
    {
        return [
            'id' => $playlistEntity->id,
            'name' => $playlistEntity->name,
        ];
    }
}
