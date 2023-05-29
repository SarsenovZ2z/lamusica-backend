<?php

namespace App\Modules\Auth\Data\Datasources;

use App\Models\User;
use App\Modules\Auth\Data\Models\AuthTokenAdapter;
use App\Modules\Auth\Data\Models\AuthenticatableModel;
use App\Modules\Auth\Domain\Entities\AuthToken;

class AuthenticatableEloquentDataSource implements AuthenticatableDataSource
{
    public function __construct(
        protected User $model,
    ) {
    }

    public function createUser(
        string $email,
        string $password,
    ): AuthenticatableModel {
        return $this->model
            ->create([
                'email' => $email,
                'password' => $password,
            ]);
    }

    public function getUserByEmail(
        string $email,
    ): ?AuthenticatableModel {
        return $this->model
            ->where('email', $email)
            ->first();
    }

    public function createAuthToken(
        AuthenticatableModel $authenticatable,
        string $tokenName,
    ): AuthToken {
        return AuthTokenAdapter::fromModel(
            $authenticatable
                ->createToken($tokenName)
        );
    }
}
