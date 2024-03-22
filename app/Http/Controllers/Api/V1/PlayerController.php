<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Actions\getDataFromRedisAction;

class PlayerController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json((new getDataFromRedisAction())('players', 'players'));
    }
}
