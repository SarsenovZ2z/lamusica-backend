<?php

namespace Tests\Feature\Auth;

use App\Models\User;

class SigninTest extends AuthTestCase
{

    protected function route(): string
    {
        return parent::route() . '.signin';
    }

    public function test_user_can_authenticate(): void
    {
        $user = User::factory()->create();

        $response = $this->postJson($this->url(), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(200);
        $response->assertJson(function($json) {
            $json->has('access_token')
                ->etc();
        });
    }

    public function test_user_cant_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $response = $this->postJson($this->url(), [
            'email' => $user->email,
            'password' => 'invalid',
        ]);

        $response->assertUnprocessable();
    }


}
