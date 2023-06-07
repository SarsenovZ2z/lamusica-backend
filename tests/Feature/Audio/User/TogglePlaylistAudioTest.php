<?php

namespace Tests\Feature\Audio\User;

use App\Models\User;

class TogglePlaylistAudioTest extends UserAudioTestCase
{
    public function route(): string
    {
        return parent::route() . '.togglePlaylistAudio';
    }

    public function test_guest_cant_delete_audio_from_someones_playlist(): void
    {
        $user = User::factory()
            ->hasPlaylists()
            ->hasAudios()
            ->create();

        $playlist = $user->playlists()->first();
        $userAudio = $user->userAudios()->first();

        $response = $this->postJson($this->url([
            'playlist' => $playlist,
            'userAudio' => $userAudio,
        ]));

        $response->assertUnauthorized();
        $this->assertModelExists($userAudio);
    }

    public function test_user_cant_delete_audio_from_someones_playlist(): void
    {
        $user = User::factory()
            ->hasPlaylists()
            ->hasAudios()
            ->create();

        $playlist = $user->playlists()->first();
        $userAudio = $user->userAudios()->first();

        $user2 = User::factory()->create();

        $response = $this->actingAs($user2)
            ->postJson($this->url([
                'playlist' => $playlist,
                'userAudio' => $userAudio,
            ]));

        $response->assertForbidden();
        $this->assertModelExists($userAudio);
    }

    public function test_user_cant_add_audio_to_someones_playlist(): void
    {
        $user = User::factory()
            ->hasPlaylists()
            ->create();

        $user2 = User::factory()
            ->hasAudios()
            ->create();

        $playlist = $user->playlists()->first();
        $userAudio = $user2->userAudios()->first();

        $response = $this->actingAs($user2)
            ->postJson($this->url([
                'playlist' => $playlist,
                'userAudio' => $userAudio,
            ]));

        $response->assertForbidden();
        $this->assertFalse($playlist->userAudios()->where('audio_user.id', $userAudio->id)->exists());
    }

    public function test_user_can_add_audio_to_playlist(): void
    {
        $user = User::factory()
            ->hasPlaylists()
            ->hasAudios()
            ->create();

        $playlist = $user->playlists()->first();
        $userAudio = $user->userAudios()->first();

        $response = $this->actingAs($user)
            ->postJson($this->url([
                'playlist' => $playlist,
                'userAudio' => $userAudio,
            ]));

        $response->assertSuccessful();
        $this->assertTrue($playlist->userAudios()->where('audio_user.id', $userAudio->id)->exists());
    }

    public function test_user_can_detach_audio_from_playlist(): void
    {
        $user = User::factory()
            ->hasPlaylists()
            ->hasAudios()
            ->create();

        $playlist = $user->playlists()->first();        
        $userAudio = $user->userAudios()->first();
        $playlist->userAudios()
            ->attach($userAudio);
        
        $response = $this->actingAs($user)
            ->postJson($this->url([
                'playlist' => $playlist,
                'userAudio' => $userAudio,
            ]));

        $response->assertSuccessful();
        $this->assertFalse($playlist->userAudios()->where('audio_user.id', $userAudio->id)->exists());
    }
}
