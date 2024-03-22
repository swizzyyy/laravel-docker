<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignPrizeRequest;
use App\Models\AssignPrize;

class AssignPrizeController extends Controller
{
    public function assignPrize(AssignPrizeRequest $request)
    {

        $totalPrizes = 1000000;
        $prizeOdds = $totalPrizes > 0 ? ($request->amount / $totalPrizes) * 100 : 0;

        $request+=['odds_of_winning' => $prizeOdds];

        $assign = AssignPrize::updateOrCreate(
            ['rank_category_id' => $request->rank_category_id],$request
        );

        return response()->json(['message' => 'Prize assigned successfully']);
    }
}
