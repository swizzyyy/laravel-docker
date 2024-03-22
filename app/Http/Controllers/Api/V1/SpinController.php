<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\CalculateSpinAction;
use App\Actions\getDataFromRedisAction;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\AssignPrize;
use App\Models\Rank;

class SpinController extends Controller
{
    public function spin(): JsonResponse
    {
        $player = Player::findOrFail(auth()->id());

        $getSpinAction = (new CalculateSpinAction)($player->last_spin_time);

        if($getSpinAction)
        {
            $getAllRank = (new getDataFromRedisAction())('ranks','ranks');

            $playersRank = array_filter($getAllRank,function($item) use($player){
                return $item->id == $player->rank_id;
            });

            $playersRank = array_values($playersRank);

            if (!empty($playersRank)) {
                $rankGroupID = $playersRank[0]->rank_category_id;
            } else {
                $rankGroupID = null;
            }

            $assignPrizeCollection = AssignPrize::where('rank_category_id',$rankGroupID)->first();

            if(!is_null($assignPrizeCollection)){

                $rndNumber = rand(0,$assignPrizeCollection->odds_of_winning);

                if($rndNumber <= $assignPrizeCollection->odds_of_winning){
                    $player->update(['balance' => $assignPrizeCollection->amount]);

                    return response()->json(['You have win the price']);
                }
            }

            return response()->json(['Price is not assigned yet. Admin needs to assign the price!']);

        }

        return response()->json('You dont have permission to spin the wheel.');
    }
}
