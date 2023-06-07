<?php

namespace Tests\Feature\Audio\Playlist;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlaylistTestCase extends TestCase
{
    use RefreshDatabase;

    protected function route() : string
    {
        return 'api.me.playlist';
    }

}
