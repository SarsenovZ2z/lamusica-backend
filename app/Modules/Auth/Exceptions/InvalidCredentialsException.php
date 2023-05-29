<?php

namespace App\Modules\Auth\Exceptions;

use Exception;
use Illuminate\Http\Request;

class InvalidCredentialsException extends Exception
{
    /**
     * Render the exception into an HTTP response.
     */
    public function render(Request $request)
    {
        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);
    }
}
