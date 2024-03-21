<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $token = auth('admin')->attempt($credentials);
            return $this->adminRespondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    protected function adminRespondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => config('jwt.ttl') * 60
        ]);
    }

    public function playerLogin(Request $request)
    {
        /**
        *  Chaning driver to authorize player
        */
            Auth::setDefaultDriver('player');

            $credentials = $request->only('email', 'password');

            if (Auth::guard('player')->attempt($credentials)) {
                $token = auth('player')->attempt($credentials);
                return $this->playerRespondWithToken($token);
            }

            return response()->json(['error' => 'Unauthorized'], 401);
    }

    protected function playerRespondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => config('jwt.ttl') * 60
        ]);
    }
}
