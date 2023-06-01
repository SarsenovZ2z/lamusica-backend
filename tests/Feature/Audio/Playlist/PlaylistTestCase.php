<?php

namespace Tests\Feature\Audio\Playlist;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlaylistTestCase extends TestCase
{

    protected function route() : string
    {
        return 'api.playlist';
    }

}
