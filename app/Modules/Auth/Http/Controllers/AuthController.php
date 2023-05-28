<?php

namespace App\Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Contracts\AuthRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function test(Request $request)
    {
        return 'it works';
    }

}
