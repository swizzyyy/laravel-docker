<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\CalculateSpinAction;
use App\Actions\CalculateWinOrLose;
use App\Actions\getDataFromRedisAction;
use App\Models\Player;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class SpinController extends Controller
{
    public function spin(): JsonResponse
    {
        $player = Player::findOrFail(auth()->id());

        $getSpinAction = (new CalculateSpinAction)($player->last_spin_time);

        if($getSpinAction)
        {
            $getAllRank = (new getDataFromRedisAction())('ranks','ranks');

            return (new CalculateWinOrLose)($player,$getAllRank);
        }

        return response()->json(['You dont have permission to spin the wheel.']);
    }
}
