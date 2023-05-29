<?php

namespace App\Modules\Auth\Data\Datasources;

use App\Modules\Auth\Data\Models\AuthenticatableModel;
use App\Modules\Auth\Domain\Entities\AuthToken;

interface AuthenticatableDataSource
{

    public function getUserByEmail(
        string $email,
    ):? AuthenticatableModel;

    public function createUser(
        string $email,
        string $password,
    ): AuthenticatableModel;

    public function createAuthToken(
        AuthenticatableModel $authenticatable,
        string $tokenName,
    ): AuthToken;
}
