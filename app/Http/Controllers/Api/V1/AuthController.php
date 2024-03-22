<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function adminLogin(Request $request)
    {
        Auth::setDefaultDriver('admin');

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $token = auth('admin')->attempt($credentials);
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function playerLogin(Request $request)
    {
        /**
        *  Chaning driver to use player model
        */
            Auth::setDefaultDriver('player');

            $credentials = $request->only('email', 'password');

            if (Auth::guard('player')->attempt($credentials)) {
                $token = auth('player')->attempt($credentials);
                return $this->respondWithToken($token);
            }

            return response()->json(['error' => 'Unauthorized'], 401);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => config('jwt.ttl') * 60
        ]);
    }
}
