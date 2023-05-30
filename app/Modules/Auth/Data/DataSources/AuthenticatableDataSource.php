<?php

namespace App\Modules\Auth\Data\DataSources;

use App\Modules\Auth\Data\Models\AuthenticatableModel;
use App\Modules\Auth\Domain\Entities\AuthToken;

interface AuthenticatableDataSource
{

    public function getUserByEmail(
        string $email,
    ): ?AuthenticatableModel;

    public function createUser(
        string $email,
        string $password,
    ): AuthenticatableModel;

    public function createAuthToken(
        AuthenticatableModel $authenticatable,
        string $tokenName,
    ): AuthToken;

    public function deleteAllAuthTokens(
        AuthenticatableModel $authenticatable,
        array $except = [],
    ): void;
}
