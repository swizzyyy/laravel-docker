<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class SpinController extends Controller
{
    public function spin(): JsonResponse
    {
        $user = Player::findOrFail(auth()->id());

        return response()->json($user);
    }
}
