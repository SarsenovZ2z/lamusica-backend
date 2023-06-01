<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTestCase extends TestCase
{
    use RefreshDatabase;

    protected function route() : string
    {
        return 'api.auth';
    }

}
