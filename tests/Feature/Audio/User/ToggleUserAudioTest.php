<?php

namespace Tests\Feature\Audio\User;

use App\Models\Audio;
use App\Models\User;

class ToggleUserAudioTest extends UserAudioTestCase
{

    public function route(): string
    {
        return parent::route() . '.toggleAudio';
    }

    public function guest_cant_toggle_audio(): void
    {
        $audio = Audio::factory()
            ->create();

        $response = $this->postJson($this->url(['audio' => $audio]));

        $response->assertForbidden();
    }

    public function test_user_can_add_audio(): void
    {
        $audio = Audio::factory()
            ->create();

        $user = User::factory()
            ->create();

        $response = $this->actingAs($user)
            ->postJson($this->url(['audio' => $audio]));

        $response->assertSuccessful();
        $this->assertTrue(
            $user->audios()
                ->where('audios.id', $audio->id)
                ->exists()
        );
    }

    public function test_user_can_detach_audio(): void
    {
        $user = User::factory()
            ->hasAudios()
            ->create();

        $audio = $user->audios()->first();

        $response = $this->actingAs($user)
            ->postJson($this->url(['audio' => $audio]));

        $response->assertSuccessful();

        $this->assertFalse(
            $user->audios()
                ->where('audios.id', $audio->id)
                ->exists()
        );
    }

}
