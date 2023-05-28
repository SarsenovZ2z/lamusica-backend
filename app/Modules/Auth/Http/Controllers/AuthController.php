<?php

namespace App\Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Http\Requests\SigninRequest;
use App\Modules\Auth\Http\Requests\SignupRequest;
use App\Modules\Auth\Usecases\Signin;
use App\Modules\Auth\Usecases\SigninDTO;
use App\Modules\Auth\Usecases\Signup;
use App\Modules\Auth\Usecases\SignupDTO;

class AuthController extends Controller
{

    public function signup(SignupRequest $request, Signup $signup)
    {
        $signup(
            new SignupDTO(
                email: $request->email,
                password: $request->password,
            )
        );

        return 'it works';
    }

    public function signin(SigninRequest $request, Signin $signin)
    {
        $token = $signin(
            new SigninDTO(
                email: $request->email,
                password: $request->password,
            )
        );

        return $token;
    }
}
