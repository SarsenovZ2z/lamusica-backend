<?php

namespace Tests\Feature\Audio\Audio;

use App\Models\User;

class ListTest extends AudioTestCase
{

    public function route(): string
    {
        return parent::route() . '.index';
    }

    public function test_guest_cant_view_audios(): void
    {
        $response = $this->getJson($this->url());

        $response->assertUnauthorized();
    }

    public function test_user_can_view_audios(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->getJson(
                $this->url()
            );

        $response->assertSuccessful();
    }
}
