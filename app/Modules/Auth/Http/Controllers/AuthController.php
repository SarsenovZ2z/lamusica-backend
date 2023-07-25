<?php

namespace App\Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Auth\Http\Requests\SigninRequest;
use App\Modules\Auth\Http\Requests\SignupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function signup(SignupRequest $request)
    {
        $user = User::firstOrCreate([
            'email' => $request->email,
            'password' => $request->password,
            'name' => $request->name,
        ]);
    }

    public function signin(SigninRequest $request)
    {
        $user = User::whereEmail($request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response()->json([
            'access_token' => $user->createToken($request->device_name ?? 'unknown')
                ->plainTextToken,
            'refresh_token' => null,
        ]);
    }

    public function signout(Request $request)
    {
        $user = $request->user();

        $user->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
        ]);
    }
}
