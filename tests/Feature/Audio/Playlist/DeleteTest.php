<?php

namespace Tests\Feature\Audio\Playlist;

use App\Models\Playlist;
use App\Models\User;

class DeleteTest extends PlaylistTestCase
{

    protected function route(): string
    {
        return parent::route() . '.destroy';
    }

    public function test_guest_cant_delete_playlist(): void
    {
        $playlist = Playlist::factory()
            ->create();

        $response = $this->deleteJson($this->url(['playlist' => $playlist]));

        $response->assertUnauthorized();
    }

    public function test_user_can_delete_playlist(): void
    {
        $user = User::factory()
            ->hasPlaylists()
            ->create();

        $playlist = $user->playlists()
            ->first();

        $response = $this->actingAs($user)
            ->deleteJson($this->url(['playlist' => $playlist]));

        $response->assertStatus(200);
        $this->assertModelMissing($playlist);
    }

    public function test_user_cant_delete_someones_playlist(): void
    {
        $user = User::factory()
            ->create();

        $someone = User::factory()
            ->hasPlaylists()
            ->create();

        $playlist = $someone->playlists()
            ->first();

        $response = $this->actingAs($user)
            ->deleteJson($this->url(['playlist' => $playlist]));

        $response->assertForbidden();
        $this->assertModelExists($playlist);
    }
}
