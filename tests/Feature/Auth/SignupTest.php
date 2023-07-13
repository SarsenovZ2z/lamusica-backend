<?php

namespace Tests\Feature\Auth;

class SignupTest extends AuthTestCase
{

    protected function route(): string
    {
        return parent::route() . '.signup';
    }

    public function test_new_user_can_register(): void
    {
        $response = $this->postJson($this->url(), [
            'email' => 'test@example.com',
            'password' => 'password',
            'name' => 'Test User',
        ]);

        $response->assertStatus(200);
    }
}
