<?php

namespace Tests\Feature\Audio\Audio;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AudioTestCase extends TestCase
{
    use RefreshDatabase;

    protected function route() : string
    {
        return 'api.audio';
    }

}