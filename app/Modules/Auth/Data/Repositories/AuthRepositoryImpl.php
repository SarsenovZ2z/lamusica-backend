<?php

namespace App\Modules\Auth\Data\Repositories;

use App\Modules\Auth\Domain\Repositories\AuthRepository;
use App\Modules\Auth\Data\Datasources\AuthenticatableDataSource;
use App\Modules\Auth\Domain\Entities\AuthToken;
use App\Modules\Auth\Exceptions\InvalidCredentialsException;
use Illuminate\Support\Facades\Hash;

class AuthRepositoryImpl implements AuthRepository
{

    public function __construct(
        private AuthenticatableDataSource $authenticatableDataSource,
    ) {
    }

    public function signup(
        string $email,
        string $password,
    ): bool {
        $user = $this->authenticatableDataSource
            ->getUserByEmail($email);

        if ($user != null) {
            return false;
        }

        $user = $this->authenticatableDataSource
            ->createUser(
                email: $email,
                password: $password,
            );

        return true;
    }

    public function signin(
        string $email,
        string $password,
        string $deviceName,
    ): AuthToken {
        $user = $this->authenticatableDataSource
            ->getUserByEmail($email);

        if ($user == null || !Hash::check($password, $user->password)) {
            throw new InvalidCredentialsException();
        }

        return $this->authenticatableDataSource
            ->createAuthToken(
                authenticatable: $user,
                tokenName: $deviceName,
            );
    }
}
