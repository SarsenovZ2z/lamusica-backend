<?php

namespace App\Modules\Auth\Domain\Repositories;

use App\Modules\Auth\Domain\Entities\AuthToken;

interface AuthRepository
{

    public function signup(
        string $email,
        string $password,
    ): bool;

    public function signin(
        string $email,
        string $password,
        string $deviceName,
    ): AuthToken;
}
