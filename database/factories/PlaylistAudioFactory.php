<?php

namespace Database\Factories;

use App\Models\Playlist;
use App\Models\UserAudio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlaylistAudio>
 */
class PlaylistAudioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'playlist_id' => Playlist::factory(),
            'user_audio_id' => UserAudio::factory(),
            'pos' => 1,
        ];
    }
}
