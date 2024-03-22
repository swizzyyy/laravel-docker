<?php
namespace App\Actions;

use App\Models\AssignPrize;


class CalculateWinOrLose
{
    public function __invoke($player,$getAllRank)
    {
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

                if($rndNumber == $assignPrizeCollection->odds_of_winning){
                    $player->update([
                        'balance' => $assignPrizeCollection->amount,
                        'last_spin_time' => now()
                    ]);

                    return response()->json(['You have win the price. Your balance is ' . $assignPrizeCollection->amount]);
                }

                $player->update([
                    'balance' => 0,
                    'last_spin_time' => now()
                ]);
                return response()->json(['You lost! Your balance is ' . 0]);
            }

            return response()->json(['Price is not assigned yet. Admin needs to assign the price!']);
    }
}
