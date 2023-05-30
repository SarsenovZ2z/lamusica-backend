<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    abstract protected function route() : string;

    protected function url(array $params = []) : string
    {
        return route($this->route(), $params);
    }
}
