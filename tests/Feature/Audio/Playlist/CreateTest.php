<?php

namespace Tests\Feature\Audio\Playlist;

use App\Models\User;

class CreateTest extends PlaylistTestCase
{

    protected function route(): string
    {
        return parent::route() . '.store';
    }

    public function test_guest_cant_create_playlist(): void
    {
        $response = $this->postJson($this->url(), [
            'name' => 'Test Playlist',
        ]);

        $response->assertUnauthorized();
    }

    public function test_user_can_create_playlist(): void
    {
        $user = User::factory()
            ->create();

        $response = $this->actingAs($user)
            ->postJson($this->url(), [
                'name' => 'Test Playlist',
            ]);

        $response->assertStatus(201);
    }
}
