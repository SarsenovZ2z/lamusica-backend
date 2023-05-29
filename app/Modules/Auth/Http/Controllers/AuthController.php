<?php

namespace App\Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Data\Models\AuthTokenAdapter;
use App\Modules\Auth\Http\Requests\SigninRequest;
use App\Modules\Auth\Http\Requests\SignupRequest;
use App\Modules\Auth\Domain\Usecases\Signin;
use App\Modules\Auth\Domain\Usecases\SigninDTO;
use App\Modules\Auth\Domain\Usecases\Signup;
use App\Modules\Auth\Domain\Usecases\SignupDTO;

class AuthController extends Controller
{

    public function signup(SignupRequest $request, Signup $signup)
    {
        $isCreated = $signup(
            new SignupDTO(
                email: $request->email,
                password: $request->password,
            )
        );
    }

    public function signin(SigninRequest $request, Signin $signin)
    {
        $token = $signin(
            new SigninDTO(
                email: $request->email,
                password: $request->password,
                deviceName: $request->deviceName ?? 'unknown',
            )
        );

        return AuthTokenAdapter::toArray($token);
    }
}
