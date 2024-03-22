<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignPrizeRequest;
use App\Http\Resources\AssignPrizeResource;
use App\Models\AssignPrize;

class AssignPrizeController extends Controller
{
    public function assignPrize(AssignPrizeRequest $request): AssignPrizeResource
    {
        $amount = $request->amount;
        $rank = $request->rank_category_id;

        $totalPrizes = 1000000;
        $prizeOdds = $totalPrizes > 0 ? ($amount / $totalPrizes) * 100 : 0;

        $assign = AssignPrize::updateOrCreate(
            ['rank_category_id' => $rank],
            ['odds_of_winning' => $prizeOdds, 'amount' => $amount]
        );

        return AssignPrizeResource::make($assign);
    }
}
