<?php

namespace App\Modules\Auth\Contracts;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

abstract class AuthenticatableModel extends Authenticatable
{
    use HasApiTokens;
}