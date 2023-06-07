<?php

namespace Tests\Feature\Audio\Audio;

use Tests\TestCase;

class AudioTestCase extends TestCase
{

    protected function route() : string
    {
        return 'api.me.audio';
    }

    public function test_user_can_view_audios()
    {
        assert(true, true);
    }

}