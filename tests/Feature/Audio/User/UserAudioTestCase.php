<?php

namespace Tests\Feature\Audio\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserAudioTestCase extends TestCase
{
    use RefreshDatabase;

    public function route(): string
    {
        return 'api.me';
    }
}
