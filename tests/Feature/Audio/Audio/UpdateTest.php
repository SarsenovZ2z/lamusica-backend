<?php

namespace Tests\Feature\Audio\Audio;

use App\Models\Audio;
use App\Models\User;

class UpdateTest extends AudioTestCase
{

    public function route(): string
    {
        return parent::route() . '.update';
    }

    public function test_guest_cant_update_audio(): void
    {
        $audio = Audio::factory()->create();

        $update_params = [
            'name' => $audio->name . '_updated',
        ];
        $old_params = $audio->toArray();

        $response = $this->putJson(
            $this->url([
                'audio' => $audio,
            ]),
            $update_params
        );
        $audio->refresh();

        $response->assertUnauthorized();
        $this->assertEquals($old_params, $audio->toArray());
    }

    public function test_user_can_update_audio(): void
    {
        $user = User::factory()->create();
        $audio = Audio::factory()->create();

        $update_params = [
            'name' => $audio->name . '_updated',
        ];
        $old_params = $audio->toArray();

        $response = $this->actingAs($user)
            ->putJson(
                $this->url([
                    'audio' => $audio,
                ]),
                $update_params
            );
        $audio->refresh();

        $response->assertSuccessful();
        $response->assertJson($update_params);
    }
}
