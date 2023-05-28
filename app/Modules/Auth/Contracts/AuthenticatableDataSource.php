<?php

namespace App\Modules\Auth\Contracts;

interface AuthenticatableDataSource
{

    public function createUserIfNotExists(
        string $email,
        string $password,
    );
}
