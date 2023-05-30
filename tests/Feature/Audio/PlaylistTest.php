<?php

namespace Tests\Feature\Audio;

use App\Models\Playlist;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlaylistTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_playlist(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('/api/playlists', [
                'name' => 'Test Playlist',
            ]);

        $response->assertStatus(201);
    }

    public function test_user_can_update_playlist(): void
    {
        $user = User::factory()
            ->hasPlaylists()
            ->create();

        $playlist = $user->playlists()
            ->first();

        $response = $this->actingAs($user)
            ->putJson("/api/playlists/{$playlist->id}", [
                'name' => $playlist->name . '_updated',
            ]);

        $response->assertStatus(200);
    }

    public function test_guest_cant_update_playlist(): void
    {
        $user = User::factory()
            ->hasPlaylists()
            ->create();

        $playlist = $user->playlists()
            ->first();

        $response = $this->putJson("/api/playlists/{$playlist->id}", [
            'name' => $playlist->name . '_updated',
        ]);

        $response->assertStatus(401);
    }

    public function test_user_cant_update_someones_playlist(): void
    {
        $user = User::factory()
            ->create();

        $someone = User::factory()
            ->hasPlaylists()
            ->create();

        $playlist = $someone->playlists()
            ->first();

        $response = $this->actingAs($user)
            ->putJson("/api/playlists/{$playlist->id}", [
                'name' => $playlist->name . '_updated',
            ]);

        $response->assertStatus(403);
    }
}
