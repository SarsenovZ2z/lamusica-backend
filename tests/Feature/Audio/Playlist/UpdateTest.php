<?php

namespace Tests\Feature\Audio\Playlist;

use App\Models\Playlist;
use App\Models\User;

class UpdateTest extends PlaylistTestCase
{

    protected function route(): string
    {
        return parent::route() . '.update';
    }

    public function test_guest_cant_update_playlist(): void
    {
        $playlist = Playlist::factory()
            ->create();

        $response = $this->putJson($this->url(['playlist' => $playlist]), [
            'name' => $playlist->name . '_updated',
        ]);

        $response->assertStatus(401);
    }

    public function test_user_can_update_playlist(): void
    {
        $user = User::factory()
            ->hasPlaylists()
            ->create();

        $playlist = $user->playlists()
            ->first();

        $newValues = [
            'name' => $playlist->name . '_updated',
        ];

        $expected = [];

        $response = $this->actingAs($user)
            ->putJson($this->url(['playlist' => $playlist]), $newValues);

        $response->assertStatus(200);
        $response->assertJson($newValues);

        $updatedPlaylist = $user->playlists()
            ->find($playlist->id);

        foreach ($newValues as $key => $value) {
            $this->assertEquals($updatedPlaylist->{$key}, $expected[$key] ?? $value);
        }
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
            ->putJson($this->url(['playlist' => $playlist]), [
                'name' => $playlist->name . '_updated',
            ]);

        $response->assertForbidden();
    }
}
