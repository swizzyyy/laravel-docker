<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignPrizeRequest;
use App\Models\AssignPrize;

class AssignPrizeController extends Controller
{
    public function assignPrize(AssignPrizeRequest $request)
    {
        $amount = $request->amount;
        $rankCategory = $request->rank_category_id;
        $totalPrizes = 1000000;
        $prizeOdds = $totalPrizes > 0 ? ($amount / $totalPrizes) * 100 : 0;

        AssignPrize::updateOrCreate(
            ['rank_category_id' => $rankCategory],
            ['prize_amount' => $amount, 'odds_of_winning' => $prizeOdds]
        );

        return response()->json(['message' => 'Prize assigned successfully']);
    }
}
