<?php

namespace App\Modules\Audio\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlaylistAudioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'pos' => $this->pos,
            'audio' => AudioResource::make($this->whenLoaded($this->audio)),
            'created_at' => $this->created_at,
        ];
    }
}
