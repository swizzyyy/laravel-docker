<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\getDataFromRedisAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\PrizeValidation;
use App\Http\Resources\PrizeResource;
use App\Models\Prize;
use App\Services\dataManipulcationService;

class PrizeController extends Controller
{
    protected $prizeService;

    /**
     * NotFoundExeption is declared in  Handler Class render method
     * it happends automatically when item in Model is not found
     */
     public function __construct()
    {
            $this->prizeService = new dataManipulcationService('Prize');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json((new getDataFromRedisAction())('prizes', 'prizes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrizeValidation $request): PrizeResource
    {
        $prize = $this->prizeService->create($request->all());

        return PrizeResource::make($prize);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrizeValidation $request, Prize $prize): PrizeResource
    {
        $prize = $this->prizeService->update($request->all(), $prize);

        return PrizeResource::make($prize);
    }
}
