<?php

namespace Tests\Feature\Audio\Audio;

use App\Models\Audio;
use App\Models\User;

class CreateTest extends AudioTestCase
{

    public function route(): string
    {
        return parent::route() . '.store';
    }

    private function getAudioParams(): array
    {
        return [
            'source' => 'youtube',
            'source_id' => 'source_id',
            'name' => 'test_video',
        ];
    }

    public function test_guest_cant_create_audio(): void
    {
        $response = $this->postJson($this->url(), $this->getAudioParams());

        $response->assertUnauthorized();
    }

    public function test_user_can_create_audio(): void
    {
        $user = User::factory()
            ->create();

        $response = $this->actingAs($user)
            ->postJson($this->url(), $this->getAudioParams());

        $response->assertCreated();
        $this->assertTrue(Audio::where($this->getAudioParams())->exists());
    }

}
