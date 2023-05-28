<?php

namespace App\Modules\Auth\Repositories;

use App\Modules\Auth\Contracts\AuthRepository;
use App\Modules\Auth\Contracts\AuthenticatableDataSource;

class AuthRepositoryImpl implements AuthRepository
{

    public function __construct(protected AuthenticatableDataSource $authenticatableDataSource)
    {
        
    }


}
