<?php

namespace App\Modules\Audio\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlaylistResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->getName(),
            'pos' => $this->pos,
            'audios' => PlaylistAudioResource::collection($this->whenLoaded('audios')),
            'created_at' => $this->created_at,
        ];
    }
}
