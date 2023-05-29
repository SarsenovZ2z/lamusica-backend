<?php

namespace App\Modules\Auth\Data\Models;

interface AuthenticatableModel
{

    public function createToken(string $name);
}
