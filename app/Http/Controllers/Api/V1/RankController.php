<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\getDataFromRedisAction;
use App\Http\Requests\RankValidation;
use App\Http\Resources\RankResource;
use App\Services\dataManipulcationService;
use App\Models\Rank;

class RankController extends Controller
{
    protected $rankService;

    /**
     * NotFoundExeption is declared in  Handler Class render method
     * it happends automatically when item in Model is not found
     */
     public function __construct()
    {
            $this->rankService = new dataManipulcationService('Rank');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json((new getDataFromRedisAction())('ranks', 'ranks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RankValidation $request): RankResource
    {
        $rank = $this->rankService->create($request->all());

        return RankResource::make($rank);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RankValidation $request, Rank $rank)
    {
        $rank = $this->rankService->update($request->all(), $rank);

        return RankResource::make($rank);
    }
}
