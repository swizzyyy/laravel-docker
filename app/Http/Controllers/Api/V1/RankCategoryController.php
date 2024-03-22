<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\dataManipulcationService;
use App\Actions\getDataFromRedisAction;
use App\Http\Requests\RankCategoryValidation;
use App\Http\Resources\RankCategoryResource;
use App\Models\RankCategory;

class RankCategoryController extends Controller
{
    protected $rankCategoryService;

    /**
     * NotFoundExeption is declared in  Handler Class render method
     * it happends automatically when item in Model is not found
     */
     public function __construct()
    {
            $this->rankCategoryService = new dataManipulcationService('RankCategory');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json((new getDataFromRedisAction())('rank_categories', 'rank_categories'));
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(RankCategoryValidation $request): RankCategoryResource
    {
        $prize = $this->rankCategoryService->create($request->all());

        return RankCategoryResource::make($prize);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RankCategoryValidation $request, RankCategory $rankCategory): RankCategoryResource
    {
        $rankCategory = $this->rankCategoryService->update($request->all(), $rankCategory);

        return RankCategoryResource::make($rankCategory);
    }
}
