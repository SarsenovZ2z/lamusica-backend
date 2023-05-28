<?php

namespace App\Modules\Auth\DataSources;

use App\Modules\Auth\Contracts\AuthenticatableModel;
use App\Modules\Auth\Contracts\AuthenticatableDataSource;

class AuthenticatableEloquentDataSource implements AuthenticatableDataSource
{
    public function __construct(protected AuthenticatableModel $model)
    {
    }

    public function createUserIfNotExists(
        string $email,
        string $password,
    ) {
        $this->model
            ->firstOrCreate([
                'email' => $email,
            ], [
                'password' => $password,
            ]);
    }
}
