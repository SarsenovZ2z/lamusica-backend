<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SigninTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_authenticate(): void
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/auth/signin', [
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

        $response = $this->postJson('/api/auth/signin', [
            'email' => $user->email,
            'password' => 'invalid',
        ]);

        $response->assertStatus(401);
    }


}
