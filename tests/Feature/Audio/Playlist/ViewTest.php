<?php

namespace Tests\Feature\Audio\Playlist;

use App\Models\Playlist;
use App\Models\User;

class ViewTest extends PlaylistTestCase
{

    protected function route(): string
    {
        return parent::route() . '.show';
    }

    public function test_guest_cant_view_playlist(): void
    {
        $playlist = Playlist::factory()->create();

        $response = $this->getJson($this->url(['playlist' => $playlist]));

        $response->assertUnauthorized();
    }

    public function test_user_can_view_playlist(): void
    {
        $user = User::factory()
            ->hasPlaylists()
            ->create();

        $playlist = $user->playlists()->first();

        $response = $this->actingAs($user)
            ->getJson($this->url(['playlist' => $playlist]));

        $response->assertStatus(200);
        $response->assertJsonPath('id', $playlist->id);
    }

    public function test_user_cant_view_someones_playlist(): void
    {
        $user = User::factory()
            ->create();

        $someone = User::factory()
            ->hasPlaylists()
            ->create();

        $playlist = $someone->playlists()
            ->first();

        $response = $this->actingAs($user)
            ->getJson($this->url(['playlist' => $playlist]));

        $response->assertForbidden();
    }
}
