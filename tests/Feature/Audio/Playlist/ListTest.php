<?php

namespace Tests\Feature\Audio\Playlist;

use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;

use function PHPUnit\Framework\assertContains;

class ListTest extends PlaylistTestCase
{
    protected function route(): string
    {
        return parent::route() . '.index';
    }

    public function test_guest_cant_view_playlists(): void
    {
        $response = $this->getJson($this->url());

        $response->assertStatus(401);
    }

    public function test_user_can_view_playlists(): void
    {
        $user = User::factory()
            ->hasPlaylists(3)
            ->create();

        $ids = $user->playlists()->pluck('id');

        $response = $this->actingAs($user)
            ->getJson($this->url());

        $response->assertStatus(200);
        $response->assertJsonIsArray();
        $response->assertJsonCount($ids->count());
        foreach($response->json() as $index => $playlistJson) {
            assertContains($playlistJson['id'], $ids);
        }
    }
}
