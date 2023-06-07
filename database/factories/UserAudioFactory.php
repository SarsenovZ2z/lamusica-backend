<?php

namespace Database\Factories;

use App\Models\Audio;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAudio>
 */
class UserAudioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'audio_id' => Audio::factory(),
            'pos' => 1,
        ];
    }
}
