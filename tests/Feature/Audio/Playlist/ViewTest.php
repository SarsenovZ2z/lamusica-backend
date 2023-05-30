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

        $response->assertStatus(401);
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
        $response->assertJson([
            'id' => $playlist->id,
        ]);
    }

}